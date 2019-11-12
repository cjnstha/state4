@extends('layouts.master')

@section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>Activity</h2>
            <ul class="nav navbar-right panel_toolbox">

                <li >
        @can('add_activities')
                     <span>
                           <a href="{!! route('activity.create') !!}" class="btn btn-primary">
                                  Add New  Activity
                              </a>
                       </span>
                       @endcan

                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    
                    <th>Activity</th>
                    @can('edit_activities', 'delete_activities')                 
                    <th>Action</th>
                    @endcan
                   
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($posts as $p)

                <tr>
                    <td> {{ $i }}</td>
                    
                    <td> {{ $p->name}}</td>
                   @can('edit_activities')  
                    <td>
                    

                    <a href=" {{ route('activity.edit',$p->id) }}" class="action-btns">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    {{Form::open(['route'=>['activity.destroy', $p->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                        <a href="javascript:void(0);" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span></a>
                    {{Form::close()}}
                  
                    </td>
                    @endcan
                </tr>
                 <?php $i++; ?>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

       

@endsection
