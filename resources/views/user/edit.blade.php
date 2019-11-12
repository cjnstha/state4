@extends('layouts.master')

@section('title', 'Edit User ' . $user->first_name)

@section('content')

     {{--<div class="row">--}}
        {{--<div class="col-md-5">--}}
            {{--<h3>Edit {{ $user->first_name }}</h3>--}}
        {{--</div>--}}
        {{--<div class="col-md-7 page-action text-right">--}}
            {{--<a href="{{ route('users.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="x_panel">
        <div class="x_title">
            <h2>@lang('labels.edit_user')</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

        {{--<div class="wrapper wrapper-content animated fadeInRight">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-12">--}}
                    {{--<div class="ibox float-e-margins">--}}
                        {{--<div class="ibox-content">--}}
                            {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update',  $user->id ], 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate' ]) !!}
                                @include('user._form')
                                <!-- Submit Form Button -->
                                {{--{!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}--}}
                            {{--{!! Form::close() !!}--}}
                            <div class="form-footer" >
                                <div class="col-md-8 col-sm-7 col-xs-12 col-md-offset-3 col-sm-offset-3">
                                    <button type="submit"  class="btn btn-success">@lang('labels.submit')</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-danger">@lang('labels.cancel')</a>
                                    {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                                </div>
                            </div>

                            {{Form::close()}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        </div>
@endsection