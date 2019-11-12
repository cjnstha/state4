@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Staff Profile</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                {{Form::model($staff, ['route'=>['staffs.update', $staff->id], 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate', 'method'=>'patch', 'files'=> 'true'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Name of Staff<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::text('name', null, ['class'=>'form-control col-md-7 col-xs-12'])}}
                        </div>
                    </div>

                         <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Gender<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::select('gender',  [
                                               'Male' => 'Male',
                                               'Female' => 'Female',
                                               'Others' => 'Others'], null, ['class'=>'form-control sumoSelect', 'placeholder'=>'--Select--'])}}
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
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Joined Date<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('joined_date', null, ['class'=>'form-control has-feedback-left', 'id'=>'datepick-all'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::text('designation', null, ['class'=>'form-control'])}}
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation Level<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::select('designation_level',  [
                                               'low_level_positions' => 'Low-level positions',
                                               'mid_level_positions' => 'Mid-level positions',
                                               'senior_level_positions' => 'Senior-level positions'], null, ['class'=>'form-control sumoSelect', 'placeholder'=>'--Select--'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Member Type<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::select('member_type',  [
                                               'general_member' => 'General Member',
                                               'board_member' => 'Board Member'], null, ['class'=>'form-control sumoSelect', 'placeholder'=>'--Select--'])}}
                        </div>
                    </div>
                    

                   

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Base<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::select('base',  [
                                               'Kathmandu' => 'Kathmandu',
                                               'Regional Office' => 'Regional Office'], null, ['class'=>'form-control sumoSelect', 'placeholder'=>'--Select--'])}}
                        </div>
                    </div>
                   
                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >
                    Caste / Ethnicity<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::select('caste_id', $caste, null, ['class'=>'form-control sumoSelect', 'placeholder'=>'--Select--'])}}
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Assigned Project<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::select('project_id', $projects, null, ['class'=>'form-control sumoSelect', 'placeholder'=>'--Select--'])}}
                        </div>
                    </div>

                    
                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Contact Documentation">   Staff Photo <br />(jpeg, jpg, png)
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <ol class="uploaded-files">
                                <li>
                                    <a class="link" href="{{ url('staff/downloadFile/'.$staff->staff_photo ) }}">
                                        {{isset($staff->original_staff_photo) ? $staff->original_staff_photo: ''}}
                                    </a>
                                </li>
                            </ol>
                            <div class="browse input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        <i class="fa fa-folder-open"></i>
                                        Browse
                                         {{Form::file('staff_photo', ['class'=>'form-control'])}}
                                    </span>
                                </label>
                                <input type="text" class="form-control" value=" " disabled>
                            </div>
                            
                        </div>
                    </div>


                    
                    <div class="form-footer" >
                        <div class="col-md-8 col-sm-7 col-xs-12 col-md-offset-2 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('staffs.index') }}" class="btn btn-danger">Cancel</a>
                            {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                        </div>
                    </div>

                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
