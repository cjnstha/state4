@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.agriculture.agriculture')</h2>
            <div class="clearfix"></div>
        </div>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('agriculture.store') }}">
            {{ csrf_field() }}

             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.agriculture.population')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            	<div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.year')</label>
                                        <input type="text" name="year" class="form-control" value="2074"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.total')</label>
                                        <input type="number" name="total" class="form-control" value="17777776"> 
                                    </div>
                                </div>

                            </div>
                        </div>    	
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.agriculture.sex')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            	<div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.male_pop')</label>
                                        <input type="number" name="male" class="form-control" value="9999999"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.female_pop')</label>
                                        <input type="number" name="female" class="form-control" value="7777777"> 
                                    </div>
                                </div>

                            </div>
                        </div>    	
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.3'). @lang('pages.agriculture.cultivable')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            	<div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="number" name="cultivable" class="form-control" value="5000"> 
                                    </div>
                                </div>

                            </div>
                        </div>    	
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.4'). @lang('pages.agriculture.household_farm')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            	<div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="number" name="cultivable" class="form-control" value="1000"> 
                                    </div>
                                </div>

                            </div>
                        </div>    	
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.5'). @lang('pages.agriculture.household_livestock')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            	<div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.cattle')</label>
                                        <input type="number" name="male" class="form-control" value="1200"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.buff')</label>
                                        <input type="number" name="female" class="form-control" value="500"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.yak')</label>
                                        <input type="number" name="female" class="form-control" value="80"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.sheep')</label>
                                        <input type="number" name="female" class="form-control" value="150"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.goat')</label>
                                        <input type="number" name="female" class="form-control" value="600"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.pig')</label>
                                        <input type="number" name="female" class="form-control" value="500"> 
                                    </div>
                                </div>

                            </div>
                        </div>    	
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.6'). @lang('pages.agriculture.irrigation')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            	<div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.pond')</label>
                                        <input type="number" name="male" class="form-control" value="200"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.seasonal')</label>
                                        <input type="number" name="female" class="form-control" value="120"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.perennial')</label>
                                        <input type="number" name="female" class="form-control" value="150"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.tube')</label>
                                        <input type="number" name="female" class="form-control" value="200"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.mix')</label>
                                        <input type="number" name="female" class="form-control" value="300"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.agriculture.others')</label>
                                        <input type="number" name="female" class="form-control" value="100"> 
                                    </div>
                                </div>

                            </div>
                        </div>    	
            </div>

            <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.agriculture.save')<span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('agriculture.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div> 


        </form>
</div>
@endsection    