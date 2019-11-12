<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Project;
use App\Models\Districts;

use App\Models\Goal;  // for goal and related

class MediaController extends Controller
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
        $posts          = Media::all();
        $districts      = Districts::pluck('district_name','id');
        $projects       = Project::pluck('project_code', 'id');
        $p_other        = Media::pluck('p_others', 'p_others');
        $goals = Goal::pluck('goal','id'); 

        // $url = url()->current();
        //  echo public_path();
        //  echo url('/');
        // dd($url);

        return view('media.index', compact('posts','projects','districts','p_other', 'goals'));
    }




    public function filterSearch(Request $request)
    {
        // dd($request->all());
       $obj = (new Media)->newQuery();
    
        if ($request->has('district_id')) {
            $districts = $request->get('district_id');
           
        if(count($districts) != 0  ){
            
            $obj->where(function ($q) use ($districts) {
            foreach ($districts as $key => $district) {
                       // $q->orWhere("profiles.language", "LIKE", "%" . $language . "%");
                        $q->orWhere("media.district_id", $district);
                        $q->orWhere("media.district_id", "LIKE", $district . ",%");
                        $q->orWhere("media.district_id", "LIKE", "%," . $district);
                        $q->orWhere("media.district_id", "LIKE", "%, " . $district);
                        $q->orWhere("media.district_id", "LIKE", "%," . $district . ",%");
                        $q->orWhere("media.district_id", "LIKE", "%, " . $district . ",%");
                }
               });
               
              }
        }

      
        if ($request->has('project_code')) {
            $project_code = $request->get('project_code');
            $obj->where('project_id',$project_code);
        }

        if ($request->has('station')) {
            $station = $request->get('station');
            $obj->where('station',$station);
        }

        if ($request->has('p_type')) {
            $p_type = $request->get('p_type');
            $obj->where('p_type',$p_type);
        }

           if ($request->has('p_others')) {
            $p_others = $request->get('p_others');
            $obj->where('p_others',$p_others);
        }
    

        if ($request->has('quarter')) {
            $quarter = $request->get('quarter');
            $obj->where('quarter', $quarter);
        }

        if ($request->has('quarter_year')) {
            $quarter_year = $request->get('quarter_year');
              // $obj->where('quarter_year', '>' , $quarter_year);
            $obj->where('quarter_year', $quarter_year);
        }

        $projects = $obj->get();
        
        // dd($projects);
         $html =' ';
        // $baseurl = "http://192.168.0.155/sfcgdbms/public/media/";


        // $newurl = $baseurl;
          $root_url = url('/');
        $baseurl = $root_url.'/media/';
        
         // $baseurl = url('/');
         // $newurl = $baseurl .'/media/';
        // $baseurl = "http://localhost/sfcgdbms/public/media/";

         // dd($newurl);
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($projects as $key => $project){

            $key =$key+1;
           
            //starting of district
            if($project->district_id != ''){
                $dist_exp = explode(',', $project->district_id); 

                // dd($dist_exp);
                $dis_array = array();

                foreach($dist_exp as $dist)
                {
                   $distname = \DB::table('districts')->select('district_name')->where('id',$dist)->first();
                   array_push($dis_array, $distname->district_name); 
                }

                $districts = implode(',<br>', $dis_array);
            }
           //end of districts

        
            if($project->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $project->quarter_year" ;   }
            if($project->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $project->quarter_year "; }
            if($project->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $project->quarter_year";   }
            if($project->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $project->quarter_year "; }
 
                 $b_date =  $project->b_date;
                $broad_date = strtotime($b_date);

                 foreach($project_code_list as $id=>$pro_c){
                     // dd($id, $project_code->project_id);
                            if($id == $project->project_id) { 
                                
                                // dd($project_code->project_code, $project_code->project_id);
                                $projectcode = $pro_c;
                            }
                 }


            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $project->p_type  .'</td>
                        <td>'. $projectcode .'</td>
                        <td>'.   $districts  .'</td>
                        <td>'. $project->station .'</td>
                        <td>'. $project->ep_num .'</td>
                        <td>'.  date(' F jS, Y',$broad_date) .'</td>
                        <td>'. $quarter_n_year  .'</td>
                        <td>'. '<a href="'. $baseurl . $project->id.'/edit" class="action-btns"> 
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

            $table_starting = '<table class="table table-striped table-bordered datatbl_new">
                                    <thead>
                                        <tr>
                                           <th>ID</th>
                                            <th>Program Type</th>
                                            <th>Project Code</th>
                                            <th>District</th>
                                            <th>Station</th>
                                            <th>Episode <br> Number </th> 
                                            <th>Broadcast Date</th> 
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
        
        return $data;
     }

    public function filterSearch2(Request $request)
    {
       $obj = (new Media)->newQuery();
    
        if ($request->has('goal_id')) {
            $goal_id = $request->get('goal_id');
            $obj->where('goal_id', $goal_id);
        }

        if ($request->has('output_id')) {
            $output_id = $request->get('output_id');
            $obj= $obj->where(function ($q) use ($output_id) {
                foreach ($output_id as $key => $id) {
                    $q->orWhereRaw('FIND_IN_SET('.$id.',output_id)');
                }
            });
        }

        if ($request->has('indicator_id')) {
            $indicator_id = $request->get('indicator_id');
             $obj= $obj->where(function ($q) use ($indicator_id) {
                foreach ($indicator_id as $key => $id) {
                    $q->orWhereRaw('FIND_IN_SET('.$id.',indicator_id)');
                }
            });
        }

        if ($request->has('activity_id')) {
            $activity_id = $request->get('activity_id');
            $obj= $obj->where(function ($q) use ($activity_id) {
                foreach ($activity_id as $key => $id) {
                    $q->orWhereRaw('FIND_IN_SET('.$id.',activity_id)');
                }
            });
        }
        
        $projects = $obj->get();
        
         $html =' ';

          $root_url = url('/');
        $baseurl = $root_url.'/media/';
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($projects as $key => $project){

            $key =$key+1;
           
            //starting of district
            if($project->district_id != ''){
                $dist_exp = explode(',', $project->district_id); 

                // dd($dist_exp);
                $dis_array = array();

                foreach($dist_exp as $dist)
                {
                   $distname = \DB::table('districts')->select('district_name')->where('id',$dist)->first();
                   array_push($dis_array, $distname->district_name); 
                }

                $districts = implode(',<br>', $dis_array);
            }
           //end of districts

        
            if($project->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $project->quarter_year" ;   }
            if($project->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $project->quarter_year "; }
            if($project->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $project->quarter_year";   }
            if($project->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $project->quarter_year "; }
 
                 $b_date =  $project->b_date;
                $broad_date = strtotime($b_date);

                 foreach($project_code_list as $id=>$pro_c){
                            if($id == $project->project_id) { 
                                
                                $projectcode = $pro_c;
                            }
                 }


            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $project->p_type  .'</td>
                        <td>'. $projectcode .'</td>
                        <td>'.   $districts  .'</td>
                        <td>'. $project->station .'</td>
                        <td>'. $project->ep_num .'</td>
                        <td>'.  date(' F jS, Y',$broad_date) .'</td>
                        <td>'. $quarter_n_year  .'</td>
                        <td>'. '<a href="'. $baseurl . $project->id.'/edit" class="action-btns"> 
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

            $table_starting = '<table class="table table-striped table-bordered datatbl_new">
                                    <thead>
                                        <tr>
                                           <th>ID</th>
                                            <th>Program Type</th>
                                            <th>Project Code</th>
                                            <th>District</th>
                                            <th>Station</th>
                                            <th>Episode <br> Number </th> 
                                            <th>Broadcast Date</th> 
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
        
        return $data;
     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $districts = Districts::all();
        $districts = Districts::pluck('district_name','district_id');
        $projects = Project::pluck('project_code', 'id');

         $goals = Goal::pluck('goal','id'); /* for goal and related*/
        
        // dd($districts);
        return view('media.create',compact('districts','projects','goals'));
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
            'district_id' => 'required',
            'station' => 'required',
            'p_type' => 'required',
            'ep_num' => 'required',
            'b_date' => 'required',
            'p_date' => 'required',
            'in_guest' => 'required',
            'benef' => 'required',
            'p_aff' => 'required',
            'theme' => 'required',
            'produce_by' => 'required',
            'url' => 'required',
            'language' => 'required',
            'project_id' => 'required',
            'braodcast' => 'required',
            'boardcast_air_date' => 'required',
            'braodcast_by' => 'required',
            'quarter'       => 'required',
            'quarter_year'  => 'required',
            // 'objectives' => 'required',
            // 'keywords' => 'required',
        ]);
         $inputs = $request->all();

        $inputs['district_id'] = implode(",", $inputs['district_id']);
             //goal realted
        $inputs['indicator_id']    = implode(",",$inputs['indicator_id']);
        $inputs['output_id']       = implode(",",$inputs['output_id']);
        $inputs['activity_id']     = implode(",",$inputs['activity_id']);


        // dd($inputs);

        Media::create($inputs);
        return redirect()->route('media.index')->withFlashSuccess('Media has been added successfully.');
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
    public function edit($id)
    {   
        $data['posts'] = Media::findOrFail($id);
        $data['districts'] = Districts::pluck('district_name','district_id');
         $data['district_id']      = explode(",", $data['posts']->district_id);

         // dd($district_id, $districts);
         $data['projects'] = Project::pluck('project_code', 'id');

                  //goal realted
          $goalid = $data['posts']->goal_id;
        $data['allgoalreports'] =GoalReportController::Goalreportforedit($goalid);
        $data['indicator_exp'] = explode(",", $data['posts']->indicator_id);
        $data['output_exp'] = explode(",", $data['posts']->output_id);
        $data['activity_exp'] = explode(",", $data['posts']->activity_id);
        $data['goals'] = Goal::pluck('goal','id');

        
        //$districts = Districts::pluck('district_name','district_id');
        
        return view('media.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'district_id' => 'required',
            'station' => 'required',
            'p_type' => 'required',
 
            'ep_num' => 'required',
            'b_date' => 'required',
            'p_date' => 'required',
            'in_guest' => 'required',
            'benef' => 'required',
            'p_aff' => 'required',
            'theme' => 'required',
            'produce_by' => 'required',
            'url' => 'required',
            'language' => 'required',
            'project_id' => 'required',
            'braodcast' => 'required',
            'boardcast_air_date' => 'required',
            'braodcast_by' => 'required',
            'quarter'       => 'required',
            'quarter_year'  => 'required',
            // 'objectives' => 'required',
            // 'keywords' => 'required',
        ]);

          $inputs = $request->all();

        $inputs['district_id'] = implode(",", $inputs['district_id']);
          //goal realted
        $inputs['indicator_id']    = implode(",",$inputs['indicator_id']);
        $inputs['output_id']       = implode(",",$inputs['output_id']);
        $inputs['activity_id']     = implode(",",$inputs['activity_id']);


        $media = Media::findOrFail($id);
        // dd($inputs);
        $media->update($inputs);
        return redirect()->route('media.edit', $id)->withFlashSuccess('Media profile is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Media::destroy($id);
        return redirect()->route('media.index')->withFlashSuccess('Media profile is deleted successfully.');
    }
}
