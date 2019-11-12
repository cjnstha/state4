<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityMed;
use App\Models\Benef;
use App\Models\Caste;

use App\Models\Districts;
use App\Project;
use App\Models\Activity;
use App\Models\Identity;

use App\Models\Goal;  // for goal and related
use DB;

// use App\Http\Controllers\GoalReportController;

use Illuminate\Support\Facades\Input;

class CommunityMedController extends Controller
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
        $community_med  = CommunityMed::all();
        $districts      = Districts::pluck('district_name','id');
        $project_codes  = Project::pluck('project_code','id');
        // $type_of_case   = CommunityMed::pluck('project_code','id');
// CommunityMed::all();
        $benef_id = Benef::pluck('name','id');

            // $baseurl = url('/');
         // $newurl = $baseurl .'/benef/';
        // $baseurl = "http://localhost/sfcgdbms/public/media/";

        // dd($baseurl, $newurl);
        
        $goals = Goal::pluck('goal','id'); 
       
        return view('community_med.index', compact('community_med','benef_id','districts','project_codes','baseurl', 'goals'));
    }


    public function filterSearch(Request $request)
    {
        // print_r($request->all());
        // die;
       $obj = (new CommunityMed)->newQuery();
    
        //    if ($request->has('district_id')) {
        //     $districts = $request->get('district_id');
           
        // if(count($districts) != 0  ){

            
        //     $obj->where(function ($q) use ($districts) {
        //         $benef_array = array();
        //     foreach ($districts as $key => $district) {

        //         $dist_in_benef = DB::table('benef')->where('district_id', $district)->select('id')->get();
                
        //         foreach ($dist_in_benef as $district_id => $benf_id) {
        //           array_push($benef_array, $benf_id);
        //         }
        //        }

        //        foreach ($benef_array as $key => $benef_id) {
        //                // $q->orWhere("profiles.language", "LIKE", "%" . $language . "%");
        //                 $q->orWhere('community_med.benef_id',$benef_id->id);

        //                 // $q->orWhere("community_med.benef_id", $benef_id->id);
        //                 // $q->orWhere("community_med.benef_id", "LIKE", $benef_id->id . ",%");
        //                 // $q->orWhere("community_med.benef_id", "LIKE", "%," . $benef_id->id);
        //                 // $q->orWhere("community_med.benef_id", "LIKE", "%, " . $benef_id->id);
        //                 // $q->orWhere("community_med.benef_id", "LIKE", "%," . $benef_id->id . ",%");
        //                 // $q->orWhere("community_med.benef_id", "LIKE", "%, " . $benef_id->id . ",%");
        //             } 
        //         });
               
        //     }
        // }
        // die();
     
        if ($request->has('quarter')) {
            $quarter = $request->get('quarter');
            $obj->where('quarter', $quarter);
        }

        if ($request->has('project_code')) {
            $project_code = $request->get('project_code');
            $obj->where('project_id',$project_code);
        }

        if ($request->has('type_of_case')) {
            $type_of_case = $request->get('type_of_case');
            $obj->where('type_of_case',$type_of_case);
        }

        if ($request->has('resolve')) {
            $resolve = $request->get('resolve');
            $obj->where('resolve',$resolve);
        }

        if ($request->has('quarter_year')) {
            $quarter_year = $request->get('quarter_year');
              // $obj->where('quarter_year', '>' , $quarter_year);
            $obj->where('quarter_year', $quarter_year);
        }

        $projects = $obj->get();

        // dd($projects);

         $html =' ';

         $beenf_district_detail =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/communitymed/';
        // var_dump($baseurl);
        // die;
        // $baseurl.'/communitymed/';
        // $baseurl = "http://localhost/sfcgdbms/public/communitymed/";

        $project_code_list       = Project::pluck('project_code', 'id');
        
        
        foreach($projects as $key => $project){

            $key =$key+1;
           
            //starting of district
           //  if($project->district_id != ''){
           //      $dist_exp = explode(',', $project->district_id); 
           //      $dis_array = array();

           //      foreach($dist_exp as $dist)
           //      {
           //         $distname = \DB::table('districts')->select('district_name')->where('id',$dist)->first();
           //         array_push($dis_array, $distname->district_name); 
           //      }

           //      $districts = implode(',<br>', $dis_array);
           //  }
           // //end of districts

           //  //starting of beneficiairies
           //   if($project->benef_id != ''){
           //  $benef_exp = explode(',', $project->benef_id);
           //              $benef_array = array();
                    
           //             foreach($benef_exp as $dist) {
           //                 $benefname = \DB::table('benef')->select('name')->where('id',$dist)->first();

           //                array_push($benef_array, $benefname->name); 
           //              }
                     
           //              $benefs = implode(', ', $benef_array); 
           //              // dd($benefs);
           //          }


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
            
            //Type of Case 
            if($project->type_of_case == 'gender'){
                        $type_of_case ='Gender Base'; }
            if($project->type_of_case == 'land'){
                        $type_of_case ='Land Dispute'; }        
            if($project->type_of_case == 'dowry') {
                        $type_of_case ='Dowry'; }        
            if($project->type_of_case == 'verbal') {
                        $type_of_case ='Verbal Abuse'; }        
                            

        // dd($project); 
            // dd($quarter_n_year);

            // $date = $project->signed_date; //signed date <th>Signed Date</th>
            // $time = strtotime($date);   //signed date <td>'. date(' F jS, Y',$time)  .'</td>

            // case registered date
                $reg_date =  $project->case_registered_date;
                $care_reg_date = strtotime($reg_date);

                 $resol_date =  $project->resolve_date;
                $resolve_date = strtotime($resol_date);


                 $person_name_exp = explode(',', $project->person_name);
                         $person_name_array = array();
                       
                           foreach($person_name_exp as $person) {
                              array_push($person_name_array, $person);
                          }
                      
                          $persons = implode(', ', $person_name_array);

                          
                     foreach($project_code_list as $id=>$pro_c){
                     // dd($id, $project_code->project_id);
                            if($id == $project->project_id) { 
                                
                                // dd($project_code->project_code, $project_code->project_id);
                                $projectcode = $pro_c;
                            }
                 }

                 //for benef and district 
                 // $benef_exp = explode(',', $project->benef_id);
                 //        $benef_array = array();
                 //        $benef_district_array = array();
                    
                 //       foreach($benef_exp as $new_benef_id) {
                 //       $benefname = DB::table('benef')->select('name','district_id')->where('id',$new_benef_id)->first();
                 //       $distrct_name = DB::table('districts')->select('district_name')->where('id',$benefname->district_id)->first();
                 //        $beenf_district_detail .= '<a class="link" href="' .$root_url.'/benef/'.$new_benef_id .'/edit">'. $benefname->name .'</a> ('. $distrct_name->district_name .'), ';
                 //         } 
                         // print_r($abc);
                         // die;


            $html .= '<tr>
                        <td>'. $key .'</td>
                           <td>'. $persons .'</td>
                          <td>'. $projectcode .'</td>
                        <td>'. date(' F jS, Y',$care_reg_date) .'</td>
                        <td>'. $type_of_case .'</td>
                        <td>'. $project->nature_of_case .'</td>
                        <td>'. $project->resolve .'</td>
                        <td>'. date(' F jS, Y',$resolve_date)  .'</td>
                        <td>'. $project->status .'</td>
                    
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
                                             <th> Person</th>
                                           <th>Project Code</th>
                                            <th>Case <br>Registered Date</th>
                                             <th>Type of Case</th>
                                            <th>Nature of Case</th>
                                            <th>Resolve</th>
                                            <th>Resolve Date</th>
                                            <th>Status</th>
                                          
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
              // die;
        
        return $data;
    }

    public function filterSearch2(Request $request)
    {
       $obj = (new CommunityMed)->newQuery();
    
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

         $beenf_district_detail =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/communitymed/';
        // var_dump($baseurl);
        // die;
        // $baseurl.'/communitymed/';
        // $baseurl = "http://localhost/sfcgdbms/public/communitymed/";

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
            
            //Type of Case 
            if($project->type_of_case == 'gender'){
                        $type_of_case ='Gender Base'; }
            if($project->type_of_case == 'land'){
                        $type_of_case ='Land Dispute'; }        
            if($project->type_of_case == 'dowry') {
                        $type_of_case ='Dowry'; }        
            if($project->type_of_case == 'verbal') {
                        $type_of_case ='Verbal Abuse'; }        
                            

            // case registered date
                $reg_date =  $project->case_registered_date;
                $care_reg_date = strtotime($reg_date);

                 $resol_date =  $project->resolve_date;
                $resolve_date = strtotime($resol_date);


                 $person_name_exp = explode(',', $project->person_name);
                         $person_name_array = array();
                       
                           foreach($person_name_exp as $person) {
                              array_push($person_name_array, $person);
                          }
                      
                          $persons = implode(', ', $person_name_array);

                          
                     foreach($project_code_list as $id=>$pro_c){
                     // dd($id, $project_code->project_id);
                            if($id == $project->project_id) { 
                                
                                // dd($project_code->project_code, $project_code->project_id);
                                $projectcode = $pro_c;
                            }
                 }

            $html .= '<tr>
                        <td>'. $key .'</td>
                           <td>'. $persons .'</td>
                          <td>'. $projectcode .'</td>
                        <td>'. date(' F jS, Y',$care_reg_date) .'</td>
                        <td>'. $type_of_case .'</td>
                        <td>'. $project->nature_of_case .'</td>
                        <td>'. $project->resolve .'</td>
                        <td>'. date(' F jS, Y',$resolve_date)  .'</td>
                        <td>'. $project->status .'</td>
                    
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
                                             <th> Person</th>
                                           <th>Project Code</th>
                                            <th>Case <br>Registered Date</th>
                                             <th>Type of Case</th>
                                            <th>Nature of Case</th>
                                            <th>Resolve</th>
                                            <th>Resolve Date</th>
                                            <th>Status</th>
                                          
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
        // $data['caste']= Caste::pluck('name','id');
        
         // $data['districts']  = Districts::all();
        $data['activity'] = Activity::all();
        $data['caste'] = Caste::all();
        $data['identity'] = Identity::all();
        $data['donor_codes'] = Project::all();

         $data['projects']   = Project::pluck('project_code','id');
        // $data['beneficiars']   = Benef::pluck('name','id');

        $data['goals'] = Goal::pluck('goal','id'); /* for goal and related*/

        // $data['benef_name'] = $beneficiar->pluck('name','id');
        return view('community_med.create', $data);
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
            //  'name' => 'required',
            // 'age' => 'required',
            // 'gender' => 'required',
            // 'identity' => 'required',
            //  'benef_type' => 'required',
            // 'caste' => 'required',
            // 'organization' => 'required',
            // 'designation' => 'required',
            // 'c_number' => 'required',
            // 'email' => 'required',
            // 'district_id' => 'required',
            // 'vdc' => 'required',
            // 'ward_no' => 'required',
            // 'donor_code' => 'required',
            // 'venue' => 'required',
            // 'imp_org' => 'required',
            // 'date_from' => 'required',
            // 'date_to' => 'required',
            // 'act_type' => 'required',

            // 'benef_id'              => 'required',
            'person_name.*'           => 'required',
            'case_registered_date'  => 'required',
            'nature_of_case'        => 'required',
            'resolve'               => 'required',
            'resolve_date'          => 'required',
            'future_action'         => 'required',
            'status'                => 'required',
            'type_of_case'          => 'required',
            'project_id'            => 'required',
            /* start of goal and related*/
            'goal_id'               => 'required',
            'indicator_id'          => 'required',
            'output_id'             => 'required',
            'activity_id'           => 'required',
            'quarter'               => 'required',
            'quarter_year'          => 'required',
             /* end of goal and related*/
        ]);



          $input = $request->all();
          // dd($input);
         // $benef = Benef::create([
         //                'name'          => $input['name'],
         //                'benef_type'    => $input['benef_type'],
         //                'organization'  => $input['organization'],
         //                'designation'   => $input['designation'],
         //                'c_number'      => $input['c_number'],
         //                'email'         => $input['email'],
         //                'district_id'   => $input['district_id'],
         //                'vdc'           => $input['vdc'],
         //                'ward_no'       => $input['ward_no'],
         //                'donor_code'    => $input['donor_code'],
         //                'venue'         => $input['venue'],
         //                'imp_org'       => $input['imp_org'],
         //                'date_from'     => $input['date_from'],
         //                'date_to'       => $input['date_to'],
         //                'act_type'      => $input['act_type'],

         //                'caste'         => $input['caste'],
         //                'gender'        => $input['gender'],
         //                'identity'      => $input['identity'],
         //                'age'           => $input['age'],                       
         //        ]);

           /* start of goal and related*/ 
          // $input['benef_id']        = implode(",",$input['benef_id']);
            $input['person_name']     = implode(",",$input['person_name']); 
          $input['indicator_id']    = implode(",",$input['indicator_id']);
          $input['output_id']       = implode(",",$input['output_id']);
          $input['activity_id']     = implode(",",$input['activity_id']);
           /* end of goal and related*/

            // dd($input);

           CommunityMed::create($input);

         // CommunityMed::create([
         //                'benef_id'              => $input['benef_id'],
         //                'case_registered_date'  => $input['case_registered_date'],
         //                'nature_of_case'        => $input['nature_of_case'],
         //                'resolve'               => $input['resolve'],
         //                'resolve_date'          => $input['resolve_date'],
         //                'future_action'         => $input['future_action'],
         //                'status'                => $input['status'],
         //                'type_of_case'          => $input['type_of_case'],
         //                /* start of goal and related*/
         //                'goal_id'               => $input['goal_id'],
         //                'indicator_id'          => $input['indicator_id'],
         //                'output_id'             => $input['output_id'],
         //                'activity_id'           => $input['activity_id'],
         //                /* end of goal and related*/
         //        ]);

        return redirect()->route('communitymed.index')->withFlashSuccess('Information has been added successfully.');
    }

    public function show($id)
    {
         dd('show');//
    }

    public function edit($id)
    {
        // $data['caste'] = Caste::all();
        // $data['caste'] = Caste::pluck('name', 'id');
        $data['comm_med'] = CommunityMed::findOrFail($id);
        
        // $data['activity'] = Activity::all();
        // $data['donor_codes'] = Project::pluck('project_code', 'id');
        // $data['districts']  = Districts::all();
        // $data['identity'] = Identity::all();
        // $data['beneficiar'] = Benef::findOrFail($data['comm_med']->benef_id);

        /* start of goal and related*/
        $data['projects']   = Project::pluck('project_code','id');
        $data['persons']     = explode(",", $data['comm_med']->person_name);
        // $data['beneficiars']   = Benef::pluck('name','id');

        // $data['benef_id_exp'] = explode(",",$data['comm_med']->benef_id);

        $goalid = $data['comm_med']->goal_id;
        $data['allgoalreports'] =GoalReportController::Goalreportforedit($goalid);
        $data['indicator_exp'] = explode(",", $data['comm_med']->indicator_id);
        $data['output_exp'] = explode(",", $data['comm_med']->output_id);
        $data['activity_exp'] = explode(",", $data['comm_med']->activity_id);
        $data['goals'] = Goal::pluck('goal','id');
        /* end of goal and related*/

// dd($data);
        return view('community_med.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request,[
            //   'name' => 'required',
            // 'age' => 'required',
            // 'gender' => 'required',
            // 'identity' => 'required',
            //  'benef_type' => 'required',
            // 'caste' => 'required',
            // 'organization' => 'required',
            // 'designation' => 'required',
            // 'c_number' => 'required',
            // 'email' => 'required',
            // 'district_id' => 'required',
            // 'vdc' => 'required',
            //  'ward_no' => 'required',
            // 'donor_code' => 'required',
            // 'venue' => 'required',
            // 'imp_org' => 'required',
            // 'date_from' => 'required',
            // 'date_to' => 'required',
            // 'act_type' => 'required',

            // 'benef_id'              => 'required',
             'person_name.*'           => 'required',
            'case_registered_date'  => 'required',
            'nature_of_case'        => 'required',
            'resolve'               => 'required',
            'resolve_date'          => 'required',
            'future_action'         => 'required',
            'status'                => 'required',
            'type_of_case'          => 'required',
            'project_id'            => 'required',
            /* start of goal and related*/
            'goal_id'               => 'required',
            'indicator_id'          => 'required',
            'output_id'             => 'required',
            'activity_id'           => 'required',
            'quarter'               => 'required',
            'quarter_year'          => 'required',
             /* end of goal and related*/
        ]);
        $input = $request->all();

        // Benef::where('id',$input['benef_id'])->update([
        //                 'name'          => $input['name'],
        //                 'benef_type'    => $input['benef_type'],
        //                 'organization'  => $input['organization'],
        //                 'designation'   => $input['designation'],
        //                 'c_number'      => $input['c_number'],
        //                 'email'         => $input['email'],
        //                 'district_id'   => $input['district_id'],
        //                 'vdc'           => $input['vdc'],
        //                  'ward_no'       => $input['ward_no'],
        //                 'donor_code'    => $input['donor_code'],
        //                 'venue'         => $input['venue'],
        //                 'imp_org'       => $input['imp_org'],
        //                 'date_from'     => $input['date_from'],
        //                 'date_to'       => $input['date_to'],
        //                 'act_type'      => $input['act_type'],

        //                 'caste'         => $input['caste'],
        //                 'gender'        => $input['gender'],
        //                 'identity'      => $input['identity'],
        //                 'age'           => $input['age'],     
        //                 ]);

             /* start of goal and related*/
              $input['person_name']     = implode(",",$input['person_name']); 
          $input['indicator_id']    = implode(",",$input['indicator_id']);
          $input['output_id']       = implode(",",$input['output_id']);
          $input['activity_id']     = implode(",",$input['activity_id']);
           /* end of goal and related*/

           // $input['benef_id']      = implode(",",$input['benef_id']);
            $community = CommunityMed::findOrFail($id);


        $community->update($input);


             // CommunityMed::where('id',$input['comm_med_id'])->update([
             //            'benef_id'              => $input['benef_id'],
             //            'case_registered_date'  => $input['case_registered_date'],
             //            'nature_of_case'        => $input['nature_of_case'],
             //            'resolve'               => $input['resolve'],
             //            'resolve_date'          => $input['resolve_date'],
             //            'future_action'         => $input['future_action'],
             //            'status'                => $input['status'],
             //            'type_of_case'          => $input['type_of_case'],
             //            /* start of goal and related*/
             //            'goal_id'               => $input['goal_id'],
             //            'indicator_id'          => $input['indicator_id'],
             //            'output_id'             => $input['output_id'],
             //            'activity_id'           => $input['activity_id'],
             //            /* end of goal and related*/
             //            ]);
       // route('trainings.edit', $training->id)
        return redirect()->route('communitymed.edit', $id)->withFlashSuccess('Information updated successfully.');
    }

    public function destroy($id)
    {
        $model = CommunityMed::findOrFail($id);
    //    $benef_i =  $model->benef_id;
         $model->delete();
    //      $benef = Benef::findOrFail($benef_i);
    // $benef->delete();
        return redirect()->route('communitymed.index')->withFlashSuccess('Information Deleted successfully.');
    }
}
