@extends('layouts.master')

@section('title', 'Users')

@section('content')
@include('flash::message')
  <div class="x_panel">
       <div class="x_title">
        <h2>@lang('sidebar.user_management')</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li >
                @can('add_users')
                    <span>
                        <a href="{!! route('users.create') !!}" class="btn btn-primary">
                            @lang('labels.add_new_user')
                        </a>
                     </span>
                @endcan

            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <div class="table_in_div">
            <table class="dataTableClass table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>@lang('labels.id')</th>
                <th>@lang('labels.name')</th>
                <th>@lang('labels.email')</th>
                <th>@lang('sidebar.role')</th>
                <th>@lang('labels.created')</th>
                @can('edit_users', 'delete_users')
                <th class="text-center">@lang('labels.action')</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->roles->implode('name', ', ') }}</td>
                    <td>{{ $item->created_at->toFormattedDateString() }}</td>

                    @can('edit_users')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'users',
                            'id' => $item->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $result->links() }}
        </div>
        </div>
    </div>
  </div>

@endsection