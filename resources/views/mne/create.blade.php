@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New M&E forms and Format</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                {{Form::open(['route'=>'mne.store', 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate', 'files'=>'true'])}}
           

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Type<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{Form::select('mne_type',  ['Planning review'=>'Planning review','Follow up'=>'Follow up'], null, ['placeholder'=>'--Select--','class'=>'form-control sumoSelect col-md-7 col-xs-12', 'required'])}}
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Project Code
                        <span class="required">*</span></label>
                         <div class="col-md-8 col-sm-7 col-xs-12">
                          {!! Form::select('project_id', $project_code  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) !!}
                        </div>
                    </div> 

                    <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Objective
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('obj', null ,['class' => 'form-control'] ) !!}
                                </div>
                    </div> 
                    <div class="form-group">
                    
                                <label class="control-label col-md-4 col-sm-3 col-xs-12"> Prepared Date <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                    
                                                 {{ Form::text('p_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                 
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                    <div class="form-group">
                    
                                <label class="control-label col-md-4 col-sm-3 col-xs-12"> Uploaded Date <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                    
                                                 {{ Form::text('u_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Contact Documentation">Attach Document <br />(doc, docx or pdf)
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse {{Form::file('document',null, ['class'=>'form-control'])}}
                                </span>
                            </label>
                            <input type="text" class="form-control" disabled>
                        </div>
                      
                        </div>
                    </div>

                     <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Keywords">
                               Keywords</label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  {{Form::textarea('keywords', null, ['class'=>'form-control ','size' => '3x3'])}}
                                
                                </div>
                    </div> 


                    <div class="form-footer">
                        <div class="form-group">
                            <div class="submit-btn col-md-8 col-sm-7 col-xs-12 col-md-offset-4 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('mne.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                    
                     
                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
