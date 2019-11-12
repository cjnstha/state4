@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add Small Grant</h2>
                <div class="clearfix"></div>
            </div>
            

            <div class="x_content">
                {{Form::open(['route'=>'sgrant.store', 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate'])}}
               
                  

                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Group or Individual
                            <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                               {{ Form::select('group_in', [
                                   'Group' => 'Group',
                                   'Individual' => 'Individual'] ,null, ['class' => 'form-control sumoSelect group_ind select-individual','id'=>'sel1','required','placeholder'=>'--Select Option --']) }}            
                            </div>
                        </div>  

                         <div class="form-group beneficiary_in_training" >
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" >Beneficiary
                            </label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                                 <div class="input-field-group benef-detail">
                                <select class="form-control col-md-7 col-xs-12 benefhideselect sumoSelect" name="benef_id[]" multiple>
                                    
                                    @foreach($benefs as $benef)
                                        <option class="hide" data-attr="{{$benef->benef_type}}" value="{{$benef->id}}">{{$benef->name}}</option>
                                    @endforeach

                                </select>

                                </div>

                                <div class="addmore hide" id="benefaddmorebutton">
                                   <a href="javascript:;" class="btn btn-default btn-sm adding_benef_in_training">
                                        <i class="fa fa-plus"></i> Add New Beneficiaries
                                    </a>
                                </div>

                            </div>
                        </div>



                        
                        <div style="display: none" id="divindividualhideshow" >
                        



                         <div class="form-group  " id="divdistrict">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="district_id">Districts
                            </label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                            {{ Form::select('district_id', $districts ,null, ['class' => 'form-control districtifindividual sumoSelect ','placeholder'=>'Select District']) }}
                            </div>
                        </div>  
                              
                        <div class="form-group  " id="divvdcmuncipality">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="vdcmunciplity">
                               Vdc/Muncipality
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::textarea('vdc_or_munciplity', null, ['class'=>'form-control vdcmunciplity ','size' => '3x3'])}}
                            
                         </div>
                        </div>
                         <div class="form-group  " id="divwardnumber">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="ward_number">
                               ward No.
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::textarea('ward_no', null, ['class'=>'form-control ward_number ','size' => '3x3'])}}
                              
                         </div>
                        </div>
                        </div>

                       <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Amount (NRs)
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('amount', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                No of Beneficiars
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('n_benef', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Nature of Project
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('n_project', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Status
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('status', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Date<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                        {{--<input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">--}}
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                    {{--<div class="col-md-11 xdisplay_inputx form-group has-feedback">--}}
                                                <input type="text" name="g_date" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    {{--</div>--}}
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Indirect beneficiaries
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('i_benef', '' ,['class' => 'form-control'] ) !!}
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
                                    <a href="{{ route('sgrant.index') }}" class="btn btn-danger">Cancel</a>    
                                </div>
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
