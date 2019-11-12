<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\MiscProvince;
use App\Models\MiscDistrict;
use App\Models\MiscLgu;
use App\Models\Theme;
use App\Project;
use App\WorkDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AddressBudgetReportController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->middleware('auth');
    }

    public function index(){
        $provinces = MiscProvince::pluck('name','id');
        $ward_json = file_get_contents('json/ward.json');
        $wards = json_decode($ward_json);
        $themes = Theme::pluck('name', 'id');
        $activitys = Activity::pluck('name', 'id');
        return view('projectreport.address-budget-report.index', compact('provinces', 'wards', 'themes', 'activitys'));
    }

    public function filterSearch(Request $request)
    {
       $obj = (Project::leftJoin('work_details','projects.id','=','work_details.project_id')); 
    
        if ($request->has('province_id')) {
            $province_id = $request->get('province_id');
            $obj= $obj->where(function ($q) use ($province_id) {
                foreach ($province_id as $key => $id) {
                    $q->orWhere('work_details.province_id', $id);
                }
            });
        }

        if ($request->has('district_id')) {
            $district_id = $request->get('district_id');
            $obj= $obj->where(function ($q) use ($district_id) {
                foreach ($district_id as $key => $id) {
                    $q->orWhere('work_details.district_id', $id);
                }
            });
        }

        if ($request->has('lgu_id')) {
            $lgu_id = $request->get('lgu_id');
            $obj= $obj->where(function ($q) use ($lgu_id) {
                foreach ($lgu_id as $key => $id) {
                    $q->orWhere('work_details.lgu_id', $id);
                }
            });
        }

        if (!empty($request->get('project_status'))) {
            $project_status = $request->get('project_status');
            $obj->where('projects.project_status','=',$project_status);
        }


    if (!empty($request->get('duration_from_year'))) {
        $duration_from_year = $request->get('duration_from_year');
        $obj->where('projects.duration_from_year','<=', Carbon::create($duration_from_year, 12, 30, 0, 0, 0)->format('Y-m-d') );
    }
        
        $lists = $obj->get();
        $html =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/report/address-budget-report/';
        
        foreach($lists as $key => $list){
            $ingoName = '';
            $province_name = '';
            $district_name = '';
            $lgu_name = '';
            if (!empty($projectAgrement = $list)) {
               
                $province_name = MiscProvince::where('id','=',$projectAgrement->province_id)->get();
                
               
                $district_name = MiscDistrict::where('id','=',$projectAgrement->district_id)->first();
               
                $lgu_name = MiscLgu::where('id','=',$projectAgrement->lgu_id)->first();
               
                // if (!empty($projectAgrement->ingo)) {
                    $ingoName = $projectAgrement->ingo->name;
                // }
            }
            $html .= '<tr>
                        <td>'. ++$key .'</td>
                        <td>'. $province_name[0]->name.'</td>
                        <td>'. \App\Models\Theme::thematicNames($list->w_detail) .'</td>
                        <td>'. $ingoName  .'</td>
                        <td> NPR '. number_format($list->total_cost,2). '</td>
                    </tr>';
        }

            $table_starting = '<table class="table table-striped table-bordered datatbl_new">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Address <br> Province/District/LGU</th>
                                            <th>Thematic Area</th>
                                             <th>INGO Name</th>
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
