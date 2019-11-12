@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Planning </h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">


                  {{Form::model($posts, ['route'=>['plan.update', $posts->id], 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left','method'=>'patch', 'data-parsley-validate'])}}



                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">  Implementor
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{ Form::select('imp', $imp ,null, ['class' => 'form-control sumoSelect','placeholder'=>'-- Select Here --','required']) }}
                        </div>
                    </div> 

                    
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> Activity
                         <span class="required">*</span></label>
                            
                            <div class="col-md-6 col-sm-7 col-xs-12">

                          {!! Form::select('activity', $activity,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) !!}
                        
                    </div>
                </div>

                <div class="form-group">
                    
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Planned Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                    
                                                 {{ Form::text('p_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                 
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>  


                   
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> 
                                    Focal Person and Contact number <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    {{Form::textarea('f_person', null, ['class'=>'form-control ','required','size' => '3x3'])}}
                                </div>
                     </div>
                     <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Districts
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                  

                                   <select class="form-control   district sumoSelect" name="district_id[]" placeholder="-- Select District --" multiple required>
                                      @foreach($districts as $distk=>$distv)
                                         <option value="{{$distk}}"   @if(in_array($distk, $district_id_exp)) selected @endif > {{$distv}}</option>
                                    @endforeach
                                    </select>
               
                                </div>
                            </div>
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                VDC
                                </label>
                                  <div class="col-md-6 col-sm-7 col-xs-12">
                                     {!! Form::text('vdc', null ,['class' => 'form-control'] ) !!}
                                </div>
                    </div>    
                 
                    <div class="form-group">
                    
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">  Revised Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                    
                                                 {{ Form::text('r_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                 
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div> 
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> 
                                    Reason for Revision<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    {{Form::textarea('r_revision', null, ['class'=>'form-control ','required','size' => '3x3'])}}
                                </div>
                     </div>
                      
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">  Implemented
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{ Form::select('implemented', ["Yes"=>"Yes", "No"=>"No"] ,null, ['class' => 'form-control sumoSelect','placeholder'=>'-- Select Here --','required']) }}
                        </div>
                    </div> 
                    <div class="form-group">
                    
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Implemented Date<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                    
                                                 {{ Form::text('imp_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                 
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div> 
    

                                             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Quarter
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="radio-wrap">
                                        <ul>
                                            <li>
                                                <div class="radio-group">
                                                    {{ Form::radio('quarter', '1', false,['class' => 'quarter_year_select','id' => 'radio-5','required']) }}  
                                                    <label for="radio-5">1<sup>st</sup> </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="radio-group">
                                                    {{ Form::radio('quarter', '2', false,['class' => 'quarter_year_select','id' => 'radio-6','required']) }}  
                                                    <label for="radio-6">2<sup>nd</sup></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="radio-group">
                                                    {{ Form::radio('quarter', '3', false,['class' => 'quarter_year_select','id' => 'radio-7','required']) }}  
                                                    <label for="radio-7">3<sup>rd</sup></label>
                                                </div>
                                            </li>
                                             <li>
                                                <div class="radio-group">
                                                    {{ Form::radio('quarter', '4', false,['class' => 'quarter_year_select','id' => 'radio-8','required']) }}  
                                                    <label for="radio-8">4<sup>th</sup></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group" id="quarter-year">
                                            {{ Form::selectRange('quarter_year', 2000, 2030 ,null, ['class'=>'sumoSelect','id'=>'quarter_select_year','placeholder'=>'-- Select Year --']) }}
                                        </div>
                                </div>
                            </div>
                             <!-- end radio-wrap -->

                           
                        </div>
                    </div>



            <div class="x_panel x_panel-box">


              
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Project Code <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-7 col-xs-12">

                        {!! Form::select('project_id', $projects,  null, ['placeholder'=>'--Select Option --','class' => 'form-control sumoSelect','required']) !!}

                    </div>
                </div>


                    
              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Project <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

                             {!! Form::select('goal_id', $goals  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','id'=>'goalreportedit','data-format'=>'horizontal','required']) !!}

                        </div>
                    </div>
                    

                       <div class="form-group outputedit">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Output <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">


                               <select class="form-control sumoSelect" id="outputedit" name="output_id[]" multiple required>
                               <option disabled="disabled"> -- Select --</option>
                                @foreach($allgoalreports['output'] as $key => $value )
                                
                                    <option value="{{$key }}"  @foreach($output_exp as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>


                     <div class="form-group indicatoredit">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Inidicator <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

                            <select class="form-control sumoSelect" id="indicatoredit" name="indicator_id[]" multiple required>
                               <option disabled="disabled"> -- Select --</option>
                                @foreach($allgoalreports['indicator'] as $key => $value )
                                
                                    <option value="{{$key }}"  @foreach($indicator_exp as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>
    

                  

                      <div class="form-group activityedit">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Activity <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

        
                               <select class="form-control sumoSelect" id="activityedit" name="activity_id[]" multiple required>
                               <option disabled="disabled"> -- Select --</option>
                                @foreach($allgoalreports['activity'] as $key => $value )
                                
                                    <option value="{{$key }}"  @foreach($activity_exp as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="x_content" id="goal-report" style="display: none;">
                  
                    
                    </div>

          
            </div>


				<div class="form-footer" >
                    <div class="col-md-8 col-sm-7 col-xs-12 col-md-offset-3 col-sm-offset-3">
                        <button type="submit"  class="btn btn-success">Submit</button>
                        <a href="{{ route('plan.index') }}" class="btn btn-danger">Cancel</a>
                            {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                    </div>
                </div>

                {{Form::close()}}
                
         
        
            </div>
        </div>
    @endsection