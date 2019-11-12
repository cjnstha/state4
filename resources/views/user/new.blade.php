@extends('layouts.master')

{{--@section('title', 'Create')--}}

@section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>@lang('labels.add_new_user')</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">


            {!! Form::open(['route' => ['users.store'], 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate' ]) !!}
                @include('user._form')
                <!-- Submit Form Button -->
                {{--{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}--}}
            {{--{!! Form::close() !!}--}}

                <div class="form-footer" >
                    <div class="col-md-8 col-sm-7 col-xs-12 col-md-offset-3 col-sm-offset-3">
                        <button type="submit"  class="btn btn-success">@lang('labels.submit')</button>
                        <a href="{{ route('users.index') }}" class="btn btn-danger">@lang('labels.cancel')</a>
                        {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                    </div>
                </div>

                {{Form::close()}}

        </div>
    </div>
@endsection