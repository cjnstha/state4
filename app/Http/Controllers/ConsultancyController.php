<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultancy;
use App\Models\Roster;
use App\Models\Staff;
use App\Project;
use App\Models\Activity;
use App\Models\Identity;

use App\Models\Goal; 
use Illuminate\Support\Facades\Input;
use Response;
use Redirect;

class ConsultancyController extends Controller
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
        $services = Consultancy::all();
         $consultant_name      = Roster::pluck('fullname', 'id');
         $goals = Goal::pluck('goal','id'); 
         $project_codes  = Project::pluck('project_code','id');

        return view('consultancy.index', compact('services','consultant_name','goals','project_codes'));
    }

    public function filterSearch(Request $request)
    {
        $obj = (new Consultancy)->newQuery();

        if ($request->has('project_code')) {
            $project_code = $request->get('project_code');
            $obj->where('project_id',$project_code);
        }

        if ($request->has('type')) {
            $type = $request->get('type');
            $obj->where('type', 'LIKE', '%'.$type.'%');
        }
    
        if ($request->has('quarter')) {
            $quarter = $request->get('quarter');
            $obj->where('quarter', $quarter);
        }

        if ($request->has('quarter_year')) {
            $quarter_year = $request->get('quarter_year');
            $obj->where('quarter_year', $quarter_year);
        }

        $projects = $obj->get();

        $html =' ';

        $beenf_district_detail =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/consultancy/';
        
        $project_code_list       = Project::pluck('project_code', 'id');
        
        $consultant_name      = Roster::pluck('fullname', 'id');

        foreach($projects as $key => $project){

            $key =$key+1;
            
            if (count($consultant_name) > 0) {
                foreach($consultant_name as $id=>$name){
                    if($id == $project->consultant_id){
                        $consultantName=$name;
                    }else{
                        $consultantName='';
                    }
                }
            }else{
                $consultantName='';
            }

            if($project->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $project->quarter_year" ;   }
            if($project->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $project->quarter_year "; }
            if($project->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $project->quarter_year";   }
            if($project->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $project->quarter_year "; }
            
            $html .= '<tr>
                        <td>'. $key .'</td>
                           <td>'. $consultantName .'</td>
                          <td>'. $project->type .'</td>
                        <td>'. date(' F jS, Y',strtotime($project->hired_date)) .'</td>
                        <td>'. $project->duration .'</td>
                        <td>'. $project->total_fee .'</td>
                        <td>'. date(' F jS, Y',strtotime($project->contract_signed_date)) .'</td>
                        <td>'. date(' F jS, Y',strtotime($project->delivery_date)) .'</td>
                        <td>'. $project->tor_text .'</td>
                    
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
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Hired Date</th>
                                            <th>Duration</th>
                                            <th>Total fee</th>
                                            <th>Contract Sign Date</th>
                                            <th>Delivery Date</th>
                                            <th>TOR</th>
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
       $obj = (new Consultancy)->newQuery();
    
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

        // return $projects;

         $html =' ';

         $beenf_district_detail =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/consultancy/';
        // var_dump($baseurl);
        // die;
        // $baseurl.'/communitymed/';
        // $baseurl = "http://localhost/sfcgdbms/public/communitymed/";

        $project_code_list       = Project::pluck('project_code', 'id');

        
        $consultant_name      = Roster::pluck('fullname', 'id');

        foreach($projects as $key => $project){

            $key =$key+1;
           
            foreach($consultant_name as $id=>$name){
                if($id == $project->consultant_id){
                    $consultantName=$name;
                }
            }

            if($project->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $project->quarter_year" ;   }
            if($project->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $project->quarter_year "; }
            if($project->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $project->quarter_year";   }
            if($project->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $project->quarter_year "; }
            
            $html .= '<tr>
                        <td>'. $key .'</td>
                           <td>'. $consultantName .'</td>
                          <td>'. $project->type .'</td>
                        <td>'. date(' F jS, Y',strtotime($project->hired_date)) .'</td>
                        <td>'. $project->duration .'</td>
                        <td>'. $project->total_fee .'</td>
                        <td>'. date(' F jS, Y',strtotime($project->contract_signed_date)) .'</td>
                        <td>'. date(' F jS, Y',strtotime($project->delivery_date)) .'</td>
                        <td>'. $project->tor_text .'</td>
                    
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
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Hired Date</th>
                                            <th>Duration</th>
                                            <th>Total fee</th>
                                            <th>Contract Sign Date</th>
                                            <th>Delivery Date</th>
                                            <th>TOR</th>
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
         $data['staff_name']    = Staff::pluck('name', 'id');
         $data['projects']      = Project::pluck('project_code', 'id');
         $data['consultant_name']      = Roster::pluck('fullname', 'id');

          $data['goals'] = Goal::pluck('goal','id'); /* for goal and related*/
        // dd($data);
        return view('consultancy.create', $data);
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
            'consultant_id'          => 'required',
            'type'                   => 'required',
            'hired_date'             => 'required',
            'duration'               => 'required',
            'total_fee'              => 'required|numeric',
            'contract_signed_date'   => 'required',
            'delivery_date'          => 'required',
            'tor_text'               => 'required',
            'contract_document'      => 'required|mimes:doc,pdf,docx',
            'tor_document'           => 'required|mimes:doc,pdf,docx',
            // 'project_id'             => 'required_if|project_if',
            // 'department_name'        => 'required_if|department_if',
            'product_url'            => 'required',
            'qow'                    => 'required',
            'timely_delivery'        => 'required',
            'staff_id'               => 'required',
            'scope'                  => 'required', 
            'goal_id'               => 'required',
            'indicator_id'          => 'required',
            'output_id'             => 'required',
            'activity_id'           => 'required',
            'quarter'               => 'required',
            'quarter_year'          => 'required', 
        ]);

        // $input = $request->all();

        Consultancy::createModel($request);
        return redirect()->route('consultancy.index')->withFlashSuccess('Consultancy Service has been added successfully.');
    }

    public function show($id)
    {
         dd('show');//
    }

    public function edit($id)
    {
        // dd('here');
        $data['service']        = Consultancy::findOrFail($id);
        $data['staff_name']     = Staff::pluck('name', 'id');
        $data['projects']       = Project::pluck('project_code', 'id');
        $data['consultant_name']= Roster::pluck('fullname', 'id');

        $goalid                 = $data['service']->goal_id;
        $data['allgoalreports'] =GoalReportController::Goalreportforedit($goalid);
        $data['indicator_exp']  = explode(",", $data['service']->indicator_id);
        $data['output_exp']     = explode(",", $data['service']->output_id);
        $data['activity_exp']   = explode(",", $data['service']->activity_id);
        $data['goals']          = Goal::pluck('goal','id');


        // dd($data);
        return view('consultancy.edit',$data);
    }

    public function update(Request $request, $id)
    {
         // dd($request->all());
        $this->validate($request,[
            
            'consultant_id'          => 'required',
            'type'                   => 'required',
            'hired_date'             => 'required',
            'duration'               => 'required',
            'total_fee'              => 'required|numeric',
            'contract_signed_date'   => 'required',
            'delivery_date'          => 'required',
            'tor_text'               => 'required',
            'contract_document'      => 'mimes:doc,pdf,docx',
            'tor_document'           => 'mimes:doc,pdf,docx',
            // 'project_id'             => 'required_if|project_if',
            // 'department_name'        => 'required_if|department_if',
            'product_url'            => 'required',
            'qow'                    => 'required',
            'timely_delivery'        => 'required',
            'staff_id'             => 'required',
            'scope'                  => 'required', 
           
        ]);

        Consultancy::updateModel($request, $id);
        // dd($request);
        return redirect()->route('consultancy.index')->withFlashSuccess('Information updated successfully.');
    }

    public function destroy($id)
    {
        $model = Consultancy::findOrFail($id);
        
        $contract_document = public_path().'/files/consultancy_service/'.$model->contract_document;
        $tor_document = public_path().'/files/consultancy_service/'.$model->tor_document;

        // dd($contract_document, $tor_document);
        \File::delete($contract_document, $tor_document);
        
         $model->delete();
        return redirect()->route('consultancy.index')->withFlashSuccess('Information Deleted successfully.');
    }

    public function downloadFile($filename)
    {
        // $pageheader= 'file download';

          $file_path = public_path() .'/files/consultancy_service/'. $filename;
         // dd($file_path);
           if(is_file($file_path)){

            return(  Response::download($file_path, $filename));
        }
        return Redirect::back()->withFlashSuccess(" Sorry File Doesn't exist");


    }

}
