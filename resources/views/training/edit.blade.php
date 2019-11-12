@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Training Participation</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                {{Form::model($training, ['route'=>['trainings.update', $training->id], 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate', 'method'=>'patch'])}}
                
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Training Name
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::text('training_name', null, ['class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">District
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                              <select class="form-control sumoSelect" name="district_id[]" placeholder="-- Select District --" multiple required>
                                     @foreach($districts as $distk=>$distv)
                                   <option value="{{$distk}}"  @foreach($district_id_exp as $k => $val) @if($distk == $val) selected @endif    @endforeach > {{$distv}}</option>
                                   @endforeach
                             </select>
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
                                    <div class="form-group" >
                                            {{ Form::selectRange('quarter_year', 2000, 2030 ,null, ['class'=>'sumoSelect','id'=>'quarter_select_year','placeholder'=>'-- Select Year --']) }}
                                        </div>
                                </div>
                            </div>
                             <!-- end radio-wrap -->

                           
                        </div>
                    </div>





                           <div class="form-group beneficiary_in_training">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Beneficiary
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="input-field-group benef-detail">
                                 <select class="form-control sumoSelect" name="benef_id[]" placeholder="-- Select District --" multiple required>
                                     @foreach($beneficiars as $key=>$value)
                                   <option value="{{$key}}"  @foreach($benef_id_exp as $val) @if($key == $val) selected @endif    @endforeach > {{$value}}</option>
                                   @endforeach
                             </select>
                               
                            </div>
                            <div class="addmore">
                               <a href="javascript:;" class="btn btn-default btn-sm adding_benef_in_training">
                                    <i class="fa fa-plus"></i> Add New Beneficiaries
                                </a>
                            </div>
                        </div>
                    </div>




        <div class="x_panel x_panel-box">


               <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Project Code
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            
                             {{ Form::select('project_id', $projects ,null, ['class' => 'form-control sumoSelect','placeholder'=>'-- Select Here --','required']) }}

                        </div>
                    </div>
                    
              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Project <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

                             {!! Form::select('goal_id', $goals  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','id'=>'goalreportedit','data-format'=>'horizontal','required']) !!}

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
                        <div class="col-md-6 col-sm-7 col-xs-12 col-md-offset-2 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('trainings.index') }}" class="btn btn-danger">Cancel</a>
                          
                        </div>
                    </div>


                {{Form::close()}}



                <div class="modal fade benef_create_form_modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                              </button>
                              <h4 class="modal-title" id="myModalLabel">Add New Beneficiaries</h4>
                            </div>
                            
                            <form id="benef_modal_create" class="form-horizontal form-label-left" method="POST" action="javascript:;">
                        
                                {{ csrf_field() }}

                                <div class="modal-body" id="modal_body_to_place_html">
                               
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--  end of modal -->

            </div>
        </div>

    @endsection
