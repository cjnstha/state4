<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IECMaterial;
use App\Models\Staff;
use App\Project;

use App\Models\Goal;  // for goal and related
use Illuminate\Support\Facades\Input;

class IECMaterialController extends Controller
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
        $iecmaterials   = IECMaterial::all();
        $projects       = Project::pluck('project_code', 'id');
        $goals = Goal::pluck('goal','id'); 
     
        return view('iecmaterial.index', compact('iecmaterials','projects','goals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['staff_name']    = Staff::pluck('name', 'id');
        $data['projects']      = Project::pluck('project_code', 'id');
        $data['goals'] = Goal::pluck('goal','id'); /* for goal and related*/
        return view('iecmaterial.create', $data);
    }


    public function filterSearch(Request $request)
    {
        // dd('comm',$request->all());
       $obj = (new IECMaterial)->newQuery();
    
        // if ($request->has('district_id')) {
        //     $districts = $request->get('district_id');
           
        // if(count($districts) != 0  ){
            
        //     $obj->where(function ($q) use ($districts) {
        //     foreach ($districts as $key => $district) {
        //                // $q->orWhere("profiles.language", "LIKE", "%" . $language . "%");
        //                 $q->orWhere("projects.district_id", $district);
        //                 $q->orWhere("projects.district_id", "LIKE", $district . ",%");
        //                 $q->orWhere("projects.district_id", "LIKE", "%," . $district);
        //                 $q->orWhere("projects.district_id", "LIKE", "%, " . $district);
        //                 $q->orWhere("projects.district_id", "LIKE", "%," . $district . ",%");
        //                 $q->orWhere("projects.district_id", "LIKE", "%, " . $district . ",%");
        //         }
        //        });
               
        //       }
        // }
    
      
        if ($request->has('project_code')) {
            $project_code = $request->get('project_code');
            $obj->where('project_id',$project_code);
        }

        if ($request->has('theme')) {
            $theme = $request->get('theme');
            $obj->where('theme',$theme);
        }

        if ($request->has('type')) {
            $type = $request->get('type');
            $obj->where('type',$type);
        }

        if ($request->has('quarter')) {
            $quarter = $request->get('quarter');
            $obj->where('quarter', $quarter);
        }

        if ($request->has('quarter_year')) {
            $quarter_year = $request->get('quarter_year');
              // $obj->where('quarter_year', '>' , $quarter_year);
            $obj->where('quarter_year', $quarter_year);
        }

        $projects = $obj->get();
        
        // dd($projects);
        
         $html =' ';
        // $baseurl = "http://192.168.0.155/sfcgdbms/public/iecmaterial/";
         $root_url = url('/');
        $baseurl = $root_url.'/iecmaterial/';
        // $baseurl = "http://localhost/sfcgdbms/public/iecmaterial/";
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($projects as $key => $project){

            $key =$key+1;
           
            //starting of district
            // if($project->district_id != ''){
            //     $dist_exp = explode(',', $project->district_id); 
            //     $dis_array = array();

            //     foreach($dist_exp as $dist)
            //     {
            //        $distname = \DB::table('districts')->select('district_name')->where('id',$dist)->first();
            //        array_push($dis_array, $distname->district_name); 
            //     }

            //     $districts = implode(',<br>', $dis_array);
            // }
           //end of districts

            //starting of beneficiairies
            //  if($project->benef_id != ''){
            // $benef_exp = explode(',', $project->benef_id);
            //             $benef_array = array();
                    
            //            foreach($benef_exp as $dist) {
            //                $benefname = \DB::table('benef')->select('name')->where('id',$dist)->first();

            //               array_push($benef_array, $benefname->name); 
            //             }
                     
            //             $benefs = implode(', ', $benef_array); 
            //             // dd($benefs);
            //         }


            // $partners_exp = explode(',', $project->partners); 
            // $part_array = array();

            // foreach($partners_exp as $part)
            // {
            //    $part_name = \DB::table('ngo')->select('name')->where('id',$part)->first();
            //    array_push($part_array, $part_name->name); 
            // }

            // $partners = implode(',<br>', $part_array);
            //end of partners

             // dd($project->quarter); 

            if($project->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $project->quarter_year" ;   }
            if($project->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $project->quarter_year "; }
            if($project->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $project->quarter_year";   }
            if($project->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $project->quarter_year "; }
            
        //theme  
            
            if($project->theme == 'education'){
                    $theme ='Education'; }
            if($project->theme == 'gender'){
                    $theme ='Gender base'; }        
            if($project->theme == 'violence') {
                    $theme ='Violence'; }      

  // dd($project); 
            // dd($quarter_n_year);

            // $date = $project->signed_date; //signed date <th>Signed Date</th>
            // $time = strtotime($date);   //signed date <td>'. date(' F jS, Y',$time)  .'</td>

            // case registered date
                // $reg_date =  $project->case_registered_date;
                // $care_reg_date = strtotime($reg_date);

                 $pro_date =  $project->production_date;
                $prod_date = strtotime($pro_date);

                 foreach($project_code_list as $id=>$pro_c){
                     // dd($id, $project_code->project_id);
                            if($id == $project->project_id) { 
                                
                                // dd($project_code->project_code, $project_code->project_id);
                                $projectcode = $pro_c;
                            }
                 }


            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'.   $projectcode  .'</td>
                        <td>'.  $theme  .'</td>
                        <td>'. $project->type .'</td>
                        <td>'. date(' F jS, Y',$prod_date)  .'</td>
                        <td>'. $project->no_of_copies .'</td>
                        <td>'. $project->cost .'</td>
                        <td>'. $quarter_n_year  .'</td>
                        <td>'. '<a href="'. $baseurl . $project->id.'/edit" class="action-btns"> 
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <form method="POST" action="'. $baseurl . $project->id.'">
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
                                             <th>Project Code</th>
                                            <th>Theme</th>
                                            <th>Type</th>
                                            <th>Production Date</th>
                                            <th>No. of Copies</th>
                                            <th>Cost</th>
                                            <th>Quarter & Year</th>
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
        
        return $data;
     }

    public function filterSearch2(Request $request)
    {
       $obj = (new IECMaterial)->newQuery();
    
        if ($request->has('goal_id')) {
            $goal_id = $request->get('goal_id');
            $obj->where('goal_id', $goal_id);
        }

        if ($request->has('output_id')) {
            $output_id = $request->get('output_id');
            $obj= $obj->where(function ($q) use ($output_id) {
                foreach ($output_id as $key => $id) {
                    $q->orWhereRaw('FIND_IN_SET('.$id.',output_id)');
                }
            });
        }

        if ($request->has('indicator_id')) {
            $indicator_id = $request->get('indicator_id');
             $obj= $obj->where(function ($q) use ($indicator_id) {
                foreach ($indicator_id as $key => $id) {
                    $q->orWhereRaw('FIND_IN_SET('.$id.',indicator_id)');
                }
            });
        }

        if ($request->has('activity_id')) {
            $activity_id = $request->get('activity_id');
            $obj= $obj->where(function ($q) use ($activity_id) {
                foreach ($activity_id as $key => $id) {
                    $q->orWhereRaw('FIND_IN_SET('.$id.',activity_id)');
                }
            });
        }

        $projects = $obj->get();
        
         $html =' ';
        // $baseurl = "http://192.168.0.155/sfcgdbms/public/iecmaterial/";
         $root_url = url('/');
        $baseurl = $root_url.'/iecmaterial/';
        // $baseurl = "http://localhost/sfcgdbms/public/iecmaterial/";
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($projects as $key => $project){

            $key =$key+1;
           
            if($project->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $project->quarter_year" ;   }
            if($project->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $project->quarter_year "; }
            if($project->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $project->quarter_year";   }
            if($project->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $project->quarter_year "; }
            
        //theme  
            
            if($project->theme == 'education'){
                    $theme ='Education'; }
            if($project->theme == 'gender'){
                    $theme ='Gender base'; }        
            if($project->theme == 'violence') {
                    $theme ='Violence'; }      

                 $pro_date =  $project->production_date;
                $prod_date = strtotime($pro_date);

                 foreach($project_code_list as $id=>$pro_c){
                     // dd($id, $project_code->project_id);
                            if($id == $project->project_id) { 
                                
                                // dd($project_code->project_code, $project_code->project_id);
                                $projectcode = $pro_c;
                            }
                 }


            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'.   $projectcode  .'</td>
                        <td>'.  $theme  .'</td>
                        <td>'. $project->type .'</td>
                        <td>'. date(' F jS, Y',$prod_date)  .'</td>
                        <td>'. $project->no_of_copies .'</td>
                        <td>'. $project->cost .'</td>
                        <td>'. $quarter_n_year  .'</td>
                        <td>'. '<a href="'. $baseurl . $project->id.'/edit" class="action-btns"> 
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <form method="POST" action="'. $baseurl . $project->id.'">
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
                                             <th>Project Code</th>
                                            <th>Theme</th>
                                            <th>Type</th>
                                            <th>Production Date</th>
                                            <th>No. of Copies</th>
                                            <th>Cost</th>
                                            <th>Quarter & Year</th>
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
        
        return $data;
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
            'theme'                 => 'required',
            'project_id'            => 'required',
            'staff_id'              => 'required',
            'type'                  => 'required',
            'target_audience'       => 'required',
            'production_date'       => 'required',
            'no_of_copies'          => 'required|numeric',
            'cost'                  => 'required|numeric',
            // 'sample'                => 'required',
            'language'              => 'required',
            'quarter'               => 'required',
            'quarter_year'          => 'required',
        ]);

        $inputs = $request->all();

        $inputs['language'] = implode(",", $inputs['language']);

        //goal related
        $inputs['indicator_id']    = implode(",",$inputs['indicator_id']);
        $inputs['output_id']       = implode(",",$inputs['output_id']);
        $inputs['activity_id']     = implode(",",$inputs['activity_id']);

        IECMaterial::create($inputs);

        return redirect()->route('iecmaterial.index')->withFlashSuccess('IEC Material has been added successfully.');
    }

    public function show($id)
    {
         dd('show');//
    }

    public function edit($id)
    {
        // dd('here');
        $data['iecmaterial']    = IECMaterial::findOrFail($id);
        $data['staff_name']     = Staff::pluck('name', 'id');
        $data['projects']       = Project::pluck('project_code', 'id');
        $data['language']       = explode(",", $data['iecmaterial']->language);
        //goal realted
        $goalid                 = $data['iecmaterial']->goal_id;
        $data['allgoalreports'] =GoalReportController::Goalreportforedit($goalid);
        $data['indicator_exp']  = explode(",", $data['iecmaterial']->indicator_id);
        $data['output_exp']     = explode(",", $data['iecmaterial']->output_id);
        $data['activity_exp']   = explode(",", $data['iecmaterial']->activity_id);
        $data['goals']          = Goal::pluck('goal','id');
        // dd($data['language']);
        // dd($sdata);

        return view('iecmaterial.edit', $data);
    }

    public function update(Request $request, $id)
    {   
          // dd($request->all());
        $this->validate($request,[
            'theme'                 => 'required',
            'project_id'            => 'required',
            'staff_id'              => 'required',
            'type'                  => 'required',
            'target_audience'       => 'required',
            'production_date'       => 'required',
            'no_of_copies'          => 'required|numeric',
            'cost'                  => 'required|numeric',
            // 'sample'                => 'required',
            'language'              => 'required',
             'quarter'               => 'required',
            'quarter_year'          => 'required',
        ]);

         $inputs = $request->all();

        $inputs['language'] = implode(",", $inputs['language']);

        //goal related
        $inputs['indicator_id']    = implode(",",$inputs['indicator_id']);
        $inputs['output_id']       = implode(",",$inputs['output_id']);
        $inputs['activity_id']     = implode(",",$inputs['activity_id']);

        
        $iec = IECMaterial::findOrFail($id);
        $iec->update($inputs);
       
        // return redirect()->route('iecmaterial.index')->withFlashSuccess('IEC Material updated successfully.');
         return redirect()->route('iecmaterial.edit', $id)->withFlashSuccess('Information updated successfully.');
    }

    public function destroy($id)
    {
        $model = IECMaterial::findOrFail($id);
        
        $model->delete();
        return redirect()->route('iecmaterial.index')->withFlashSuccess('Information Deleted successfully.');
    }
}
