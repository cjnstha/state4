@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit District</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
              

                 {{Form::model($posts, ['route'=>['district.update', $posts->id], 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate', 'method'=>'patch', 'files'=> 'true'])}}

                {{-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{!! route('trainings.store') !!} " method="post">
                    {{ csrf_field() }} --}}
                   <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Zone<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-7 col-xs-12">
                                        {{ Form::select('zone_id', $zones, $posts->zone_id, ['placeholder'=>'-- Select Zone --','class'=>'form-control sumoSelect zone1', 'required'])}}
                                    </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               District <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                <select class="form-control sumoSelect district1" name="district_id" data-district ="{{$posts->district_id}}" required>
                                    <option value="">-- Select District --</option>
                                    @foreach($districts as $district)
                                        <option class="" data-attr="{{$district->zone_id}}" value="{{$district->district_id}}" @if($district->district_id == $posts->district_id) selected @endif>{{$district->district_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               VDC/Municipality
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('vdc',isset($posts) ? $posts->vdc: ''  ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                      
                        
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Total no. of population
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('population',isset($posts) ? $posts->population : ''  ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               HDI
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('hdi',isset($posts) ? $posts->hdi : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Poverty index 
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('poverty_in', isset($posts) ? $posts->poverty_in : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        
                        
                        
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Contact Documentation">VDC Detail<br />(doc, docx or pdf)
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <ol class="uploaded-files">
                                <li>
                                    <a class="link" href="{{ url('/district/downloadFile/'.$posts->vdc_detail ) }}">
                                        {{isset($posts->original_vdc_detail) ? $posts->original_vdc_detail: ''}}
                                    </a>
                                </li>
                            </ol>
                            <div class="browse input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        <i class="fa fa-folder-open"></i>
                                        Browse
                                         {{Form::file('vdc_detail', ['class'=>'form-control'])}}
                                    </span>
                                </label>
                                <input type="text" class="form-control" value=" " disabled>
                            </div>
                        
                        </div>
                    </div>
                    
                       
                        <div class="form-footer">
                            <div class="form-group">
                                <div class="submit-btn col-md-8 col-sm-7 col-xs-12 col-md-offset-4 col-sm-offset-3">
                                    <button type="submit"  class="btn btn-success">Submit</button>
                                    <a href="{{ route('district.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
               
                {{Form::close()}}
            </div>
        </div>

    @endsection
