<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\INGO;
use Auth;

class ProjectReportController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    
    public function index()
    {    
    	$ingos = INGO::get();
    	$ingosx = INGO::get();
    	return view('projectreport.index',compact('ingos','ingosx'));
    }

    public function filterSearch(Request $request)
    {
    	$obj = (new INGO)->newQuery(); 
       $user = Auth::user();
       
        if (!empty($request->get('ingo'))) {
            $ingo = $request->get('ingo');
            $obj->where('name','=', $ingo);
        }

        $importApproval = $obj->get();
        $html =' ';
        $root_url = url('/');
        $baseurl = $root_url.'/projectreport/';
        foreach($importApproval as $key => $imp){

            $key =$key+1;
           
            //starting of district
            

           
                $html .= '<tr>
                        <td>' . $imp->name .'</td>
                        <td>' . $imp->country .'</td>
                        <td>' .$imp->address .'</td>
                        <td>' .$imp->contact_no .'</td>
                        <td>' .$imp->contact_person .'</td>                       
                        <td>' .$imp->estd_date .'</td>                        
                        <td>' .$imp->staff_number .'</td>                        
                    </tr>';
            
        }

            $table_starting = '<table class="table table-striped table-bordered tbl_project_report c-blue">
                                    <thead>
                                        <tr>
                                         <th>INGO Name</th>
                        <th>Country</th>
                        <th>Address</th>
                         <th>Contact Name </th>
                         <th>Contact Person </th>
                         <th>Established Date </th>
                         <th>Staff Number</th>
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
