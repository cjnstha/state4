@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Research</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">

            <div class="hide add_m_findings">
                <div class="new-field">
                    {!! Form::text('m_findings[]', '' ,['class' => 'form-control'] ) !!}
                    <span class="glyphicon glyphicon-trash " id="del_input"></span>
                </div>
            </div>
            <div class="hide add_recom">
                <div class="new-field">
                    {!! Form::text('recom[]', '' ,['class' => 'form-control'] ) !!}
                    <span class="glyphicon glyphicon-trash " id="del_input"></span>
                </div>
            </div>
            <div class="hide add_conduct">
                
                <div class="new-field border-block">
                    <div class="control-group">
                        <div class="controls">
                            {{ Form::text('c_date[]', null, ['class' => 'form-control has-feedback-left',  'aria-describedby'=>'inputSuccess2Status4','id'=>'datepick-all','required']) }}
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                        </div>
                    </div>
                    {!! Form::text('c_type[]', null ,['class' => 'form-control', 'placeholder'=>'Enter Conduct type'] )  !!}
                    <div id="del_input">
                        <span class="glyphicon glyphicon-trash "></span>  Delete
                    </div>

                </div>
            </div>
                
                {{Form::open(['route'=>'research.store', 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate', 'files'=> 'true'])}}
                {{-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{!! route('trainings.store') !!} " method="post">
                    {{ csrf_field() }} --}}

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                            Research Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {!! Form::text('research_name', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::select('re_type',  ['Baseline'=>'Baseline','Survey'=>'Survey'], null, ['placeholder'=>'--Select--','class'=>'form-control sumoSelect col-md-7 col-xs-12', 'required'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                               Project Code
                        <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-7 col-xs-12">
                          {!! Form::select('project_id', $project_code  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) !!}
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Contact Documentation">Document <br />(doc, docx or pdf)
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse {{Form::file('document',null, ['class'=>'form-control'])}}
                                </span>
                            </label>
                            <input type="text" class="form-control" disabled>
                        </div>
                        <!-- {{Form::file('document',null, ['class'=>'form-control'])}} -->
                        </div>
                    </div>
                    
                    <div class="form-group" id="i_partners">    
                        {!! Form::label('name','Major Findings',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                            <div class="col-md-6 col-sm-7 col-xs-12 " >
                                <div class="input-field-group m_findings">
                                    {!! Form::text('m_findings[]', '' ,['class' => 'form-control'] ) !!}
                                    
                                </div>
                            <div class="addmore"  >
                                <a href="javascript:;" class="addmorebtn_m_findings btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                            </div>
                            </div>

                               
                    </div>
                    <div class="form-group" id="i_partners">    
                        {!! Form::label('name','Recommendation',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12', )) !!}
                            
                            <div class="col-md-6 col-sm-7 col-xs-12 " >
                                <div class="input-field-group recom">
                                    {!! Form::text('recom[]', '' ,['class' => 'form-control'] ) !!}
                                </div>
                                <div class="addmore"  >
                                    <a href="javascript:;" class="addmorebtn_recom btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                                </div>
                            </div>

                            
                               
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                            Others <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('others', null ,['class' => 'form-control'] ) !!}
                            </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                            Objective <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {!! Form::text('obj', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div> 
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                               Location
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('location', null ,['class' => 'form-control'] ) !!}
                                </div>
                    </div>
                    
                    
                                  <div class="form-group" id="i_partners">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> 
                            Conduct Date <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="input-field-group conduct">
                                <div class="control-group">
                                    <div class="controls">
                                         {{ Form::text('c_date[]', null, ['class' => 'form-control has-feedback-left' , 'aria-describedby'=>'inputSuccess2Status4','id'=>'datepick-all','required']) }}
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                </div>
                                {!! Form::text('c_type[]', null ,['class' => 'form-control', 'placeholder'=>'Enter Conduct type'] ) !!}
                            </div>
                            <div class="addmore"  >
                                <a href="javascript:;" class="addmorebtn_conduct btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Publish Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                    
                                                  {{ Form::text('publish_date', null, ['class' => 'form-control has-feedback-left' , 'aria-describedby'=>'inputSuccess2Status4','id'=>'datepick-all','required']) }}

                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                    
      
                      
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                               Target Audience
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('target_aud', null ,['class' => 'form-control'] ) !!}
                                </div>
                    </div>
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                               Short Intro/Methodology
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::textarea('sh_intro', null ,['class' => 'form-control'] ) !!}
                                </div>
                    </div>
                    <div class="form-footer">
                        <div class="col-md-6 col-sm-7 col-xs-12 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('research.index') }}" class="btn btn-danger">Cancel</a>
                            
                        </div>
                    </div>
                     
               
                {{Form::close()}}
            </div>
        </div>

    @endsection
