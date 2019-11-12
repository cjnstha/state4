@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.literacy.literacy')</h2>
            <div class="clearfix"></div>
        </div>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('literacy.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.literacy.literacy')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.literacy.male')</label>
                                        <input type="number" name="male" class="form-control" value="78"> 
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.literacy.female')</label>
                                        <input type="number" name="female" class="form-control" value="60"> 
                                    </div>
                                </div>
                               
                            </div>
                        </div>
            </div> 

            <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.labels.submit') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('literacy.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>                      
        </form> 
</div>  
@endsection      