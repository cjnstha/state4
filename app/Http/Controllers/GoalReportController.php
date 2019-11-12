<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Goal;
use App\Models\Objective;
use App\Models\Outcome;
use App\Models\Output;
use App\Models\Logical;
use App\Models\Activity;

use Illuminate\Http\Response;

class GoalReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
  
    public function show($dataformat, $id)
    {
        // print_r($dataformat);
        // print_r($id);
        // die;


        $goal = Goal::select('id','goal')->findOrFail($id);

        $objective_collection = Objective::select('id')->where('goal_id',$id)->get();

        $indicator_collection = Logical::select('id','ind')->where('goal',$id)->get();
       
       foreach($indicator_collection as $ind_val)
       {
             $data['indicator'][$ind_val->id] = $ind_val->ind;
       }

        foreach($objective_collection as $obj_colk => $obj_colv)
        {
            $obj_id[$obj_colk] = $obj_colv->id;

            $outcome_collection[$obj_colk] = Outcome::select('id')->where('obj_id',$obj_colv->id)->get();

            foreach($outcome_collection[$obj_colk] as $outcome_coll)
            {
                $outcome_id = $outcome_coll->id;
                
                $output_collection = Output::select('id','content','activity')->where('outcome_id',$outcome_id)->get();

                foreach($output_collection as $output_v)
                {
                    $data['output'][$output_v->id] = $output_v->content;
                    $activity_ids[$output_v->id] = $output_v->activity;
                
                    foreach($activity_ids as $activity_id)
                    {
                        $activity_data = Activity::select('id','name')->findOrFail($activity_id);
                        $data['activity'][$activity_data->id] = $activity_data->name;
                    
                     }
                }
            }
        }

       // dd($data);
        // print_r($data);
        // die;
        // return view('goalreport/show', $data); 
        // return $data;

         $data['dataformat'] = $dataformat;

         // var_dump($data);
         // die;

         $html = view('goalreport/show', $data)->render(); 
         
       return response()->json(array('success' => 'Uploaded.', 'html' => $html));
       
    }




        public static function  Goalreportforedit($id)
    {

        $goal = Goal::select('id','goal')->findOrFail($id);

        $objective_collection = Objective::select('id')->where('goal_id',$id)->get();

        $indicator_collection = Logical::select('id','ind')->where('goal',$id)->get();
       
       foreach($indicator_collection as $ind_val)
       {
             $data['indicator'][$ind_val->id] = $ind_val->ind;
       }

        foreach($objective_collection as $obj_colk => $obj_colv)
        {
            $obj_id[$obj_colk] = $obj_colv->id;

            $outcome_collection[$obj_colk] = Outcome::select('id')->where('obj_id',$obj_colv->id)->get();

            foreach($outcome_collection[$obj_colk] as $outcome_coll)
            {
                $outcome_id = $outcome_coll->id;
                
                $output_collection = Output::select('id','content','activity')->where('outcome_id',$outcome_id)->get();

                foreach($output_collection as $output_v)
                {
                    $data['output'][$output_v->id] = $output_v->content;
                    $activity_ids[$output_v->id] = $output_v->activity;
                
                    foreach($activity_ids as $activity_id)
                    {
                        $activity_data = Activity::select('id','name')->findOrFail($activity_id);
                        $data['activity'][$activity_data->id] = $activity_data->name;
                    
                     }
                }
            }
        }

        // dd($data);
        // return view('goalreport/show', $data); 
        return $data;

       //   $html = view('goalreport/show', $data)->render(); 
       // return response()->json(array('success' => 'Uploaded.', 'html' => $html));
       
    }


   
}
