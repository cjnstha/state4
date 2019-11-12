<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Auth;
use App\Models\ChecklistMgmt;
use App\Models\VisaRecommendation;
use App\Models\VisaDateRange;
use App\Models\GeneralAgreement;
use App\Models\Expatriate;
use App\Models\INGO;
use App\Http\Requests\Backend\VisaRecommendation\CreateVisaRecommendationRequest;
use App\Http\Requests\Backend\VisaRecommendation\EditVisaRecommendationRequest;
use App\Http\Requests\Backend\VisaRecommendation\DeleteVisaRecommendationRequest;

class VisaRecommendationController extends Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    
    public function index(){
    	$info     = VisaRecommendation::get();
    	$projects = Project::get();
        $general  = GeneralAgreement::get();
        $ingos    = INGO::get();
    	return view('visa_recommendation.index',compact('info','projects','general','ingos'));
    }

    

     public function filterSearch(Request $request)
    {

       $obj = (new VisaRecommendation)->newQuery(); 
       $user = Auth::user();
       if($user->hasRole('Admin'))
       {
         if ($request->has('exp_name')) {
            $exp_name = $request->get('exp_name');
            $exp = Expatriate::where('name',$exp_name)->first();
            $obj->where('exp_name', $exp->id);
        }

        if ($request->has('duration_from')) {
            $duration_from = $request->get('duration_from');
            $obj->where('recco_from', $duration_from);
        }

        if ($request->has('duration_to')) {
            $duration_to = $request->get('duration_to');
            $obj->where('recco_to', $duration_to);
        }

        if ($request->has('ga_code')) {
            $ga_code = $request->get('ga_code');
            $obj->where('general_agreement_id',$ga_code);
        }

        if ($request->has('pro_code')) {
            $pro_code = $request->get('pro_code');
            $obj->where('project_id',$pro_code);
        }

        if ($request->has('ingo_id')) {
            $ingo_id = $request->get('ingo_id');
            $obj->where('ingo_id',$ingo_id);
        }
       }
       else
       {
         if ($request->has('exp_name')) {
            $exp_name = $request->get('exp_name');
            $exp = Expatriate::where('name',$exp_name)->first();
            $obj->where('exp_name', $exp->id);
        }

        if ($request->has('duration_from')) {
            $duration_from = $request->get('duration_from');
            $obj->where('recco_from', $duration_from);
        }

        if ($request->has('duration_to')) {
            $duration_to = $request->get('duration_to');
            $obj->where('recco_to', $duration_to);
        }

        if ($request->has('ga_code')) {
            $ga_code = $request->get('ga_code');
            $obj->where('general_agreement_id',$ga_code);
        }

        if ($request->has('pro_code')) {
            $pro_code = $request->get('pro_code');
            $obj->where('project_id',$pro_code);
        }

        if ($request->has('ingo_id')) {
            $ingo_id = $request->get('ingo_id');
            $obj->where('ingo_id',$ingo_id);
        }
       }


        
        $importApproval = $obj->get();
        $html =' ';
        $root_url = url('/');
        $baseurl = $root_url.'/visa/';
        foreach($importApproval as $key => $imp){

            $key =$key+1;
           
            //starting of district
            

            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $imp->expatriate->designation .'</td>
                        <td>'. $imp->person_name .'</td>
                        <td> ' .$imp->relation .'</td>
                        <td>'. '<a href="'. $baseurl .'edit/'. $imp->id.'" class="action-btns"> 
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <form method="GET" action="'. $baseurl .'delete/'. $imp->id.'">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="'.$request->get('_token').'">
                                    <a href="javascript:void(0);" class="action-btns submit">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    <a target="_blank" href="'. $baseurl .'preview/'. $imp->id.'" class="action-btns"> 
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                                </form>
                        </td>
                    </tr>';
        }

            $table_starting = '<table class="table table-striped table-bordered tbl_visa">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Designation</th>
                                            <th> Name</th>
                                            <th>Realation</th>
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

    public function create(CreateVisaRecommendationRequest $request){
    	$projects          = Project::get();
        $general_agreement = GeneralAgreement::all();
    	$checklists        = ChecklistMgmt::get();
        $relations         = ['Own','Spouse','Child','Parents'];
        $ingos             = INGO::get();
    	return view('visa_recommendation.create',compact('projects','checklists','general_agreement','relations','ingos'));
    }

    public function store(CreateVisaRecommendationRequest $request){
    	$this->validate($request,[
            
        ]);
        $request->all();
        $data['general_agreement_id'] = $request->ga_id;
        $data['project_id'] = $request->project_id;
        $data['exp_name'] = $request->exp_id;
        $data['person_name'] = $request->person_name;
        $data['relation'] = $request->relation;
        $data['recco_from'] = $request->visa_from;
        $data['ingo_id'] = $request->ingo_id;
        $data['recco_to'] = $request->visa_to;
        $data['hm_date'] = $request->hm_agree_date;
        $data['visa_date'] = $request->visa_recom_date;
        $data['sw_date'] = $request->swc_date;
        VisaRecommendation::create($data);
        return redirect()->route('visa.index')->withFlashSuccess('Visa Recommendation has been added successfully.');
    }

    public function delete(DeleteVisaRecommendationRequest $request, $id){
    	$find = VisaRecommendation::findOrFail($id);
    	$find->delete();
    	return redirect()->route('visa.index')->withFlashSuccess('Visa Recommendation has been deleted successfully.');
    }

    public function edit(EditVisaRecommendationRequest $request, $id){
    	$find = VisaRecommendation::findOrFail($id);
        $user = Auth::user();
        $project_date = $find->created_at;
        $pro_date     = explode(' ', $project_date);
        $today        = date('Y-m-d');
        $prodate      = strtotime($pro_date[0]);
        $today        = strtotime($today);
        $calc         = $today-$prodate;
    	if($user->hasRole('Admin'))
        {
          $general_agreement = GeneralAgreement::all();
          $projects = Project::get();
          $expatriate = Expatriate::get();
          $expdetail = Expatriate::where('id','=',$find->exp_name)->first();
          $relations = ['Own','Spouse','Child','Parents'];
          $ingos     = INGO::get();
          return view('visa_recommendation.edit',compact('find','general_agreement','relations','projects','expatriate','expdetail','ingos'));
        }
        else
        {
            if($calc <= '07')
            {
                $general_agreement = GeneralAgreement::all();
                $projects = Project::get();
                $expatriate = Expatriate::get();
                $expdetail = Expatriate::where('id','=',$find->exp_name)->first();
                $relations = ['Own','Spouse','Child','Parents'];
                $ingos     = INGO::get();
                return view('visa_recommendation.edit',compact('find','general_agreement','relations','projects','expatriate','expdetail','ingos'));
            }
            else
            {
                return redirect()->route('visa.index')->withFlashSuccess('Visa Recommendation cannot be edited');
            }
        }
    }

    public function update(EditVisaRecommendationRequest $request, $id){
    	$this->validate($request,[
            
        ]);
        $data = VisaRecommendation::findOrFail($id);
    	$data['general_agreement_id'] = $request->ga_id;
        $data['project_id'] = $request->project_id;
        $data['ingo_id'] = $request->ingo_id;
        $data['exp_name'] = $request->exp_id;
        $data['person_name'] = $request->person_name;
        $data['relation'] = $request->relation;
        $data['recco_from'] = $request->visa_from;
        $data['recco_to'] = $request->visa_to;
        $data['hm_date'] = $request->hm_agree_date;
        $data['visa_date'] = $request->visa_recom_date;
        $data['sw_date'] = $request->swc_date;
        $data->save();        
        return redirect()->route('visa.index')->withFlashSuccess('Visa Recommendation has been updated successfully.');

    }

    public function preview(Request $request , $id)
    {
        $find = VisaRecommendation::findOrFail($id);
        $general_agreement = GeneralAgreement::all();
        $projects = Project::get();
        $expatriate = Expatriate::get();
        $expdetail = Expatriate::where('id','=',$find->exp_name)->first();
        $relations = ['Own','Spouse','Child','Parents'];
        return view('visa_recommendation.preview',compact('find','general_agreement','relations','projects','expatriate','expdetail'));
    }
}
