@extends('layouts.master')

@section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>SIP Management</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
            
                     <span>
                           <a href="{!! route('sip.create') !!}" class="btn btn-primary">
                                  Add New  SIP
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
                    <th>Name of the activities</th>
                    <th>Output</th>
                    <th>Planned date</th>
                    <th>Action</th>
                   
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($posts as $p)

                <tr>
                   <td> {{ $i }}</td>

                    <td> {{ $p->name }}</td>
                    <td>  {{ $p->out_put }} </td>
                    
                    <td> {{ $p->planned_date}}</td>
                    
                    <td>
                    <a href=" {{ route('sip.edit', $p->id ) }}" class="action-btns">
                       {{--{{ link_to_route('sip.edit','',[$p->id],['class'=>'btn btn-primary btn-sm glyphicon glyphicon-edit']) }} --}}
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    {{Form::open(['route'=>['sip.destroy', $p->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                        <a href="javascript:void(0);" class="submit action-btns "><span class="glyphicon glyphicon-trash"></span></a>
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
