@extends('layouts.master')

@section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>Expertise</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                     <span>
                           <a href="{!! route('expertise.create') !!}" class="btn btn-primary">
                                  Add New  Expertise
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
                    
                    <th>Expertise</th>
                                     
                    <th>Action</th>
                   
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($posts as $p)

                <tr>
                   <td> {{ $i }}</td>
                    
                    <td> {{ $p->name}}</td>
                   
                    <td>
                   
                    <a href=" {{ route('expertise.edit',$p->id) }}" class="action-btns">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    {{Form::open(['route'=>['expertise.destroy', $p->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                        <a href="javascript:void(0);" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span></a>
                    {{Form::close()}}
                   
                    </td>
                </tr>
                 <?php $i++; ?>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

       

@endsection
