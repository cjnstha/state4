@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.household.household')</h2>
            <div class="clearfix"></div>
        </div>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('household.update', '1') }}">
            {{ csrf_field() }}

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.household.household_size')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            	<div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.household.year')</label>
                                        <input type="text" name="year" class="form-control" value="2074"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.household.total')</label>
                                        <input type="number" name="total" class="form-control" value="10000"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.household.average')</label>
                                        <input type="number" name="average" class="form-control" value="5"> 
                                    </div>
                                </div>
                            </div>
                        </div>    	
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.household.drink_water')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            	<div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.household.access_water')</label>
                                        <input type="number" name="access_drink" class="form-control" value="8000"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                	<div class="form-group">
                                        <label class="control-label">@lang('pages.household.no_access_water')</label>
                                        <input type="number" name="no_access_drink" class="form-control" value="2000"> 
                                    </div>
                                </div>
                            </div>
                        </div>    	
            </div> 

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                       	@lang('pages.household.source_water')
                        </label>

                    <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">@lang('pages.household.pipe')</label>
                                    <input type="number" name="pipe" class="form-control" value="5000"> 
                                </div>
                        </div>

                        <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">@lang('pages.household.tube')</label>
                                    <input type="number" name="tube" class="form-control" value="1000"> 
                                </div>
                        </div>

                        <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">@lang('pages.household.sprout')</label>
                                    <input type="number" name="spout" class="form-control" value="500"> 
                                </div>
                        </div>

                        <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">@lang('pages.household.uncovered')</label>
                                    <input type="number" name="u_well" class="form-control" value="600"> 
                                </div>
                        </div>

                        <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">@lang('pages.household.covered')</label>
                                    <input type="number" name="c_well" class="form-control" value="1000"> 
                                </div>
                        </div>

                        <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">@lang('pages.household.river')</label>
                                    <input type="number" name="river" class="form-control" value="800"> 
                                </div>
                        </div>

                        <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">@lang('pages.household.other')</label>
                                    <input type="number" name="other" class="form-control" value="1000"> 
                                </div>
                        </div>

                        <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">@lang('pages.household.not_stated')</label>
                                    <input type="number" name="not_stated" class="form-control" value="100"> 
                                </div>
                        </div>
                    </div>
                </div>
            </div>  


            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.3'). @lang('pages.household.toilet_facility')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            	<div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.household.flush')</label>
                                        <input type="number" name="flush" class="form-control" value="5000"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                	<div class="form-group">
                                        <label class="control-label">@lang('pages.household.ordinary')</label>
                                        <input type="number" name="ordinary" class="form-control" value="2000"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.household.no_toilet')</label>
                                        <input type="number" name="no_toilet" class="form-control" value="1000"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                	<div class="form-group">
                                        <label class="control-label">@lang('pages.household.not_stated')</label>
                                        <input type="number" name="not_stated_toilet" class="form-control" value="500"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>    

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.4'). @lang('pages.household.access_electricity')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            	<div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.household.access_elec')</label>
                                        <input type="number" name="elec_access" class="form-control" value="9000"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                	<div class="form-group">
                                        <label class="control-label">@lang('pages.household.no_access_elec')</label>
                                        <input type="number" name="no_elec_access" class="form-control" value="1000"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>  

            <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.household.edit_household')<span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('household.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>                                   


        </form>
</div>
@endsection            