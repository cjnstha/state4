@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('sidebar.population')</h2>
            <div class="clearfix"></div>
        </div>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('population.store') }}">
            {{ csrf_field() }}

             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.population.total_pop')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.year')</label>
                                        <input type="text" name="year" class="form-control"> 
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.total_pop')</label>
                                        <input type="number" name="total_pop" class="form-control"> 
                                    </div>
                                </div>
                               
                            </div>
                        </div>
            </div> 

             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.population.sex_wise')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.male')</label>
                                        <input type="number" name="male" class="form-control"> 
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.female')</label>
                                        <input type="number" name="female" class="form-control"> 
                                    </div>
                                </div>
                               
                            </div>
                        </div>
            </div> 

             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.3'). @lang('pages.population.age_wise')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.median_age')</label>
                                        <input type="number" name="median" class="form-control"> 
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.youth')</label>
                                        <input type="number" name="age_0_14" class="form-control"> 
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.adult')</label>
                                        <input type="number" name="age_15_60" class="form-control"> 
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.aged')</label>
                                        <input type="number" name="age_60_above" class="form-control"> 
                                    </div>
                                </div>
                               
                            </div>
                        </div>
            </div> 

        	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.4'). @lang('pages.population.caste_wise')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                        	<div class="row">                   
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.caste_1')</label>
                                        <input type="number" name="c_1" class="form-control">
                                    </div>
                                </div>
                            
                      
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.caste_2')</label>
										<input type="number" name="c_2" class="form-control">
                                    </div>
                                </div>
                     
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.caste_3')</label>
                                        <input type="number" name="c_3" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.caste_4')</label>
                                        <input type="number" name="c_4" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.caste_5')</label>
                                        <input type="number" name="c_5" class="form-control"> 
                                    </div>
                                </div>
                           	
                            </div>
                        </div>
            </div>    


            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.5'). @lang('pages.population.disability_wise')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">                   
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.physical')</label>
                                        <input type="number" name="c_1" class="form-control">
                                    </div>
                                </div>
                            
                      
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.visual')</label>
                                        <input type="number" name="c_2" class="form-control">
                                    </div>
                                </div>
                     
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.hearing')</label>
                                        <input type="number" name="c_3" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.deaf_blind')</label>
                                        <input type="number" name="c_4" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.mental')</label>
                                        <input type="number" name="c_5" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.intellectual')</label>
                                        <input type="number" name="c_6" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.population.multiple')</label>
                                        <input type="number" name="c_7" class="form-control"> 
                                    </div>
                                </div>
                            
                            </div>
                        </div>
            </div> 

            <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.population.save_population') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('population.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>                     	
        </form>	
</div>  
@endsection      