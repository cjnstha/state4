<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Districts;
use App\Project;
use App\Models\Benef;

use App\Models\Goal;  // for goal and related


class TrainingController extends Controller
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
        // $districts  = Districts::pluck('district_name','district_id');
        $projects   = Project::pluck('project_code','id');
         // $beneficiars   = Benef::pluck('name','id');
        $trainings = Training::all();

        $baseurl = url('/');
         // $newurl = $baseurl .'/benef/';

        $project_codes  = Project::pluck('project_code','id');
        $goals = Goal::pluck('goal','id');

        // dd($districts);
        return view('training.index', compact('trainings','projects','baseurl','project_codes','goals'));
    }

    public function filterSearch(Request $request)
    {
       $obj = (new Training)->newQuery();
    
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
        
        $lists = $obj->get();
        // print_r($projects);
        // die();
         $html =' ';

          $root_url = url('/');
        $baseurl = $root_url.'/plan/';
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($lists as $key => $list){

            $key =$key+1;
           
            //starting of district
            if($list->district_id != ''){
                $dist_exp = explode(',', $list->district_id); 

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
        
            if($list->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $list->quarter_year" ;   }
            if($list->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $list->quarter_year "; }
            if($list->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $list->quarter_year";   }
            if($list->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $list->quarter_year "; }
 
                 $b_date =  $list->b_date;
                $broad_date = strtotime($b_date);

                 foreach($project_code_list as $id=>$pro_c){
                            if($id == $list->project_id) { 
                                
                                $projectcode = $pro_c;
                            }
                 }


                    $benef_exp = explode(',', $list->benef_id);
                    foreach($benef_exp as $new_benef_id) {
                        $benefname = \DB::table('benef')->select('name')->where('id',$new_benef_id)->first();
                        if(!empty($benefname)){
                            $url = url('/benef/'.$new_benef_id .'/edit');
                           $text = '<a class="link-anchor" href="'.$url.'">'.$benefname->name.'</a>'; 
                        }
                    }

            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $list->training_name  .'</td>
                        <td>'. $districts  .'</td>
                        <td>'. $projectcode .'</td>
                        <td>'. $text .'</td>
                        <td>'. $quarter_n_year .'</td>
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
                                            <th>Training Name</th>
                                            <th>District</th>
                                            <th>Project Code</th>
                                            <th>Beneficiaries </th>
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
       $obj = (new Training)->newQuery();
    
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
        $baseurl = $root_url.'/trainings/';
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($lists as $key => $list){

            $key =$key+1;
           
            //starting of district
            if($list->district_id != ''){
                $dist_exp = explode(',', $list->district_id); 

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
        
            if($list->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $list->quarter_year" ;   }
            if($list->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $list->quarter_year "; }
            if($list->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $list->quarter_year";   }
            if($list->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $list->quarter_year "; }
 
                 $b_date =  $list->b_date;
                $broad_date = strtotime($b_date);

                 foreach($project_code_list as $id=>$pro_c){
                            if($id == $list->project_id) { 
                                
                                $projectcode = $pro_c;
                            }
                 }


                    $benef_exp = explode(',', $list->benef_id);
                    foreach($benef_exp as $new_benef_id) {
                        $benefname = \DB::table('benef')->select('name')->where('id',$new_benef_id)->first();
                        if(!empty($benefname)){
                            $url = url('/benef/'.$new_benef_id .'/edit');
                           $text = '<a class="link-anchor" href="'.$url.'">'.$benefname->name.'</a>'; 
                        }
                    }

            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $list->training_name  .'</td>
                        <td>'. $districts  .'</td>
                        <td>'. $projectcode .'</td>
                        <td>'. $text .'</td>
                        <td>'. $quarter_n_year .'</td>
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
                                            <th>Training Name</th>
                                            <th>District</th>
                                            <th>Project Code</th>
                                            <th>Beneficiaries </th>
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
        // $caste= Caste::all();
        $districts  = Districts::pluck('district_name','district_id');
        $projects   = Project::pluck('project_code','id');
        $beneficiars   = Benef::pluck('name','id');
         $goals = Goal::pluck('goal','id'); /* for goal and related*/

        return view('training.create',compact('districts','projects','beneficiars','goals'));
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
            'training_name' => 'required',
            'district_id'   => 'required',
            'project_id'    => 'required',
            'benef_id'      => 'required',
            // 'quarter'       => 'required',
            // 'quarter_year'  => 'required',
        ]);

        $input = $request->all();
        $input['district_id']   = implode(",",$input['district_id']);
        $input['benef_id']      = implode(",",$input['benef_id']);

        //goal related
         $input['indicator_id']    = implode(",",$input['indicator_id']);
          $input['output_id']       = implode(",",$input['output_id']);
          $input['activity_id']     = implode(",",$input['activity_id']);


        // return $request->all();
        Training::create($input);
        return redirect()->route('trainings.index')->withFlashSuccess('Training has been added successfully.');
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
         $districts  = Districts::pluck('district_name','district_id');
        $projects   = Project::pluck('project_code','id');
        $beneficiars   = Benef::pluck('name','id');

        // $districts = Districts::pluck('district_name', 'id');
          $training= Training::findOrFail($id);
        
         $district_id_exp = explode(",",$training->district_id);
         $benef_id_exp = explode(",",$training->benef_id);

            //goal realted
          $goalid = $training->goal_id;
        $allgoalreports =GoalReportController::Goalreportforedit($goalid);
        $indicator_exp = explode(",", $training->indicator_id);
        $output_exp = explode(",", $training->output_id);
        $activity_exp = explode(",", $training->activity_id);
        $goals = Goal::pluck('goal','id');




        return view('training.edit', compact('training','districts','projects','beneficiars','district_id_exp','benef_id_exp','indicator_exp','output_exp','activity_exp','goals','allgoalreports'));
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
            'training_name' => 'required',
            'district_id'   => 'required',
            'project_id'    => 'required',
            'benef_id'      => 'required',
            // 'quarter'       => 'required',
            // 'quarter_year'  => 'required',
        ]);
        $training = Training::findOrFail($id);

        $input = $request->all();
        $input['district_id']   = implode(",",$input['district_id']);
        $input['benef_id']      = implode(",",$input['benef_id']);

          //goal related
         $input['indicator_id']    = implode(",",$input['indicator_id']);
          $input['output_id']       = implode(",",$input['output_id']);
          $input['activity_id']     = implode(",",$input['activity_id']);

        $training->update($input);
        return redirect()->route('trainings.edit', $training->id)->withFlashSuccess('Information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Training::destroy($id);
        return redirect()->route('trainings.index')->withFlashSuccess('Information Deleted successfully.');
    }
}
