@extends('layouts.master')

@section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>Consultant Roster</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
             
                     <span>
                       <a href="{!! route('roster.create') !!}" class="btn btn-primary">
                              Add New  Consultant Roster
                          </a>
                   </span>

                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                     <th>Name</th>
                    <th>Previously worked</th>
                    <th>Past performance</th>
                    <th>Contact email</th>                   
                    <th>Action</th>
                   
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($posts as $p)

                <tr>
                    <td> {{ $i }}</td>
                     <td> {{ $p->fullname }}</td>
                    <td> {{ $p->p_work }}</td>
                    <td> {{ $p->p_perf}}</td>
                    <td> {{ $p->email}}</td>
                    <td>
                       {{--{{ link_to_route('roster.edit','',[$p->id],['class'=>'btn btn-primary btn-sm glyphicon glyphicon-edit']) }} --}}
                        <a href=" {{ route('roster.edit',$p->id) }}" class="action-btns">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>

                    {{Form::open(['route'=>['roster.destroy', $p->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                        <a href="javascript:void(0);" class="submit action-btns"><span class="glyphicon glyphicon-trash"></span></a>
                    {{Form::close()}}
                    {{-- <a href="#"  class="btn btn-danger btn-lg">
                    <span class="glyphicon glyphicon-remove"></span>
                    </a> --}}
                    </td>
                </tr>
                 <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

       

@endsection
