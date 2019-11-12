@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New INGO Profile</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content"><div class="text-manage">
                                (The elements having the symbol * are mandatory. Please fill them before submitting the form)
                             </div>
                {{Form::open(['route'=>'ingo.store', 'id'=>'demo-form2', 'class'=>'form-horizontal', 'data-parsley-validate'])}}
                <input type="hidden" name="user_id" value="{{$user_id}}">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Name of INGO *</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::text('name', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Country *</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="country" class="form-control sumoSelect">
                                @foreach($countries as $country)
                                <option value="{{$country->name}}"> {{$country->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Address *</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::text('address', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Contact No</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::number('contact_no', null, ['class'=>'form-control col-md-7 col-xs-12'])}}
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Contact Person</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::text('contact_person', null, ['class'=>'form-control col-md-7 col-xs-12'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Email *</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::email('email', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Established Date *</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('estd_date', null, ['class'=>'form-control has-feedback-left col-md-7 col-xs-12', 'id'=>'datepick-all','required'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Closing Date *</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('close_date', null, ['class'=>'form-control has-feedback-left col-md-7 col-xs-12', 'id'=>'datepick-all','required'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Staff Number *</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::number('staff_number', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                    </div>

                   

                   <div class="form-footer">
                        <div class="form-group">
                            <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('ingo.index') }}" class="cancel-button">Cancel</a>
                            </div>
                        </div>
                    </div>

                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
