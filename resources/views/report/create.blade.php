@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Report</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                {{Form::open(['route'=>'report.store', 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate', 'files'=> 'true'])}}
                
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> 
                        Title of Reports<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::text('title', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                </div>

                  
                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Report</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{ Form::select('type', [
                                    ''  => '--Select--',
                                   'QPR' => 'QPR',
                                   'APR' => 'APR',
                                   'Project Completion Report' => 'Project Completion Report',
                                   'Bi Annually' => 'Bi Annually',
                                   'Base Line' => 'Base Line'] ,null, ['class' => 'form-control sumoSelect','required']) }}
                          
                        </div>
                </div>

                  <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Draft Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">            
                                               
                                                 {{ Form::text('draft_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span> 
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>


                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> Draft By
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::text('draft_by', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                </div>

             
                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> Project ID
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                      {!! Form::select('project_code', $projects,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) !!}
                        </div>
                </div>

                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> Comments
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::textarea('comment', null, ['class'=>'form-control col-md-7 col-xs-12','size' => '3x3','required'])}}
                        </div>
                </div>

                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> Web Link
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::text('web_link', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                </div>

                 <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Final Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">            
                                               
                                                 {{ Form::text('final_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span> 
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                </div>
                
                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> Approve By <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::text('approve_by', null, ['class'=>'form-control col-md-7 col-xs-12','required','required'])}}
                        </div>
                </div>

                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> Keywords
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::textarea('keywords', null, ['class'=>'form-control col-md-7 col-xs-12','size' => '3x3','required'])}}
                        </div>
                </div>

                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> Methodology
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::textarea('methodology', null, ['class'=>'form-control col-md-7 col-xs-12','size' => '3x3','required'])}}
                        </div>
                </div>


                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> Major Finding
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::textarea('major_finding', null, ['class'=>'form-control col-md-7 col-xs-12','size' => '3x3','required'])}}
                        </div>
                </div>

                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> Recommendation
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::textarea('recommendation', null, ['class'=>'form-control col-md-7 col-xs-12','size' => '3x3','required'])}}
                        </div>
                </div>


                    
                    <div class="form-footer" >
                        <div class="col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('report.index') }}" class="btn btn-danger">Cancel</a>
                            {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                        </div>
                    </div>
                {{Form::close()}}
            </div>
        </div>

    @endsection
