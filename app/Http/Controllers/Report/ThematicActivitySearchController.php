<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\MiscProvince;
use App\Models\Theme;
use App\WorkDetail;
use Illuminate\Http\Request;

class ThematicActivitySearchController extends Controller
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
        return view('projectreport.thematic-activity-search.index', compact('provinces', 'wards', 'themes', 'activitys'));
    }

    public function filterSearch(Request $request)
    {
       $obj = (new WorkDetail)->newQuery();
    
        if ($request->has('province_id')) {
            $province_id = $request->get('province_id');
            $obj= $obj->where(function ($q) use ($province_id) {
                foreach ($province_id as $key => $id) {
                    $q->orWhere('province_id', $id);
                }
            });
        }

        if ($request->has('district_id')) {
            $district_id = $request->get('district_id');
            $obj= $obj->where(function ($q) use ($district_id) {
                foreach ($district_id as $key => $id) {
                    $q->orWhere('district_id', $id);
                }
            });
        }

        if ($request->has('lgu_id')) {
            $lgu_id = $request->get('lgu_id');
            $obj= $obj->where(function ($q) use ($lgu_id) {
                foreach ($lgu_id as $key => $id) {
                    $q->orWhere('lgu_id', $id);
                }
            });
        }

        if ($request->has('ward')) {
            $ward = $request->get('ward');
            $obj= $obj->where(function ($q) use ($ward) {
                foreach ($ward as $key => $id) {
                    $q->orWhere('ward', $id);
                }
            });
        }

        if ($request->has('theme')) {
            $theme = $request->get('theme');
            $obj= $obj->where(function ($q) use ($theme) {
                foreach ($theme as $key => $id) {
                    $q->orWhereRaw('FIND_IN_SET('.$id.',w_detail)');
                }
            });
        }

        if ($request->has('activity')) {
            $activity = $request->get('activity');
            $obj= $obj->where(function ($q) use ($activity) {
                foreach ($activity as $key => $id) {
                    $q->orWhere('activity_main', $id);
                }
            });
        }
        
        $lists = $obj->get();
        $html =' ';

        $root_url = url('/');
        $baseurl = $root_url.'/report/thematic-activity-search/';
        
        foreach($lists as $key => $list){
            $ingoName = '';
            if (!empty($projectAgrement = $list->projectAgreement)) {
                $activeYear = $projectAgrement->duration_from_month.' '.$projectAgrement->duration_from_year.' - '.$projectAgrement->duration_to_month.' '.$projectAgrement->duration_to_year;
                if (!empty($projectAgrement->ingo)) {
                    $ingoName = $projectAgrement->ingo->name;
                }
            }
            $html .= '<tr>
                        <td>'. ++$key .'</td>
                        <td>'. $ingoName  .'</td>
                        <td>'. $list->ngo  .'</td>
                        <td>'. (!empty($list->activityMain) ? $list->activityMain->name : '')  .'</td>
                        <td>'. \App\Models\Theme::thematicNames($list->w_detail) .'</td>
                        <td> NPR '. number_format($list->total_cost,2). '</td>
                        <td>'. $activeYear .'</td>
                    </tr>';
        }

            $table_starting = '<table class="table table-striped table-bordered datatbl_new">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>INGO Name</th>
                                            <th>NGO Name</th>
                                            <th>Activity (Main)</th>
                                            <th>Thematic Area</th>
                                            <th>Total Cost</th>
                                            <th>Active Year</th>
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
