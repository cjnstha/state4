<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QnA;
use App\Models\Benef;
use App\Models\QuestnBenef;
use App\Models\Final_QnA;
use App\Models\Final_QnA_ans;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class TestController extends Controller
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
        $data['question_set']= QnA::pluck('question_set_name','question_set_id');

        return view('test.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {   
    //     // dd('create');
        
    //     // dd(Input::all());
    //    $be  = Benef::select('id','name','vdc')->get();
    //    foreach ($be  as $b) {
    //        $data['benef'][$b->name] =  ($b->name.'(vdc:'.$b->vdc.')') ;
    //    }

    //    $data['questions']= QnA::where('question_set_id',Input::get('question_set_id'))->with('answers')->get();
    //     $question_for_id= QnA::where('question_set_id',Input::get('question_set_id'))->with('answers')->firstOrFail();

    //   $data['question_set_id']      =   $question_for_id ->question_set_id;
    //   $data['question_set_name']    =   $question_for_id->question_set_name;
    //    // dd($data);
    
    //    return view('test/create',$data);
    // }

     public function show($id)
    {
        // dd($id);

         $be  = Benef::select('id','name','vdc')->get();
       foreach ($be  as $b) {
           $data['benef'][$b->name] =  ($b->name.'(vdc:'.$b->vdc.')') ;
       }

       $data['questions']= QnA::where('question_set_id',$id)->with('answers')->get();
        $question_for_id= QnA::where('question_set_id',$id)->with('answers')->firstOrFail();

      $data['question_set_id']      =   $question_for_id ->question_set_id;
      $data['question_set_name']    =   $question_for_id->question_set_name;
       // dd($data);

       $html = view('test/create', $data)->render(); 
       // return $html;
       return response()->json(array('success' => 'Uploaded.', 'html' => $html));
    }

    public function store(Request $request)
    {
         $inputs = $request->all();
        // dd($inputs);
        $this->validate($request,[
            'benef_name'=>'required',
        ]);
  
        $inputs = $request->all();
        // dd($inputs);

          $QnBfobj = QuestnBenef::create([
            'question_set_id'       => $inputs['question_set_id'],
            'question_set_name'     => $inputs['question_set_name'],
            'benef_name'            => $inputs['benef_name'],
            ]);

 // dd($QnBfobj);
        if(isset($inputs['ticked_answers']))
        {
            foreach( $inputs['ticked_answers'] as $key=>$input )
                {
                // dd($inputs['ticked_answers'], $key, $input);
                 foreach( $inputs['ticked_answers'][$key] as $newkey=>$value )
                        {
                            // dd($key, $newkey, $value);
                          if($value == NULL)
                            {
                                unset($newkey);
                               }
                        else{
                                
                              Final_QnA::create([
                                    'ref_id'   => $QnBfobj->id,
                                    'qid'      => $key,
                                    'aid'      => $value,
                               ]);
                            }
                       }
                }
        }

        if(isset($inputs['written_answers']))
        {
            foreach( $inputs['written_answers'] as $key=>$input )
                {
                // dd($inputs['written_answers'], $key, $input);
                 foreach( $inputs['written_answers'][$key] as $newkey=>$value )
                        {
                          if($value == NULL)
                            {
                                unset($newkey);
                               }
                        else{ 
                              Final_QnA_ans::create([
                                    'ref_id'   => $QnBfobj->id,
                                    'qid'      => $key,
                                    'answer'   => $value,
                               ]);
                            }
                       }
                }
        }
    
        return redirect('test')->withFlashSuccess($inputs['question_set_name'] .' has been added successfully.');
    }

   
}
