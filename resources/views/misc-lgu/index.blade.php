@extends('layouts.master')

@section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>LGU</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                @can('add_miscellaneous_lgus')  
                     <span>
                           <a href="{!! route('misc-lgu.create') !!}" class="btn btn-primary">
                                  Add New LGU
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
                    
                    <th>LGU</th>
                    <th>District</th>
                    @can('edit_miscellaneous_lgus', 'delete_miscellaneous_lgus')                   
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
                    <td> {{ $p->miscDistrict->name}}</td>
                   @can('edit_miscellaneous_lgus')  
                    <td>
                   
                    <a href=" {{ route('misc-lgu.edit',$p->id) }}" class="action-btns">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    {{Form::open(['route'=>['misc-lgu.destroy', $p->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
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
