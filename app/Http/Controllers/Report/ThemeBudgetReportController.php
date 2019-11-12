<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThemeBudgetReportController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->middleware('auth');
    }

    public function index(){
    	return view('projectreport.theme-budget-report.index');
    }

    public function filterSearch(Request $request)
    {
       $obj = (new Project)->newQuery();
    
        if ($request->has('project_status')) {
            $project_status = $request->get('project_status');
            $obj->where('project_status', $project_status);
        }

        if ($request->has('from')) {
            $from = $request->get('from');
            $obj->where('duration_from_year', '>=', Carbon::create($from, 1, 1, 0, 0, 0)->format('Y-m-d'));
        }

        if ($request->has('to')) {
            $to = $request->get('to');
            $obj->where('duration_to_year', '<=', Carbon::create($to, 12, 30, 0, 0, 0)->format('Y-m-d') );
        }

        $lists = $obj->get();
        $html =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/report/theme-budget-report/';
        
        foreach($lists as $key => $list){
            foreach ($list->work_detail as $key => $workDetail) {
                $html .= '<tr>
                            <td>'. ++$key .'</td>
                            <td>'. \App\Models\Theme::thematicNames($workDetail->w_detail) .'</td>
                            <td> NPR '. number_format($workDetail->total_cost,2) .'</td>
                        </tr>';
            }
        }

            $table_starting = '<table class="table table-striped table-bordered datatbl_new">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Thematic Area</th>
                                            <th>Budget</th>
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
