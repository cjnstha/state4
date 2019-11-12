<?php

namespace App\Http\Controllers;

use App\Project;
use App\EvaluationReport;
use App\Donor;
use App\WorkDetail;
use App\Models\Zone;
use App\Models\Theme;
use App\Models\Districts;
use App\Models\MiscProvince;
use App\Models\MiscDistrict;
use App\Models\MiscLgu;
use App\Models\CurrencyMgmt;
use App\Models\ChecklistMgmt;
use App\Models\Documents;
use App\Models\MinistryDocuments;
use App\Models\Staff;
use App\Models\NGO;
use App\Models\INGO;
use App\Models\GeneralAgreement;
use App\Models\Expatriate;
use App\Models\Activity;
use File;
use DB;
use App\Http\Requests\EditRequest;
use App\Models\NgoActivity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Backend\Project\CreateProjectRequest;
use App\Http\Requests\Backend\Project\EditProjectRequest;
use App\Http\Requests\Backend\Project\DeleteProjectRequest;
use App\Http\Requests\Backend\Ngo\CreateNgoRequest;
use App\Http\Requests\Backend\Ngo\EditNgoRequest;
use App\Http\Requests\Backend\Ngo\DeleteNgoRequest;
// use Carbon\Carbon;
use Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
      $data['districts']         = MiscDistrict::get();
      $user = Auth::user();
      if($user->hasRole('Admin'))
      {        
        $data['projects']          = Project::get();
        $data['generalAgreements'] = GeneralAgreement::get();
        $data['project_codes']     = Project::get();
      }
      else
      {
        $data['projects']          = Project::where('user_id','=',Auth::user()->id)->get();
        $data['generalAgreements'] = GeneralAgreement::where('user_id','=',Auth::user()->id)->get();
        $data['project_codes']     = Project::where('user_id','=',Auth::user()->id)->get();
      }
      $data['provinces']         = MiscProvince::get();
      $data['project_status']    = ['Ongoing','New'];
      $data['municipality']      = ['Rural Municipality','Municipality'];
      $data['user'] = Auth::user();
      return view('project.index', $data);
    }
