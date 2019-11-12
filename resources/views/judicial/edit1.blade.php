@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.judicial.update_info')</h2>
            <div class="clearfix"></div>
        </div>
         <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('judicial.update', '1') }}">
            {{ csrf_field() }}
         	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.judicial.mediators')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.judicial.male')</label>
                                        <input type="text" name="male" class="form-control" value="20"> 
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.judicial.female')</label>
                                        <input type="number" name="female" class="form-control" value="20"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.judicial.less_15')</label>
                                        <input type="number" name="female" class="form-control" value="10"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.judicial.16_29')</label>
                                        <input type="number" name="female" class="form-control" value="10"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.judicial.30_40')</label>
                                        <input type="number" name="female" class="form-control" value="10"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.judicial.40_above')</label>
                                        <input type="number" name="female" class="form-control" value="10"> 
                                    </div>
                                </div>
                               
                            </div>
                        </div>
            </div> 
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.judicial.register')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.judicial.name_of_case')</label>
                                        <input type="text" name="registration" class="form-control" value="NEP001">
                                    </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.judicial.type_of_case')</label>
                                        <input type="text" name="referral" class="form-control" value="civil">
                                    </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.judicial.date')</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                        <input type="text" name="completion_date" class="form-control col-md-7 col-xs-12" id="datepick-all" value="2018-10-23">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.judicial.nature')</label>
                                        <input type="text" name="period" class="form-control" value="Serious">
                                    </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.judicial.status')</label>
                                        <input type="text" name="period" class="form-control" value="Active">
                                    </div>
                            </div>
                            </div>
                        </div>    
            </div>   

                <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.labels.submit') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('judicial.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>        
         </form>	
</div>
@endsection        