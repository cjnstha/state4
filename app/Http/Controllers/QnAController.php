<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QnA;
// use App\Models\MultipleAnswers;
use App\Models\Answer;
use Illuminate\Support\Facades\Input;

class QnAController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // $services = QnA::all();
        $data['services'] = \DB::table('questions')->select('*')->groupBy('question_set_id')->get();

        // dd($data);
        return view('qna.index', $data);
    }

    public function create()
    {
        $last = QnA::orderBy('id', 'desc')->first();
        if(empty($last)){
           $data['lastv'] = '1';
            }else{
        $data['lastv'] = $last['question_set_id'] + 1 ;
        }
        return view('qna.create', $data);
    }

    public function store(Request $request)
    {
      // dd($request->all());
        $this->validate($request,[
            'question_set_name' => 'required',
            'question.*'        => 'required',
            'answer_type.*'     => 'required',
            'answer_option.*'   => 'required',
            // 'answers.*'      => 'required',  
        ]);

        $inputs = Input::all();
        
        foreach( $inputs['answers'] as $key=>$value )
        {
            if($inputs['answer_type'][$key] == 'text')
            {
                unset($inputs['answers'][$key]);
            }
        }

        foreach( $inputs['counter'] as $key=>$input )
        {
            $question_set_name  = $inputs['question_set_name'];
            $question_set_id    = $inputs['question_set_id'];
            $question           = $inputs['question'][$key];
            $answer_type        = $inputs['answer_type'][$key];
            $answer_option      = $inputs['answer_option'][$key];
            
            $obj = QnA::create([
            'question_set_id'       => $question_set_id,
            'question_set_name'     => $question_set_name,
            'question'              => $question,
            'answer_type'           => $answer_type,
            'answer_option'         => $answer_option,
            ]);

            if(isset($inputs['answers'][$key]))
            {
                foreach( $inputs['answers'][$key] as $newkey=>$value )
                {
                    if($value == NULL)
                    {
                        unset($newkey);
                    }
                    else
                    {
                        Answer::create([
                                'qid'           => $obj->id,
                                'answer'        => $value,
                                ]);
                    }
                }
            }
        }
       
        return redirect()->route('qna.index')->withFlashSuccess('Project Document has been added successfully.');
    }

    public function show($id)
    {
        $data['models'] = QnA::where('question_set_id',$id)->with('answers')->get(); 
        $data['model'] = QnA::where('question_set_id',$id)->firstOrFail(); 
        $data['question_set_id'] =  $data['model']->question_set_id;
        $data['question_set_name'] = $data['model']->question_set_name;
        unset($data['model']);
        // dd($data);
        return view('qna.show', $data);
    }

    public function edit($id)
    {
       $data['model'] = QnA::where('id',$id)->firstOrFail();
       $data['models'] = $data['model']->answers;
       return view('qna.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
       $this->validate($request,[
            'question_set_id'   => 'required',
            'question_set_name' => 'required',
            'answer_type'       => 'required',
            'answer_option'     => 'required',
            'question'          => 'required',
            // 'answers'           => 'required',  
        ]);

        $inputs = $request->all();
        $quest = QnA::findOrFail($id);
        $ans_collection = $quest->answers;
        $quest->fill($inputs);
        $quest->save();
        
        if(($request['answer_type'] !== 'text') && isset($request['answers']) )
        {
            // dd('inside 1st if');
            foreach($ans_collection as $ans)
            {
                foreach($request['answers'] as $key_id => $value)
                {
                    // dd('inside foreach');
                    if($value == NULL)
                    {
                        // dd('when unset');
                        unset($key_id);
                    }
                    else
                    {       
                        if($key_id == $ans->id)
                        {
                            // dd('inside if keyid  when not unset');
                            $new_answer['id']       = $key_id;
                            $new_answer['qid']      = $request['id'];
                            $new_answer['answer']   = $value;

                            $updated_ans = Answer::findOrFail($key_id);
                            $updated_ans->fill($new_answer);
                            $updated_ans->save();
                        }
                        else
                        {
                            \DB::table('answers')->where('id', $ans->id)->delete();
                        }
                    }
                }         
            }
        }
        else 
        {
            // dd('after 1st else');
           foreach($ans_collection as $ans)
            {
                \DB::table('answers')->where('id', $ans->id)->delete();
            }
        }
        
        if(isset($request['newadded']))
        {
           if($request['answer_type'] !== 'text')
            {
                foreach( $request['newadded'] as $key=>$value )
                {
                    if($value == NULL)
                    {
                        unset($key);
                    }
                else{                        
                         Answer::create([                     
                                        'qid' => $quest->id,
                                        'answer' => $value,
                                        ]);
                    }
                }
            }
            else 
            {
                unset($request['newadded']);
            }
        }
        
        return redirect()->route('qna.show', $request['question_set_id'])->withFlashSuccess($request['question'] .' has been successfully Updated');
    }

    public function addMore($id)
    {
         // dd(Input::all());
        $data['question_set_id'] =  $id;
        $data['question_set_name'] = Input::get('question_set_name');
        // dd($data);
        return view('qna.addmore', $data);
    }

    public function postMore(Request $request)
    {
      // dd($request->all());
        $this->validate($request,[
            'question_set_name' => 'required',
            'question.*'        => 'required',
            'answer_type.*'     => 'required',
            'answer_option.*'   => 'required',
            // 'answers.*'      => 'required',  
        ]);

        $inputs = Input::all();
        
        foreach( $inputs['answers'] as $key=>$value )
        {
            if($inputs['answer_type'][$key] == 'text')
            {
                unset($inputs['answers'][$key]);
            }
        }

        foreach( $inputs['counter'] as $key=>$input )
        {
            $question_set_name  = $inputs['question_set_name'];
            $question_set_id    = $inputs['question_set_id'];
            $question           = $inputs['question'][$key];
            $answer_type        = $inputs['answer_type'][$key];
            $answer_option      = $inputs['answer_option'][$key];
            
            $obj = QnA::create([
            'question_set_id'       => $question_set_id,
            'question_set_name'     => $question_set_name,
            'question'              => $question,
            'answer_type'           => $answer_type,
            'answer_option'         => $answer_option,
            ]);

            if(isset($inputs['answers'][$key]))
            {
                foreach( $inputs['answers'][$key] as $newkey=>$value )
                {
                    if($value == NULL)
                    {
                        unset($newkey);
                    }
                    else
                    {
                        Answer::create([
                                'qid'           => $obj->id,
                                'answer'        => $value,
                                ]);
                    }
                }
            }
        }
       
        return redirect()->route('qna.show', $request['question_set_id'])->withFlashSuccess('Question and Answer has been successfully added in '.$request['question_set_name']);
    }

    public function destroy($id)
    {
        $models = QnA::where('question_set_id',$id)->with('answers')->get();

        foreach( $models as $key=>$model )
        {
            foreach( $model->answers as $k=>$ans)
            {
                $ans->delete();  
            }

            $model->delete();
        }

        return redirect()->route('qna.index')->withFlashSuccess('Information Deleted successfully.');
    }

    public function singleDestroy($id)
    {
        $model = QnA::where('id',$id)->with('answers')->firstOrFail();
        // dd($model);
        $question = $model->question;
        $parent_id = $model->question_set_id;
        
        foreach( $model->answers as $k=>$ans)
        {
            $ans->delete();  
        }
        
        $model->delete();

        return Redirect()->route('qna.show', $parent_id)->withFlashSuccess($question.' has been successfully Deleted');
    }

}
