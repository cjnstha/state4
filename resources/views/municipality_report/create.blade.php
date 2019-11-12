@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.municipality_report.add_new_report')</h2>
            <div class="clearfix"></div>
        </div>
        <form class="form-horizontal form-label-left" method="get" enctype="multipart/form-data" id="demo-form2" action="">
        	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.municipality_report.project_name')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select class="form-control" name="project_id">
                            	<option value="">--Select--</option>
                            	<option value="1">Project 1</option>
                            	<option value="2">Project 2</option>
                            	<option value="3">Project 3</option>
                            	<option value="4">Project 4</option>
                            	<option value="5">Project 5</option>
                            </select>
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.municipality_report.project_type')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="project_type" class="form-control">
                        </div>
                </div>

                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.3'). @lang('pages.municipality_report.location')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                        	<div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.municipality_report.mun')</label>
                                        <select name="municipality_id" class="form-control">
                                        	<option value="">--Select--</option>
                                        	<option value="1">Kirtipur</option>
                                        	<option value="2">Godawari</option>
                                        </select>
                                    </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.municipality_report.ward')</label>
                                        <select name="ward_id" class="form-control">
                                        	<option value="">--Select--</option>
                                        	@for($i = 1; $i<=10; $i++ )
                                        	<option value="{{ $i }}">Ward {{$i}}</option>
                                        	@endfor
                                        </select>
                                    </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.municipality_report.address')</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                            </div>
                            </div>
                        </div>
                </div>     

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.4'). @lang('pages.municipality_report.start_date')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="text" name="start_date" class="form-control col-md-7 col-xs-12" id="datepick-all">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.5'). @lang('pages.municipality_report.end_date')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="text" name="deadline" class="form-control col-md-7 col-xs-12" id="datepick-all">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>  

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.6'). @lang('pages.municipality_report.budget')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="number" name="budget" class="form-control">
                        </div>
                </div> 

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.7'). @lang('pages.municipality_report.status')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="status" class="form-control">
                        </div>
                </div>	

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.8'). @lang('pages.municipality_report.expenses')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="number" name="expense" class="form-control">
                        </div>
                </div>

                <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success">@lang('pages.labels.submit')</button>
                            <a href="{{ route('mun_report.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>


       	</form> 	
</div>
@endsection