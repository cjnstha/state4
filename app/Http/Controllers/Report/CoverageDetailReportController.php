<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\NGO;
use App\Models\INGO;
use App\Models\MiscLgu;
use App\Models\MiscProvince;
use App\Models\MiscDistrict;
use App\WorkDetail;
use Illuminate\Http\Request;

class CoverageDetailReportController extends Controller
{
     public function __construct(){
        parent::__construct();
        $this->middleware('auth');
    }

    public function index(){
    	$ingos    = INGO::pluck('name','id');
        $ngos     = NGO::pluck('ngo_name');
    	return view('projectreport.coverage-detail-report.index', compact('ngos','ingos'));
    }

    public function filterSearch(Request $request)
    {
       $obj = (WorkDetail::leftJoin('projects','work_details.project_id','=','projects.id')->select('work_details.id','work_details.ngo','projects.ingo_name','work_details.province_id','work_details.district_id','work_details.lgu_id')); 

        if ($request->has('ingo_name')) {
            $ingo_name = $request->get('ingo_name');
            $obj->where('projects.ingo_name', $ingo_name);
        }

        if ($request->has('ngo_name')) {
            $ngo_name = $request->get('ngo_name');
            $obj->where('work_details.ngo', $ngo_name);
        }
        
        $lists = $obj->get();
        $html =' ';
        $root_url = url('/');
        $baseurl = $root_url.'/report/coverage-detail-report/';
        
        foreach($lists as $key => $list){
        	$ingo_name = INGO::where('id','=',$list->ingo_name)->first();
        	$province_name = MiscProvince::where('id','=',$list->province_id)->first();
            $district_name = MiscDistrict::where('id',$list->district_id)->first();
            $lgu_name = MiscLgu::where('id',$list->lgu_id)->first();
               


           $html .= '<tr>
                        <td>'. ++$key .'</td>
                        <td>'. $ingo_name->name  .'</td>
                        <td>'. $list->ngo  .'</td>
                        <td>'. $province_name->name.' '.$district_name->name.' '.$lgu_name->name.'</td>
                    </tr>';
           
        }

            $table_starting = '<table class="table table-striped table-bordered datatbl_new">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>INGO Name</th>
                                            <th>NGO Name</th>
                                            <th>Coverage Area</th>
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
