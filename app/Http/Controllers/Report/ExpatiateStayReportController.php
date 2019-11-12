<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Project;
use Carbon\Carbon;
use App\Models\INGO;
use Illuminate\Http\Request;

class ExpatiateStayReportController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->middleware('auth');
    }

    public function index(){
    	$ingos    = INGO::pluck('name','id');
        $projects = Project::pluck('project_name','id');
    	return view('projectreport.expatiate-stay-report.index', compact('projects','ingos'));
    }

    public function filterSearch(Request $request)
    {
       $obj = (Project::leftJoin('expartiate','projects.id','=','expartiate.project_id')->select('projects.id','projects.project_name','projects.ingo_name')); 


        if ($request->has('from')) {
            $from = $request->get('from');
            $obj->where('expartiate.from_year','>=', Carbon::create($from, 1, 1, 0, 0, 0)->format('Y-m-d'));
        }

        if ($request->has('to')) {
            $to = $request->get('to');
            $obj->where('expartiate.to_month','<=', Carbon::create($to, 12, 30, 0, 0, 0)->format('Y-m-d') );
        }

        if ($request->has('ingo_name')) {
            $ingo_name = $request->get('ingo_name');
            $obj->where('projects.ingo_name', $ingo_name);
        }

        if ($request->has('project_name')) {
            $project_name = $request->get('project_name');
            $obj->where('projects.id', $project_name);
        }
        
        $lists = $obj->get();
        $html =' ';
        $root_url = url('/');
        $baseurl = $root_url.'/report/expatiate-stay-report/';
        
        foreach($lists as $key => $list){
           $html .= '<tr>
                        <td>'. ++$key .'</td>
                        <td>'. $list->expatriate[0]->name  .'</td>
                        <td>'. $list->expatriate[0]->from_year.' '.$list->expatriate[0]->from_month .'</td>
                        <td>'. $list->expatriate[0]->to_year.' '.$list->expatriate[0]->to_month .'</td>
                        <td>'. $list->ingo->name  .'</td>
                        <td>'. $list->project_name  .'</td>
                    </tr>';
           
        }

            $table_starting = '<table class="table table-striped table-bordered datatbl_new">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Expatiate Name</th>
                                            <th>From</th>
                                            <th>To</th>
                                             <th>INGO Name</th>
                                            <th>Project Name</th>
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
}
