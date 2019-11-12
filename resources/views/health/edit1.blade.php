@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.health.update_health')</h2>
            <div class="clearfix"></div>
        </div>
        {{-- <div class="hide add_new_facility">
                <div class="new-field">
                    <div class="row">
                    	<div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.type')</label>
                                        <input type="number" name="reserved" class="form-control">
                                    </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.number')</label>
                                        <input type="number" name="actual" class="form-control">
                                    </div>
                            </div>
                    </div>
                    <div id="del_facility">
                            <a href="javascript:;" class="delete_facility red" ><i class="fa fa-trash"></i> @lang('pages.labels.delete')</a>
                    </div>
                </div>
        </div> --}}            	
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('health.update','1')}}">
            {{ csrf_field() }}
            {{Form::hidden('_method', 'patch')}}
        	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.health.birth_rate')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.year')</label>
                                        <input type="number" name="year" class="form-control" value="2074"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.current_birth')</label>
                                        <input type="number" name="total" class="form-control" value="3.4"> 
                                    </div>
                                </div>

                            </div>
                        </div>      
            </div>

             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.health.infant_rate')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="number" name="total" class="form-control" value="6"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>        

            <div class="form-group">
                        <label class="contro3-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.3'). @lang('pages.health.maternal_rate')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="number" name="total" class="form-control" value="6"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.health.cause_maternal')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.postpartum')</label>
                                        <input type="number" name="year" class="form-control" value="3"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.high_bp')</label>
                                        <input type="number" name="total" class="form-control" value="3"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.termination')</label>
                                        <input type="number" name="total" class="form-control" value="0"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.pulmonary')</label>
                                        <input type="number" name="total" class="form-control" value="0"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.direct')</label>
                                        <input type="number" name="total" class="form-control" value="2"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.indirect')</label>
                                        <input type="number" name="total" class="form-control" value="3"> 
                                    </div>
                                </div>

                            </div>
                        </div>      
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.4'). @lang('pages.health.fertility')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="number" name="total" class="form-control" value="3"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.5'). @lang('pages.health.life_exp')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="number" name="total" class="form-control" value="70"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>

             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.6'). @lang('pages.health.nutritional')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.shunt')</label>
                                        <input type="number" name="year" class="form-control" value="20"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.percentage')</label>
                                        <input type="number" name="total" class="form-control" value="20"> 
                                    </div>
                                </div>

                            </div>
                        </div>      
            </div>

             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.7'). @lang('pages.health.major_disease')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.hiv')</label>
                                        <input type="number" name="year" class="form-control" value="200"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.malaria')</label>
                                        <input type="number" name="total" class="form-control" value="300"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.tuberculosis')</label>
                                        <input type="number" name="total" class="form-control" value="300"> 
                                    </div>
                                </div>

                            </div>
                        </div>      
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.8'). @lang('pages.health.various_disease')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.hiv')</label>
                                        <input type="number" name="year" class="form-control" value="200"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.malaria')</label>
                                        <input type="number" name="total" class="form-control" value="300"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.tuberculosis')</label>
                                        <input type="number" name="total" class="form-control" value="300"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.viral')</label>
                                        <input type="number" name="total" class="form-control" value="250"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.cancer')</label>
                                        <input type="number" name="total" class="form-control" value="350"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.others')</label>
                                        <input type="number" name="total" class="form-control" value="400"> 
                                    </div>
                                </div>

                            </div>
                        </div>      
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.9'). @lang('pages.health.tobacco_sex')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.male')</label>
                                        <input type="number" name="total" class="form-control" value="1200"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.female')</label>
                                        <input type="number" name="total" class="form-control" value="800"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>        

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.health.tobacco_adult')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.age_20_25')</label>
                                        <input type="number" name="total" class="form-control" value="500"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.age_26_30')</label>
                                        <input type="number" name="total" class="form-control" value="500"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.age_31_35')</label>
                                        <input type="number" name="total" class="form-control" value="500"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.age_36_above')</label>
                                        <input type="number" name="total" class="form-control" value="500"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>   

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.health.tobacco_teen')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.age_13_15')</label>
                                        <input type="number" name="total" class="form-control" value="0"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.age_15_17')</label>
                                        <input type="number" name="total" class="form-control" value="100"> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.age_17_19')</label>
                                        <input type="number" name="total" class="form-control" value="200"> 
                                    </div>
                                </div>

                                
                            </div>
                        </div>
            </div>       

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1')@lang('pages.numbers.0'). @lang('pages.health.cause_death')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.old_age')</label>
                                        <input type="number" name="total" class="form-control" value="800"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.cardio')</label>
                                        <input type="number" name="total" class="form-control" value="100"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.cancer')</label>
                                        <input type="number" name="total" class="form-control" value="120"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.respiratory')</label>
                                        <input type="number" name="total" class="form-control" value="20"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.diabetes')</label>
                                        <input type="number" name="total" class="form-control" value="100"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.hiv')</label>
                                        <input type="number" name="total" class="form-control" value="100"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.accidents')</label>
                                        <input type="number" name="total" class="form-control" value="150"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.natural')</label>
                                        <input type="number" name="total" class="form-control" value="50"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.homicides')</label>
                                        <input type="number" name="total" class="form-control" value="20"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.others')</label>
                                        <input type="number" name="total" class="form-control" value="50"> 
                                    </div>
                                </div>

                            </div>
                        </div>
            </div>  

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1')@lang('pages.numbers.1'). @lang('pages.health.health_ins')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.government')</label>
                                        <input type="number" name="total" class="form-control" value="50"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.private')</label>
                                        <input type="number" name="total" class="form-control" value="20"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.phcc')</label>
                                        <input type="number" name="total" class="form-control" value="100"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.hp')</label>
                                        <input type="number" name="total" class="form-control" value="200"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.health.shp')</label>
                                        <input type="number" name="total" class="form-control" value="300"> 
                                    </div>
                                </div>
                            </div>
                        </div>        
            </div>   

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.health.beds')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="number" name="total" class="form-control" value="3500"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>  

             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.health.pathology')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="number" name="total" class="form-control" value="100"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>   

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.health.radiology')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="number" name="total" class="form-control" value="20"> 
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>  

                <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.health.update_health') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('health.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>
        </form>
</div>
@endsection        