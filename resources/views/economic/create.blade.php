@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.economic.add_economic')</h2>
            <div class="clearfix"></div>
        </div>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('eco.store') }}">
            {{ csrf_field() }}
        	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.economic.employ')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.year')</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.total_employ')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                            </div>
                        </div>      
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.economic.employ_sex')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.male_employ')</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.female_employ')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                            </div>
                        </div>      
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.3'). @lang('pages.economic.unemploy')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">

                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.total_unemploy')</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.male_unemploy')</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.female_unemploy')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                            </div>
                        </div>      
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.4'). @lang('pages.economic.employ_status')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.agriculture')</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.manufacturing')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.construction')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.transport')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.accomodation')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.administration')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.education')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.others')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                            </div>
                        </div>      
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.5'). @lang('pages.economic.foreign')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.total_migration')</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                

                            </div>
                        </div>      
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.economic.migration_sex')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.migration_male')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.migration_female')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>   

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.economic.migration_age')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.age_0_14')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.age_15_25')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.age_26_35')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.age_36_above')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>   

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.economic.countries')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.india')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.china')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.dubai')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.qatar')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.usa')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.canada')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.aus')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.economic.other')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>                           


            

                <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.economic.save_economic') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('eco.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>

        </form>	
</div>
@endsection        