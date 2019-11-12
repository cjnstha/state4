@extends('layouts.master')

@section('title', 'Roles & Permissions')

@section('content')

{!! Form::open(['method' => 'post']) !!}

                <div class="modal-header">
                 
                    <h4 class="modal-title" id="roleModalLabel">@lang('sidebar.role')</h4>
                </div>
                <div class="modal-body">
                    <!-- name Form Input -->
                    <div class="form-group @if ($errors->has('name')) has-error @endif">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Role Name']) !!}
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                    </div>
                 {{--    <div class="form-group @if ($errors->has('display_name')) has-error @endif">
                        {!! Form::label('display_name', 'Display Name') !!}
                        {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => 'Role Display Name']) !!}
                        @if ($errors->has('display_name')) <p class="help-block">{{ $errors->first('display_name') }}</p> @endif
                    </div>
                    <div class="form-group @if ($errors->has('description')) has-error @endif">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Role Description']) !!}
                        @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <!-- Submit Form Button -->
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
 

    @forelse ($roles as $role)

        {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ], 'class' => 'form-horizontal form-label-left', 'id'=>'demo-form2']) !!}
        @if($role->name === 'Admin')
            @include('shared._permissions', [
                          'title' => $role->name .' Permissions',
                          'options' => ['disabled']
                           ])
            {{-- @can('edit_roles')
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            @endcan --}}
        @else
            @include('shared._permissions', [
                          'title' => $role->name .' Permissions',
                          'model' => $role ])
            @can('edit_roles')
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            @endcan
        @endif

        {!! Form::close() !!}

    @empty
        <p>No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.</p>
    @endforelse
@endsection