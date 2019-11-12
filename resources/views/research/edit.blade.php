@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Research</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">

             <div class="hide add_m_findings">
                <div class="new-field">
                    {!! Form::text('m_findings[]', null ,['class' => 'form-control'] ) !!}
                    <div id="del_input">
                        <span class="glyphicon glyphicon-trash "></span>
                    </div>
                </div>
            </div>
            <div class="hide add_recom">
                <div class="new-field">
                    {!! Form::text('recom[]', null ,['class' => 'form-control'] ) !!}
                    <div id="del_input">
                        <span class="glyphicon glyphicon-trash "></span>
                    </div>
                </div>
            </div>
            <div class="hide add_conduct">
                
                <div class="new-field border-block">
                    <div class="control-group">
                        <div class="controls">
                            {{ Form::text('c_date[]', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                        </div>
                    </div>
                         {!! Form::text('c_type[]', null ,['class' => 'form-control', 'placeholder'=>'Enter Conduct type'] )  !!}
                    <div id="del_input">
                        <span class="glyphicon glyphicon-trash "></span> Delete
                    </div>

                </div>
            </div>

                <br />
                {{Form::model($posts, ['route'=>['research.update', $posts->id], 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left','method'=>'patch', 'data-parsley-validate','files'=> 'true'])}}
               
                  
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Project Code <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

                             {!! Form::select('project_id', $project_code  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) !!}

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Contact Documentation">Document <br />(doc, docx or pdf)
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                         <ol class="uploaded-files">
                                <li>
                                    <a class="link" href="{{ url('research/downloadFile/'.$posts->document ) }}">
                                        {{isset($posts->original_document) ? $posts->original_document: ''}}
                                    </a>
                                </li>
                            </ol>
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse {{Form::file('document',null, ['class'=>'form-control'])}}
                                </span>
                            </label>
                            <input type="text" class="form-control" value= "" disabled>
                        </div>
                        <!-- {{Form::file('document',null, ['class'=>'form-control'])}} -->
                        </div>
                    </div>
                    
                    <div class="form-group" id="i_partners">    
                        {!! Form::label('name','Major Findings',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                            <?php $count= 1; ?>
                            <div class="col-md-6 col-sm-7 col-xs-12" >
                            <div class="input-field-group m_findings">
                            @foreach($m_findings as $m)
                            @if ($count==1)
                                {!! Form::text('m_findings[]', $m ,['class' => 'form-control'] ) !!}
                            @else
                                <div class="add_m_findings">
                                    <div class="new-field">
                                        {!! Form::text('m_findings[]', $m ,['class' => 'form-control'] ) !!}
                                        <span class="glyphicon glyphicon-trash " id="del_input"></span>
                                    </div>
                                </div>
                            @endif
                             <?php $count +=1; ?>   
                            @endforeach
                            </div>
                            <div class="addmore"  >
                                <a href="javascript:;" class="addmorebtn_m_findings btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                            </div>
                            </div>

                            
                               
                    </div>
                    <div class="form-group" id="i_partners">    
                        {!! Form::label('name','Recommendation',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12', )) !!}
                             <?php $count= 1; ?>
                            <div class="col-md-6 col-sm-7 col-xs-12" >
                                <div class="input-field-group recom">
                                    @foreach($recom as $r)
                                @if ($count==1)
                                    {!! Form::text('recom[]', $r ,['class' => 'form-control'] ) !!}
                                @else
                                    <div class=" add_recom">
                                        <div class="new-field">
                                            {!! Form::text('recom[]', $r ,['class' => 'form-control'] ) !!}
                                            <div id="del_input">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </div>
                                        </div>
                                    </div>
                                
                                @endif
                                <?php $count +=1; ?>   
                                @endforeach    
                                </div>
                                <div class="addmore"  >
                                    <a href="javascript:;" class="addmorebtn_recom btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                                </div>
                            
                            </div>
                               
                    </div>
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                               Others
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('others', null ,['class' => 'form-control'] ) !!}
                                </div>
                    </div> 
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                               Objective
                                <span class="required">*</span></label>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Conduct Date <span class="required">*</span>
                                </label>
                                <?php $count= 1; ?>
                                <div class="col-md-6 col-sm-7 col-xs-12 ">
                                    <div class="input-field-group conduct">
                                        @for  ($c = 0; $c < $c_type_count; $c++)
                                        @if ($count==1)   
                                            
                                                <div class="control-group">
                                                    <div class="controls">
                                                    
                                                         {{ Form::text('c_date[]', $c_date[$c], ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                          
                                                    </div>
                                                </div>
                                           
                                            {!! Form::text('c_type[]', $c_type[$c] ,['class' => 'form-control', 'placeholder'=>'Enter Conduct type'] ) !!}
                                        @else
                                            <div class="add_conduct">
                                                <div class="new-field border-block">
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            {{ Form::text('c_date[]', $c_date[$c], ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                                                  
                                                        </div>
                                                    </div>
                                                {!! Form::text('c_type[]', $c_type[$c] ,['class' => 'form-control', 'placeholder'=>'Enter Conduct type'] )  !!}
                                                <div id="del_input">
                                                    <span class="glyphicon glyphicon-trash " ></span> Delete
                                                    
                                                </div>

                                                </div>
                                            </div>
                                        @endif
                                        <?php $count +=1; ?>  
                                        @endfor
                                    </div>
                                <div class="addmore"  >
                                    <a href="javascript:;" class="addmorebtn_conduct btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                                </div>
                                </div><!-- /col -->
                            </div>
                            
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Publish Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                    
                                                 {{ Form::text('publish_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                  
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
