@extends('layouts.master')

@section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>Province</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                @can('add_miscellaneous_provinces')  
                     <span>
                           <a href="{!! route('misc-province.create') !!}" class="btn btn-primary">
                                  Add New Province
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
                    
                    <th>Province</th>
                    @can('edit_miscellaneous_provinces', 'delete_miscellaneous_provinces')                   
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
                   @can('edit_miscellaneous_provinces')  
                    <td>
                   
                    <a href=" {{ route('misc-province.edit',$p->id) }}" class="action-btns">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    {{Form::open(['route'=>['misc-province.destroy', $p->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
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
