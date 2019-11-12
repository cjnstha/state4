@extends('layouts.master')


    @section('content')
       

    <!--     <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12"> -->
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add New SIP <small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                           <div class="hide add_c_partners">
                                <div class="new-field">
                                {!! Form::text('c_partners[]', '' ,['class' => 'form-control c_part'] ) !!}
                                 <span class="glyphicon glyphicon-trash" id="del_input"></span>
                                </div>
                            </div>
                            <div class="hide add_i_partners">
                                <div class="new-field">
                                {!! Form::text('i_partners[]', '' ,['class' => 'form-control'] ) !!}
                                 <span class="glyphicon glyphicon-trash " id="del_input"></span>
                                </div>
                            </div>

                            <div class="hide add_r_persons">
                            <div class="new-field">
                               {!! Form::text('r_persons[]', '' ,['class' => 'form-control'] ) !!}
                                    <select class="form-control sumoSelect" id="sel1" name="res_p[]">
                                    <option value="0">--Select--</option>
                                    <option value="1">Internal</option>
                                    <option value="2">External</option>
                                </select>
                                 <span class="glyphicon glyphicon-trash " id="del_input"></span>
                            </div>    
                            </div>


                           {!! Form::open( array( 'route'=> 'sip.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
                                
                               <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Project Code
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                                 {{ Form::select('project_code', $project_code ,null, ['class' => 'form-control sumoSelect','placeholder'=>'-- Select --','required']) }}

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Activity Code
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('act_code', '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name of Activities
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('name', '' ,['class' => 'form-control'] ) !!}
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
                                {!! Form::label('p_budget','Planned budget (NRS)',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="row">
                                         
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_travel','Travel:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_travel', '' ,['class' => 'form-control pb_travel'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_accom','Accom/Per-diem:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_accom', '' ,['class' => 'form-control pb_accom'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_program','Program:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_program', '' ,['class' => 'form-control pb_program'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_total','Total:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_total', '' ,['class' => 'form-control pb_total'] ) !!}
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div> 
                            
                            <div class="form-group" id="i_partners">    
                                {!! Form::label('name','Implementing Partners',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                                <div class="col-md-6 col-sm-7 col-xs-12 " >
                                    <div class="input-field-group test2">
                                        {!! Form::text('i_partners[]', '' ,['class' => 'form-control'] ) !!}
                                    </div>
                                    <div class="addmore"  >
                                        <a href="javascript:;" class="addmorebtn_i_partners btn btn-default btn-sm" >
                                            <i class="fa fa-plus"></i> Add New 
                                        </a>
                                    </div>
                                </div>
                            </div>

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
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Planned date 
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                        {{--<input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">--}}
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                    {{--<div class="col-md-11 xdisplay_inputx form-group has-feedback">--}}
                                                <input type="text" name="p_date"  class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    {{--</div>--}}
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Nature of activity
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('n_act', '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>

                            <div class="form-footer">
                                <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                    <button type="submit"  class="btn btn-success">Submit</button>
                                    <a href="{{ route('sip.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                   

                        </div>
                    </div>{!! Form::close() !!}
                <!-- </div> 
            </div>
        </div> -->

      @endsection