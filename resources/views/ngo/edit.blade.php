@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit NGO Profile</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <br />
                {{Form::model($ngo, ['route'=>['ngo.update', $ngo->id], 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate', 'method'=>'patch'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Name of NGO<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::text('name', null, ['class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Address<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::text('address', null, ['class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Contact No<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::text('contact_no', null, ['class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Email<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::email('email', null, ['class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Established Date<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('established_date', null, ['class'=>'form-control has-feedback-left', 'id'=>'datepick-all'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Primary Project<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::text('primary_project', null, ['class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Funded By<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::text('funded_by', null, ['class'=>'form-control'])}}
                        </div>
                    </div>

                    
                    <div class="form-footer" >
                        <div class="col-md-8 col-sm-7 col-xs-12 col-md-offset-2 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('ngo.index') }}" class="btn btn-danger">Cancel</a>
                            {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                        </div>
                    </div>

                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
