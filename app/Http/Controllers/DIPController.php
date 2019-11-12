<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\DIP;
use App\Project;
use App\Models\Activity;
use App\Models\Goal;  // for goal and related
use App\Models\Staff;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class DIPController extends Controller
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
       $posts = DIP::all();

        $project_codes  = Project::pluck('project_code','id');
        $goals = Goal::pluck('goal','id');
        $activity = Activity::pluck('name', 'id');
        $activity->put('Other','Other');

        return view('dip.index', compact('posts','pageheader','project_codes','goals','activity'));
    }

    public function filterSearch(Request $request)
    {
       $obj = (new DIP)->newQuery();
    
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

        if ($request->has('act_type')) {
            $act_type = $request->get('act_type');
            $obj= $obj->where(function ($q) use ($act_type) {
                foreach ($act_type as $key => $id) {
                    $q->orWhereRaw('FIND_IN_SET('.$id.',act_type)');
                }
            });
        }
        
        $lists = $obj->get();
        // print_r($projects);
        // die();
         $html =' ';

          $root_url = url('/');
        $baseurl = $root_url.'/dips/';
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($lists as $key => $list){

            $key =$key+1;

            $dist_exp = explode(',', $list->act_type); 
            $dis_array = array();

            foreach($dist_exp as $dist)
            {
              if($dist == 'Other')
              {
                if(isset($list->act_others)) {
                    array_push($dis_array, $list->act_others); 
                } } else {
               $distname = \DB::table('activity')->select('name')->where('id',$dist)->first();
               array_push($dis_array, $distname->name); 
              }
            }

            $activity = implode(',<br>', $dis_array);

            if($list->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $list->quarter_year" ;   }
            if($list->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $list->quarter_year "; }
            if($list->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $list->quarter_year";   }
            if($list->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $list->quarter_year "; }
 
            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $list->activity_code  .'</td>
                        <td>'. $list->name  .'</td>
                        <td>'. $activity  .'</td>
                        <td>'. date(' F jS, Y',strtotime($list->imp_date))  .'</td>
                        <td>'. $quarter_n_year  .'</td>
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
                                            <th>Activity Code</th>
                                            <th>Activity Name</th>
                                            <th>Activity type</th>
                                            <th>Implementation date</th>
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
        $obj = (new DIP)->newQuery();
    
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
        
        $lists = $obj->get();
        // print_r($projects);
        // die();
         $html =' ';

          $root_url = url('/');
        $baseurl = $root_url.'/dips/';
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($lists as $key => $list){

            $key =$key+1;

            $dist_exp = explode(',', $list->act_type); 
            $dis_array = array();

            foreach($dist_exp as $dist)
            {
              if($dist == 'Other')
              {
                if(isset($list->act_others)) {
                    array_push($dis_array, $list->act_others); 
                } } else {
               $distname = \DB::table('activity')->select('name')->where('id',$dist)->first();
               array_push($dis_array, $distname->name); 
              }
            }

            $activity = implode(',<br>', $dis_array);

            if($list->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $list->quarter_year" ;   }
            if($list->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $list->quarter_year "; }
            if($list->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $list->quarter_year";   }
            if($list->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $list->quarter_year "; }
 
            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $list->activity_code  .'</td>
                        <td>'. $list->name  .'</td>
                        <td>'. $activity  .'</td>
                        <td>'. date(' F jS, Y',strtotime($list->imp_date))  .'</td>
                        <td>'. $quarter_n_year  .'</td>
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
                                            <th>Activity Code</th>
                                            <th>Activity Name</th>
                                            <th>Activity type</th>
                                            <th>Implementation date</th>
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // $activity = Activity::all();
         $activity = Activity::pluck('name', 'id');
          $activity->put('Other','Other');
        $project_code = Project::pluck('project_code', 'id');
        $goals = Goal::pluck('goal','id'); /* for goal and related*/

         $staffs = Staff::pluck('name', 'id');

        // dd($project_code);
        return view('dip/create', compact('activity','project_code','goals','staffs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
         // dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'act_type' => 'required',
            'obj' => 'required',
            'outcome' => 'required',
            'ind_act' => 'required',
            'ind_no' => 'required',
            'police_str' => 'required',
            'imp_date' => 'required',
        ]);

            $input = Input::all();

            // for responsible staff id
            if(isset($input['staff']['responsible']['name'])) {
                $responsible_staff = Staff::create([
                        'name'          => $input['staff']['responsible']['name'],
                        'designation'   => $input['staff']['responsible']['designation'],
                        'project_id'    => $input['project_id'],
                      ]);

                $input['responsible_staffid'] = $responsible_staff->id;

            } else if(isset($input['staff']['responsible']['id'])){

                 $input['responsible_staffid'] = $input['staff']['responsible']['id'];
            }
            //end of responsible staff 


            // for accountable staff id
            if(isset($input['staff']['accountable']['name'])) {
                $accountable_staff = Staff::create([
                        'name'          => $input['staff']['accountable']['name'],
                        'designation'   => $input['staff']['accountable']['designation'],
                        'project_id'    => $input['project_id'],
                      ]);
                
                $input['accountable_staffid']  = $accountable_staff->id;
            } 
            else if(isset($input['staff']['responsible']['id'])){

                 $input['accountable_staffid'] = $input['staff']['accountable']['id'];
            }

             //end of accountable staff 

            // for approver staff id
            if(isset($input['staff']['approver']['name'])) {
                $approver_staff = Staff::create([
                        'name'          => $input['staff']['approver']['name'],
                        'designation'   => $input['staff']['approver']['designation'],
                        'project_id'    => $input['project_id'],
                      ]);
                $input['approver_staffid'] = $approver_staff->id;
            }
             else if(isset($input['staff']['approver']['id'])){

                 $input['approver_staffid'] = $input['staff']['approver']['id'];
            }
            //end of approver staff 

            if ( ($input['target_grp']) != 'others'){
                $input['target'] =  '';
            }else{
                $input['target'] = $input['tg_others'];
            }
            
           
            foreach($input['i_partners'] as $key=>$value){
                if($input['i_partners'][$key]== null){
                    unset($input['i_partners'][$key]);
                }
            }
            foreach($input['c_partners'] as $key=>$value){
                if($input['c_partners'][$key]== null){
                    unset($input['c_partners'][$key]);
                }
            }
            foreach($input['r_persons'] as $key=>$value){
                if($input['r_persons'][$key]== null){
                    unset($input['r_persons'][$key]);
                    unset($input['res_p'][$key]);
                }
            }
            foreach($input['res_p'] as $key=>$value){
                if($input['res_p'][$key]== null){
                    unset($input['res_p'][$key]);
                    unset($input['r_persons'][$key]);
                }
            } 

            $input['activity_code'] = implode("/",$input['activity_code']);

            $input['act_type']      = implode(",",$input['act_type']);
                  
            $input['i_partners']    = implode(",",$input['i_partners']);
            $input['c_partners']    = implode(",",$input['c_partners']);
            
            $input['r_persons']     = implode(",",$input['r_persons']);
            $input['res_p']         = implode(",",$input['res_p']);

             //goal related
            $input['indicator_id']    = implode(",",$input['indicator_id']);
            $input['output_id']       = implode(",",$input['output_id']);
            $input['activity_id']     = implode(",",$input['activity_id']);
            
            // dd($input);

             DIP::create($input); 
        
            return redirect()->route('dips.index')->withFlashSuccess('DIP has been added successfully.');

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
         $activity->put('Other','Other');
        $project_code = Project::pluck('project_code', 'id');
       
 
        $pageheader ="Edit DIP";
        $posts = DIP::findOrFail($id);

         $act_type_id      = explode(",", $posts->act_type);


        $i_p= DIP::select('i_partners')->where('id',$id)->get();
        $i_partners= explode(',',$i_p[0]->i_partners);

        $c_p= DIP::select('c_partners')->where('id',$id)->get();
        $c_partners= explode(',',$c_p[0]->c_partners);

        $r_p= DIP::select('r_persons')->where('id',$id)->get();
        $r_persons= explode(',',$r_p[0]->r_persons);
        $r_persons_count= count($r_persons);
        
        $res= DIP::select('res_p')->where('id',$id)->get();
        $res_p= explode(',',$res[0]->res_p);

         $activity_code_exp    = explode("/",$posts->activity_code);

         // dd($activity_code_exp);

          //goal realted
          $goalid = $posts->goal_id;
        $allgoalreports =GoalReportController::Goalreportforedit($goalid);
        $indicator_exp = explode(",", $posts->indicator_id);
        $output_exp = explode(",", $posts->output_id);
        $activity_exp = explode(",", $posts->activity_id);
        $goals = Goal::pluck('goal','id');



        //$r_persons= explode(',',$r_p[0]->r_persons);

// dd($act_type_id);
        return view('dip.edit', compact('posts', 'pageheader','i_partners','c_partners','r_persons','res_p','r_persons_count','activity','project_code','act_type_id','goalid','allgoalreports','indicator_exp','output_exp','activity_exp','goals','activity_code_exp'));
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
        // dd($request->all());
       $this->validate($request,[
            'name' => 'required',
            'act_type' => 'required',
            'obj' => 'required',
            'outcome' => 'required',
            'ind_act' => 'required',
            'ind_no' => 'required',
            'police_str' => 'required',
            'imp_date' => 'required',
        ]);

            $input = Input::all();

             // for responsible staff id
            if(isset($input['staff']['responsible']['name'])) {
                $responsible_staff = Staff::create([
                        'name'          => $input['staff']['responsible']['name'],
                        'designation'   => $input['staff']['responsible']['designation']
                      ]);

                $input['responsible_staffid'] = $responsible_staff->id;

            } else if(isset($input['staff']['responsible']['id'])){

                 $input['responsible_staffid'] = $input['staff']['responsible']['id'];
            }
            //end of responsible staff 


            // for accountable staff id
            if(isset($input['staff']['accountable']['name'])) {
                $accountable_staff = Staff::create([
                        'name'       => $input['staff']['accountable']['name'],
                        'designation'    => $input['staff']['accountable']['designation'],
                      ]);
                $input['accountable_staffid']  = $accountable_staff->id;
            } 
            else if(isset($input['staff']['responsible']['id'])){

                 $input['accountable_staffid'] = $input['staff']['accountable']['id'];
            }

             //end of accountable staff 

            // for approver staff id
            if(isset($input['staff']['approver']['name'])) {
                $approver_staff = Staff::create([
                        'name'       => $input['staff']['approver']['name'],
                        'designation'    => $input['staff']['approver']['designation'],
                      ]);
                $input['approver_staffid'] = $approver_staff->id;
            }
             else if(isset($input['staff']['approver']['id'])){

                 $input['approver_staffid'] = $input['staff']['approver']['id'];
            }
            //end of approver staff 
            
 
            if ( ($input['target_grp']) != 'others'){
                $input['target'] =  '';
            }else{
                $input['target'] = $input['tg_others'];
            }
            
            //  $input['act_type']= implode(",",$input['act_type']);

            // $i_partners= implode(",",$input['i_partners']);
            // $c_partners= implode(",",$input['c_partners']);
            
            // $r_persons= implode(",",$input['r_persons']);
            // $res_p= implode(",",$input['res_p']);


            $input['act_type'] =  implode(",",$input['act_type']);
                  
            $input['i_partners']= implode(",",$input['i_partners']);
            $input['c_partners']= implode(",",$input['c_partners']);
            
            $input['r_persons'] = implode(",",$input['r_persons']);
            $input['res_p']      = implode(",",$input['res_p']);

             //goal related
            $input['indicator_id']    = implode(",",$input['indicator_id']);
            $input['output_id']       = implode(",",$input['output_id']);
            $input['activity_id']     = implode(",",$input['activity_id']);

            $input['activity_code']        = implode("/",$input['activity_code']);


           $dip = DIP::findOrFail($id);
        $dip->update($input);

        // $event = DIP::where('id',$id)->update([
        //                 'project_code' => $input['project_code'],
        //                 'name' => $input['name'],
        //                 'act_type' => $act_type,
        //                 'act_others' => $input['act_others'],
        //                 'obj' => $input['obj'],
        //                 'outcome' => $input['outcome'],
        //                 'ind_act' =>  $input['ind_act'],
        //                 'ind_no' =>  $input['ind_no'],
        //                 'police_str' => $input['police_str'],
        //                 'imp_date' => $input['imp_date'],
        //                 'imp_area' => $input['imp_area'],
                         
        //                 'eb_female' => $input['eb_female'],
        //                 'eb_male' => $input['eb_male'],
        //                 'eb_total' => $input['eb_total'],
                         
                         
        //                 'pb_travel' => $input['pb_travel'],
        //                 'pb_accom' => $input['pb_accom'],
        //                 'pb_program' => $input['pb_program'],
        //                 'pb_total' => $input['pb_total'],

        //                 'target_grp' => $input['target_grp'],
        //                 'tg_others' => $target,
        //                 'i_partners' => $i_partners,
        //                 'c_partners' => $c_partners,
        //                 'r_persons' => $r_persons,
        //                 'res_p'=> $res_p,

        //                 'ct_name' => $input['ct_name'],
        //                 'ct_pos' => $input['ct_pos'],
        //                 'ct_cell' => $input['ct_cell'],

        //         ]);
         
//      
        return redirect()->route('dips.edit', $id)->withFlashSuccess('DIP profile is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = DIP::findOrFail($id);
        $event->delete();
        
        return redirect('dips');
    }
}
