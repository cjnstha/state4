<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\SIP;
use App\Project;
use App\Models\Activity;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class SIPController extends Controller
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
       $posts = SIP::all();

         return view('sip.index', compact('posts','pageheader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $activity = Activity::pluck('name', 'id');
         $project_code = Project::pluck('project_code', 'id');
        
        return view('sip/create', compact('activity','project_code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
            
        $this->validate($request,[
            'act_code' => 'required',
            'name' => 'required',
            'act_type' => 'required',
            'planned_date' => 'required',
            'out_put' => 'required',
            
            
            
        ]);
            //if there is others in select menu
            $input = Input::all();

        
            // if ( ($input['target_grp']) != 'others'){
            //     $target =  '';
            // }else{
            //     $target = $input['tg_others'];
            // }
            
             $act_type= implode(",",$input['act_type']);

            $i_partners= implode(",",$input['i_partners']);
           
            $event = SIP::create([
                         'project_code' => $input['project_code'],
                        'act_code'=> $input['act_code'],
                        'name'=> $input['name'],     
                        'act_type' => $act_type,
                        'act_others' => $input['act_others'],   
                        'out_put'=> $input['out_put'],      
                        'planned_date'=> $input['planned_date'],     
                              
                        'pb_travel'=> $input['pb_travel'],        
                        'pb_accom'=> $input['pb_accom'],     
                        'pb_program'=> $input['pb_program'],       
                        'pb_total'=> $input['pb_total'],     
                        'i_partners'=> $i_partners,       
                        'unitQ'=> $input['unitQ'],        
                        't_target'=> $input['t_target'],     
                        'comp_before'=> $input['comp_before'],      
                        'target_yr'=> $input['target_yr'],        
                        'remaining'=> $input['remaining'],        
                        'n_act'=> $input['n_act'],    
                ]);
        
           return redirect()->route('sip.index')->withFlashSuccess('SIP has been added successfully.');

        //Project::create($request->all());
       // return redirect()->route('home')->with('message','Project has been added successfully.');
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
         $activity = Activity::pluck('name', 'id');
        $project_code = Project::pluck('project_code', 'id');
       
        $pageheader ="Edit sip";
        $posts = sip::findOrFail($id);

         $act_type_id      = explode(",", $posts->act_type);

       
        $i_p= sip::select('i_partners')->where('id',$id)->get();
        $i_partners= explode(',',$i_p[0]->i_partners);

        //$r_persons= explode(',',$r_p[0]->r_persons);
        return view('sip.edit', compact('posts', 'pageheader','i_partners','activity','project_code','act_type_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {   
        $this->validate($request,[
            'act_code' => 'required',
            'name' => 'required',
            'act_type' => 'required',
            'planned_date' => 'required',
            'out_put' => 'required',
            
            
            
        ]);
       
        $input = Input::all();
       
         $act_type= implode(",",$input['act_type']);

        $i_partners= implode(",",$input['i_partners']);

        $event = SIP::where('id',$id)->update([
                        'act_code'=> $input['act_code'],
                         'project_code' => $input['project_code'],
                        'name'=> $input['name'],     
                        'act_type' => $act_type,
                        'act_others' => $input['act_others'],    
                        'out_put'=> $input['out_put'],      
                        'planned_date'=> $input['planned_date'],     
                               
                        'pb_travel'=> $input['pb_travel'],        
                        'pb_accom'=> $input['pb_accom'],     
                        'pb_program'=> $input['pb_program'],       
                        'pb_total'=> $input['pb_total'],     
                        'i_partners'=> $i_partners,       
                        'unitQ'=> $input['unitQ'],        
                        't_target'=> $input['t_target'],     
                        'comp_before'=> $input['comp_before'],      
                        'target_yr'=> $input['target_yr'],        
                        'remaining'=> $input['remaining'],        
                        'n_act'=> $input['n_act'],    
                ]);
        
//       
        return redirect()->route('sip.edit', $id)->withFlashSuccess('SIP profile is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = SIP::findOrFail($id);
        $event->delete();
        
        return redirect('sip');
    }
}
