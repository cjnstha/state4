<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\ProStat;
use App\Models\Districts;
use App\Project;
use App\Models\Activity;
use App\Models\MiscProvince;
use App\Models\MiscDistrict;
use App\Models\MiscLgu;
use App\Models\State;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Backend\Prostat\CreateProstatRequest;
use App\Http\Requests\Backend\Prostat\EditProstatRequest;
use App\Http\Requests\Backend\Prostat\DeleteProstatRequest;
use Auth;

class ProStatController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = ProStat::all();
        $project_code = Project::pluck('project_code', 'id');
        $provinces  = MiscProvince::pluck('name','id');

        return view('prostat.index', compact('posts','project_code','provinces'));
    }

    public function filterSearch(CreateProstatRequest $request)
    {
       $obj = (new ProStat)->newQuery();
    
        if ($request->has('project_code')) {
            $project_code = $request->get('project_code');
            $obj->where('project_code',$project_code);
        }

        if ($request->has('province_id')) {
            $province_id = $request->get('province_id');
            $obj= $obj->where(function ($q) use ($province_id) {
                foreach ($province_id as $key => $id) {
                    $q->orWhereRaw('FIND_IN_SET('.$id.',province_id)');
                }
            });
        }

        if ($request->has('district_id')) {
            $district_id = $request->get('district_id');
            $obj= $obj->where(function ($q) use ($district_id) {
                foreach ($district_id as $key => $id) {
                    $q->orWhereRaw('FIND_IN_SET('.$id.',district_id)');
                }
            });
        }

        if ($request->has('lgu_id')) {
            $lgu_id = $request->get('lgu_id');
            $obj= $obj->where(function ($q) use ($lgu_id) {
                foreach ($lgu_id as $key => $id) {
                    $q->orWhereRaw('FIND_IN_SET('.$id.',lgu_id)');
                }
            });
        }

        
        $lists = $obj->get();
        // print_r($projects);
        // die();
         $html =' ';

          $root_url = url('/');
        $baseurl = $root_url.'/prostat/';
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($lists as $key => $list){

            $key =$key+1;
           
           //  //starting of district
           //  if($list->district_id != ''){
           //      $dist_exp = explode(',', $list->district_id); 

           //      // dd($dist_exp);
           //      $dis_array = array();

           //      foreach($dist_exp as $dist)
           //      {
           //         $distname = \DB::table('districts')->select('district_name')->where('id',$dist)->first();
           //         array_push($dis_array, $distname->district_name); 
           //      }

           //      $districts = implode(',<br>', $dis_array);
           //  }
           // //end of districts

            $projectcode = '';
            foreach($project_code_list as $id=>$pro_c){
                        if($id == $list->project_code) { 
                            
                            $projectcode = $pro_c;
                        }
            }

            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $projectcode .'</td>
                        <td>'. '<a href="'. $baseurl . $list->id.'/edit" class="action-btns"> 
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <form method="POST" action="'. $baseurl . $list->id.'">
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
                                            <th>Project Code</th>
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $activity = Activity::pluck('name', 'id');
         $project_code = Project::pluck('project_code', 'id');

        $provinces  = MiscProvince::pluck('name','id');

        return view('prostat/create', compact('activity','project_code','provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProstatRequest $request){
            // dd($request->all());
        $this->validate($request,[
            'project_code' => 'required',
            // 'act_type' => 'required',
            // 'act_others' => 'required',
            'out_put' => 'required',
            'planned_date' => 'required',
            'pb_total' => 'required|numeric',
            // 'district_id' => 'required',
            'unitQ' => 'required',
            't_target' => 'required',
            'comp_before' => 'required',
            'target_yr' => 'required',
            'remaining' => 'required',
            // 'p_date' => 'required',
            ]);

            $input = Input::all();
 
             $input['act_type']= implode(",",$input['act_type']);

            $input['province_id']   = implode(",",$input['province_id']);
            $input['district_id']   = implode(",",$input['district_id']);
            $input['lgu_id']   = implode(",",$input['lgu_id']);
           
            $event = ProStat::create($input);
        
           return redirect()->route('prostat.index')->withFlashSuccess('Project Stauts has been added successfully.');

        //Project::create($request->all());
       // return redirect()->route('home')->with('message','Project has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditProstatRequest $request, $id)
    {
        $activity = Activity::pluck('name', 'id');
        $project_code = Project::pluck('project_code', 'id');
       
        $pageheader ="Edit Project Status";
        $posts = ProStat::findOrFail($id);

        $act_type_id      = explode(",", $posts->act_type);

        $provinces  = MiscProvince::pluck('name','id');
        $province_id_exp = explode(",",$posts->province_id);
        $districts = MiscDistrict::where(function ($query) use($province_id_exp) {
            foreach ($province_id_exp as $key => $value) {
                $query->orwhere('province_id', $value);
            }
          })->pluck('name', 'id');

        $district_id_exp = explode(",",$posts->district_id);
        $lgus = MiscLgu::where(function ($query) use($district_id_exp) {
            foreach ($district_id_exp as $key => $value) {
                $query->orwhere('district_id', $value);
            }
          })->pluck('name', 'id');

        $lgu_id_exp = explode(",",$posts->lgu_id);

  
        return view('prostat.edit', compact('posts', 'pageheader','activity','project_code','act_type_id', 'provinces', 'districts', 'lgus', 'province_id_exp', 'district_id_exp', 'lgu_id_exp'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, EditProstatRequest $request)
    {   
        $pro = ProStat::findOrFail($id);

        $loginUser = Auth::user();
        if ((!$loginUser->hasRole('Admin')) && $pro->user_id != $loginUser->id) {
            return redirect()->back()->withFlashDanger('You don\'t have access to edit this.');
        }
        
        $this->validate($request,[
            'project_code' => 'required',
            // 'act_type' => 'required',
            // 'act_others' => 'required',
            'out_put' => 'required',
            'planned_date' => 'required',
            'pb_total' => 'required|numeric',
            // 'district_id' => 'required',
            'unitQ' => 'required',
            't_target' => 'required',
            'comp_before' => 'required',
            'target_yr' => 'required',
            'remaining' => 'required',
            // 'p_date' => 'required',         
        ]);
       
        $input = Input::all();

        $input['act_type']= implode(",",$input['act_type']);

        $input['province_id']   = implode(",",$input['province_id']);
        $input['district_id']   = implode(",",$input['district_id']);
        $input['lgu_id']   = implode(",",$input['lgu_id']);

        $pro->update($input);
        
//       
        return redirect()->route('prostat.edit', $id)->withFlashSuccess('Project Stauts is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteProstatRequest $request, $id)
    {
        $event = ProStat::findOrFail($id);
        $loginUser = Auth::user();
        if ((!$loginUser->hasRole('Admin')) && $event->user_id != $loginUser->id) {
            return redirect()->back()->withFlashDanger('You don\'t have access to delete this.');
        }
        $event->delete();
        
        return redirect('prostat');
    }
}
