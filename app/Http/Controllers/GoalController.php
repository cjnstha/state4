<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\Objective;
use App\Models\Outcome;
use App\Models\Output;
use App\Models\Activity;
use App\Project;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class GoalController extends Controller
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
        $posts= Goal::all();
        $project_codes  = Project::pluck('project_code','id');
        return view('goal.index', compact('posts','project_codes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
         
        $project_code = Project::pluck('project_code','id');
         

        $activity = Activity::pluck('name','id');
         

       return view('goal/create', compact('project_code','activity'));
    }

    public function filterSearch(Request $request)
    {
        $obj = (new Goal)->newQuery();

        if ($request->has('project_code')) {
            $project_code = $request->get('project_code');
            $obj->where('p_code',$project_code);
        }

        $lists = $obj->get();
        // return $lists;

        $html =' ';

        $beenf_district_detail =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/goal/';
        
        $project_code_list       = Project::pluck('project_code', 'id');
        

        foreach($lists as $key => $list){

            $key =$key+1;

            $url = url('project/'.(isset($list->project)? $list->project->id : '').'/edit/');
            $text = (isset($list->project)? $list->project->project_code : '');
            $text2 = (isset($list->project)? $list->projectname->project_name : '');

            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td><a class="link-anchor" href="'.$url.'">'.$text.'</a></td>
                        <td>'. $text2 .'</td>
                        <td>'. $list->goal .'</td>
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
            
            // $html .= '<tr>
            //             <td>'. $key .'</td>
            //             <td>'. '<a class="link-anchor" href="'. url('project/'.(isset($list->project)? $list->project->id : '').'/edit/').'">'. (isset($list->project)? $list->project->project_code : '').' </a>' .'</td>
            //             <td>'. isset($list->project)? $list->projectname->project_name : '' .'</td>
            //             <td>'. $list->goal .'</td>
            //             <td>'. '<a href="'. $baseurl . $list->id.'/edit" class="action-btns"> 
            //                         <span class="glyphicon glyphicon-pencil"></span>
            //                     </a>
            //                     <form method="POST" action="'. $baseurl . $list->id.'">
            //                         <input name="_method" type="hidden" value="DELETE">
            //                         <input name="_token" type="hidden" value="'.$request->get('_token').'">
            //                         <a href="javascript:void(0);" class="action-btns submit">
            //                             <span class="glyphicon glyphicon-trash"></span>
            //                         </a>
            //                     </form>
            //             </td>
            //         </tr>';
        }

            $table_starting = '<table class="table table-striped table-bordered datatbl_new">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Project Code</th>                     
                                            <th>Project Name</th>
                                            <th>Goal</th>
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= $this->validate($request,[
             
        ]);
        
            $input = Input::all();
             
            $event = Goal::create([
                    'goal' => $input['goal'],
                    'p_code' => $input['p_code'],
                ]);
            $event_id= $event->id;
            foreach ($input['obj'] as $ob => $value ){
                $objective = Objective::create([
                'goal_id' => $event_id,
                'content' => $input['obj'][$ob],

                ]);

                $obj_id= $objective->id;
                foreach ($input['outcome'][$ob] as $outc => $value ){ 

                     //print_r($input['outcome'][$ob][$outc]);exit;
                    $outcome = Outcome::create([
                    'obj_id' => $obj_id,
                    'content' => $input['outcome'][$ob][$outc],
                    ]);
                    
                    $outcome_id= $outcome->id;

                    foreach ($input['output'][$ob][$outc]  as $outp => $value ){ 
                            
                        $output = Output::create([
                        'outcome_id' => $outcome_id,
                        'content' => $input['output'][$ob][$outc][$outp],
                        'activity' => $input['activity'][$ob][$outc][$outp],
                        ]);
                        
                        } 
                       
                    }
                }
         
                 return redirect('goal')->withFlashSuccess('Goal / Impact  has been added successfully.');
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
        $project_code = Project::pluck('project_code','id');
         
        $activity = Activity::pluck('name','id');
         
        $posts = Goal::findOrFail($id);
        $goal_id = $id;
        $objectives = Objective::where('goal_id',$goal_id)->get();
          //dd(count($objectives));  
        return view('goal.edit', compact('posts','objectives','project_code','activity'));
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
        $validator= $this->validate($request,[
             
        ]);
        
            $input = Input::all();

            $goal = Goal::findOrFail($id); 
            $event = $goal->update([
                    'goal' => $input['goal'],
                    'p_code' => $input['p_code'],
                ]);
              

            foreach ($input['obj'] as $ob => $value ){
                $obje = Objective::where('id', $input['obj_id'][$ob])->first();
                // return $obje;
                if(isset($obje)){ 
                    $obje->update([
                    'goal_id' => $id,
                    'content' => $input['obj'][$ob],

                    ]);
                }
                /*
                else{
                    $obje->create([
                    'goal_id' => $event_id,
                    'content' => $input['obj'][$ob],

                    ]);
                }
                */
                 
                foreach ($input['outcome'][$ob] as $outc => $value ){ 
                     //print_r($input['outcome'][$ob][$outc]);exit;
                    $out = Outcome::where('id', $input['outcome_id'][$ob][$outc])->first();

                    if(isset($out)){ 
                        $out->update([
                        'obj_id' => $input['obj_id'][$ob],
                        'content' => $input['outcome'][$ob][$outc],
                        ]);
                    }

                    foreach ($input['output'][$ob][$outc]  as $outp => $value ){ 
                         $ou = Output::where('id', $input['output_id'][$ob][$outc][$outp])->first();

                        if(isset($ou)){ 
                            $output = $ou->update([
                            'outcome_id' => $input['outcome_id'][$ob][$outc],
                            'content' => $input['output'][$ob][$outc][$outp],
                            'activity' => $input['activity'][$ob][$outc][$outp],
                            ]);
                        
                        } 
                       
                    }
                }

            }
        return redirect('goal')->withFlashSuccess('Goal / Impact is updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $goal = Goal::findOrFail($id);
        $goal->delete();
        $obj = Objective::where('goal_id', $id)->get();
        foreach($obj as $o){
            $obj_id= $o->id;
            $objective = Objective::findOrFail($obj_id);
            $objective->delete();
            $outco = Outcome::where('obj_id', $obj_id)->get();
            foreach($outco as $out){
                $outcome_id= $out->id;
                $outcome = Outcome::findOrFail($outcome_id);
                $outcome->delete();
                $outpo = Output::where('outcome_id', $outcome_id)->get();
                foreach($outpo as $ou){
                    $output_id= $ou->id;
                    $output = Output::findOrFail($output_id);
                    $output->delete();
                }
            }
        }
        
       // $event = Goal::findOrFail($id);
        //$event->delete();
        return redirect('goal')->withFlashSuccess('Goal / Impact is deleted successfully.');
    }
}