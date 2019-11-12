@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Consultancy Services</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                {{Form::model($service, ['route'=>['consultancy.update', $service->id], 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate', 'method'=>'patch', 'files'=> 'true'])}}
                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Consultant Roster Name<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

                             {!! Form::select('consultant_id', $consultant_name  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) !!}

                        </div>
                    </div>
                {{ Form::hidden('id', $service->id) }}
               
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Type
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::text('type', null, ['class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hired Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">            
                                               
                                                 {{ Form::text('hired_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span> 
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="duration">Duration
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::text('duration', null, ['class'=>'form-control','placeholder'=>'For eg: 3 months'])}}
                        </div>
                    </div>

                    <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Total Fee<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">NPR</span>
                                            {{ Form::text('total_fee', null, ['placeholder'=>'Enter Total fee', 'class' => 'form-control', 'required']) }}
                                        </div>
                                       
                                    </div>
                    </div> 
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contract Signed Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                    
                                                 {{ Form::text('contract_signed_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Delivery Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                               
                                                 {{ Form::text('delivery_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Contact Documentation">Contact Documentation <br />(doc, docx or pdf)
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <!-- 
                            {{$service->contract_document}}
                            {{Form::file('contract_document', ['class'=>'form-control'])}} 
                            -->
                            <ol class="uploaded-files">
                                <li><p>  <a class="link" href="{{ url('consultancy/downloadFile/'.$service->contract_document ) }}">
                                        {{isset($service->contract_document) ? $service->contract_document: ''}}
                                    </a> </p></li>
                            </ol>
                            <div class="browse input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        <i class="fa fa-folder-open"></i>
                                        Browse {{Form::file('contract_document', ['class'=>'form-control'])}}
                                    </span>
                                </label>
                                <input type="text" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="TOR">TOR 
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::textarea('tor_text', null, ['class'=>'form-control','size' => '3x3'])}}
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="TOR Documentation">TOR  Documentation <br />(doc, docx or pdf)
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <!-- {{$service->tor_document}} -->
                            <!-- {{Form::file('tor_document', ['class'=>'form-control'])}} -->

                            <ol class="uploaded-files">
                                 <li><p>  <a class="link" href="{{ url('consultancy/downloadFile/'.$service->tor_document ) }}">
                                        {{isset($service->contract_document) ? $service->tor_document: ''}}
                                    </a> </p></li>

                            </ol>
                            <div class="browse input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        <i class="fa fa-folder-open"></i>
                                        Browse {{Form::file('tor_document', ['class'=>'form-control'])}}
                                    </span>
                                </label>
                                <input type="text" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="TOR">Completion Review 
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::textarea('completion_review', null, ['class'=>'form-control','size' => '3x3'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="TOR">Remarks 
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::textarea('remarks', null, ['class'=>'form-control','size' => '3x3'])}}
                        </div>
                    </div>
                    <?php /* 
                            
                                                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Department/Project <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">

                             <div class="check">
                              
                               @if(!empty($service->project_id))
                                {{ Form::radio('project_if', 'Other', true, ['class' => 'inbox','id'=>'selectradio']) }}
                               @else
                                    {{ Form::radio('project_if', 'Other', false, ['class' => 'inbox','id'=>'selectradio']) }}
                                @endif
                                Project Code
                            </div>
                            @if(!empty($service->project_id))
                            
                                {!! Form::select('project_id', $projects,  null, ['placeholder'=>'--Select--','class' => 'form-control selectkoselect','id'=>'selectkoselect','required']) !!}
                               @else
                              
                                    {!! Form::select('project_id', $projects,  null, ['placeholder'=>'--Select--','class' => 'form-control selectkoselect','id'=>'selectkoselect','disabled','required']) !!}
                                @endif

                            

                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-12">

                            <div class="check">
                                @if(!empty($service->department_name))
                                    {{ Form::radio('department_if', 'Other', true, ['class' => 'inbox','id'=>'document']) }}
                                @else
                                    {{ Form::radio('department_if', 'Other', false, ['class' => 'inbox','id'=>'document']) }}
                                @endif
                                   
                                Department Name
                            </div>
                             @if(!empty($service->department_name))

                                     {{Form::text('department_name', null, ['class'=>'form-control','id'=>'documenttext'])}}
                                @else
                                
                                    {{Form::text('department_name', null, ['class'=>'form-control','disabled','id'=>'documenttext'])}}
                                @endif

                           

                        </div>
                      </div>
                      

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Department/Project <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">

                             <div class="radio-wrap">
                             <div class="radio-group">
                                   @if(!empty($service->project_id))
                                    {{ Form::radio('project_if', 'Other', true, ['class' => 'inbox','id'=>'selectradio']) }}
                                   @else
                                        {{ Form::radio('project_if', 'Other', false, ['class' => 'inbox','id'=>'selectradio']) }}
                                    @endif
                                    <label for="selectradio">Project Code</label>
                                 
                             </div>
                              
                            </div>
                            <div class="form-group">
                                
                            @if(!empty($service->project_id))
                            
                                {!! Form::select('project_id', $projects,  null, ['placeholder'=>'--Select--','class' => 'form-control selectkoselect','id'=>'selectkoselect','required']) !!}
                               @else
                              
                                    {!! Form::select('project_id', $projects,  null, ['placeholder'=>'--Select--','class' => 'form-control selectkoselect','id'=>'selectkoselect','disabled','required']) !!}
                                @endif
                            </div>

                            

                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-12">

                            <div class="radio-wrap">
                            <div class="radio-group">
                                @if(!empty($service->department_name))
                                    {{ Form::radio('department_if', 'Other', true, ['class' => 'inbox','id'=>'document']) }}
                                @else
                                    {{ Form::radio('department_if', 'Other', false, ['class' => 'inbox','id'=>'document']) }}
                                @endif
                                   
                                <label for="document">Department Name</label>
                                
                            </div>
                            </div>
                            <div class="form-group">
                             @if(!empty($service->department_name))

                                     {{Form::text('department_name', null, ['class'=>'form-control','id'=>'documenttext'])}}
                                @else
                                
                                    {{Form::text('department_name', null, ['class'=>'form-control','disabled','id'=>'documenttext'])}}
                                @endif
                                </div>

                           

                        </div>
                      </div>
                    */ ?>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Product URL
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::text('product_url', null, ['class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Quality of Work
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="radio-wrap">
                                <ul>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('qow', 'very_good', false,['class' => 'donthaveclass','id' => 'radio-1']) }}  
                                            <label for="radio-1">Very Good</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('qow', 'very_good', false,['class' => 'donthaveclass','id' => 'radio-2']) }}  
                                            <label for="radio-2">Good</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('qow', 'poor', false,['class' => 'donthaveclass','id' => 'radio-3']) }}  
                                            <label for="radio-3">Poor</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!--
                            {{ Form::radio('qow', 'very_good', false, ['class' => 'donthaveclass']) }}  Very Good  <br />
                            {{ Form::radio('qow', 'good',false, ['class' => 'donthaveclass']) }} Good<br />
                            {{ Form::radio('qow', 'poor', false, ['class' => 'donthaveclass']) }}  Poor
                            -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Timely Delivery
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="radio-wrap">
                                <ul>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('timely_delivery', 'very_good', false,['class' => 'donthaveclass','id' => 'timely_delivery-1']) }}  
                                            <label for="timely_delivery-1">Very Good</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('timely_delivery', 'very_good', false,['class' => 'donthaveclass','id' => 'timely_delivery-2']) }}  
                                            <label for="timely_delivery-2">Good</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('timely_delivery', 'poor', false,['class' => 'donthaveclass','id' => 'timely_delivery-3']) }}  
                                            <label for="timely_delivery-3">Poor</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!--
                            {{ Form::radio('timely_delivery', 'very_good', false, ['class' => 'donthaveclass']) }}  Very Good  <br />
                            {{ Form::radio('timely_delivery', 'good', false, ['class' => 'donthaveclass']) }} Good<br />
                            {{ Form::radio('timely_delivery', 'poor', false, ['class' => 'donthaveclass']) }}  Poor
                            -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Managed by <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

                             {!! Form::select('staff_id',   $staff_name  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) !!}

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Scope">Scope 
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::text('scope', null, ['class'=>'form-control'])}}
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

                                             <li>
                                              
                                             </li>
                                        </ul>
                            </div> <!-- end radio-wrap -->
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group" >
                               
                                            {{ Form::selectRange('quarter_year', 2000, 2030 ,null, ['class'=>'sumoSelect','id'=>'quarter_select_year']) }}
                                        </div>
                                </div>
                            </div>
                            

                            
                       
                        </div>
                    </div>  

                        <div class="x_panel x_panel-box">


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            Department/Project <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio-wrap">
                                        <div class="radio-group">
                                            @if(!empty($service->project_id))
                                                {{ Form::radio('project_if', 'Other', true, ['class' => 'inbox','id'=>'selectradio']) }}
                                            @else
                                                {{ Form::radio('project_if', 'Other', false, ['class' => 'inbox','id'=>'selectradio']) }}
                                            @endif

                                            <label for="selectradio">Project Code</label> 
                                        </div>  
                                    </div>
                                    <div class="form-group">
                                        @if(!empty($service->project_id))
                                            {!! Form::select('project_id', $projects,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect selectkoselect','id'=>'selectkoselect','required']) !!}
                                        @else
                                            {!! Form::select('project_id', $projects,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect selectkoselect','id'=>'selectkoselect','disabled','required']) !!}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio-wrap">
                                        <div class="radio-group">
                                            @if(!empty($service->department_name))
                                                {{ Form::radio('department_if', 'Other', true, ['class' => 'inbox','id'=>'document']) }}
                                            @else
                                                {{ Form::radio('department_if', 'Other', false, ['class' => 'inbox','id'=>'document']) }}
                                            @endif
                                            
                                            <label for="document">Department Name</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                         @if(!empty($service->department_name))
                                            {{Form::text('department_name', null, ['class'=>'form-control','id'=>'documenttext'])}}
                                        @else
                                            {{Form::text('department_name', null, ['class'=>'form-control','disabled','id'=>'documenttext'])}}
                                        @endif
                                    </div>
                                </div>
                            </div>
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


                    <div class="ln_solid"></div>
                    <div class="form-group" >
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('consultancy.index') }}" class="btn btn-danger">Cancel</a>
                            {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                        </div>
                    </div>

                {{Form::close()}}
            </div>
        </div>

    @endsection
