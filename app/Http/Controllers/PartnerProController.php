<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerPro;
use App\Models\Staff;
use App\Models\Districts;
use App\Models\Caste;
use App\Models\Identity;

use App\Models\NGO;
// use Illuminate\Support\Facades\Input;
use App\Project;

class PartnerProController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts= PartnerPro::all();
        // $posts              = PartnerPro::select('id','ngo_id','district_id')->get();
        $posts              = \DB::table('partnerpros')->select('id','ngo_id','district_id','address')->get();
        $ngo_name           = NGO::pluck('name', 'id');
        // dd($posts, $posts->district_id);
        
        // dd($district_id_exp);
        return view('partnerpro.index', compact('posts','ngo_name'));
    }

    public function filterSearch(Request $request)
    {
        $obj = (new PartnerPro)->newQuery();

        // if ($request->has('name')) {
        //     $name = $request->get('name');
        //     $obj->where('name', 'LIKE', '%'.$name.'%');
        // }

        if ($request->has('ngo_id')) {
            $ngo_id = $request->get('ngo_id');
            $obj->where('ngo_id', $ngo_id);
        }

        $lists = $obj->get();
        // return $lists;

        $html =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/partnerpro/';
        $ngo_name = NGO::pluck('name', 'id');
        
        foreach($lists as $key => $list){

            $key =$key+1;
            $ngoName = '';
            foreach($ngo_name as $id=>$name){
                if($id == $list->ngo_id){
                    $ngoName = $name;
                }
            }

            $dist_exp = explode(',', $list->district_id); 
            $dis_array = array();

            foreach($dist_exp as $dist)
            {
                $distname = \DB::table('districts')->select('district_name')->where('id',$dist)->first();
                if(!empty($distname)){
                    array_push($dis_array, $distname->district_name); 
                }
            }

            $districts = implode(',<br>', $dis_array);

            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $ngoName .'</td>
                        <td>'. $list->address .'</td>
                        <td>'. $districts .'</td>
                        <td>'. '<a href="'. $baseurl . $list->id.'/edit" class="action-btns"> 
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <form method="POST" action="'. $baseurl . $list->id.'">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="'.$request->get('_token').'">
                                    <a href="javascript:void(0);" class="action-btns submit">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </form>
                        </td>
                    </tr>';
            
        }

            $table_starting = '<table class="table table-striped table-bordered datatbl_new">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name of NGO</th>
                                            <th>Address</th>
                                            <th>District</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
            $table_end = '</tbody><table>';

          

        $data['html'] = $table_starting. $html. $table_end;
       
        $count = strlen($data['html']);

        if($count<5){
                
                $data['html']  = $table_starting. '<tr> <td colspan="9"> No Data Available</td><tr>'. $table_end; 
              }
              // die;
        
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['projects'] = Project::pluck('project_code', 'id');
        $data['district_list'] = Districts::pluck('district_name', 'id');
        $data['ngo_name']      = NGO::pluck('name', 'id');

        $data['castes']  =  Caste::pluck('name','id');
        $data['castes']->put('total','Total');

        $data['compos_exe_comm'] = ["Total No. of Board Members"=>["male"=>"No. of Male Members",
                                    "female"=>"No. of Female Members",
                                    "other"=>"No. of Other Members",
                                    ],
                                    "Total No. of General Members"=>["male"=>"No. of Male Members",
                                    "female"=>"No. of Female Members",
                                    "other"=>"No. of Other Members",
                                    ]];  

        $data['employee_details'] = ["low_level"=>"No. of staff in low level positions",
                                "mid_level"=>"No. of staff in mid-level positions",
                                "senior"=>"No. of staff in senior level positions",
                                 "total"=>"Total Number of Staff",
                                ]; 
        // dd($data);
        // $data['ethnicities']  =  Identity::select('id','name')->get();

        // $data['staff_list_name_desig'] = Staff::select('name', 'designation')->get();

       //  // Composition of Executive Committee
       //  $data['member']['total_general_member'] = Staff::where('member_type', 'general_member')->count();
       //  $data['member']['total_board_member'] = Staff::where('member_type', 'board_member')->count();
       //  $data['member']['male_general_member'] = Staff::where('member_type', 'general_member')->where('gender', 'Male')->count();
       //  $data['member']['female_general_member'] = Staff::where('member_type', 'general_member')->where('gender', 'Female')->count();
       //  $data['member']['male_board_member'] = Staff::where('member_type', 'board_member')->where('gender', 'Male')->count();
       //  $data['member']['female_board_member'] = Staff::where('member_type', 'board_member')->where('gender', 'Female')->count();

        //Ethnicity Description of Members: 
        // $caste_ids  =  Caste::select('id','name')->get();

        // foreach($caste_ids as $casteid)
        // {
        //     $name_id_of_caste[$casteid['id']] = $casteid['name'];

        // }
       
       // // dd($name_id_of_caste);
       //  $total_ethnicity_member['board_total'] =0;
       //    $total_ethnicity_member['general_total'] =0;
       //  foreach($name_id_of_caste as $key_id=> $value_name)
       //  {
       //        $data['ethnicity_member'][$value_name]['board_member'] = Staff::where('caste_id', $key_id)->where('member_type', 'board_member')->count();

       //       $total_ethnicity_member['board_total']+= $data['ethnicity_member'][$value_name]['board_member'];

             
       //      $data['ethnicity_member'][$value_name]['general_member'] = Staff::where('caste_id', $key_id)->where('member_type', 'board_member')->count();
       //        $total_ethnicity_member['general_total']+= $data['ethnicity_member'][$value_name]['general_member'];
            
       //  }

       //    $data['total_ethnicity_member']['board_total'] =  $total_ethnicity_member['board_total'];

       //     $data['total_ethnicity_member']['general_total'] = $total_ethnicity_member['general_total'];
         
            

       //    // Composition of Employees: Employee Details:
       //  $data['employee_desig']['total_male_staff'] = Staff::where('gender', 'Male')->count();
       //  $data['employee_desig']['total_female_staff'] = Staff::where('gender', 'Female')->count();
       //  $data['employee_desig']['total_staff'] =  $data['employee_desig']['total_male_staff'] + $data['employee_desig']['total_female_staff'];
        
       //  $data['employee_desig']['male_low'] = Staff::where('designation_level', 'low_level_position')->where('gender', 'Male')->count();
       //  $data['employee_desig']['female_low'] = Staff::where('designation_level', 'low_level_position')->where('gender', 'Female')->count();
       //   $data['employee_desig']['total_male_female_low'] =  $data['employee_desig']['male_low'] + $data['employee_desig']['female_low'];

       //  $data['employee_desig']['male_mid'] = Staff::where('designation_level', 'mid_level_position')->where('gender', 'Male')->count();
       //  $data['employee_desig']['female_mid'] = Staff::where('designation_level', 'mid_level_position')->where('gender', 'Female')->count();
       //   $data['employee_desig']['total_male_female_mid'] =  $data['employee_desig']['male_mid'] + $data['employee_desig']['female_mid'];

       //  $data['employee_desig']['male_senior'] = Staff::where('designation_level', 'senior_level_positions')->where('gender', 'Male')->count();
       //  $data['employee_desig']['female_senior'] = Staff::where('designation_level', 'senior_level_positions')->where('gender', 'Female')->count();
       //   $data['employee_desig']['total_male_female_senior'] =  $data['employee_desig']['male_senior'] + $data['employee_desig']['female_senior'];


       //   //Ethnicity Description of Employee:
       //   foreach($name_id_of_caste as $key_id=> $value_name)
       //  {
       //        $data['ethnicity_fe_male'][$value_name]['male'] = Staff::where('caste_id', $key_id)->where('gender', 'Male')->count();
             
       //      $data['ethnicity_fe_male'][$value_name]['female'] = Staff::where('caste_id', $key_id)->where('gender', 'Female')->count();
            
       //  }


        // dd($data);
        return view('partnerpro.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'ngo_id' => 'required',
            
        ]);
        
        $input = $request->all();
        
        // dd($input);
         
        $input['staff']                     = serialize($input['staff']);
        $input['exe_member_composition']    = serialize($input['exe_member_composition']);
        $input['member_ethnicity']          = serialize($input['member_ethnicity']);
        $input['employee_detail']           = serialize($input['employee_detail']);
        $input['ethnicity_description']     = serialize($input['ethnicity_description']);
         




        $input['networks']                 = implode(",",$input['networks']);
        $input['ex_n_endors_policy']       = implode(",",$input['ex_n_endors_policy']);
        $input['organization_expertise']   = implode(",",$input['organization_expertise']);

        $input['geo_coverage']             = implode(",",$input['geo_coverage']);
        $input['district_id']              = implode(",",$input['district_id']);
    
        $input['projectinfo']               = implode(",",$input['projectinfo']);
        $input['fuding_agency']             = implode(",",$input['fuding_agency']);
        $input['thematic_area']             = implode(",",$input['thematic_area']);
        $input['info_project_district']     = implode(",",$input['info_project_district']);

        $input['publications']              = implode(",",$input['publications']);
            
         if($request->hasFile('partnerlogo'))
        {
            $file = $request->file('partnerlogo');
            $extension = $request->file('partnerlogo')->getClientOriginalExtension();
           $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
           // var_dump($name_only);exit();
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/partnerpro/';

            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);
                    $input['partnerlogo'] = $newFileName;
                }
        }
        else{
                 $input['partnerlogo'] = '';
            }

            // dd($input);

        PartnerPro::create($input);

        return redirect()->route('partnerpro.index')->withFlashSuccess('Partner Profile has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['posts']                  = PartnerPro::findOrFail($id);

         $data['projects'] = Project::pluck('project_code', 'id');
        $data['district_list'] = Districts::pluck('district_name', 'id');
        $data['ngo_name']      = NGO::pluck('name', 'id');

        $data['castes']  =  Caste::pluck('name','id');
        $data['castes']->put('total','Total');

        $data['compos_exe_comm'] = ["Total No. of Board Members"=>["male"=>"No. of Male Members",
                                    "female"=>"No. of Female Members",
                                    "other"=>"No. of Other Members",
                                    ],
                                    "Total No. of General Members"=>["male"=>"No. of Male Members",
                                    "female"=>"No. of Female Members",
                                    "other"=>"No. of Other Members",
                                    ]];  

        $data['employee_details'] = ["low_level"=>"No. of staff in low level positions",
                                "mid_level"=>"No. of staff in mid-level positions",
                                "senior"=>"No. of staff in senior level positions",
                                 "total"=>"Total Number of Staff",
                                ]; 


        $data['staff_unser']                     = unserialize($data['posts']->staff);
        $data['exe_member_composition_unser']    = unserialize($data['posts']->exe_member_composition);
        $data['member_ethnicity_unser']          = unserialize($data['posts']->member_ethnicity);
        $data['employee_detail_unser']           = unserialize($data['posts']->employee_detail);
        $data['ethnicity_description_unser']     = unserialize($data['posts']->ethnicity_description);


        //exploding
        $data['networks_exp']                 = explode(",", $data['posts']->networks);
        $data['ex_n_endors_policy_exp']       = explode(",", $data['posts']->ex_n_endors_policy);
        $data['organization_expertise_exp']   = explode(",",$data['posts']->organization_expertise);

        // $data['project_id_exp']               = explode(", ",$data['posts']->project_id);
        $data['geo_coverage_exp']             = explode(",",$data['posts']->geo_coverage);
        $data['district_id_exp']              = explode(",",$data['posts']->district_id);
        $data['projectinfo_exp']              = explode(",",$data['posts']->projectinfo);
        $data['fuding_agency_exp']            = explode(",",$data['posts']->fuding_agency);
        $data['thematic_area_exp']            = explode(",",$data['posts']->thematic_area);
        $data['info_project_district_exp']    = explode(",",$data['posts']->info_project_district);

        // dd($data['fuding_agency_exp']);

        $data['publications_exp']              =explode(",",$data['posts']->publications);
            

       // dd($data);
        return view('partnerpro.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
         $this->validate($request,[
            'ngo_id' => 'required',
           
        ]);

        $input = $request->all();

        $partnerpro = PartnerPro::findOrFail($id);
           
        $input['networks']                  =   implode(",",$input['networks']);
        $input['ex_n_endors_policy']        =   implode(",",$input['ex_n_endors_policy']);
        $input['organization_expertise']    =   implode(",",$input['organization_expertise']);

        $input['geo_coverage']              =   implode(",",$input['geo_coverage']);
        $input['district_id']               =   implode(",",$input['district_id']);
        
        $input['projectinfo']               =   implode(",",$input['projectinfo']);
        $input['fuding_agency']             =   implode(",",$input['fuding_agency']);
        $input['thematic_area']             =   implode(",",$input['thematic_area']);
        $input['info_project_district']     =   implode(",",$input['info_project_district']);

        $input['publications']              =   implode(",",$input['publications']);

         if($request->hasFile('partnerlogo'))
        {
            $file = $request->file('partnerlogo');
            $extension = $request->file('partnerlogo')->getClientOriginalExtension();
           $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
           // var_dump($name_only);exit();
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/partnerpro/';
            if(!empty($newFileName))
                {   
                   $stat = $file->move($destinationPath, $newFileName);
                    $input['partnerlogo'] = $newFileName;
            // dd($newFileName, $destinationPath, $stat, $input['partnerlogo']);
                }
        }
        else{
                 $input['partnerlogo'] = '';
            }
    
        $partnerpro->update($input);

        return redirect()->route('partnerpro.index')->withFlashSuccess('Partner Profile profile is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = PartnerPro::find($id);


         $path = public_path().'/files/partnerpro/'.$model->partnerlogo;
        //  dd($model, $path);
       
        // dd('dsfsd');
        \File::delete($path);
         $model->delete();


        return redirect()->route('partnerpro.index')->withFlashSuccess('Partner Profile is deleted successfully.');
    }
}
