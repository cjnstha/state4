@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.labels.add_new') @lang('sidebar.youth')</h2>
            <div class="clearfix"></div>
        </div>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('youth.store') }}">
            {{ csrf_field() }}
        	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.youth.ward')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="ward" class="form-control">
                            	<option selected value="">--Select--</option>
                            	<option value="1">Ward 1</option>
                            	<option value="2">Ward 2</option>
                            	<option value="3">Ward 3</option>
                            	<option value="4">Ward 4</option>
                            </select>
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.youth.total_youths')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="number" name="total_youth" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.3'). @lang('pages.youth.total_national')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="number" name="national_employment" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.4'). @lang('pages.youth.total_foreign')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="number" name="foreign_employment" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.5'). @lang('pages.youth.foreign_study')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="number" name="foreign_study" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.6'). @lang('pages.youth.unemploy')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="number" name="unemployment" class="form-control">
                        </div>
                </div>

                <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.youth.save_youth') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('youth.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>


        </form>	
</div>
@endsection        