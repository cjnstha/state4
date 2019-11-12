@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.educational.add_educational')</h2>
            <div class="clearfix"></div>
        </div>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('educational.store') }}">
            {{ csrf_field() }}
        		<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.educational.type_of_institution')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="type" class="form-control">
                        </div>
            	</div>

            	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.educational.no_of_students')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="number" name="students" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.3'). @lang('pages.educational.total_enrollment')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                           <div class="row">                      
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.educational.reserved')</label>
                                        <input type="number" name="reserved" class="form-control">
                                    </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.educational.actual')</label>
                                        <input type="number" name="actual" class="form-control">
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.4'). @lang('pages.educational.no_of_teachers')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="number" name="teachers" class="form-control">
                        </div>
                </div>   


                <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.educational.save_educational') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('educational.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>    
        </form>	
</div>
@endsection        