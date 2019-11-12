@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.labels.add_new') @lang('sidebar.education')</h2>
            <div class="clearfix"></div>
        </div>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('education.store') }}">
            {{ csrf_field() }}

             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.education.literacy')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.year')</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.total')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                            </div>
                        </div>      
            </div>

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.education.literacy_sex')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.literate') (@lang('pages.education.male'))</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.literate') (@lang('pages.education.female'))</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.illiterate') (@lang('pages.education.male'))</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.illiterate') (@lang('pages.education.female'))</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.read') (@lang('pages.education.male'))</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.read') (@lang('pages.education.female'))</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.not_mentioned') (@lang('pages.education.male'))</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.not_mentioned') (@lang('pages.education.female'))</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                            </div>
                        </div>      
            </div>

             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.education.distribution')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.below_slc') (@lang('pages.education.male'))</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.below_slc') (@lang('pages.education.female'))</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.slc') (@lang('pages.education.male'))</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.slc') (@lang('pages.education.female'))</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.intermediate') (@lang('pages.education.male'))</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.intermediate') (@lang('pages.education.female'))</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.non_formal') (@lang('pages.education.male'))</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.non_formal') (@lang('pages.education.female'))</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.graduate') (@lang('pages.education.male'))</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.graduate') (@lang('pages.education.female'))</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.post_grad') (@lang('pages.education.male'))</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.post_grad') (@lang('pages.education.female'))</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.not_stated') (@lang('pages.education.male'))</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.not_stated') (@lang('pages.education.female'))</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                            </div>
                        </div>      
            </div>

             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.3'). @lang('pages.education.list')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.community')</label>
                                        <input type="number" name="year" class="form-control"> 
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.education.institutionalw')</label>
                                        <input type="number" name="total" class="form-control"> 
                                    </div>
                                </div>

                            </div>
                        </div>      
            </div>


                <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.education.save_education') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('education.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>
        </form>
</div>
@endsection        