@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New IEC Material</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                {{Form::open(['route'=>'iecmaterial.store', 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate', 'files'=> 'true'])}}
               
                <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Theme <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{ Form::select('theme', [
                                    ''  => '--Select Option --',
                                   'education' => 'Education',
                                   'gender' => 'Gender base',
                                   'violence' => 'Violence'] ,null, ['class' => 'form-control sumoSelect','required']) }}
                          
                        </div>
                </div>

                 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Focal Person <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">

                             {!! Form::select('staff_id',   $staff_name  ,  null, ['placeholder'=>'--Select Option --','class' => 'form-control sumoSelect','required']) !!}

                        </div>
                    </div>

                <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Type</label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{ Form::select('type', [
                                    ''  => '--Select Option --',
                                   'Poster' => 'Poster',
                                   'Broucher' => 'Broucher',
                                   'Audio' => 'Audio',
                                    'Video' => 'Video',
                                   'Print' => 'Print',
                                   'Banner' => 'Banner'] ,null, ['class' => 'form-control sumoSelect','required']) }}
                          
                        </div>
                </div>


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type">Target Audience
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{Form::text('target_audience', null, ['class'=>'form-control','required'])}}
                        </div>
                    </div>

                <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Production Date <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">            
                                               
                                                 {{ Form::text('production_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span> 
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>


                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type"> No. of Copies
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{Form::text('no_of_copies', null, ['class'=>'form-control','required'])}}
                        </div>
                    </div>

                     <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Cost<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-7 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">NPR</span>
                                            {{ Form::text('cost', null, ['placeholder'=>'Enter Total Cost', 'class' => 'form-control', 'required']) }}
                                        </div>
                                       
                                    </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type">Sample</label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{Form::text('sample', null, ['class'=>'form-control','placeholder'=>'https://www.google.com'])}}
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Language</label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{ Form::select('language[]', [
                                'nepali' => 'Nepali',
                                'english' => 'English'] ,null, ['class' => 'form-control sumoSelect','multiple','required']) }}
                          
                        </div>
                </div>

                   <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type">Quarter
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="radio-wrap">
                                <ul>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('quarter', '1', false,['class' => 'quarter_year_select','id' => 'radio-1','required']) }}  
                                            <label for="radio-1">1<sup>st</sup> </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('quarter', '2', false,['class' => 'quarter_year_select','id' => 'radio-2','required']) }}  
                                            <label for="radio-2">2<sup>nd</sup></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('quarter', '3', false,['class' => 'quarter_year_select','id' => 'radio-3','required']) }}  
                                            <label for="radio-3">3<sup>rd</sup></label>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="radio-group">
                                            {{ Form::radio('quarter', '4', false,['class' => 'quarter_year_select','id' => 'radio-4','required']) }}  
                                            <label for="radio-4">4<sup>th</sup></label>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div> <!-- end radio-wrap -->

                            <div class="form-group hide" id="quarter-year">
                               
                                {{ Form::selectRange('quarter_year', 2000, 2030 ,null, ['class'=>'sumoSelect','id'=>'quarter_select_year','placeholder'=>'-- Select Year --']) }}
                            </div>
                       
                        </div>
                    </div>
                
                      <div class="x_panel x_panel-box">
           
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Project Code <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-7 col-xs-12">

                        {!! Form::select('project_id', $projects,  null, ['placeholder'=>'--Select Option --','class' => 'form-control sumoSelect','required']) !!}

                    </div>
                </div>


            
              <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12"> Project <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">

                             {!! Form::select('goal_id', $goals  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','id'=>'goalreportid','data-format'=>'vertical','required']) !!}

                        </div>
                    </div>
            
                  <div class="x_content" id="goal-report" style="display: none;">
                  
                    report will be shown
                </div>



        
          </div>




     


     

                    
                    <div class="form-footer" >
                        <div class="col-md-8 col-sm-7 col-xs-12 col-md-offset-2 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('iecmaterial.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                {{Form::close()}}
            </div>
        </div>

    @endsection
