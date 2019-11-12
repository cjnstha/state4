@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit INGO Profile</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                {{Form::model($ingo, ['route'=>['ingo.update', $ingo->id], 'id'=>'demo-form2', 'class'=>'form-horizontal', 'data-parsley-validate', 'method'=>'patch'])}}
                    <div class="form-group">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Name of INGO</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::text('name', $ingo->name, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Country</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="country" disabled  class="form-control sumoSelect">
                                @foreach($countries as $country)
                                <option value="{{$country->name}}" @if($ingo->country == $country->name) selected @endif> 
                                    {{$country->name}} 
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::text('address', $ingo->address, ['class'=>'form-control col-md-7 col-xs-12'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Contact No</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::number('contact_no', $ingo->contact_no, ['class'=>'form-control col-md-7 col-xs-12'])}}
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Contact Person</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::text('contact_person', $ingo->contact_person, ['class'=>'form-control col-md-7 col-xs-12'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Email</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::email('email', $ingo->email, ['class'=>'form-control col-md-7 col-xs-12'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Established Date</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('estd_date', $ingo->estd_date, ['class'=>'form-control has-feedback-left col-md-7 col-xs-12', 'id'=>'datepick-all'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Staff Number<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::number('staff_number', $ingo->staff_number, ['class'=>'form-control col-md-7 col-xs-12','disabled'])}}
                        </div>
                    </div>

                   

                   <div class="form-footer">
                        <div class="form-group">
                            <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('ingo.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>

                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
