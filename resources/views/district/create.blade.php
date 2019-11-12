@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New District</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                {{Form::open(['route'=>'district.store', 'id'=>'demo-form2', 'class'=>'form-grid', 'files'=> 'true','data-parsley-validate', 'files'=> 'true'])}}
               
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Zone<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7  col-xs-12">
                            {{Form::select('zone_id', $zones, null, ['placeholder'=>'-- Select Zone --','class'=>'form-control sumoSelect zone1', 'required'])}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">District <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7  col-xs-12">
                            <select class="form-control sumoSelect district1" name="district_id" required>
                                <option value="">-- Select District --</option>
                                @foreach($districts as $district)
                                <option class="hide" data-attr="{{$district->zone_id}}" value="{{$district->district_id }}">{{$district->district_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               VDC/Municipality
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7  col-xs-12">
                                {!! Form::text('vdc', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                      
                        
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Total no. of population
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7  col-xs-12">
                                {!! Form::text('population', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               HDI
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7  col-xs-12">
                                {!! Form::text('hdi', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Poverty index 
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7  col-xs-12">
                                {!! Form::text('poverty_in', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        
                         <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Budget Documentation">VDC Detail <br />(excel)
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse {{Form::file('vdc_detail',null, ['class'=>'form-control'])}}
                                </span>
                            </label>
                            <input type="text" class="form-control" disabled>
                        </div>
                      
                        </div>
                    </div>
                       
                      <div class="form-footer">
                          <div class="form-group">
                              <div class="submit-btn col-md-8 col-sm-7 col-xs-12 col-md-offset-4 col-sm-offset-3">
                                    <button type="submit"  class="btn btn-success">Submit</button>
                                    <a href="{{ route('district.index') }}" class="cancel-button">Cancel</a>
                                </div>
                              
                          </div>
                      </div>
                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
