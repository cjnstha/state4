<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Project;
use Illuminate\Support\Facades\Input;

class ReportController extends Controller
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
        $reports = Report::all();
         $project_code    = Project::pluck('project_code', 'id');
     
        return view('report.index', compact('reports','project_code'));
    }


       public function filterSearch(Request $request)
    {
        // print_r($request->all());
         // die;
       $obj = (new Report)->newQuery();

        if ($request->has('type')) {
            $type = $request->get('type');
            // $obj->where('type', 'APR');
            $obj->where('type', $type);
        }
        
        if ($request->has('project_id')) {
            $project_id = $request->get('project_id');
            $obj->where('project_code',$project_id);
        }

        // $projects = $obj->toSql();
        $projects = $obj->get();

        // print_r($projects);
        // die;

        $html =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/report/';

        $project_code_list       = Project::pluck('project_code', 'id');
        
            // var_dump($project_code_list);
        foreach($projects as $key => $project){
            // die;

            $key =$key+1;
           

        foreach($project_code_list as $id=>$pro_c){
                if($id == $project->project_id) { 
                    $projectcode = $pro_c;
                }
         }

        $date = $project->draft_date;
        $draft_date = strtotime($date);
            
        $udate = $project->final_date;
        $final_date = strtotime($udate);
           
           // {{ url('project/'.(isset($qt->project)? $qt->project->id : '').'/edit/')}}


        $html .= '<tr>
                    <td>'.  $key .'</td>
                    <td>'.  $project->title  .'</td>
                    <td>'.  $project->type   .'</td>
                    <td>'.  $project->draft_by  .'</td>
                    <td>'.  date(' F jS, Y',$draft_date)  .'</td>
                    <td>'.  date(' F jS, Y',$final_date)  .'</td>
<td>'.  '<a class="link-anchor" href="'. url('project/'.$project->project->id.'/edit/' ).'"  target="_blank">'.  $project->project->project_code .'</a> </td>
                    <td>'.  $project->keywords .'</td>
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
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Draft By</th>
                                            <th>Draft Date</th>
                                            <th>Final Date</th>
                                            <th>Project Code</th>
                                            <th>Approve By</th>
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

        //  var_dump($data);
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
         $data['projects'] = Project::pluck('project_code','id');

        // dd($data);
        return view('report.create', $data);
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
            'title'           => 'required',
            'type'           => 'required',
            'draft_date'     => 'required',
            'draft_by'       => 'required',
            'project_code'   => 'required',
            'comment'        => 'required',
            'web_link'       => 'required',
            'final_date'     => 'required',
            'approve_by'     => 'required',
            'keywords'   => 'required',
            'methodology'   => 'required',
            'recommendation'   => 'required',
            'major_finding'   => 'required',
        ]);

        Report::create($request->all());

        return redirect()->route('report.index')->withFlashSuccess('Report has been added successfully.');
    }

    public function show($id)
    {
         dd('show');//
    }

    public function edit($id)
    {
        $data['projects'] = Project::pluck('project_code','id');
        
        $data['report']= Report::findOrFail($id);
        
        return view('report.edit', $data);
    }

    public function update(Request $request, $id)
    {
         // dd($request->all());
        $this->validate($request,[
            'title'          => 'required',
            'type'           => 'required',
            'draft_date'     => 'required',
            'draft_by'       => 'required',
            'project_code'   => 'required',
            'comment'        => 'required',
            'web_link'       => 'required',
            'final_date'     => 'required',
            'approve_by'     => 'required',
            'keywords'       => 'required',
            'methodology'    => 'required',
            'recommendation' => 'required',
            'major_finding'  => 'required',
        ]);

        
        $ql = Report::findOrFail($id);
        $ql->update($request->all());
       
        return redirect()->route('report.edit',$id)->withFlashSuccess('Report updated successfully.');
    }

    public function destroy($id)
    {
        $model = Report::findOrFail($id);
        
        $model->delete();
        return redirect()->route('report.index')->withFlashSuccess('Information Deleted successfully.');
    }
}
