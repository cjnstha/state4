@extends('layouts.master')


    @section('content')
       

    <!--     <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12"> -->
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Project Status <small></small></h2>
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

                           

                           {!! Form::open( array( 'route'=> ['prostat.update', $posts->id],'files' => true,'accept-charset'=>'UTF-8','method'=>'patch', 'class'=>'form-horizontal' ) ) !!}
                                
                            
                               <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Project Code
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                                 {{ Form::select('project_code', $project_code ,isset($posts) ?$posts->project_code : '', ['class' => 'form-control sumoSelect','placeholder'=>'-- Select --','required']) }}

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
                                      
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                  
                                                <input type="text" name="planned_date" value="{{ isset($posts) ? $posts->planned_date : '' }}" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            
                                    
                               
                      <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Total Budget
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                               {!! Form::text('pb_total', isset($posts) ? $posts->pb_total : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div> 
                             {{-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Districts
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <select class="form-control   district sumoSelect" name="district_id[]" placeholder="-- Select District --" multiple required>
                  @foreach($districts as $distk=>$distv)
                     <option value="{{$distk}}"  @foreach($district_id_exp as $k => $val) @if($distk == $val) selected @endif    @endforeach > {{$distv}}</option>
                @endforeach
                </select>
                                </div>
                            </div> --}}



                         
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
                            {{-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Planned date 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                   
                                                <input type="text" name="p_date" value="{{ isset($posts) ? $posts->p_date : '' }}" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
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
                                    <select class="form-control sumoSelect miscProvince" name="province_id[]" placeholder="-- Select Province --" multiple required>
                                        @foreach($provinces as $distk=>$distv)
                                        <option value="{{$distk}}"  @foreach($province_id_exp as $k => $val) @if($distk == $val) selected @endif    @endforeach > {{$distv}}</option>
                                       @endforeach
                                 </select>
                                </div>
                            </div> 
                            <div class="form-group">
                                {!! Form::label('districts', 'District *',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <select class="form-control sumoSelect miscDistrict" name="district_id[]" placeholder="-- Select District --" multiple required>
                                        @foreach($districts as $distk=>$distv)
                                        <option value="{{$distk}}"  @foreach($district_id_exp as $k => $val) @if($distk == $val) selected @endif    @endforeach > {{$distv}}</option>
                                       @endforeach
                                 </select>
                                    {{-- {!! Form::select('district_id[]', $districts, array_map('intval', explode(',', $posts->districts)) ,['class' => 'form-control sumoSelect', 'multiple', 'required'] ) !!} --}}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('LocalGovernmentUnit', 'Local Government Unit *',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <select class="form-control sumoSelect miscLgu" name="lgu_id[]" placeholder="-- Select Lgu --" multiple required>
                                        @foreach($lgus as $distk=>$distv)
                                        <option value="{{$distk}}"  @foreach($lgu_id_exp as $k => $val) @if($distk == $val) selected @endif    @endforeach > {{$distv}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-footer">
                                <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                    <button type="submit"  class="btn btn-success">Submit</button>
                                    <a href="{{ route('prostat.index') }}" class="btn btn-primary">Cancel</a>
                                </div>
                            </div>
                   

                        </div>
                    </div>{!! Form::close() !!}
                <!-- </div> 
            </div>
        </div> -->

      @endsection