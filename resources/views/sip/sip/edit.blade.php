@extends('layouts.master')


    @section('content')
       

    <!--     <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12"> -->
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit SIP <small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                                  <span class="glyphicon glyphicon-trash" id="del_input"></span>
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
                                 <span class="btn btn-danger btn-sm glyphicon glyphicon-remove " id="del_input"></span>
                            </div>    
                            </div>


                           {!! Form::open( array( 'route'=> ['sip.update', $posts->id],'files' => true,'accept-charset'=>'UTF-8','method'=>'patch', 'class'=>'form-horizontal' ) ) !!}
                                
                            
                               <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Project Code
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                                 {{ Form::select('project_code', $project_code ,isset($posts) ?$posts->project_code : '', ['class' => 'form-control sumoSelect','placeholder'=>'-- Select --','required']) }}

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Activity Code
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('act_code', isset($posts) ? $posts->act_code : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name of Activities
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('name', isset($posts) ? $posts->name : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>
                        

                                   <div class="form-group">
                                {!! Form::label('Activity Type:','Activity Type:',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('act_type','Activity',array('class'=>'control-label')) !!}
                                                  <select class="form-control sumoSelect"  name="act_type[]" multiple required>
                                                        <option value="">--Select--</option>
                                                     @foreach($activity as $key => $value)
                                                            <option value="{{ $key }}"    @foreach($act_type_id as $k => $val) @if($key == $val) selected @endif    @endforeach >{{ $value }}</option>
                                                     @endforeach
                                            </select> 
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                             {!! Form::label('Other','Other',array('class'=>'control-label')) !!}
                                            {{Form::text('act_others',  isset($posts) ? $posts->act_others: '', ['class'=>'form-control'])}}
                                            </div>
                                        </div>
                                       
                                    </div>
                                  
                                </div>
                            </div> 
  
                           
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Output
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('out_put', isset($posts) ? $posts->out_put : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Planned date 
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        {{--<input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">--}}
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                    {{--<div class="col-md-11 xdisplay_inputx form-group has-feedback">--}}
                                                <input type="text" name="planned_date" value="{{ isset($posts) ? $posts->imp_date : '' }}" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    {{--</div>--}}
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
                                                {!! Form::text('pb_travel', isset($posts) ? $posts->pb_travel : ''  ,['class' => 'form-control pb_travel'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_accom','Accom/Per-diem:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_accom', isset($posts) ? $posts->pb_accom : ''  ,['class' => 'form-control pb_accom'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_program','Program:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_program', isset($posts) ? $posts->pb_program : ''  ,['class' => 'form-control pb_program'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_total','Total:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_total', isset($posts) ? $posts->pb_total : ''  ,['class' => 'form-control pb_total'] ) !!}
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div> 
                            
                            <div class="form-group" id="i_partners">    
                                {!! Form::label('name','Implementing Partners',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                <?php $count= 1; ?>
                                <div class="col-md-6 col-sm-6 col-xs-12 " >
                                    <div class="input-field-group test2">
                                        @foreach ($i_partners as $i)
                                            @if ($count==1)
                                                {!! Form::text('i_partners[]',$i,['class' => 'form-control'] ) !!}
                                
                                             @else
                                                <div class="add_c_partners">
                                                   <div class="new-field">
                                                        {!! Form::text('i_partners[]', $i ,['class' => 'form-control c_part'] ) !!}
                                                        <span class="glyphicon glyphicon-trash" id="del_input"></span>
                                                    </div>
                                                </div>

                                            @endif
                                            <?php $count +=1; ?>   
                                        @endforeach
                                    </div>
                                    <div class="addmore"  >
                                        <a href="javascript:;" class="addmorebtn_i_partners btn btn-default btn-sm" >  <i class="fa fa-plus"></i>  Add New 
                                        </a>
                                    </div>
                                </div>
                                
                                
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Unit/Quantity
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('unitQ', isset($posts) ? $posts->unitQ : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>    
                           <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Total target
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('t_target', isset($posts) ? $posts->t_target : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>   
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Completed Before
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('comp_before', isset($posts) ? $posts->comp_before : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>  
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Target this year
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('target_yr', isset($posts) ? $posts->comp_before : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>   
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Remaining Target
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('remaining', isset($posts) ? $posts->remaining : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Planned date 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        {{--<input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">--}}
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                    {{--<div class="col-md-11 xdisplay_inputx form-group has-feedback">--}}
                                                <input type="text" name="p_date" value="{{ isset($posts) ? $posts->p_date : '' }}" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
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
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('n_act', isset($posts) ? $posts->n_act : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>
                            <div class="form-footer">
                                <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                    <button type="submit"  class="btn btn-success">Submit</button>
                                    <a href="{{ route('sip.index') }}" class="btn btn-primary">Cancel</a>
                                </div>
                            </div>
                   

                        </div>
                    </div>{!! Form::close() !!}
                <!-- </div> 
            </div>
        </div> -->

      @endsection