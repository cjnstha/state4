@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Logical Framework</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                {{Form::open(['route'=>'logical.store', 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate', 'files'=>'true'])}}
              
                    
                    <div class="form-group">
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {!! Form::hidden('goal', $goal_id ,['class' => 'form-control','required'] ) !!}
                        </div>
                    </div> 

                    <div class="form-group form-type-title">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                           Select Subject <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{ Form::select('sub',$sub ,null, ['class' => 'form-control sumoSelect','placeholder'=>'--Select--', 'required']) }}
                        </div>
                    </div>
                    <div class="inner-form-grid clearfix">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                           Narative Summary
                            <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                            {!! Form::text('n_sum', null ,['class' => 'form-control','required'] ) !!}
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                           Objectively variable indicators
                            <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                            {!! Form::text('obj_i', null ,['class' => 'form-control','required'] ) !!}
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                            Indicator definition
                            <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                            {!! Form::text('ind', null ,['class' => 'form-control','required'] ) !!}
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                           Data source
                            <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                            {!! Form::text('data_s', null ,['class' => 'form-control','required'] ) !!}
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                            Frequency
                            <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                            {!! Form::text('frequency', null ,['class' => 'form-control','required'] ) !!}
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                           Baseline
                            <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                            {!! Form::text('baseline', null ,['class' => 'form-control','required'] ) !!}
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                           Target
                            <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                            {!! Form::text('target', null ,['class' => 'form-control','required'] ) !!}
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                           Progress
                            <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                            {!! Form::text('progress', null ,['class' => 'form-control','required'] ) !!}
                            </div>
                        </div> 
                    </div>
                    

                    
                    <div class="form-footer">
                        <div class="submit-btn col-md-8 col-sm-7 col-xs-12 col-md-offset-2 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('logical.index') }}" class="btn btn-danger">Cancel</a>
                                
                        </div>
                    </div>
                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
