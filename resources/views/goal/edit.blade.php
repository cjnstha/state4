@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Activity</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <br />
                 <div class="hide add_obj ">
                    <div class="obj_text" > 
                                {!! Form::label('obj','New Objective',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                                <div class="col-md-6 col-sm-6 col-xs-12" >
                                    <div class="input-field-group">
                                        {!! Form::text('obj[]', '' ,['class' => 'form-control','id'=>'obj', 'data-no' => '', 'required'] ) !!}

                                        <div class="outcome_text" >
                                            <div class="outcome-box">
                                                <div class="outcome-wrap" id='first'>
                                                    <div class="form-group">
                                                        {!! Form::label('outcome','Outcome',array('class'=>'control-label')) !!}
                                                        {!! Form::text('outcome[][]', '' ,['class' => 'form-control','id'=>'outcome', 'data-no' => '', 'required'] ) !!}
                                                    </div>
                                                    <div class="output_text" >
                                                        <div class="output-wrap" id='first'>
                                                            <div class="form-group">
                                                                {!! Form::label('output','Output',array('class'=>'control-label')) !!}
                                                                {!! Form::text('output[][][]', '' ,['class' => 'form-control','id'=>'output', 'data-no' => '', 'required'] ) !!}
                                                             </div>
                                                             <div class="form-group">
                                                                <label class="control-label" for="first-name">Activity
                                                                <span class="required">*</span></label>
                                                                <div class="">
                                                                    {{ Form::select('activity[][][]', $activity ,'', ['class' => 'form-control ','placeholder'=>'--Select--','id'=>'act', 'required']) }}
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="addmore"  >
                                                            <a href="javascript:;" class="addmorebtn_output btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add Output </a>
                                                        </div>
                                                         <span class="glyphicon glyphicon-trash outputDelete hide" id="del_input_output" ></span>

                                                    </div> 
                                                </div>
                                            </div>
                                     
                                            <div class="addmore"  >
                                                <a href="javascript:;" class="addmorebtn_outcome btn btn-default btn-sm" >
                                                    <i class="fa fa-plus"></i> Add Outcome 
                                                </a>
                                            </div>
                                            
                                             <span class="glyphicon glyphicon-trash outcomeDelete hide" id="del_input_outcome" ></span>
                                        </div> <!--end outcome_text -->
                                    </div><!--end input field group -->
                                </div><!--end col- -->

                    </div><!--obj_text--> 
                </div><!-- end add_obj -->

            <div class="hide add_outcome">
                <div class="outcome-wrap">
                    <div class="form-group">
                        {!! Form::label('outcome','Outcome',array('class'=>'control-label')) !!}
                        {!! Form::text('outcome[][]', '' ,['class' => 'form-control','id'=>'outcome', 'data-no' => '', 'required'] ) !!}
                    </div>
                    <div class="output_text" >
                        <div class="output-wrap" id='first'>
                            <div class="form-group">
                                {!! Form::label('output','Output',array('class'=>'control-label')) !!}
                                {!! Form::text('output[][][]', '' ,['class' => 'form-control','id'=>'output', 'data-no' => '', 'required'] ) !!}
                             </div>
                             <div class="form-group">
                                <label class="control-label" for="first-name">Activity
                                <span class="required">*</span></label>
                                <div class="">
                                    {{ Form::select('activity[][][]', $activity ,'', ['class' => 'form-control ','id'=>'act','placeholder'=>'--Select--', 'required']) }}
                                </div>
                            </div>
                        </div>

                        <div class="addmore"  >
                            <a href="javascript:;" class="addmorebtn_output btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add Output </a>
                        </div>
                        <span class="glyphicon glyphicon-trash outputDelete hide" id="del_input_output" ></span>

                    </div> 
                </div>
            </div><!-- end add_outcome-->

            <div class="hide add_output">
                <div class="output-wrap">
                    
                        <div class="form-group">
                            {!! Form::label('output','Output',array('class'=>'control-label')) !!}
                            {!! Form::text('output[][][]', '' ,['class' => 'form-control','id'=>'output', 'data-no' => '', 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="first-name">Activity
                            <span class="required">*</span></label>
                            <div class="">
                                {{ Form::select('activity[][][]', $activity ,'', ['class' => 'form-control ','id'=>'act','placeholder'=>'--Select--', 'required']) }}
                            </div>
                        </div>
                         
                     
                </div>
            </div>
                {{Form::model($posts, ['route'=>['goal.update', $posts->id], 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left','method'=>'patch', 'data-parsley-validate'])}}
            
                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Project Code <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-7 col-xs-12">
                                {{ Form::select('p_code', $project_code,null, ['class' => 'form-control sumoSelect','placeholder'=>'--Select--', 'required']) }}
                            </div>
                        </div>
                        
                     <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                               Goal <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::textarea('goal', null ,['class' => 'form-control', 'required','size' => '3x3'] ) !!}
                            </div>
                        </div>

                        <div class="form-group more-field"> 
                            <div class="obj_block">
                            <?php   $count_obj= 0;
                                    $count_outcome= 0;
                                    $count_output=0;
                            ?>
                             @foreach ($objectives as $ob)
                            
                            @if($count_obj==0)
                                <div class="obj_text" id="first"  > 
                            @else
                                <div class="obj_text"   > 
                            @endif
                                 
                                    {!! Form::label('obj',($count_obj==0)?'Objective':'New Objective',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                                    <div class="col-md-6 col-sm-6 col-xs-12" >
                                        <div class="input-field-group">

                                        
                                         {!! Form::hidden(('obj_id['.$count_obj.']'), isset($ob)?$ob->id :'' ,['class' => 'form-control', 'id' => 'obj', 'data-no' => $count_obj] ) !!}

                                            {!! Form::text(('obj['.$count_obj.']'),isset($ob)?$ob->content :'' ,['class' => 'form-control', 'id' => 'obj', 'data-no' => $count_obj, 'required'] ) !!}

                                            <div class="outcome_text" >
                                                <div class="outcome-box">
                                                    <?php $outcomes= DB::table('outcome')->where('obj_id',$ob->id)->get();?>
                                                     @foreach ( $outcomes as $outc)
                                                     
                                                    <div class="outcome-wrap">
                                                    <div class="form-group">
                                                        {!! Form::label('outcome','Outcome',array('class'=>'control-label')) !!}

                                                        {!!  Form::hidden(('outcome_id['.$count_obj.']['.$count_outcome.']'), isset($outc)?$outc->id :'' ,['class' => 'form-control','id'=>'outcome_id', 'data-no' => $count_outcome ] ) !!}

                                                        {!! Form::text(('outcome['.$count_obj.']['.$count_outcome.']'), isset($outc)?$outc->content :'' ,['class' => 'form-control','id'=>'outcome', 'data-no' => $count_outcome, 'required'] ) !!}
                                                    </div>

                                                    <div class="output_text" >
                                                        <div class="output-block">
                                                        <?php $outputs= DB::table('output')->where('outcome_id',$outc->id)->get(); ?>
                                                     @foreach ( $outputs as $outp)
                                                    
                                                            <div class="output-wrap">
                                                                <div class="form-group">
                                                                    {!! Form::label('output','Output',array('class'=>'control-label')) !!}

                                                                    {!! Form::hidden('output_id['.$count_obj.']['.$count_outcome.']['.$count_output.']', isset($outp)?$outp->id :''  ,['class' => 'form-control','id'=>'output', 'data-no' => $count_output] ) !!}

                                                                    {!! Form::text('output['.$count_obj.']['.$count_outcome.']['.$count_output.']', isset($outp)?$outp->content :''  ,['class' => 'form-control','id'=>'output', 'data-no' => $count_output, 'required'] ) !!}
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="first-name">Activity

                                                                    <span class="required">*</span></label>
                                                                        {{ Form::select('activity['.$count_obj.']['.$count_outcome.']['.$count_output.']', $activity ,isset($outp)?$outp->activity :'' , ['class' => 'form-control sumoSelect','placeholder'=>'--Select--', 'required']) }}
                                                                </div>
                                                            </div>

                                                        <?php $count_output++;  ?>
                                                        @endforeach
                                                        </div>
                                                         
                                                        <div class="addmore"  >
                                                            <a href="javascript:;" class="addmorebtn_output btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add Output </a>
                                                        </div>
                                                        @if($count_output== 1)
                                                         <span class="glyphicon glyphicon-trash outputDelete hide" id="del_input_output" ></span>
                                                         @else
                                                         <span class="glyphicon glyphicon-trash outputDelete " id="del_input_obj" ></span>
                                                         @endif
                                                    </div> 
                                                    </div>

                                                    <?php $count_outcome++;
                                                    $count_output=0;  ?> 
                                                     @endforeach
                                                </div>
                                                 
                                                <div class="addmore"  >
                                                    <a href="javascript:;" class="addmorebtn_outcome btn btn-default btn-sm" >
                                                        <i class="fa fa-plus"></i> Add Outcome 
                                                    </a>
                                                </div> 
                                                @if($count_outcome== 1)
                                                <span class="glyphicon glyphicon-trash outcomeDelete hide" id="del_input_outcome" ></span>
                                                @else
                                                <span class="glyphicon glyphicon-trash outcomeDelete " id="del_input_outcome" ></span>
                                                @endif
                                               
                                            </div> <!--end outcome_text -->
                                        </div><!--end input field group -->
                                    </div><!--end col- --> 

                                    <!--<span class="glyphicon glyphicon-trash" id="del_input_obj_edit"></span> -->

                                </div><!--obj_text--> 

                                <?php $count_obj++; 
                                 $count_outcome=0;
                                 $count_output=0; ?>
                                @endforeach
                            </div> 
                             
                            <div class="col-md-offset-3 col-md-6">
                                <div class="addmore">
                                    <a href="javascript:;" class="addmorebtn_obj btn btn-default btn-sm" >
                                    <i class="fa fa-plus"></i> Add Objective 
                                    </a>
                                </div> 
                            </div> 
                            @if($count_obj== 1)
                            <span class="glyphicon glyphicon-trash objectiveDelete hide" id="del_input_obj" ></span>
                            @else 
                            <span class="glyphicon glyphicon-trash objectiveDelete " id="del_input_obj" ></span>
                            @endif
                        </div><!-- form-group more-field -->

                        

                        <div class="submit-btn col-md-6 col-md-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('goal.index') }}" class="btn btn-danger">Cancel</a>
                            
                        </div>
                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
