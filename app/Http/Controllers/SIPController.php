<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
// use Illuminate\Support\Facades\Input;
use App\Models\DIP;

use App\Models\SIP;
use App\Models\Goal;
use App\Project;


class SIPController extends Controller
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
        // $posts= PartnerPro::all();
        
        // dd('hrer');
        $data['posts']= SIP::all();
        $data['project_codes'] = Project::pluck('project_code','id');
        $data['goals'] = Goal::pluck('goal','id');

        return view('sip.index', $data);
    }

    public function filterSearch(Request $request)
    {
       $obj = (new SIP)->newQuery();
    
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
         $html =' ';

          $root_url = url('/');
        $baseurl = $root_url.'/sip/';
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($lists as $key => $list){

            $key =$key+1;

            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $list->name_of_activity  .'</td>
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
                                            <th>Activity Name</th>
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
       $obj = (new SIP)->newQuery();
    
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
                    $q->orWhereRaw('FIND_IN_SET('.$id.',activity2_id)');
                }
            });
        }

        $lists = $obj->get();
         $html =' ';

          $root_url = url('/');
        $baseurl = $root_url.'/sip/';
        
          $project_code_list       = Project::pluck('project_code', 'id');
        
        foreach($lists as $key => $list){

            $key =$key+1;

            $html .= '<tr>
                        <td>'. $key .'</td>
                        <td>'. $list->name_of_activity  .'</td>
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
                                            <th>Activity Name</th>
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
        $data['activity_type'] = Activity::pluck('name','id');
        $data['activity_type']->put('Other','Other');

        
        $data['activity_code'] = DIP::pluck('activity_code','id');

         $data['mne_tools'] = ["pre_pro_test"=>"Pre and Post Test",
                                "participant_list"=>"Participant List",
                                "feedback_form"=>"Feedback form",
                                 "rapid_survey"=>"Rapid survey",
                                 "participatory_tools"=>"Participatory Tools",
                                 "distribution_list"=>"Distribution List",
                                 "discussion"=>"Discussion",
                                 "event_evaluation"=>"Event Evaluation",
                                 "Others"=>"Others",
                                ];  

        $data['future_monitoring'] = ["fgroup_discussion"=>"Focus group discussions ",
                            "sample_survey"=>"Sample Survey",
                            "follow_up_survey"=>"Follow-up survey",
                             "mini_survey"=>"Mini survey",
                             "Success_change_story"=>"Success/change story",
                             "ki_interviews"=>"KI Interviews",
                             "participatory_mapping_survey"=>"Participatory mapping survey",
                             "final_evaluation"=>"Final Evaluation",
                             "Others"=>"Others",
                            ];  

        $data['participant_exp'] = ["planned"=>["Travel"=>"Travel",
                                    "Acco/Per-diem"=>"Acco/Per-diem",
                                    "Program Exppenditure"=>"Program Exppenditure",
                                     "Others"=>"Others",
                                     "Total"=>"Total",
                                    ],
                                    "actual"=>["Travel"=>"Travel",
                                    "Acco/Per-diem"=>"Acco/Per-diem",
                                    "Program Exppenditure"=>"Program Exppenditure",
                                     "Others"=>"Others",
                                     "Total"=>"Total",
                                    ]];  



        $data['castes'] = ["Madhesi/Terai"=>"Madhesi/Terai",
                                    "Dalit"=>"Dalit",
                                    "Muslim"=>"Muslim",
                                     "Tharu"=>"Tharu",
                                     "Disadvantage"=>"Disadvantage",
                                     "Brahmin/Chhetri"=>"Brahmin/Chhetri",
                                     "discussion"=>"Discussion",
                                     "Others"=>"Others",
                                     "Total"=>"Total",
                                    ];  

        $data['professionals'] = ["Madhesi/Terai"=>"Madhesi/Terai",
                                "Govt official"=>"Govt official",
                                "Local leaders"=>"Local leaders",
                                 "Youth leaders"=>"Youth leaders",
                                 "Media persons"=>"Media persons",
                                 "Civil society/NGO"=>"Civil society/NGO",
                                 "Security"=>"Security",
                                 "Court/Lawyers"=>"Court/Lawyers",
                                 "Activists/human rights"=>"Activists/human rights",
                                 "Others"=>"Others",
                                 "Total"=>"Total",
                                ];  

        $data['age_groups'] = ["Below 15"=>"Below 15",
                                "15-29"=>"15-29",
                                "30-45"=>"30-45",
                                "45-Above"=>"45-Above",
                                "Total"=>"Total",
                                ];  
        // dd($data);

        $data['goals'] = Goal::pluck('goal','id');
        $data['projects'] = Project::pluck('project_code','id');
   
        return view('sip.create', $data);
    }

    public function populateFromDip(Request $request){
        $dip = DIP::find($request->id);
        if (!empty($dip)) {
            return response()->json(array('stat' => 'ok', 'value' => $dip));
        }else{
            return response()->json(array('stat' => 'fail', 'value' => ''));
        }
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
            // 'activity_code'     => 'required',
            'name_of_activity'      => 'required',
            'indicator_activity'    => 'required',
            'mne_tools'             => 'required',
            'main_objective'    => 'required',
            'major_content_act'    => 'required',
            'implemented_area'    => 'required',
            // 'major_content_act'    => 'required',
            // 'major_content_act'    => 'required',

            
        ]);
        
        $input = $request->all();

        // dd($input);

        // $input['activity_code']             = implode("/",$input['activity_code']);

        $input['activity_id']               = implode(",",$input['activity_id']);
        $input['indicator_activity']        = implode(",",$input['indicator_activity']);
        $input['major_result_outcome']      = implode(",",$input['major_result_outcome']);

        $input['quote_part_name']           = implode(",",$input['quote_part_name']);
        $input['quote_part_profession']     = implode(",",$input['quote_part_profession']);
        $input['quote_part_organization']   = implode(",",$input['quote_part_organization']);
        $input['quote_part_address']        = implode(",",$input['quote_part_address']);
        $input['part_quotes']               = implode(",",$input['part_quotes']);

        $input['followup_action_plan_what']    = implode(",",$input['followup_action_plan_what']);
        $input['followup_action_plan_when']    = implode(",",$input['followup_action_plan_when']);
        $input['followup_action_plan_where']   = implode(",",$input['followup_action_plan_where']);
        $input['followup_action_plan_who']     = implode(",",$input['followup_action_plan_who']);


        $input['major_learn_act']           = implode(",",$input['major_learn_act']);
        $input['mne_tools']                 = implode(",",$input['mne_tools']);
        $input['fut_mon_outcome_put_indi']  = implode(",",$input['fut_mon_outcome_put_indi']);

        $input['caste']                     = serialize($input['caste']);
        $input['professional']              = serialize($input['professional']);
        $input['age_group']                 = serialize($input['age_group']);

        // $input['followup_action_plan']      = json_encode($input['followup_action_plan']);

        $input['participant_exp_planned']   = serialize($input['participant_exp_planned']);
        $input['participant_exp_actual']    = serialize($input['participant_exp_actual']);

        //added -yojan
        $input['indicator_id']    = implode(",",$input['indicator_id']);
        $input['output_id']       = implode(",",$input['output_id']);
        $input['activity2_id']     = implode(",",$input['activity2_id']);

        // dd($input);

        SIP::create($input);

        return redirect()->route('sip.index')->withFlashSuccess('Activity Completion Report has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['mne_tools'] = ["pre_pro_test"=>"Pre and Post Test",
                                "participant_list"=>"Participant List",
                                "feedback_form"=>"Feedback form",
                                 "rapid_survey"=>"Rapid survey",
                                 "participatory_tools"=>"Participatory Tools",
                                 "distribution_list"=>"Distribution List",
                                 "discussion"=>"Discussion",
                                 "event_evaluation"=>"Event Evaluation",
                                 "Others"=>"Others",
                                ];  

        $data['future_monitoring'] = ["fgroup_discussion"=>"Focus group discussions ",
                            "sample_survey"=>"Sample Survey",
                            "follow_up_survey"=>"Follow-up survey",
                             "mini_survey"=>"Mini survey",
                             "Success_change_story"=>"Success/change story",
                             "ki_interviews"=>"KI Interviews",
                             "participatory_mapping_survey"=>"Participatory mapping survey",
                             "final_evaluation"=>"Final Evaluation",
                             "Others"=>"Others",
                            ];  
        
        $data['posts'] = SIP::findOrFail($id);

        $data['activity_type'] = Activity::pluck('name','id');
        $data['activity_type']->put('Other','Other');

        $data['activity_code'] = DIP::pluck('activity_code','id');

        // $data['activity_code_exp']              = explode("/",$data['posts']->activity_code);
        $data['activity_id_exp']                = explode(",",$data['posts']->activity_id);
        $data['indicator_activity_exp']         = explode(",",$data['posts']->indicator_activity);
        $data['major_result_outcome_exp']       = explode(",",$data['posts']->major_result_outcome);
        $data['major_learn_act_exp']            = explode(",",$data['posts']->major_learn_act);
        $data['mne_tools_exp']                  = explode(",",$data['posts']->mne_tools);
        $data['fut_mon_outcome_put_indi_exp']   = explode(",",$data['posts']->fut_mon_outcome_put_indi);
        $data['quote_part_name_exp']            = explode(",",$data['posts']->quote_part_name);
        
        $data['quote_part_name_exp']                = explode(",",$data['posts']->quote_part_name);
        $data['quote_part_profession_exp']          = explode(",",$data['posts']->quote_part_profession);
        $data['quote_part_organization_exp']        = explode(",",$data['posts']->quote_part_organization);
        $data['quote_part_address_exp']             = explode(",",$data['posts']->quote_part_address);
        $data['part_quotes_exp']                    = explode(",",$data['posts']->part_quotes);

       
        $data['followup_action_plan_what_exp']    = explode(",",$data['posts']->followup_action_plan_what);
        $data['followup_action_plan_when_exp']    = explode(",",$data['posts']->followup_action_plan_when);
        $data['followup_action_plan_where_exp']   = explode(",",$data['posts']->followup_action_plan_where);
        $data['followup_action_plan_who_exp']     = explode(",",$data['posts']->followup_action_plan_who);


        $data['castes']                     = unserialize($data['posts']->caste);
        $data['professionals']              = unserialize($data['posts']->professional);
        $data['age_groups']                 = unserialize($data['posts']->age_group);

        $data['participant_exp_planneds']   = unserialize($data['posts']->participant_exp_planned);
        $data['participant_exp_actuals']    = unserialize($data['posts']->participant_exp_actual);

        //added -yojan
        $data['allgoalreports'] =GoalReportController::Goalreportforedit($data['posts']->goal_id);
        $data['indicator_exp']  = explode(",", $data['posts']->indicator_id);
        $data['output_exp']     = explode(",", $data['posts']->output_id);
        $data['activity_exp']   = explode(",", $data['posts']->activity2_id);
        $data['goals']          = Goal::pluck('goal','id');
        $data['projects'] = Project::pluck('project_code','id');


        // dd($data);
       
        return view('sip.edit', $data);
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
            'name_of_activity'      => 'required',
            'indicator_activity'    => 'required',
            'mne_tools'             => 'required',
            'main_objective'    => 'required',
            'major_content_act'    => 'required',
            'implemented_area'    => 'required',   
        ]);
        
        $input = $request->all();

        // dd($input);

        // $input['activity_code']             = implode("/",$input['activity_code']);

        $input['activity_id']               = implode(",",$input['activity_id']);
        $input['indicator_activity']        = implode(",",$input['indicator_activity']);
        $input['major_result_outcome']      = implode(",",$input['major_result_outcome']);

        $input['quote_part_name']           = implode(",",$input['quote_part_name']);
        $input['quote_part_profession']     = implode(",",$input['quote_part_profession']);
        $input['quote_part_organization']   = implode(",",$input['quote_part_organization']);
        $input['quote_part_address']        = implode(",",$input['quote_part_address']);
        $input['part_quotes']               = implode(",",$input['part_quotes']);

        $input['followup_action_plan_what']    = implode(",",$input['followup_action_plan_what']);
        $input['followup_action_plan_when']    = implode(",",$input['followup_action_plan_when']);
        $input['followup_action_plan_where']   = implode(",",$input['followup_action_plan_where']);
        $input['followup_action_plan_who']     = implode(",",$input['followup_action_plan_who']);


        $input['major_learn_act']           = implode(",",$input['major_learn_act']);
        $input['mne_tools']                 = implode(",",$input['mne_tools']);
        $input['fut_mon_outcome_put_indi']  = implode(",",$input['fut_mon_outcome_put_indi']);

        $input['caste']                     = serialize($input['caste']);
        $input['professional']              = serialize($input['professional']);
        $input['age_group']                 = serialize($input['age_group']);

        $input['participant_exp_planned']   = serialize($input['participant_exp_planned']);
        $input['participant_exp_actual']    = serialize($input['participant_exp_actual']);


        //added -yojan
        $input['indicator_id']    = implode(",",$input['indicator_id']);
        $input['output_id']       = implode(",",$input['output_id']);
        $input['activity2_id']    = implode(",",$input['activity2_id']);

        // dd($input);

        $act = SIP::findOrFail($id);

        $act->update($input);

        return redirect()->route('sip.edit', $id)->withFlashSuccess('Activity Completion Report has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SIP::destroy($id);
        return redirect()->route('sip.index')->withFlashSuccess('Activity Completion Report has been deleted successfully');
    }
}
