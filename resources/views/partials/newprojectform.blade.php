@extends('layouts.app')
    @section('stylesheet')
        @include('partials.stylesheet.home')
    @endsection

    @section('class-body')
        nav-md
    @endsection



    @section('content')
        @include('partials.sidebar')
        @include('partials.header')

        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add New Project</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{!! route('project.store') !!} " method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Project Code <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="project_code" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Project Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="project_name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Donor Code<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="donor_code" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Partners<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="partners" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Zone<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {{Form::select('zone_id', $zones, null, ['placeholder'=>'-- Select Zone --','class'=>'form-control col-md-7 col-xs-12 zone', 'required'])}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">District<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12 district" name="district_id" required>
                                            <option value="">-- Select District --</option>
                                            @foreach($districts as $district)
                                            <option class="hide" data-attr="{{$district->zone_id}}" value="{{$district->district_id}}">{{$district->district_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Signed Date <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {{--<input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">--}}
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                    {{--<div class="col-md-11 xdisplay_inputx form-group has-feedback">--}}
                                                        <input type="text" name="signed_date" class="form-control has-feedback-left" id="single_cal4" aria-describedby="inputSuccess2Status4">
                                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    {{--</div>--}}
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Total Budget<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">NPR</span>
                                            {{ Form::input('number', 'total_budget',  null, ['step'=>'any', 'min'=>'1', 'placeholder'=>'Enter Total Budget', 'class' => 'form-control col-md-7 col-xs-12', 'required']) }}
                                        </div>
                                        {{-- <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="total_budget"> --}}
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group" >
                                    <div class="col-md-6 col-sm-6
                                     col-xs-12 col-md-offset-3">
{{--                                        {{ link_to_route('home','Cancel',null, ['class'=>'btn btn-primary']) }}--}}
                                        <a href="{{ url('/project') }}" class="btn btn-primary">Cancel</a>
                                        {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                                        <button type="submit"  class="btn btn-success">Submit</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')
    @endsection

    @section('script')
        @include('partials.scripts.home')
    @endsection