<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sgrant;
use App\Models\Districts;
use App\Models\Benef;
use App\Project;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Goal;  // for goal and related

class SgrantController extends Controller
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
        $posts= Sgrant::all();
        $projects       = Project::pluck('project_code', 'id');
        $goals = Goal::pluck('goal','id');
        // $benef_id = Benef::pluck('name','id');

        return view('sgrant.index', compact('posts','projects','goals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function filterSearch(Request $request)
    {
        // dd('comm',$request->all());
       $obj = (new Sgrant)->newQuery();
    
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

        if ($request->has('group_in')) {
            $group_in = $request->get('group_in');
            $obj->where('group_in',$group_in);
        }

        // if ($request->has('type')) {
        //     $type = $request->get('type');
        //     $obj->where('type',$type);
        // }

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
        // $baseurl = "http://192.168.0.155/sfcgdbms/public/sgrant/";
        // $baseurl = "http://localhost/sfcgdbms/public/sgrant/";

        $root_url = url('/');
        $baseurl = $root_url.'/sgrant/';


        
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
             if($project->benef_id != ''){
            $benef_exp = explode(',', $project->benef_id);
                        $benef_array = array();
                    
                       foreach($benef_exp as $dist) {
                           $benefname = \DB::table('benef')->select('name')->where('id',$dist)->first();

                          array_push($benef_array, $benefname->name); 
                        }
                     
                        $benefs = implode(', ', $benef_array); 
                        // dd($benefs);
                    }


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
            
            // if($project->theme == 'education'){
            //         $theme ='Education'; }
            // if($project->theme == 'gender'){
            //         $theme ='Gender base'; }        
            // if($project->theme == 'violence') {
            //         $theme ='Violence'; }      

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
                        <td>'. $project->group_in  .'</td>
                        <td>'.   $benefs  .'</td>
                        <td>'. $projectcode .'</td>
                        <td>'. $project->amount .'</td>
                        <td>'. $project->n_benef .'</td>
                        <td>'. $project->n_project .'</td>
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
                                            <th>Group or Individual</th>
                                            <th>Benefecieries </th>
                                            <th>Project Code</th>
                                            <th>Amount</th>
                                            <th>No. of Beneficiaries</th>
                                            <th>Nature of project</th> 
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
       $obj = (new Sgrant)->newQuery();
    
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
        
        // dd($projects);
         $html =' ';
        // $baseurl = "http://192.168.0.155/sfcgdbms/public/sgrant/";
        // $baseurl = "http://localhost/sfcgdbms/public/sgrant/";

        $root_url = url('/');
        $baseurl = $root_url.'/sgrant/';


        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($projects as $key => $project){

            $key =$key+1;
           
            //starting of beneficiairies
             if($project->benef_id != ''){
            $benef_exp = explode(',', $project->benef_id);
                        $benef_array = array();
                    
                       foreach($benef_exp as $dist) {
                           $benefname = \DB::table('benef')->select('name')->where('id',$dist)->first();

                          array_push($benef_array, $benefname->name); 
                        }
                     
                        $benefs = implode(', ', $benef_array); 
                        // dd($benefs);
                    }

            if($project->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $project->quarter_year" ;   }
            if($project->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $project->quarter_year "; }
            if($project->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $project->quarter_year";   }
            if($project->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $project->quarter_year "; }
            
                 $pro_date =  $project->production_date;
                $prod_date = strtotime($pro_date);

                 foreach($project_code_list as $id=>$pro_c){
                            if($id == $project->project_id) { 
                                $projectcode = $pro_c;
                            }
                 }


            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $project->group_in  .'</td>
                        <td>'.   $benefs  .'</td>
                        <td>'. $projectcode .'</td>
                        <td>'. $project->amount .'</td>
                        <td>'. $project->n_benef .'</td>
                        <td>'. $project->n_project .'</td>
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
                                            <th>Group or Individual</th>
                                            <th>Benefecieries </th>
                                            <th>Project Code</th>
                                            <th>Amount</th>
                                            <th>No. of Beneficiaries</th>
                                            <th>Nature of project</th> 
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

     
    public function create()
    {
         $projects = Project::pluck('project_code', 'id');
         $districts = Districts::pluck('district_name','district_id');
          $goals = Goal::pluck('goal','id'); /* for goal and related*/
         $benefs = Benef::all();
         // dd($benefs);
       return view('sgrant/create', compact('projects','districts','benefs','goals'));
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
        $validator= $this->validate($request,[
            // 'group_in' => 'required',
            'amount' => 'required|numeric',
            'n_benef' => 'required|numeric',
            'n_project' =>'required',
            'status' =>'required',
            'g_date' =>'required',
            'i_benef' =>'required|numeric',
            'project_id' =>'required',
            'benef_id'  => 'required',
            'quarter'       => 'required',
            'quarter_year'  => 'required',
            // 'district_id' =>'required',
            // 'vdc_or_munciplity' =>'required',
            // 'ward_no' =>'required',    
        ]);
        
            $inputs = Input::all();
            
            $inputs['benef_id'] = implode(",", $inputs['benef_id']);

              //goal realted
        $inputs['indicator_id']    = implode(",",$inputs['indicator_id']);
        $inputs['output_id']       = implode(",",$inputs['output_id']);
        $inputs['activity_id']     = implode(",",$inputs['activity_id']);


            $event = Sgrant::create($inputs);

        return redirect('sgrant')->withFlashSuccess('Small grant has been added successfully.');
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
        $posts      = Sgrant::findOrFail($id);
        $projects   = Project::pluck('project_code', 'id');
        $districts  = Districts::pluck('district_name','district_id');

        $benefs = Benef::all();

        $benef_id   = explode(",", $posts->benef_id);


             //goal realted
          $goalid = $posts->goal_id;
        $allgoalreports =GoalReportController::Goalreportforedit($goalid);
        $indicator_exp = explode(",", $posts->indicator_id);
        $output_exp = explode(",", $posts->output_id);
        $activity_exp = explode(",", $posts->activity_id);
        $goals = Goal::pluck('goal','id');



        // $district_id  = explode(",", $posts->district_id);
        
        // dd($benef_id);
        return view('sgrant.edit', compact('posts','projects','districts','benefs','benef_id','indicator_exp','output_exp','activity_exp','goals','allgoalreports'));
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
             'group_in' => 'required',
            'amount' => 'required|numeric',
            'n_benef' => 'required|numeric',
            'n_project' =>'required',
            'status' =>'required',
            'g_date' =>'required',
            'i_benef' =>'required|numeric',
            'project_id' =>'required',
            'quarter'       => 'required',
            'quarter_year'  => 'required',
            // 'district_id' =>'required',
            // 'vdc_or_munciplity' =>'required',
            // 'ward_no' =>'required',    
        ]);
       
            $input = Input::all();
            // dd($input);

            $sgrant = Sgrant::findOrFail($id);
            $input['benef_id'] = implode(",", $input['benef_id']);

        //goal related
         $input['indicator_id']    = implode(",",$input['indicator_id']);
          $input['output_id']       = implode(",",$input['output_id']);
          $input['activity_id']     = implode(",",$input['activity_id']);

        
            $sgrant->update($input);


        // return redirect('sgrant')->withFlashSuccess('Small grant profile is updated successfully.');
         return redirect()->route('sgrant.edit', $id)->withFlashSuccess('Information updated successfully.');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Sgrant::findOrFail($id);
        $event->delete();
        return redirect('sgrant')->withFlashSuccess('Small grant profile is deleted successfully.');
    }
}
