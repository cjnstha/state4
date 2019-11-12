@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.hdi.add_hdi')</h2>
            <div class="clearfix"></div>
        </div>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('hdi.store') }}">
            {{ csrf_field() }}
        	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.hdi.year')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="year" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.hdi.hdi')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="hdi" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.3'). @lang('pages.hdi.life_birth')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="life_expectancy" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.4'). @lang('pages.hdi.expect_school')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="expected_school" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.5'). @lang('pages.hdi.mean_school')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="mean_school" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.6'). @lang('pages.hdi.gni')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="GNI" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.7'). @lang('pages.hdi.gni_hdi')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="gni-hdi" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.8'). @lang('pages.hdi.rank')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="hdi_rank" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.9'). @lang('pages.hdi.poverty')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="hdi_rank" class="form-control">
                        </div>
                </div>

                <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.hdi.add_hdi') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('hdi.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>

        </form>	
</div>
@endsection        