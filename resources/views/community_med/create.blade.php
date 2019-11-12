 @extends('layouts.master')
    @section('content')
        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Community Mediator Centre</h2>
                <div class="clearfix"></div>
            </div>

            
            <div class="x_content">


                 <div class="hide add_people">
                    <div class="new-field">
                    {!! Form::text('person_name[]', null ,['class' => 'form-control'] ) !!}

                    <div id="del_input">
                            <span class="glyphicon glyphicon-trash"></span>
                        </div>
                    </div>
                </div>

                {{Form::open(['route'=>'communitymed.store', 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate', 'files'=> 'true'])}}

                   <?php /*

                       <div class="beneficiary-wrap clearfix" >
                            <h4 class="inner-title">Beneficiary Detail</h4>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Name
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('name', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Age<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                            <select class="form-control select-act-type sumoSelect" id="sel1" name="age">
                            <option value="">--Select--</option>
                            <option value="Below 15">Below 15</option>
                            <option value="15-29">15-29</option>
                            <option value="30-45">30-45</option>
                            <option value="45-Above">45-Above</option>
                             </select>                          
                            </div>
                    </div>

                    <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Gender
                                <span class="required">*</span></label>
                                
                                <div class="col-md-8 col-sm-7 col-xs-12">

                                <select class="form-control select-act-type sumoSelect" id="sel1" name="gender">
                                <option value="">--Select--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                 <option value="Others">Others</option>          
                                </select>
                                   
                               </div>
                            </div>  
                    <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Identity
                                <span class="required">*</span></label>
                                
                                <div class="col-md-8 col-sm-7 col-xs-12">

                                <select class="form-control select-act-type sumoSelect" id="sel1" name="identity">
                                <option value="">--Select--</option>
                                @foreach ($identity as $i)
                                    <option value="{{$i->id}}">{{$i->name}}</option>
                                @endforeach
                                           
                                </select>
                                   
                               </div>
                    </div> 
                   <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Caste/Ethnicity
                                <span class="required">*</span></label>
                                
                                <div class="col-md-8 col-sm-7 col-xs-12">

                                <select class="form-control select-act-type sumoSelect" id="sel1" name="caste">
                                <option value="">--Select--</option>
                                @foreach ($caste as $c)
                                   <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach                           
                                </select>
                                   
                               </div>
                    </div>    
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Organization
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('organization', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div> 
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Designation
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('designation', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>  
    


                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Beneficiary Type
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                
                          {{ Form::select('benef_type', [
                                    ''  => '--Select Option --',
                                   'Group' => 'Group',
                                   'Individual' => 'Individual'] ,null, ['class' => 'form-control sumoSelect']) }}

                                </div>
                        </div> 





                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Contact Number
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('c_number', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div> 
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Email address
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('email', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div> 
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               District
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                      <select class="form-control sumoSelect " name="district_id">
                                                        <option value="">-- Select District --</option>
                                                        @foreach($districts as $district)
                                                        <option  data-attr="{{$district->zone_id}}" value="{{$district->district_id }}">{{$district->district_name}}</option>
                                                        @endforeach
                                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               VDC/Municipality
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    {!! Form::text('vdc', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>

                         <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Ward No. <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                           

                                 {{Form::text('ward_no', null, ['class'=>'form-control'])}}
                             
                            </div>
                           
                            
                    </div>


                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Venue 
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('venue', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                      
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Implementing Organization
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('imp_org', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Donors Code
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                          <select class="form-control sumoSelect " name="donor_code">
                                            <option value="">-- Select --</option>
                                            @foreach($donor_codes as $c)
                                            <option   value="{{$c->id }}">{{$c->donor_code}}</option>
                                            @endforeach
                                        </select>
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Date From <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                  
                                                <input type="text" name="date_from" class="form-control has-feedback-left" id="single_cal4" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                   
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Date To<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                      
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                 
                                                <input type="text" name="date_to" class="form-control has-feedback-left" id="single_cal3" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Activity Type
                                <span class="required">*</span></label>
                                
                                <div class="col-md-8 col-sm-7 col-xs-12">

                                <select class="form-control select-act-type sumoSelect" id="sel1" name="act_type">
                                <option value="">--Select--</option>
                               @foreach($activity as $a)
                                    <option value="{{$a->id}}">{{$a->name}}</option>
                               @endforeach
                                                                                          
                                </select>
                                   
                               </div>
                    </div>

                       
                        </div> */ ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Name of Person
                        <span class="required">*</span></label>
                        

                        <div class="col-md-8 col-sm-7 col-xs-12">
                                
                                    <div  id="i_partners">    
                              
                                <div class="input-field-group peopleaddingclass">
                                    {!! Form::text('person_name[]', '' ,['class' => 'form-control'] ) !!}
                                </div>

                                <div class="addmore">
                                    <a href="javascript:;" class="addmorebtn_addingpeople btn btn-default btn-sm" >
                                        <i class="fa fa-plus"></i> Add New 
                                    </a>
                                </div>
                            </div>

                            <?php  //  {{ Form::select('benef_id[]', $beneficiars ,null, ['class' => 'form-control sumoSelect','multiple']) }} ?>

                        </div>
                    </div>

                  


                          
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">
                                    Case Registered Date <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <div class="control-group">
                                        <div class="controls">            
                                            {{ Form::text('case_registered_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span> 
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type"> 
                                    Nature of Case <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    {{Form::text('nature_of_case', null, ['class'=>'form-control ','required'])}}
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Type of Case <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {{ Form::select('type_of_case', [
                                            'gender' => 'Gender Base',
                                            'land' => 'Land Dispute',
                                            'dowry' => 'Dowry',
                                            'verbal' => 'Verbal Abuse'] ,null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) }}
                                  
                                </div>
                              </div>

                             <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Resolve <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {{ Form::select('resolve', [
                                           'yes' => 'Yes',
                                           'no' => 'No'] ,null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) }}
                                  
                                </div>
                              </div>
                              
                              <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Resolve Date <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-7 col-xs-12">
                                               
                                            <fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                            
                                                         {{ Form::text('resolve_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                          
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                            </div>
                              
                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Future Action <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                           

                                 {{Form::text('future_action', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                             
                            </div>
                           
                            
                    </div>


                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                           

                                 {{Form::text('status', null, ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'solved, unsolved, etc','required'])}}
                             
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
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Project Code
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            
                             {{ Form::select('project_id', $projects ,null, ['class' => 'form-control sumoSelect','placeholder'=>'-- Select Here --','required']) }}

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
                            <a href="{{ route('communitymed.index') }}" class="cancel-button">Cancel</a>
                            {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                        </div>
                    </div>
                {{Form::close()}}
            </div>
        </div>

    @endsection
