<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Benef;
use App\Models\Zone;
use App\Models\Districts;
use App\Project;
use App\Models\Activity;
use App\Models\Caste;
use App\Models\Identity;
use App\Models\Benef_Identity_Group;
use App\Models\Benef_Caste_Group;
use App\Models\Goal;


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;


class BenefController extends Controller
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
        $data['posts']= Benef::all();

        // $data['posts_individual']= Benef::where('benef_type','Individual')->get();

        // $data['posts_group']= Benef::where('benef_type','Group')->get();

         //age-group
        $data['age_below_15'] = Benef::sum('age_below_15');
        $data['age_15_29'] = Benef::sum('age_15_29');
        $data['age_30_45'] = Benef::sum('age_30_45');
        $data['age_45_above'] = Benef::sum('age_45_above');

        //gender
        $data['gender_male'] = Benef::sum('gender_male');
        $data['gender_female'] = Benef::sum('gender_female');
        $data['gender_others'] = Benef::sum('gender_others');


        $data['identity']= Identity::pluck('name','id');
        $data['caste']= Caste::pluck('name','id');

        // dd($data['posts_individual']);

         // $identity_count = Benef_Identity_Group::where('identity_id',1)->sum('identity_value');

        foreach($data['identity'] as $id=>$name ) {  
                  $data['identity_count'][$name] = Benef_Identity_Group::where('identity_id',$id)->sum('identity_value');
          }
        
        foreach($data['caste'] as $id=>$name ) {  
                  $data['caste_count'][$name] = Benef_Caste_Group::where('caste_eth_id',$id)->sum('cast_eth_value');
             }

        $data['identity_total'] = Benef_Identity_Group::sum('identity_value');
        $data['caste_total'] = Benef_Caste_Group::sum('cast_eth_value');

                  // $identity_count[$name] = Benef_Identity_Group::where('identity_id',$id)->sum('identity_value');
        // dd($data);
        // Others

        $project_codes  = Project::pluck('project_code','id');
        $goals = Goal::pluck('goal','id');
  
        return view('benef.index', $data)->with('project_codes', $project_codes)->with('goals', $goals);
    }


    public function filterSearch(Request $request)
    {
       $obj = (new Benef)->newQuery();
    
        if ($request->has('quarter')) {
            $quarter = $request->get('quarter');
            $obj->where('quarter', $quarter);
        }

        if ($request->has('project_code')) {
            $project_code = $request->get('project_code');
            $obj->where('project_id',$project_code);
        }

        if ($request->has('quarter_year')) {
            $quarter_year = $request->get('quarter_year');
            $obj->where('quarter_year', $quarter_year);
        }
        
        $lists = $obj->get();
        // print_r($projects);
        // die();
         $html =' ';

          $root_url = url('/');
        $baseurl = $root_url.'/benef/';
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($lists as $key => $list){

            $key =$key+1;
           
            //starting of district
            if($list->district_id != ''){
                $dist_exp = explode(',', $list->district_id); 

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
        
            if($list->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $list->quarter_year" ;   }
            if($list->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $list->quarter_year "; }
            if($list->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $list->quarter_year";   }
            if($list->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $list->quarter_year "; }
 
                 $b_date =  $list->b_date;
                $broad_date = strtotime($b_date);

                 foreach($project_code_list as $id=>$pro_c){
                            if($id == $list->project_id) { 
                                
                                $projectcode = $pro_c;
                            }
                 }


                    // $benef_exp = explode(',', $list->benef_id);
                    // foreach($benef_exp as $new_benef_id) {
                    //     $benefname = \DB::table('benef')->select('name')->where('id',$new_benef_id)->first();
                    //     if(!empty($benefname)){
                    //         $url = url('/benef/'.$new_benef_id .'/edit');
                    //        $text = '<a class="link-anchor" href="'.$url.'">'.$benefname->name.'</a>'; 
                    //     }
                    // }

                    if ($list->age_below_15 != '' || $list->age_below_15 != 0){   
                      $agegroup = 'Below 15 :'. $list->age_below_15 .'<br>';
                    }
                    if ($list->age_15_29 != '' || $list->age_15_29 != 0){ 
                      $agegroup = '15-29 :'. $list->age_15_29 .' <br>';
                    }
                    if ($list->age_30_45 != '' || $list->age_30_45 != 0){  
                      $agegroup = '30-45 :'. $list->age_30_45.'<br>';
                    }
                    if ($list->age_45_above != '' || $list->age_45_above != 0){  
                      $agegroup = '45-Above :'.$list->age_45_above.'<br>' ;
                    }else{
                      $agegroup = '';
                    }

                    if ($list->gender_male != '' || $list->gender_male != 0){
                      $genderGroup = 'Male:'. $list->gender_male.'<br>';
                    }
                    if ($list->gender_female != '' || $list->gender_female != 0){
                      $genderGroup = 'Female:'. $list->gender_female.'<br>';
                    }
                    if ($list->gender_others != '' || $list->gender_others != 0){
                      $genderGroup = 'Others:'. $list->gender_others.'<br>';
                    }else{
                      $genderGroup = '';
                    }

                    $castes = Caste::pluck('name','id');
                    $casteGroup = '';
                    if (count($castes) > 0) {
                      foreach ($castes as $id => $name){
                             $value = \DB::table('benef_caste_eth_if_group')
                                                      ->select('cast_eth_value')
                                                      ->where('benef_id',$list->id)
                                                      ->where('caste_eth_id',$id)
                                                      ->first();
                          if (!empty($value)) {
                            if(isset($value->cast_eth_value)){
                              $casteGroup .= $name .':'.$value->cast_eth_value.', ';
                            }
                          }
                      }
                    }

                    $identityGroup = '';
                    $identity = Identity::pluck('name','id');
                    foreach($identity as $id => $name){
                      $value = \DB::table('benef_identity_if_group')
                                                        ->select('identity_value')
                                                        ->where('benef_id',$list->id)
                                                        ->where('identity_id',$id)
                                                        ->first();
                      if(!empty($value))
                      {
                        $identityGroup .= $name .':'.$value->identity_value.', ';
                      }
                    }

            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $list->name  .'</td>
                        <td>'. $list->benef_type  .'</td>
                        <td>'. $list->age  .'</td>
                        <td>'. $agegroup  .'</td>
                        <td>'. $list->gender  .'</td>
                        <td>'. $genderGroup  .'</td>
                        <td>'. (isset($list->castes)? $list->castes->name : '') .'</td>
                        <td>'. $casteGroup .'</td>
                        <td>'. (isset($list->identities)? $list->identities->name : '') .'</td>
                        <td>'. $identityGroup .'</td>
                        <td>'. (isset($list->activity)? $list->activity->name : '') .'</td>
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
                                            <th>Name</th>
                                            <th>Group/Individual</th>
                                            <th>Age</th>
                                            <th>Age Group</th>                   
                                            <th>Gender</th>
                                            <th>Group - Gender</th> 
                                            <th>Caste</th>
                                            <th>Group - Caste</th>
                                            <th>Identity</th>
                                            <th>Group - Identity</th>
                                            <th>Activity</th> 
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
       $obj = (new Benef)->newQuery();
    
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
        
        $lists = $obj->get();
        // print_r($projects);
        // die();
         $html =' ';

          $root_url = url('/');
        $baseurl = $root_url.'/benef/';
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($lists as $key => $list){

            $key =$key+1;
           
            //starting of district
            if($list->district_id != ''){
                $dist_exp = explode(',', $list->district_id); 

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
        
            if($list->quarter == 1){
               $quarter_n_year = "1<sup>st</sup> Quarter, $list->quarter_year" ;   }
            if($list->quarter == 2) {
               $quarter_n_year = "2<sup>nd</sup>  Quarter, $list->quarter_year "; }
            if($list->quarter == 3){
               $quarter_n_year = "3<sup>rd</sup>  Quarter, $list->quarter_year";   }
            if($list->quarter == 4){
                $quarter_n_year = "4<sup>th</sup>  Quarter, $list->quarter_year "; }
 
                 $b_date =  $list->b_date;
                $broad_date = strtotime($b_date);

                 foreach($project_code_list as $id=>$pro_c){
                            if($id == $list->project_id) { 
                                
                                $projectcode = $pro_c;
                            }
                 }


                    // $benef_exp = explode(',', $list->benef_id);
                    // foreach($benef_exp as $new_benef_id) {
                    //     $benefname = \DB::table('benef')->select('name')->where('id',$new_benef_id)->first();
                    //     if(!empty($benefname)){
                    //         $url = url('/benef/'.$new_benef_id .'/edit');
                    //        $text = '<a class="link-anchor" href="'.$url.'">'.$benefname->name.'</a>'; 
                    //     }
                    // }

                    if ($list->age_below_15 != '' || $list->age_below_15 != 0){   
                      $agegroup = 'Below 15 :'. $list->age_below_15 .'<br>';
                    }
                    if ($list->age_15_29 != '' || $list->age_15_29 != 0){ 
                      $agegroup = '15-29 :'. $list->age_15_29 .' <br>';
                    }
                    if ($list->age_30_45 != '' || $list->age_30_45 != 0){  
                      $agegroup = '30-45 :'. $list->age_30_45.'<br>';
                    }
                    if ($list->age_45_above != '' || $list->age_45_above != 0){  
                      $agegroup = '45-Above :'.$list->age_45_above.'<br>' ;
                    }else{
                      $agegroup = '';
                    }

                    if ($list->gender_male != '' || $list->gender_male != 0){
                      $genderGroup = 'Male:'. $list->gender_male.'<br>';
                    }
                    if ($list->gender_female != '' || $list->gender_female != 0){
                      $genderGroup = 'Female:'. $list->gender_female.'<br>';
                    }
                    if ($list->gender_others != '' || $list->gender_others != 0){
                      $genderGroup = 'Others:'. $list->gender_others.'<br>';
                    }else{
                      $genderGroup = '';
                    }

                    $castes = Caste::pluck('name','id');
                    $casteGroup = '';
                    if (count($castes) > 0) {
                      foreach ($castes as $id => $name){
                             $value = \DB::table('benef_caste_eth_if_group')
                                                      ->select('cast_eth_value')
                                                      ->where('benef_id',$list->id)
                                                      ->where('caste_eth_id',$id)
                                                      ->first();
                          if (!empty($value)) {
                            if(isset($value->cast_eth_value)){
                              $casteGroup .= $name .':'.$value->cast_eth_value.', ';
                            }
                          }
                      }
                    }

                    $identityGroup = '';
                    $identity = Identity::pluck('name','id');
                    foreach($identity as $id => $name){
                      $value = \DB::table('benef_identity_if_group')
                                                        ->select('identity_value')
                                                        ->where('benef_id',$list->id)
                                                        ->where('identity_id',$id)
                                                        ->first();
                      if(!empty($value))
                      {
                        $identityGroup .= $name .':'.$value->identity_value.', ';
                      }
                    }

            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $list->name  .'</td>
                        <td>'. $list->benef_type  .'</td>
                        <td>'. $list->age  .'</td>
                        <td>'. $agegroup  .'</td>
                        <td>'. $list->gender  .'</td>
                        <td>'. $genderGroup  .'</td>
                        <td>'. (isset($list->castes)? $list->castes->name : '') .'</td>
                        <td>'. $casteGroup .'</td>
                        <td>'. (isset($list->identities)? $list->identities->name : '') .'</td>
                        <td>'. $identityGroup .'</td>
                        <td>'. (isset($list->activity)? $list->activity->name : '') .'</td>
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
                                            <th>Name</th>
                                            <th>Group/Individual</th>
                                            <th>Age</th>
                                            <th>Age Group</th>                   
                                            <th>Gender</th>
                                            <th>Group - Gender</th> 
                                            <th>Caste</th>
                                            <th>Group - Caste</th>
                                            <th>Identity</th>
                                            <th>Group - Identity</th>
                                            <th>Activity</th> 
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
        $zones = Zone::pluck('zone_name', 'zone_id');

         $districts  = Districts::all();
         $activity= Activity::pluck('name','id');
        $caste= Caste::pluck('name','id');
        $identity= Identity::pluck('name','id');
        $donor_codes= Project::pluck('donor_code','id');
        $goals = Goal::pluck('goal','id');

        $projects = Project::pluck('project_code','id');

        // dd($caste, $identity);
        return view('benef/create', compact('donor_codes', 'districts','activity','caste','identity','goals', 'projects'));
    }

    public function create_form_show_in_training()
    {
        $zones = Zone::pluck('zone_name', 'zone_id');

         $districts  = Districts::all();
         $activity= Activity::pluck('name','id');
        $caste= Caste::pluck('name','id');
        $identity= Identity::pluck('name','id');
        $donor_codes= Project::pluck('donor_code','id');

         // return view('benef/create_call_from_training', compact('donor_codes', 'districts','activity','caste','identity'));
     
         $html = view('benef/create_call_from_training', compact('donor_codes', 'districts','activity','caste','identity'))->render(); 

        return response()->json(array('success' => 'Uploaded.', 'html' => $html));

       }


      
    public function storeForTraining(Request $request)
    {


      //   echo "test"; 
      // die();
       // return response()->json(array('success' => 'Uploaded', 'html' => 'test'));
        // dd($request->all(), 'storeForTraining');
           $input = $request->all();
           // print_r($input);
           // die;
        // dd($input);

        $validator= $this->validate($request,[
            'name'          => 'required',
            // 'age'           => 'required',
            // 'gender'        => 'required',
            // 'identity'      => 'required',
             // 'benef_type'   => 'required',
            // 'caste'         => 'required',
            // 'organization'  => 'required',
            // 'designation'   => 'required',
            // 'c_number'      => 'required',
            // 'email'         => 'required',
            // 'district_id'   => 'required',
            // 'vdc'           => 'required',
            // 'venue'         => 'required',
            // 'imp_org'       => 'required',
            // 'donor_code'    => 'required',
            // 'date_from'     => 'required',
            // 'date_to'       => 'required',
            // 'act_type'      => 'required',
        ]);

   
        if($input['benef_type'] == "Individual" ){
                $input['age_below_15']      = '';
                $input['age_15_29']         = '';
                $input['age_30_45']         = ''; 
                $input['age_45_above']      = '';
                $input['gender_male']       = '';
                $input['gender_female']     = '';
                $input['gender_others']     = '';
                $input['identity_group']    = '';
                $input['caste_eth_group']   = '';

                // dd($input);
              $benef = Benef::create($input);
            }

        if($input['benef_type'] == "Group" ){
                $input['age']       = '';
                $input['gender']    = '';
                $input['identity']  = '';
                $input['caste']     = '';

                 $benef_id_key = Benef::create($input);

                foreach($input['identity_group'] as $key=>$value ) {  
                // dd($key, $value);  
                            if($value == NULL)
                            {
                                unset($key);
                               }
                        else{
                                
                              Benef_Identity_Group::create([
                                    'benef_id'          => $benef_id_key->id,
                                    'identity_id'       => $key,
                                    'identity_value'    => $value,
                                  ]);
                            }
                } //end of foreach identity_group

                                            

                foreach($input['caste_eth_group'] as $key=>$value ) {  
                // dd($key, $value);  
                              if($value == NULL)
                            {
                                unset($key);
                               }
                        else{
                                
                              Benef_Caste_Group::create([
                                    'benef_id'          => $benef_id_key->id,
                                    'caste_eth_id'       => $key,
                                    'cast_eth_value'    => $value,
                                  ]);
                            }
                } //end of foreach caste_eth_group

          }

          //  $formdatahtml['benef_name'] = $benef->name;
          // $formdatahtml['benef_id'] = $benef->id;

            $benef_name = $benef->name;
          $benef_id = $benef->id;


          //  print_r($benef);
          
          // print_r($data);
          // die;
            $formdatahtml = view('benef/show_form_for_training', compact('benef_name', 'benef_id'))->render(); 
         // dd($html);
        return response()->json(array('success' => 'Uploaded', 'html' => $formdatahtml));



        // return redirect('benef')->withFlashSuccess('Information has been added successfully.');
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
           $input = $request->all();

        // dd($input);

        $validator= $this->validate($request,[
            'name'          => 'required',
            // 'age'           => 'required',
            // 'gender'        => 'required',
            // 'identity'      => 'required',
             'benef_type'   => 'required',
            // 'caste'         => 'required',
            'organization'  => 'required',
            'designation'   => 'required',
            'c_number'      => 'required',
            'email'         => 'required',
            'district_id'   => 'required',
            'vdc'           => 'required',
            'venue'         => 'required',
            'imp_org'       => 'required',
            'donor_code'    => 'required',
            'date_from'     => 'required',
            'date_to'       => 'required',
            'act_type'      => 'required',
        ]);

        $input['indicator_id']    = implode(",",$input['indicator_id']);
        $input['output_id']       = implode(",",$input['output_id']);
        $input['activity_id']     = implode(",",$input['activity_id']);

   
        if($input['benef_type'] == "Individual" ){
                $input['age_below_15']      = '';
                $input['age_15_29']         = '';
                $input['age_30_45']         = ''; 
                $input['age_45_above']      = '';
                $input['gender_male']       = '';
                $input['gender_female']     = '';
                $input['gender_others']     = '';
                $input['gender_total']     = '';
                $input['identity_group']    = '';
                $input['caste_eth_group']   = '';

                // dd($input);
                Benef::create($input);
            }

        if($input['benef_type'] == "Group" ){
                $input['age']       = '';
                $input['gender']    = '';
                $input['identity']  = '';
                $input['caste']     = '';

                 $benef_id_key = Benef::create($input);

                foreach($input['identity_group'] as $key=>$value ) {  
                // dd($key, $value);  
                            if($value == NULL)
                            {
                                unset($key);
                               }
                        else{
                                
                              Benef_Identity_Group::create([
                                    'benef_id'          => $benef_id_key->id,
                                    'identity_id'       => $key,
                                    'identity_value'    => $value,
                                  ]);
                            }
                } //end of foreach identity_group

                                            

                foreach($input['caste_eth_group'] as $key=>$value ) {  
                // dd($key, $value);  
                              if($value == NULL)
                            {
                                unset($key);
                               }
                        else{
                                
                              Benef_Caste_Group::create([
                                    'benef_id'          => $benef_id_key->id,
                                    'caste_eth_id'       => $key,
                                    'cast_eth_value'    => $value,
                                  ]);
                            }
                } //end of foreach caste_eth_group

          }


        return redirect('benef')->withFlashSuccess('Information has been added successfully.');
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
        $posts      = Benef::findOrFail($id);
        $zones      = Zone::pluck('zone_name', 'zone_id');
        $districts  = Districts::all();
        $activity   = Activity::pluck('name','id');
        $caste      = Caste::pluck('name','id');
        $identity   = Identity::pluck('name','id');
        $donor_codes= Project::pluck('donor_code','id');

        $goalid = $posts->goal_id;
        $data['allgoalreports'] =GoalReportController::Goalreportforedit($goalid);
        $data['indicator_exp'] = explode(",", $posts->indicator_id);
        $data['output_exp'] = explode(",", $posts->output_id);
        $data['activity_exp'] = explode(",", $posts->activity_id);
        $data['goals'] = Goal::pluck('goal','id');

        $projects   = Project::pluck('project_code','id');

        return view('benef/edit', compact('donor_codes', 'districts','activity','caste','identity','posts','data', 'projects'));
        
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
                $input = $request->all();

        // dd($input);

        $validator= $this->validate($request,[
            'name'          => 'required',
            // 'age'           => 'required',
            // 'gender'        => 'required',
            // 'identity'      => 'required',
             'benef_type'   => 'required',
            // 'caste'         => 'required',
            'organization'  => 'required',
            'designation'   => 'required',
            'c_number'      => 'required',
            'email'         => 'required',
            'district_id'   => 'required',
            'vdc'           => 'required',
            'venue'         => 'required',
            'imp_org'       => 'required',
            'donor_code'    => 'required',
            'date_from'     => 'required',
            'date_to'       => 'required',
            'act_type'      => 'required',
        ]);

          $input['indicator_id']    = implode(",",$input['indicator_id']);
          $input['output_id']       = implode(",",$input['output_id']);
          $input['activity_id']     = implode(",",$input['activity_id']);

          $benef = Benef::findOrFail($id);

        if($input['benef_type'] == "Individual" ){
                $input['age_below_15']      = '';
                $input['age_15_29']         = '';
                $input['age_30_45']         = ''; 
                $input['age_45_above']      = '';
                $input['gender_male']       = '';
                $input['gender_female']     = '';
                $input['gender_others']     = '';
                $input['gender_total']     = '';
                $input['identity_group']    = '';
                $input['caste_eth_group']   = '';
     
                $benef->update($input);

                 $benef_identity = Benef_Identity_Group::where('benef_id',$id)->delete();
                 $benef_caste = Benef_Caste_Group::where('benef_id',$id)->delete();

            }

            if($input['benef_type'] == "Group" ){
                        $input['age']       = '';
                        $input['gender']    = '';
                        $input['identity']  = '';
                        $input['caste']     = '';

                        $benef->update($input);

            // for identity group
            foreach($input['identity_group'] as $key=>$value ) {  

            
               $data_exist = \DB::table('benef_identity_if_group')
                                    ->where('benef_id',$benef->id)
                                    ->where('identity_id',$key)
                                    ->exists(); 

                if($data_exist) { 
                     if($value != NULL) {
                              Benef_Identity_Group::where('benef_id',$benef->id)
                                             ->where('identity_id',$key)
                                             ->update(['identity_value' => $value]);
                        } else{
                                \DB::table('benef_identity_if_group')
                                    ->where('benef_id',$benef->id)
                                    ->where('identity_id',$key)
                                    ->delete();
                        }

                } else {
                        if($value != NULL){ //if exist update or not found then delete
                              Benef_Identity_Group::create([
                                            'benef_id'          => $benef->id,
                                            'identity_id'       => $key,
                                            'identity_value'    => $value,
                                          ]);
                         } 
                         else {
                                  unset($key);
                                 }
                    }  
                } // end of identity group

            //for caste
            foreach($input['caste_eth_group'] as $key=>$value ) {  
            
               $data_exist = \DB::table('benef_caste_eth_if_group')
                                    ->where('benef_id',$benef->id)
                                    ->where('caste_eth_id',$key)
                                    ->exists(); 

                if($data_exist) { 
                     if($value != NULL) {
                              Benef_Caste_Group::where('benef_id',$benef->id)
                                             ->where('caste_eth_id',$key)
                                             ->update(['cast_eth_value' => $value]);
                        } else{
                                \DB::table('benef_caste_eth_if_group')
                                    ->where('benef_id',$benef->id)
                                    ->where('caste_eth_id',$key)
                                    ->delete();
                        }

                } else {
                       if($value != NULL){ //if exist update or not found then delete
                              Benef_Caste_Group::create([
                                            'benef_id'          => $benef->id,
                                            'caste_eth_id'       => $key,
                                            'cast_eth_value'    => $value,
                                          ]);
                         } 
                         else {
                                  unset($key);
                                   
                         }
                    }  
                } //end of caste




          }

     
       

             // $input = Input::all();
             // $event = Benef::where('id',$id)->update([
             //            'caste' => $input['caste'],
             //            'location' => $input['location'],
             //            'gender' => $input['gender'],
             //            'identity' => $input['identity'],
             //            'age' => $input['age'],
                        
             //    ]);
       
        return redirect('benef')->withFlashSuccess('Benef profile is updated successfully.');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $benef = Benef::findOrFail($id);

         $benef_identity = Benef_Identity_Group::where('benef_id',$id)->delete();
         $benef_caste = Benef_Caste_Group::where('benef_id',$id)->delete();
        
        $benef->delete();


        return redirect('benef')->withFlashSuccess('Benef profile is deleted successfully.');
    }
}
