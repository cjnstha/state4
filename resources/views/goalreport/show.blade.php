
@if($dataformat == 'dataformat') @endif
                    
                   

                   @if($dataformat == 'searchFilter')
                       <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label class="control-label"> Output</label>
                                {!! Form::select('output_id[]', $output ,  null, ['placeholder'=>'--Select--','class' => 'form-control','id'=>'outputshow','multiple']) !!}
                            </div>
                       </div>

                       <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label class="control-label"> Indicator</label>
                                {!! Form::select('indicator_id[]', $indicator ,  null, ['placeholder'=>'--Select--','class' => 'form-control','id'=>'indicatorshow','multiple']) !!}
                            </div>
                       </div>

                       <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label class="control-label"> Activity</label>
                                {!! Form::select('activity_id[]', $activity ,  null, ['placeholder'=>'--Select--','class' => 'form-control','id'=>'activityshow','multiple']) !!}

                            </div>
                       </div>
                  @elseif($dataformat == 'sip')

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Output <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

                             {!! Form::select('output_id[]', $output ,  null, ['placeholder'=>'--Select--','class' => 'form-control','id'=>'outputshow','multiple','required']) !!}

                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Indicator <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

                             {!! Form::select('indicator_id[]', $indicator ,  null, ['placeholder'=>'--Select--','class' => 'form-control','id'=>'indicatorshow','multiple','required']) !!}

                        </div>
                    </div>
     


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Activity <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

                             {!! Form::select('activity2_id[]', $activity ,  null, ['placeholder'=>'--Select--','class' => 'form-control','id'=>'activityshow','multiple','required']) !!}

                        </div>
                    </div>

                   @else 
                    <div class="form-group">
                        <label class="control-label @if($dataformat == 'horizontal') col-md-3 @else col-md-4 @endif col-sm-3 col-xs-12"> Output <span class="required">*</span></label>
                        <div class="@if($dataformat == 'horizontal') col-md-6 @else col-md-8 @endif col-sm-7 col-xs-12">

                             {!! Form::select('output_id[]', $output ,  null, ['placeholder'=>'--Select--','class' => 'form-control','id'=>'outputshow','multiple','required']) !!}

                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label @if($dataformat == 'horizontal') col-md-3 @else col-md-4 @endif  col-sm-3 col-xs-12"> Inidicator <span class="required">*</span></label>
                        <div class=" @if($dataformat == 'horizontal') col-md-6 @else col-md-8 @endif col-sm-7 col-xs-12">

                             {!! Form::select('indicator_id[]', $indicator ,  null, ['placeholder'=>'--Select--','class' => 'form-control','id'=>'indicatorshow','multiple','required']) !!}

                        </div>
                    </div>
     


                      <div class="form-group">
                        <label class="control-label @if($dataformat == 'horizontal') col-md-3 @else col-md-4 @endif col-sm-3 col-xs-12"> Activity <span class="required">*</span></label>
                        <div class="@if($dataformat == 'horizontal') col-md-6 @else col-md-8 @endif col-sm-7 col-xs-12">

                             {!! Form::select('activity_id[]', $activity ,  null, ['placeholder'=>'--Select--','class' => 'form-control','id'=>'activityshow','multiple','required']) !!}

                        </div>
                    </div>
                    @endif

          
