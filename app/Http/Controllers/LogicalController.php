<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logical;
use App\Models\Goal;
use App\Models\Objective;
use App\Models\Outcome;
use App\Models\Output;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LogicalController extends Controller
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

        $posts= Logical::all();
        $goals= Goal::pluck('goal','id');
                
        return view('logical.index', compact('posts','goals'));
        
    }

    public function filterSearch(Request $request)
    {
        // print_r($request->all());
         // die;
       $obj = (new Logical)->newQuery();

        if ($request->has('goal_id')) {
            $goal_id = $request->get('goal_id');
            $obj->where('goal',$goal_id);
        }
        
        // $projects = $obj->toSql();
        $projects = $obj->get();

        $html =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/logical/';

        foreach($projects as $key => $project){
            // die;

            $key =$key+1;

        $html .= '<tr>
                    <td>'. $key .'</td>
                    <td>'.   $project->goalname->goal  .'</td>
                    <td>'.   $project->sub  .'</td>
                    <td>'.   $project->obj_i  .'</td>
                    <td>'.   $project->ind  .'</td>
                    <td>'.   $project->data_s  .'</td>
                 
                    <td> <a class="link-anchor" href="'. $baseurl . $project->id.'/edit" class="action-btns"> 
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

            $table_starting = '<table class="table table-striped table-bordered tbl_new">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Project</th>
                                            <th>Subject</th>
                                            <th>Objectively variable ind.</th>
                                            <th>Indicator def.</th> 
                                            <th>Data source</th>
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
        $goal= Goal::pluck('goal','id');
        return view('logical/create',compact('goal'));
    }
    public function edit($id)
    {   
        $goal= Goal::pluck('goal','id');
        $posts = Logical::findOrFail($id);

         return view('logical/edit',compact('posts','goal'));
    }
    public function createNext()
    {
        //$goal= Goal::pluck('goal','id');
        $input= Input::all();
        $goal_id=  $input['goal'];

        $subjects = array();
        $obj = Objective::where('goal_id', $goal_id)->get();
        $count_obj=0;
        foreach($obj as $o){  
            $count_obj++;
            $obj_id= $o->id;
            $subjects[]  = 'Objective'.$count_obj.' : '.$o->content;
            
            $outco = Outcome::where('obj_id', $obj_id)->get();
            $count_outcome=0;
            foreach($outco as $out){
                $count_outcome++;
                $outcome_id= $out->id;
                $subjects[]= 'Outcome'.$count_obj.'.'.$count_outcome.' : '.$out->content;
                $outpo = Output::where('outcome_id', $outcome_id)->get();
                $count_output=0;
                foreach($outpo as $ou){
                    $count_output++;
                    $output_id= $ou->id;
                    $subjects[]= 'Output'.$count_obj.'.'.$count_outcome.'.'.$count_output.' : '.$ou->content;
                } 
            }
           
            } 
            foreach($subjects as $key => $val){
                $sub[$val]=  $val;
            //dd($sub);
        } // dd($subjects);
        return view('logical/createNext',compact('sub','goal_id'));
       
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
        $input= Input::all();        

        $event = Logical::create($input);
         
       return redirect()->route('logical.index')->withFlashSuccess('Logical profile has been added successfully.');
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

    public function editNext($id)
    {   
        $input= Input::all();
        $goal_id=  $input['goal'];

        $subjects = array();
         $obj = Objective::where('goal_id', $goal_id)->get();
        $count_obj=0;
        foreach($obj as $o){  
            $count_obj++;
            $obj_id= $o->id;
            $subjects[]  = 'Objective'.$count_obj.' : '.$o->content;
            
            $outco = Outcome::where('obj_id', $obj_id)->get();
            $count_outcome=0;
            foreach($outco as $out){
                $count_outcome++;
                $outcome_id= $out->id;
                $subjects[]= 'Outcome'.$count_obj.'.'.$count_outcome.' : '.$out->content;
                $outpo = Output::where('outcome_id', $outcome_id)->get();
                $count_output=0;
                foreach($outpo as $ou){
                    $count_output++;
                    $output_id= $ou->id;
                    $subjects[]= 'Output'.$count_obj.'.'.$count_outcome.'.'.$count_output.' : '.$ou->content;
                } 
            }
           
            } 
            foreach($subjects as $key => $val){
                $sub[$val]=  $val;
            //dd($sub);
        } // dd($subjects);
 
      
        $posts = Logical::findOrFail($id);
        return view('logical/editNext', compact('posts','sub','goal_id'));
        
        
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
         $this->validate($request,[
           
        ]);
        $input= Input::all();
 
             $event = Logical::findOrFail($id);
             $event->update($input);
       
         return redirect()->route('logical.index')->withFlashSuccess('Logical profile is updated successfully.');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Logical::findOrFail($id);
        $event->delete();
        return redirect('logical')->withFlashSuccess('Logical profile is deleted successfully.');
    }
}
