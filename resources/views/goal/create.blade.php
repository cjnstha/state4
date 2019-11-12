@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add Goal / Impact</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
            {{-- For objective  --}}
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
                                                        <div class="outputDelete hide" id="del_input_output">
                                                            <span class="glyphicon glyphicon-trash" ></span>Delete
                                                        </div>

                                                    </div> 
                                                </div>
                                            </div>
                                     
                                            <div class="addmore"  >
                                                <a href="javascript:;" class="addmorebtn_outcome btn btn-default btn-sm" >
                                                    <i class="fa fa-plus"></i> Add Outcome 
                                                </a>
                                            </div>

                                            <div id="del_input_outcome" class="outcomeDelete hide">
                                                <span class="glyphicon glyphicon-trash"></span>Delete
                                            </div>
                                            
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
                                    {{ Form::select('activity[][][]', $activity ,'', ['class' => 'form-control','placeholder'=>'--Select--','id'=>'act', 'required']) }}
                                </div>
                            </div>
                        </div>

                        <div class="addmore"  >
                            <a href="javascript:;" class="addmorebtn_output btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add Output </a>
                        </div>
                        <div class="outputDelete hide" id="del_input_output">
                            <span class="glyphicon glyphicon-trash"  ></span>Delete
                        </div>

                    </div> 
                </div>
            </div><!-- end add_outcome-->

            <div class="hide add_output">
                <div class="output-wrap">
                    <div class="new-field">
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
                </div>
            </div>

                {{Form::open(['route'=>'goal.store', 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate'])}}
           
                  
                         
                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Project Code <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-7 col-xs-12">
                                {{ Form::select('p_code', $project_code,'', ['class' => 'form-control sumoSelect','placeholder'=>'--Select--', 'required']) }}
                            </div>
                        </div>
                        
                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                               Goal <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::textarea('goal', '' ,['class' => 'form-control', 'required','size' => '3x3'] ) !!}
                            </div>
                        </div>
                        

                        <div class="form-group more-field"> 
                            <div class="obj_block">
                                <div class="obj_text" id='first'> 
                                    {!! Form::label('obj','Objective',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                                    <div class="col-md-6 col-sm-6 col-xs-12" >
                                        <div class="input-field-group">
                                            {!! Form::text('obj[0]', '' ,['class' => 'form-control', 'id' => 'obj', 'data-no' => '0', 'required'] ) !!}

                                            <div class="outcome_text" >
                                                <div class="outcome-box">
                                                    <div class="outcome-wrap" id='first'>
                                                    <div class="form-group">
                                                        {!! Form::label('outcome','Outcome',array('class'=>'control-label')) !!}
                                                        {!! Form::text('outcome[0][0]', '' ,['class' => 'form-control','id'=>'outcome', 'data-no' => '0', 'required'] ) !!}
                                                    </div>
                                                    <div class="output_text" >
                                                        <div class="output-block">
                                                            <div class="output-wrap" id='first'>
                                                                <div class="form-group">
                                                                    {!! Form::label('output','Output',array('class'=>'control-label')) !!}
                                                                    {!! Form::text('output[0][0][0]', '' ,['class' => 'form-control','id'=>'output', 'data-no' => '0', 'required'] ) !!}
                                                                 </div>
                                                                 <div class="form-group">
                                                                    <label class="control-label" for="first-name">Activity
                                                                    <span class="required">*</span></label>
                                                                        {{ Form::select('activity[][][]', $activity ,'', ['class' => 'form-control sumoSelect','placeholder'=>'--Select--','id'=>'act', 'required']) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="addmore"  >
                                                            <a href="javascript:;" class="addmorebtn_output btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add Output </a>
                                                        </div>
                                                        <div id="del_input_output" class="outputDelete hide">
                                                            <span class="glyphicon glyphicon-trash"></span>Delete
                                                        </div>
                                                    </div> 
                                                    </div>
                                                </div>
                                         
                                                <div class="addmore"  >
                                                    <a href="javascript:;" class="addmorebtn_outcome btn btn-default btn-sm" >
                                                        <i class="fa fa-plus"></i> Add Outcome 
                                                    </a>
                                                </div>
                                                <div id="del_input_outcome" class="outcomeDelete hide">
                                                    <span class="glyphicon glyphicon-trash"></span>Delete
                                                </div>
                                            </div> <!--end outcome_text -->
                                        </div><!--end input field group -->
                                    </div><!--end col- -->  
                                </div><!--obj_text--> 
                            </div> 
                            <div class="col-md-offset-3 col-md-6">
                                <div class="addmore">
                                <a href="javascript:;" class="addmorebtn_obj btn btn-default btn-sm" >
                                    <i class="fa fa-plus"></i> Add Objective 
                                </a>
                            </div>
                                <div id="del_input_obj" class="objectiveDelete hide" >
                                    <span class="glyphicon glyphicon-trash"></span>Delete
                                </div>
                             
                            </div> 
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
