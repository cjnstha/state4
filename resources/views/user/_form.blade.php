<!-- Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('labels.name')
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-7 col-xs-12">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('labels.name') ]) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
    </div>
</div>

<!-- email Form Input -->
<div class="form-group @if ($errors->has('email')) has-error @endif">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">@lang('labels.email')
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-7 col-xs-12">
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('labels.email')]) !!}
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
    </div>
</div>

<!-- password Form Input -->
<div class="form-group @if ($errors->has('password')) has-error @endif">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">@lang('labels.pword')
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-7 col-xs-12">
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('labels.pword')]) !!}
    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
    </div>
</div>

<!-- Roles Form Input -->
<div class="form-group @if ($errors->has('roles')) has-error @endif">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">@lang('sidebar.role')
    </label>
    <div class="col-md-6 col-sm-7 col-xs-12">
    {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['class' => 'form-control sumoSelect', 'multiple']) !!}
    @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
    </div>
</div>

<!-- Permissions -->
@if(isset($user))
    @include('shared._permissions', ['closed' => 'true', 'model' => $user ])
@endif