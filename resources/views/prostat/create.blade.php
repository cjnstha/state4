@extends('layouts.master')


    @section('content')
       

    <!--     <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12"> -->
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add New Project Status <small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">


                           {!! Form::open( array( 'route'=> 'prostat.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
                                
                               <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Project Code
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                                 {{ Form::select('project_code', $project_code ,null, ['class' => 'form-control sumoSelect','placeholder'=>'-- Select --','required']) }}

                                </div>
                            </div>

                              
                          <div class="form-group">
                                {!! Form::label('Activity Type:','Activity Type:',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('act_type','Activity',array('class'=>'control-label')) !!}
                                               {!! Form::select('act_type[]', $activity,  null, ['class' => 'form-control sumoSelect selectkoselect','id'=>'selectkoselect','multiple','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                    {!! Form::label('act_others','Other',array('class'=>'control-label')) !!}
                                                    {{Form::text('act_others', null, ['class'=>'form-control','id'=>'activitytext'])}}
                                            </div>
                                        </div>
                                       
                                    </div>
                                  
                                </div>
                            </div> 


                              
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Output
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('out_put', '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>    
                           
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Planned date 
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                   
                                                <input type="text" name="planned_date" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            
                               <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                Total Budget
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                               {!! Form::text('pb_total', '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div> 

                            

                              {{-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Districts
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                   <select class="form-control   district sumoSelect" name="district_id[]" placeholder="-- Select District --" multiple required>
                                      @foreach($districts as $distk=>$distv)
                                         <option value="{{$distk}}"> {{$distv}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div> --}}


         
            



                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Unit/Quantity
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('unitQ', '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>    
                           <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Total target
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('t_target', '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>   
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Completed Before
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('comp_before', '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Target this year
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('target_yr', '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>   
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Remaining Target
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('remaining', '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div> 
                            {{-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Planned date 
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                   
                                                <input type="text" name="p_date"  class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div> --}}

                            <div class="form-group">
                                {!! Form::label('provinces', 'Province *',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    {{ Form::select('province_id[]', $provinces ,null, ['class' => 'form-control sumoSelect miscProvince','multiple']) }}
                                </div>
                            </div> 
                            <div class="form-group">
                                {!! Form::label('districts', 'District *',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    {{ Form::select('district_id[]', [] ,null, ['class' => 'form-control sumoSelect miscDistrict','multiple']) }}
                                    {{-- {!! Form::select('districts[]', $districts, '' ,['class' => 'form-control sumoSelect', 'multiple', 'required'] ) !!} --}}
                                </div>
                            </div> 
                            <div class="form-group">
                                {!! Form::label('LocalGovernmentUnit', 'Local Government Unit *',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    {{ Form::select('lgu_id[]', [] ,null, ['class' => 'form-control sumoSelect miscLgu','multiple']) }}
                                </div>
                            </div> 
                            
                            <?php /*
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                Provinces
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::select('state_id[]', $states, null ,['class' => 'form-control zone sumoSelect', 'placeholder'=>'-- Select --', 'multiple', 'required'] ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                Districts
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12 district sumoSelect" name="district_id[]" multiple required>
                                        @foreach($districts as $district)
                                        <option class="hide" data-attr="{{$district->state_id}}" value="{{$district->district_id}}">{{$district->district_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            */ ?>
                            

                            <div class="form-footer">
                                <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                    <button type="submit"  class="btn btn-success">Submit</button>
                                    <a href="{{ route('prostat.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                   

                        </div>
                    </div>{!! Form::close() !!}
                <!-- </div> 
            </div>
        </div> -->

      @endsection