// 'district_id'   
//             'project_code'
//             'quarter'     
//             'quarter_year'

     public function filterSearch(Request $request)
    {
        // dump($request);
        // exit();

       $obj = (Project::leftJoin('work_details','projects.id','=','work_details.project_id')->leftJoin('general_agreement','projects.general_agreement_id','=','general_agreement.id')); 
       $user = Auth::user();

        if($user->hasRole('Admin'))
        {
            if (!empty($request->get('project_code'))) {
            $project_code = $request->get('project_code');
            $obj->where('projects.project_code','=', $project_code);
        }

        if (!empty($request->get('ga_code'))) {
            $ga_code = $request->get('ga_code');
            $obj->where('general_agreement.ga_code','=',$ga_code);
        }

        if (!empty($request->get('project_status'))) {
            $project_status = $request->get('project_status');
            $obj->where('projects.project_status','=',$project_status);
        }

        if (!empty($request->get('province'))) {
            $province = $request->get('province');
            $obj->where('work_details.province_id',$province);
        }

        if (!empty($request->get('districts'))) {
            $district = $request->get('districts');
            $obj->where('work_details.district_id',$district);
        }

        if (!empty($request->get('municipality'))) {
            $municipality = $request->get('municipality');
            $obj->where('work_details.municipality',$municipality);
        }
        }
        else
        {
            if (!empty($request->get('project_code'))) {
            $project_code = $request->get('project_code');
            $obj->where([['projects.project_code','=', $project_code],['projects.user_id','=',$user->id]]);
        }

        if (!empty($request->get('ga_code'))) {
            $ga_code = $request->get('ga_code');
            $obj->where([['general_agreement.ga_code','=',$ga_code],['projects.user_id','=',$user->id]]);
        }

        if (!empty($request->get('project_status'))) {
            $project_status = $request->get('project_status');
            $obj->where([['projects.project_status','=',$project_status],['projects.user_id','=',$user->id]]);
        }

        if (!empty($request->get('province'))) {
            $province = $request->get('province');
            $obj->where([['work_details.province_id',$province],['projects.user_id','=',$user->id]]);
        }

        if (!empty($request->get('districts'))) {
            $district = $request->get('districts');
            $obj->where([['work_details.district_id',$district],['projects.user_id','=',$user->id]]);
        }

        if (!empty($request->get('municipality'))) {
            $municipality = $request->get('municipality');
            $obj->where([['work_details.municipality',$municipality],['projects.user_id','=',$user->id]]);
        }
        }
        $importApproval = $obj->distinct()->select('projects.project_code','projects.id','projects.project_name','general_agreement.ga_code','projects.project_status','projects.sw_date')->get();
        $html =' ';
        $root_url = url('/');
        $baseurl = $root_url.'/project/';
        foreach($importApproval as $key => $imp){

            $key =$key+1;
           
            //starting of district
            

            if($user->hasRole('Admin'))
            {
                $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $imp->project_code .'</td>
                        <td>'. $imp->project_name .'</td>
                        <td> ' .$imp->ga_code .'</td>
                        <td> ' .$imp->project_status .'</td>
                        <td> ' .$imp->sw_date .'</td>
                        <td>'. '<a href="'. $baseurl . $imp->id.'/edit" class="action-btns"> 
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <form method="POST" action="'. $baseurl . $imp->id.'">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="'.$request->get('_token').'">
                                    <a href="javascript:void(0);" class="action-btns submit">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                   
                                </form>
                                 <a target="_blank" href="'. $baseurl .'preview/'. $imp->id.'" class="action-btns"> 
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                        </td>
                    </tr>';
            }
            else
            {
                $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $imp->project_code .'</td>
                        <td>'. $imp->project_name .'</td>
                        <td> ' .$imp->ga_code .'</td>
                        <td> ' .$imp->project_status .'</td>
                        <td> ' .$imp->sw_date .'</td>
                        <td>'. '<a href="'. $baseurl . $imp->id.'/edit" class="action-btns"> 
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                
                                                                    <a target="_blank" href="'. $baseurl .'preview/'. $imp->id.'" class="action-btns"> 
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                        </td>
                    </tr>';
            }
        }

            $table_starting = '<table class="table table-striped table-bordered tbl_project">
                                    <thead>
                                        <tr>
                                          <th>ID</th>
                                          <th>Project <br>Code</th>
                                          <th>Project <br> Name</th>
                                          <th>General <br> Agreement <br>Code</th>
                                          <th>Project <br> Status</th>
                                          <th>SW <br> Date</th>
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $thematic_area   = Theme::get();
        $project_status  = ['Ongoing','New'];
        $currency        = CurrencyMgmt::where('title','!=','NPR')->get();
        $nepali_currency = CurrencyMgmt::where('title','=','NPR')->first();
        $checklist       = ChecklistMgmt::get();        
        $month_json      = file_get_contents('json/month.json');
        $months          = json_decode($month_json);
        $provinces       = MiscProvince::get();
        $user_id         = Auth::user()->id;
        $ingos           = INGO::get();
        $ga_code         = GeneralAgreement::get();      
        $country_json    = file_get_contents('json/country.json');
        $countries       = json_decode($country_json);
        $districts       = Districts::get();
        $lgus            = MiscLgu::get();
        $activities      = Activity::get();
        $municipality    = ['Rural Municipality','Municipality'];     
        $ward_json       = file_get_contents('json/ward.json');
        $wards           = json_decode($ward_json);
        return view('project.create', compact('districts' ,'provinces','thematic_area','project_status','currency','nepali_currency','checklist','ga_code','months','countries','municipality','wards','lgus','ingos','activities'));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {

      $inputs = $request->all();
        //dump($inputs);
        //exit();
      
      
        
        $project['user_id']                          = Auth::user()->id;
        $project['general_agreement_id']             = $inputs['ga_code'];
        $project['project_code']                     = $inputs['project_code'];
        $project['project_name']                     = $inputs['project_name'];
        $project['project_status']                   = $inputs['project_status'];
        $project['sw_date']                          = $inputs['sw_date'];
        $project['ingo_name']                        = $inputs['ingo_name'];
        $project['duration_from_year']               = $inputs['project_from_year'];
        $project['duration_from_month']              = $inputs['project_from_month'];
        $project['duration_to_year']                 = $inputs['project_to_year'];
        $project['duration_to_month']                = $inputs['project_to_month'];
        $project['total_budget_currency']            = $inputs['total_budget_currency'];
        $project['total_budget_amount']              = $inputs['total_budget_amount'];
        $project['technical_grant_currency']         = $inputs['technical_grant_currency'];
        $project['technical_grant_amount']           = $inputs['technical_grant_amount'];
        $project['commodity_grant_currency']         = $inputs['commodity_grant_currency'];
        $project['commodity_grant_amount']           = $inputs['commodity_grant_amount'];
        $project['rewards']                          = $inputs['rewards'];
        $project['amendment_date']                   = $inputs['amendment_date'];
        $project['amendment_amount']                 = $inputs['amendment_amount'];
        $project['finance_grant_currency']           = $inputs['finance_grant_currency'];
        $project['finance_grant_amount']             = $inputs['finance_grant_amount'];
        $project['administrative_cost_currency']     = $inputs['administrative_cost_currency'];
        $project['administrative_cost_amount']       = $inputs['administrative_cost_amount'];
        $project['programme_cost_currency']          = $inputs['programme_cost_currency'];
        $project['programme_cost_amount']            = $inputs['programme_cost_amount'];
        $project['new_total_budget_currency']        = $inputs['new_total_budget_currency'];
        $project['new_total_budget_amount']          = $inputs['new_total_budget_amount'];
        $project['new_technical_grant_currency']     = $inputs['new_technical_grant_currency'];
        $project['new_technical_grant_amount']       = $inputs['new_technical_grant_amount'];
        $project['new_commodity_grant_currency']     = $inputs['new_commodity_grant_currency'];
        $project['new_commodity_grant_amount']       = $inputs['new_commodity_grant_amount'];
        $project['new_finance_grant_currency']       = $inputs['new_finance_grant_currency'];
        $project['new_finance_grant_amount']         = $inputs['new_finance_grant_amount'];
        $project['new_administrative_cost_currency'] = $inputs['new_administrative_cost_currency'];
        $project['new_administrative_cost_amount']   = $inputs['new_administrative_cost_amount'];
        $project['new_programme_cost_currency']      = $inputs['new_programme_cost_currency'];
        $project['new_programme_cost_amount']        = $inputs['new_programme_cost_amount'];
        $project['hardware_percentage']              = $inputs['hardware_percentage'];
        $project['software_percentage']              = $inputs['software_percentage'];
        $project['pre_app_letter_date']              = $inputs['pre_app_letter_date'];      
        $inputs['document_checklist']                = implode(",",$inputs['document_checklist']);
        $project['document_checklist']               = $inputs['document_checklist']; 

       $pro = Project::create($project);
       $project_id = $pro->id;

       //$document = new Documents;
       $doc['project_id'] = $project_id;
       $min_doc['project_id'] = $project_id;
       $eva_rep['project_id'] = $project_id;
       $staff['project_id'] = $project_id;

       if( $request->hasFile('evaluation_report'))
        {
            $files = $request->file('evaluation_report');
           
            if(is_array($files) || is_object($files))
            {

                foreach($files as $file)
            {

            $file = $file;
            $extension = $file->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
           // var_dump($name_only);exit();
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/evaluation_report/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $eva_rep['document'] = $newFileName;
                    $eva_rep['orignal_document'] = $featured.'.'.$extension;

                    EvaluationReport::create($eva_rep);
                }
            }
            }
        }

       if( $request->hasFile('ministry_documents'))
        {
            $files = $request->file('ministry_documents');
           
            if(is_array($files) || is_object($files))
            {

                foreach($files as $file)
            {

            $file = $file;
            $extension = $file->getClientOriginalExtension();
           $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
           // var_dump($name_only);exit();
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/ministry_document/';
            if(!empty($newFileName))
                {   

                    $file->move($destinationPath, $newFileName);

                    $min_doc['ministry_documents'] = 'ministry-'.$newFileName;
                    $min_doc['orignal_ministry_documents'] = 'ministry-'.$featured.'.'.$extension;

                    MinistryDocuments::create($min_doc);
                }
            }
            }
        }
        



       if( $request->hasFile('document'))
        {
            $files = $request->file('document');
           
            if(is_array($files) || is_object($files))
            {

                foreach($files as $file)
            {

            $file = $file;
            $extension = $file->getClientOriginalExtension();
           $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
           // var_dump($name_only);exit();
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/project_document/';
            if(!empty($newFileName))
                {   

                    $file->move($destinationPath, $newFileName);

                    $doc['document'] = $newFileName;
                    $doc['orignal_document'] = $featured.'.'.$extension;

                    Documents::create($doc);
                }
            }
            }
        }     

            
            
            
            foreach($inputs['d_name'] as $i => $value)
            {
                if(isset($inputs['d_name'][$i]))
                {
                    Donor::create([
                        'project_id' => $project_id,  
                        'name'       => $inputs['d_name'][$i],
                        'address'    => $inputs['d_address'][$i],
                        'country'    => $inputs['d_country'][$i],
                        'contact'    => $inputs['d_contact'][$i],
                        'email'      => $inputs['d_email'][$i],           
                    ]);
                }
            }

            foreach($inputs['ngo_name'] as $ngo => $value)
            {
                if(isset($inputs['ngo_name'][$ngo]))
                {
                    $ngo_theme = implode(",", $inputs['ngo_theme'][$ngo]);
                    $dist_working = implode(",", $inputs['dist_working'][$ngo]);
                    $ngo_no = NGO::create([
                 'project_id' => $project_id,
                 'ngo_name'   => $inputs['ngo_name'][$ngo],
                 'ngo_address'   => $inputs['ngo_address'][$ngo],                 
                 'ngo_theme'   => $ngo_theme,
                 'dist_working'   => $dist_working,
                 'ngo_staff'   => $inputs['ngo_staff'][$ngo],
             ]);
                }
            }

            foreach($inputs['exp_name'] as $exp => $value)
            {
                if(isset($inputs['exp_name'][$exp]))
                {
                 
                 $ngo_no = Expatriate::create([
                 'project_id' => $project_id,
                 'name'   => $inputs['exp_name'][$exp],
                 'designation'   => $inputs['designation'][$exp],
                 'from_year'   => $inputs['from_year'][$exp],
                 'from_month'   => $inputs['from_month'][$exp],
                 'to_year'   => $inputs['to_year'][$exp],
                 'to_month'   => $inputs['to_month'][$exp],
                 'dependant_no'   => $inputs['dependant_no'][$exp],
                  ]);
                }
            }

            for($i = 0; $i <= count($inputs['ngoname']); $i++)
            {
                if(isset($inputs['ngoname'][$i]))
                {
                    $w_detail = implode(",", $inputs['w_detail'][$i]);
                    WorkDetail::create([
                        'project_id' => $project_id,
                        'ngo' => $inputs['ngoname'][$i],
                        'province_id' => $inputs['province_id'][$i],
                        'district_id' => $inputs['district_id'][$i],
                        'lgu_id' => $inputs['lgu_id'][$i],
                        'ward' => $inputs['ward'][$i],
                        'activity' => $inputs['activity'][$i],
                        'activity_main' => $inputs['activity_main'][$i],
                        'w_detail' => $w_detail,
                        'unit' => $inputs['unit'][$i],
                        'unit_cost' => $inputs['unit_cost'][$i],
                        'total_cost' => $inputs['total_cost'][$i],
                    ]);
                }
            }


         return redirect()->route('project.index')->with('message','Project has been added successfully.');
    }

    public function edit(EditProjectRequest $request, $id)
    {
        $project      = Project::findOrFail($id);
        $user =  Auth::user();
        $project_date = $project->created_at;
        $pro_date = explode(' ', $project_date);
        $today = date('Y-m-d');
        $prodate = strtotime($pro_date[0]);
        $today = strtotime($today);
        $calc = $today-$prodate;
        $calc = date('d',$calc);
        if($user->hasRole('Admin'))
        {
            $partners_id        = explode(",", $project->partners);
            $user_id            = Auth::user()->id;
            $provinces          = MiscProvince::get();
            $districts          = MiscDistrict::all();
            $ngo_dis            = NGO::where('project_id','=',$id)->get();
            $thematic_area      = Theme::get();
            $project_status     = ['Ongoing','New'];
            $lgus               = MiscLgu::get();
            $ingos              = INGO::get();
            $activities           = Activity::get();
            $currency           = CurrencyMgmt::where('title','!=','NPR')->get();
            $nepali_currency    = CurrencyMgmt::where('title','=','NPR')->first();
            $checklist          = ChecklistMgmt::get();
            $month_json         = file_get_contents('json/month.json');
            $months             = json_decode($month_json);
            $country_json       = file_get_contents('json/country.json');
            $countries          = json_decode($country_json);
            $ward_json          = file_get_contents('json/ward.json');
            $wards              = json_decode($ward_json);
            $chk_exp_id         = explode(",", $project->document_checklist);
            $municipality       = ['Rural Municipality','Municipality'];
            $ga_code            = GeneralAgreement::where('user_id','=',$user_id)->get();    
            $ngo = NGO::where('project_id','=',$id)->get(); 
            return view('project.edit', compact('project','currency','nepali_currency','checklist', 'districts','thematic_area', 'provinces', 'province_id_exp', 'district_id_exp','ngo_dis', 'staff','ngo','countries','months','wards','municipality','ga_code','project_status', 'lgu_id_exp','chk_exp_id','lgus','ingos','activities'));
        }
        else
        {
            if($calc <= '07' )
        {
            $partners_id        = explode(",", $project->partners);
        $user_id            = Auth::user()->id;
        $provinces          = MiscProvince::get();
        $districts          = MiscDistrict::all();
        $ngo_dis            = NGO::where('project_id','=',$id)->get();
        $thematic_area      = Theme::get();
        $project_status     = ['Ongoing','New'];
        $lgus               = MiscLgu::get();
        $ingos              = INGO::get();
        $activities           = Activity::get();
        $currency           = CurrencyMgmt::where('title','!=','NPR')->get();
        $nepali_currency    = CurrencyMgmt::where('title','=','NPR')->first();
        $checklist          = ChecklistMgmt::get();
        $month_json         = file_get_contents('json/month.json');
        $months             = json_decode($month_json);
        $country_json       = file_get_contents('json/country.json');
        $countries          = json_decode($country_json);
        $ward_json          = file_get_contents('json/ward.json');
        $wards              = json_decode($ward_json);
        $chk_exp_id         = explode(",", $project->document_checklist);
        $municipality       = ['Rural Municipality','Municipality'];
        $ga_code            = GeneralAgreement::where('user_id','=',$user_id)->get();    
        $ngo = NGO::where('project_id','=',$id)->get(); 
        return view('project.edit', compact('project','currency','nepali_currency','checklist', 'districts','thematic_area', 'provinces', 'province_id_exp', 'district_id_exp','ngo_dis', 'staff','ngo','countries','months','wards','municipality','ga_code','project_status', 'lgu_id_exp','chk_exp_id','lgus','ingos','activities'));
        }
        else
        {
            return redirect()->route('project.index')->withFlashSuccess('You cannot edit this particular project');
        }
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProjectRequest $request, $id)
    {   
        // $pro = Project::findOrFail($id);

        // $loginUser = Auth::user();
        // if ((!$loginUser->hasRole('Admin')) && $pro->user_id != $loginUser->id) {
        //     return redirect()->back()->withFlashDanger('You don\'t have access to edit this.');
        // }

        $this->validate($request,[
            // 'quarter'       => 'required',
            // 'quarter_year'  => 'required',
        ]);

        // dump('thkas');
        // exit();
         
         $inputs = $request->all();

         $project_id = $id;

        $project = Project::find($id);
        $project['user_id']                          = Auth::user()->id;
        $project['general_agreement_id']             = $inputs['ga_code'];
        $project['project_code']                     = $inputs['project_code'];
        $project['project_name']                     = $inputs['project_name'];
        $project['project_status']                   = $inputs['project_status'];
        $project['sw_date']                          = $inputs['sw_date'];
        $project['duration_from_year']               = $inputs['project_from_year'];
        $project['duration_from_month']              = $inputs['project_from_month'];
        $project['duration_to_year']                 = $inputs['project_to_year'];
        $project['duration_to_month']                = $inputs['project_to_month'];
        $project['total_budget_currency']            = $inputs['total_budget_currency'];
        $project['total_budget_amount']              = $inputs['total_budget_amount'];
        $project['technical_grant_currency']         = $inputs['technical_grant_currency'];
        $project['technical_grant_amount']           = $inputs['technical_grant_amount'];
        $project['rewards']                          = $inputs['rewards'];
        $project['ingo_name']                        = $inputs['ingo_name'];        
        $project['amendment_date']                   = $inputs['amendment_date'];
        $project['amendment_amount']                 = $inputs['amendment_amount'];
        $project['commodity_grant_currency']         = $inputs['commodity_grant_currency'];
        $project['commodity_grant_amount']           = $inputs['commodity_grant_amount'];
        $project['finance_grant_currency']           = $inputs['finance_grant_currency'];
        $project['finance_grant_amount']             = $inputs['finance_grant_amount'];
        $project['administrative_cost_currency']     = $inputs['administrative_cost_currency'];
        $project['administrative_cost_amount']       = $inputs['administrative_cost_amount'];
        $project['programme_cost_currency']          = $inputs['programme_cost_currency'];
        $project['programme_cost_amount']            = $inputs['programme_cost_amount'];
        $project['new_total_budget_currency']        = $inputs['new_total_budget_currency'];
        $project['new_total_budget_amount']          = $inputs['new_total_budget_amount'];
        $project['new_technical_grant_currency']     = $inputs['new_technical_grant_currency'];
        $project['new_technical_grant_amount']       = $inputs['new_technical_grant_amount'];
        $project['new_commodity_grant_currency']     = $inputs['new_commodity_grant_currency'];
        $project['new_commodity_grant_amount']       = $inputs['new_commodity_grant_amount'];
        $project['new_finance_grant_currency']       = $inputs['new_finance_grant_currency'];
        $project['new_finance_grant_amount']         = $inputs['new_finance_grant_amount'];
        $project['new_administrative_cost_currency'] = $inputs['new_administrative_cost_currency'];
        $project['new_administrative_cost_amount']   = $inputs['new_administrative_cost_amount'];
        $project['new_programme_cost_currency']      = $inputs['new_programme_cost_currency'];
        $project['new_programme_cost_amount']        = $inputs['new_programme_cost_amount'];
        $project['hardware_percentage']              = $inputs['hardware_percentage'];
        $project['software_percentage']              = $inputs['software_percentage'];
        $project['pre_app_letter_date']              = $inputs['pre_app_letter_date'];      
        $inputs['document_checklist']                = implode(",",$inputs['document_checklist']);
        $project['document_checklist']               = $inputs['document_checklist'];
        $project->save();

       
        
        $doc['project_id']     = $id;
        $min_doc['project_id'] = $id;
        $eva_rep['project_id'] = $id;
        if( $request->hasFile('ministry_documents'))
        {
            $files = $request->file('ministry_documents');
           
            if(is_array($files) || is_object($files))
            {

                foreach($files as $file)
            {

            
            $extension = $file->getClientOriginalExtension();
           $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
           // var_dump($name_only);exit();
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/ministry_document/';
            if(!empty($newFileName))
                {   

                    $file->move($destinationPath, $newFileName);

                    $min_doc['ministry_documents'] = 'ministry-'.$newFileName;
                    $min_doc['orignal_ministry_documents'] = 'ministry-'.$featured.'.'.$extension;

                    MinistryDocuments::create($min_doc);
                }
            }
            }
        }
        
        if( $request->hasFile('evaluation_report'))
        {
            $files = $request->file('evaluation_report');
           
            if(is_array($files) || is_object($files))
            {

                foreach($files as $file)
            {

            $file = $file;
            $extension = $file->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
           // var_dump($name_only);exit();
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/evaluation_report/';
            if(!empty($newFileName))
                {   
                    $file->move($destinationPath, $newFileName);

                    $eva_rep['document'] = $newFileName;
                    $eva_rep['orignal_document'] = $featured.'.'.$extension;

                    EvaluationReport::create($eva_rep);
                }
            }
            }
        }


       if( $request->hasFile('document'))
        {
            $files = $request->file('document');
           
            if(is_array($files) || is_object($files))
            {

                foreach($files as $file)
            {

            $file = $file;
            $extension = $file->getClientOriginalExtension();
            $feat  = $file->getClientOriginalName();
            $name_only = explode(".".$extension, $feat);
            $name_only= $name_only[0];
            $featured= str_replace(' ', '-', $name_only);
            $featured= str_replace('.', '-', $featured);
             

            $newFileName =  $featured.rand(). '.' . $extension;
            $destinationPath = public_path(). '/files/project_document/';
            if(!empty($newFileName))
                {   

                    $file->move($destinationPath, $newFileName);

                    $doc['document'] = $newFileName;
                    $doc['orignal_document'] = $featured.'.'.$extension;

                    Documents::create($doc);
                }
            }
            }
        }

        Donor::where('project_id','=',$id)->delete();
        NGO::where('project_id','=',$id)->delete();
        Expatriate::where('project_id','=',$id)->delete();
        WorkDetail::where('project_id','=',$id)->delete();
        
        foreach($inputs['d_name'] as $i => $value)
            {
                if(isset($inputs['d_name'][$i]))
                {
                    Donor::create([
                        'project_id' => $project_id,  
                        'name'       => $inputs['d_name'][$i],
                        'address'    => $inputs['d_address'][$i],
                        'country'    => $inputs['d_country'][$i],
                        'contact'    => $inputs['d_contact'][$i],
                        'email'      => $inputs['d_email'][$i],           
                    ]);
                }
            }

            foreach($inputs['exp_name'] as $exp => $value)
            {
                if(isset($inputs['exp_name'][$exp]))
                {
                 
                 $ngo_no = Expatriate::create([
                 'project_id'   => $project_id,
                 'name'         => $inputs['exp_name'][$exp],
                 'designation'  => $inputs['designation'][$exp],
                 'from_year'    => $inputs['from_year'][$exp],
                 'from_month'   => $inputs['from_month'][$exp],
                 'to_year'      => $inputs['to_year'][$exp],
                 'to_month'     => $inputs['to_month'][$exp],
                 'dependant_no' => $inputs['dependant_no'][$exp],
                  ]);
                }
            }

            foreach($inputs['ngo_name'] as $ngo => $value)
            {
                if(isset($inputs['ngo_name'][$ngo]))
                {
                    $ngo_theme     = implode(",", $inputs['ngo_theme'][$ngo]);
                    $dist_working  = implode(",", $inputs['dist_working'][$ngo]);
                    $ngo_no        = NGO::create([
                    'project_id'   => $project_id,
                    'ngo_name'     => $inputs['ngo_name'][$ngo],
                    'ngo_address'  => $inputs['ngo_address'][$ngo],                 
                    'ngo_theme'    => $ngo_theme,
                    'dist_working' => $dist_working,
                    'ngo_staff'    => $inputs['ngo_staff'][$ngo],
             ]);
                }
            }

            

            for($i = 0; $i <= count($inputs['ngoname']); $i++)
            {
                if(isset($inputs['ngoname'][$i]))
                {
                    $w_detail = implode(",", $inputs['w_detail'][$i]);
                    WorkDetail::create([
                        'project_id'    => $project_id,
                        'ngo'           => $inputs['ngoname'][$i],
                        'province_id'   => $inputs['province_id'][$i],
                        'district_id'   => $inputs['district_id'][$i],
                        'lgu_id'        => $inputs['lgu_id'][$i],
                        'ward'          => $inputs['ward'][$i],
                        'activity'      => $inputs['activity'][$i],
                        'activity_main' => $inputs['activity_main'][$i],
                        'w_detail'      => $w_detail,
                        'unit'          => $inputs['unit'][$i],
                        'unit_cost'     => $inputs['unit_cost'][$i],
                        'total_cost'    => $inputs['total_cost'][$i],
                    ]);
                }
            }

       

        
        return redirect()->route('project.index')->withFlashSuccess('Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteProjectRequest $request, $id)
    {   
        $pro = Project::findOrFail($id);
        $loginUser = Auth::user();
        if ((!$loginUser->hasRole('Admin')) && $pro->user_id != $loginUser->id) {
            return redirect()->back()->withFlashDanger('You don\'t have access to delete this.');
        }
        Project::destroy($id);
        Documents::where('project_id','=',$id)->delete();
        MinistryDocuments::where('project_id','=',$id)->delete();
        NGO::where('project_id','=',$id)->delete();      
        return redirect()->route('project.index')->withFlashSuccess('Project Deleted successfully.');
    }

    public function singleMinDocDelete($id)
    {
        $model  = MinistryDocuments::findOrFail($id);
        $parent = $model->project_id;
        $ministry_doc_path = public_path().'/files/ministry_document/'.$model->ministry_documents;
        File::delete($ministry_doc_path);
        $model->delete();
        return Redirect()->route('project.edit',$parent);
    }

    public function singleProjectDocDelete($id)
    {
        $model         = Documents::findOrFail($id);
        $parent        = $model->project_id;
        $document_path = public_path().'/files/project_document/'.$model->document;
        File::delete($document_path);
        $model->delete();
        return Redirect()->route('project.edit',$parent);
    }

    public function singleEvaRepDelete($id){
        $model         = EvaluationReport::findOrFail($id);
        $parent        = $model->project_id;
        $document_path = public_path().'/files/evaluation_report/'.$model->document;
        File::delete($document_path);
        $model->delete();
        return Redirect()->route('project.edit',$parent);
    }

     public function preview(EditProjectRequest $request, $id)
    {
        $project= Project::findOrFail($id);
        
         $partners_id  = explode(",", $project->partners);

         // dd($partners, $partners_id);

        //$theme = Theme::pluck('name', 'id');
        //$theme->put('other','other');
        $user_id         = Auth::user()->id;
        $provinces       = MiscProvince::get();
        $districts       = MiscDistrict::all();
        $ngo_dis         = NGO::where('project_id','=',$id)->get();
        
        // $lgus = MiscLgu::where(function ($query) use($district_id_exp) {
        //     foreach ($district_id_exp as $key => $value) {
        //         $query->orwhere('district_id', $value);
        //     }
        //   })->get();

        // $lgu_id_exp = explode(",",$project->lgu_id);

        $thematic_area      = Theme::get();
        $project_status     = ['Ongoing','New'];
        $currency           = CurrencyMgmt::where('title','!=','NPR')->get();
        $nepali_currency    = CurrencyMgmt::where('title','=','NPR')->first();
        $checklist          = ChecklistMgmt::get();
        $month_json         = file_get_contents('json/month.json');
        $months             = json_decode($month_json);
        $country_json       = file_get_contents('json/country.json');
        $countries          = json_decode($country_json);
        $ward_json          = file_get_contents('json/ward.json');
        $wards              = json_decode($ward_json);
        $chk_exp_id         = explode(",", $project->document_checklist);
        $municipality       = ['Rural Municipality','Municipality'];
        $ga_code            = GeneralAgreement::where('user_id','=',$user_id)->get();    
        $ngo                = NGO::where('project_id','=',$id)->get(); 
        return view('project.preview', compact('project','currency','nepali_currency','checklist', 'districts','thematic_area', 'provinces', 'province_id_exp', 'district_id_exp','ngo_dis', 'staff','ngo','countries','months','wards','municipality','ga_code','project_status', 'lgu_id_exp','chk_exp_id'));
    }

    public function getGeneralCode(Request $request)
    {
        $data['stat'] = 'error';
        $data['data'] = [];
        $ga = GeneralAgreement::where(function ($query) use($request) {
                $array = explode(',', $request->ga_id);
                foreach ($array as $key => $value) {
                    $query->orwhere('id', $value);
                }
            })->first();
        if (!empty($ga->commodity_grant))
        {
            $data['stat'] = 'success';
            $data['data'] = $ga;
        }
        return $data;
    }
}
