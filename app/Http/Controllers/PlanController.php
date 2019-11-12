<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Districts;
use App\Models\Activity;
use App\Models\Plan;
use App\Models\NGO;
use App\Project; 
use App\Models\PartnerPro;
use App\Models\Goal;
use App\Models\Objective;
use App\Models\Outcome;
use App\Models\Output;

class PlanController extends Controller
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
       
      $posts= Plan::all();
      $goals = Goal::pluck('goal','id');
      $project_codes  = Project::pluck('project_code','id');
      return view('planning/index', compact('posts', 'goals','project_codes'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
      
        $districts  = Districts::pluck('district_name','district_id');
        $activity   = Activity::pluck('name','id');
        $projects   = Project::pluck('project_code','id');
        // $imp = PartnerPro::pluck('name_of_ngo','id');
        $imp        = NGO::pluck('name', 'id');
        $goals      = Goal::pluck('goal','id'); 

        return view('planning.create',compact('districts','activity','projects','imp','data','goals'));
    }

    public function filterSearch(Request $request)
    {
       $obj = (new Plan)->newQuery();
    
        if ($request->has('quarter')) {
            $quarter = $request->get('quarter');
            $obj->where('quarter', $quarter);
        }

        if ($request->has('project_code')) {
            $project_code = $request->get('project_code');
            $obj->where('project_id',$project_code);
        }

        if ($request->has('quarter_year')) {
            $quarter_year = $request->get('quarter_year');
            $obj->where('quarter_year', $quarter_year);
        }
        
        $projects = $obj->get();
        // print_r($projects);
        // die();
         $html =' ';

          $root_url = url('/');
        $baseurl = $root_url.'/plan/';
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($projects as $key => $project){

            $key =$key+1;
           
            //starting of district
            if($project->district_id != ''){
                $dist_exp = explode(',', $project->district_id); 

                // dd($dist_exp);
                $dis_array = array();

                foreach($dist_exp as $dist)
                {
                   $distname = \DB::table('districts')->select('district_name')->where('id',$dist)->first();
                   array_push($dis_array, $distname->district_name); 
                }

                $districts = implode(',<br>', $dis_array);
            }
           //end of districts

        
            if($project->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $project->quarter_year" ;   }
            if($project->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $project->quarter_year "; }
            if($project->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $project->quarter_year";   }
            if($project->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $project->quarter_year "; }
 
                 $b_date =  $project->b_date;
                $broad_date = strtotime($b_date);

                 foreach($project_code_list as $id=>$pro_c){
                            if($id == $project->project_id) { 
                                
                                $projectcode = $pro_c;
                            }
                 }


            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $districts  .'</td>
                        <td>'. $projectcode .'</td>
                        <td>'. $project->activities->name .'</td>
                        <td>'. date(' F jS, Y',strtotime($project->p_date)) .'</td>
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
                                            <th>District</th>
                                            <th>Project Code</th>
                                            <th>Activity</th> 
                                            <th>Plan Date</th> 
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
       $obj = (new Plan)->newQuery();
    
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
        // print_r($projects);
        // die();
         $html =' ';

          $root_url = url('/');
        $baseurl = $root_url.'/plan/';
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($projects as $key => $project){

            $key =$key+1;
           
            //starting of district
            if($project->district_id != ''){
                $dist_exp = explode(',', $project->district_id); 

                // dd($dist_exp);
                $dis_array = array();

                foreach($dist_exp as $dist)
                {
                   $distname = \DB::table('districts')->select('district_name')->where('id',$dist)->first();
                   array_push($dis_array, $distname->district_name); 
                }

                $districts = implode(',<br>', $dis_array);
            }
           //end of districts

        
            if($project->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $project->quarter_year" ;   }
            if($project->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $project->quarter_year "; }
            if($project->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $project->quarter_year";   }
            if($project->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $project->quarter_year "; }
 
                 $b_date =  $project->b_date;
                $broad_date = strtotime($b_date);

                 foreach($project_code_list as $id=>$pro_c){
                            if($id == $project->project_id) { 
                                
                                $projectcode = $pro_c;
                            }
                 }


            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $districts  .'</td>
                        <td>'. $projectcode .'</td>
                        <td>'. $project->activities->name .'</td>
                        <td>'. date(' F jS, Y',strtotime($project->p_date)) .'</td>
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
                                            <th>District</th>
                                            <th>Project Code</th>
                                            <th>Activity</th> 
                                            <th>Plan Date</th> 
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
        $this->validate($request,[
           
        ]);

        $input = $request->all();
    
        $input['district_id']   = implode(",",$input['district_id']);
         
        // $input['output_id']       = implode(",",$input['output_id']);

          $input['indicator_id']    = implode(",",$input['indicator_id']);
        $input['output_id']       = implode(",",$input['output_id']);
        $input['activity_id']     = implode(",",$input['activity_id']);

         
        Plan::create($input);
        return redirect()->route('plan.index')->withFlashSuccess('Planning has been added successfully.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
         
    //     $goal = Goal::select('id','goal')->findOrFail($id);

    //     $objective_collection = Objective::select('id')->where('goal_id',$id)->get();
 
    //     foreach($objective_collection as $obj_colk => $obj_colv)
    //     {
    //         $obj_id[$obj_colk] = $obj_colv->id;

    //         $outcome_collection[$obj_colk] = Outcome::select('id')->where('obj_id',$obj_colv->id)->get();

    //         foreach($outcome_collection[$obj_colk] as $outcome_coll)
    //         {
    //             $outcome_id = $outcome_coll->id;
                
    //             $output_collection = Output::select('id','content','activity')->where('outcome_id',$outcome_id)->get();

    //             foreach($output_collection as $output_v)
    //             {
    //                 $data['output'][$output_v->id] = $output_v->content;
 
    //             }
    //         }
    //     }
        
       
    //      $html = view('planning/show', $data)->render(); 
         
    //    return response()->json(array('success' => 'Uploaded.', 'html' => $html));
       
    // }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
         $data['posts'] = Plan::findOrFail($id);

        $data['districts']  = Districts::pluck('district_name','district_id');
        $data['activity']   = Activity::pluck('name','id');
        $data['projects']   = Project::pluck('project_code','id');
        // $data['imp']        = PartnerPro::pluck('name_of_ngo','id');
         $data['imp']        = NGO::pluck('name','id');
        $data['goals']      = Goal::pluck('goal','id'); 

        $goalid = $data['posts']->goal_id;
        $data['allgoalreports'] =GoalReportController::Goalreportforedit($goalid);

        $data['output_exp']     = explode(",", $data['posts']->output_id);
        $data['indicator_exp']     = explode(",", $data['posts']->indicator_id);
        $data['activity_exp']     = explode(",", $data['posts']->activity_id);

        //  $ = explode(",", $posts->indicator_id);
        // $output_exp = explode(",", $posts->output_id);
        // $activity_exp = explode(",", $posts->activity_id);


        $data['district_id_exp']    = explode(",",$data['posts']->district_id);



        // dd($data);


          return view('planning.edit', $data);
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
            'project_id' => 'required',
            'activity' => 'required',
            'goal_id' => 'required',
           
        ]);



        $input = $request->all();

        // dd($input);

        $input['district_id']   = implode(",",$input['district_id']);
         
        // $input['output_id']       = implode(",",$input['output_id']);
         $input['indicator_id']    = implode(",",$input['indicator_id']);
        $input['output_id']       = implode(",",$input['output_id']);
        $input['activity_id']     = implode(",",$input['activity_id']);

        $plan = Plan::findOrFail($id);

        $plan->update($input);

        return redirect()->route('plan.edit', $id)->withFlashSuccess('Planning updated successfully.');



     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Plan::destroy($id);
        return redirect()->route('plan.index')->withFlashSuccess('Planning has been deleted successfully');
    }
}
