<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotelab;
use App\Models\Benef;
use App\Models\Activity;
use App\Project;
use Illuminate\Support\Facades\Input;

class QuotelabController extends Controller
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
        $quotelabs      = Quotelab::all();
        $project_code   = Project::pluck('project_code','id');
        $activities     = Activity::pluck('name','id');
     
        return view('quotelab.index', compact('quotelabs','project_code','activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['benef_name'] = Benef::pluck('name','id');
        
        $data['activity'] = Activity::pluck('name','id');

        $data['projects'] = Project::pluck('project_code','id');

        // dd($data);
        return view('quotelab.create', $data);
    }

            public function filterSearch(Request $request)
    {
        // print_r($request->all());
         // die;
       $obj = (new Quotelab)->newQuery();

        if ($request->has('project_id')) {
            $project_id = $request->get('project_id');
            $obj->where('project_code',$project_id);
        }


        if ($request->has('activity_id')) {
            $activity_id = $request->get('activity_id');
            $obj->where('activity', $activity_id);
        }

         if ($request->has('type')) {
            $type = $request->get('type');
            $obj->where('type', $type);
        }

         if ($request->has('theme')) {
            $theme = $request->get('theme');
            $obj->where('theme', $theme);
        }

        // $projects = $obj->toSql();
        $projects = $obj->get();

        // var_dump($projectsql);
        // var_dump($projects);
        // die;

        $html =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/quotelab/';

        // $project_code_list       = Project::pluck('project_code', 'id');
        
            // var_dump($project_code_list);
        foreach($projects as $key => $project){
            // die;

            $key =$key+1;

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
                    <td>'.  '<a class="link-anchor" href="'. url('project/'.$project->project->id.'/edit/' ).'"  target="_blank">'.  $project->project->project_code .'</a> </td>
                    <td>'.   $project->type  .'</td>
                    <td>'.   $project->theme  .'</td>
                    <td>'.   $project->activityname->name  .'</td>
                    <td>'.  '<a class="link-anchor" href="'. url('project/'.$project->benef->id.'/edit/' ).'"  target="_blank">'.  $project->benef->name .'</a> </td>
                    <td>'.  $project->occupation .'</td>
                    <td>'.  $project->education .'</td>
                    <td>'.  $quarter_n_year .'</td>
                    <td>'. '<a class="link-anchor" href="'. $baseurl . $project->id.'/edit" class="action-btns"> 
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

// var_dump($html);

            $table_starting = '<table class="table table-striped table-bordered tbl_new">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Project Code</th>
                                            <th>Type</th>
                                            <th>Theme</th>
                                            <th>Activity</th>
                                            <th>Beneficar</th>
                                            <th>Occupation</th>
                                            <th>Education</th>
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
        // var_dump($data);
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
        // dd($request->all());
        $this->validate($request,[
            'type'           => 'required',
            'activity'       => 'required',
            'project_code'   => 'required',
            'theme'          => 'required',
            'beneficiar'     => 'required',
            'location'       => 'required',
            'occupation'     => 'required',
            'education'      => 'required',
            'group_individual'=>'required',
            'main_quote'      =>'required',
        ]);

        Quotelab::create($request->all());

        return redirect()->route('quotelab.index')->withFlashSuccess('Quote Lab has been added successfully.');
    }

    public function show($id)
    {
         dd('show');//
    }

    public function edit($id)
    {
        // dd('here');
        $data['quotelab']= Quotelab::findOrFail($id);
        
        // $beneficiar = Benef::all();
        $data['benef_name'] = Benef::pluck('name','id');

        // $activities = Activity::all();
        $data['activity'] = Activity::pluck('name','id');

        // $projects = Project::all();
        $data['projects'] = Project::pluck('project_code','id');
        
        return view('quotelab.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'type'           => 'required',
            'activity'       => 'required',
            'project_code'   => 'required',
            'theme'          => 'required',
            'beneficiar'     => 'required',
            'location'       => 'required',
            'occupation'     => 'required',
            'education'      => 'required',
            'group_individual'=>'required',
            'main_quote'      =>'required',
        ]);

        
        $ql = Quotelab::findOrFail($id);
        $ql->update($request->all());
       
        return redirect()->route('quotelab.index')->withFlashSuccess('Quote Lab updated successfully.');
    }

    public function destroy($id)
    {
        $model = Quotelab::findOrFail($id);
        
        $model->delete();
        return redirect()->route('quotelab.index')->withFlashSuccess('Information Deleted successfully.');
    }
}
