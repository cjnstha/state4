@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Media</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">

              
                {{Form::open(['route'=>'media.store', 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate', 'files'=>'true'])}}
              
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">District</label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{ Form::select('district_id[]', $districts ,null, ['class' => 'form-control sumoSelect','multiple','required']) }}
                          
                        </div>
                </div>

             



                 
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Station
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        <select class="form-control select-act-type sumoSelect" id="sel1" name="station">
                        <option value="">--Select--</option>
                        <option value="TV">TV</option>
                        <option value="FM">FM</option>
                                                                                                                    
                        </select>
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Type of program
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <select class="form-control select-p-type sumoSelect" id="sel1" name="p_type">
                                <option value="">--Select--</option>
                                <option value="Talk show">Talk show</option>
                                <option value="Radio Drama">Radio Drama</option>
                                <option value="Magazine">Magazine</option>
                                <option value="Report">Report </option>
                                <option value="Reality Show">Reality Show</option>
                                <option value="Public Screening">Public Screening</option>
                                <option value="Others">Other</option>
                            </select>
                         {!! Form::text('p_others', '' ,['class' => 'form-control p_others hide'] ) !!}
                        </div>
                    </div> 

                     
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Eposide Number
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('ep_num', '' ,['class' => 'form-control'] ) !!}
                        </div>
                    </div> 
                    <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">BoardCast Date<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                             <input type="text" name="b_date" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                                 <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Braodcast">
                               Braodcast <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  {{Form::textarea('braodcast', null, ['class'=>'form-control ','size' => '3x3'])}}
                                
                                </div>
                    </div> 
                           <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">BoardCast Air Date<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                             <input type="text" name="boardcast_air_date" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Braodcast By">
                               Braodcast By <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  {{Form::textarea('braodcast_by', null, ['class'=>'form-control ','size' => '3x3'])}}
                                
                                </div>
                    </div> 



                    <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Produce date<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                   
                                                <input type="text" name="p_date" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                   
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        InVited Guest
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('in_guest', '' ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Beneficiars
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('benef', '' ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Polical Affilation
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('p_aff', '' ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Theme
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('theme', '' ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Produce By
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('produce_by', '' ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        URL
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('url', '' ,['class' => 'form-control'] ) !!}
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Language
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('language', '' ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>

                     <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Objectives">
                               Objectives</label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  {{Form::textarea('objectives', null, ['class'=>'form-control ','size' => '3x3'])}}
                                
                                </div>
                    </div> 

                        
           
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Keywords">
                               Keywords</label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  {{Form::textarea('keywords', null, ['class'=>'form-control ','size' => '3x3'])}}
                                
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
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Project Code<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::select('project_id', $projects, null, ['class'=>'form-control sumoSelect', 'placeholder'=>'--Select--'])}}
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


                    <div class="form-footer">
                        <div class="form-group">
                            <div class="submit-btn col-md-8 col-sm-7 col-xs-12 col-md-offset-4 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('media.index') }}" class="btn btn-danger">Cancel</a>    
                            </div>
                        </div>
                    </div>


                {{Form::close()}}
            </div>
        </div>

    @endsection
