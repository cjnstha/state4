@extends('layouts.master')
    @section('content')
    	 <div class="x_panel">
        <div class="x_title">
            <h2>Checklist Management</h2>
            <ul class="nav navbar-right panel_toolbox">

                <li >
                    @can('add_checklistmgmts')
                     <span>
                           <a href="{{ route('checklist.create') }}" class="btn btn-primary">
                                  Add New  Checklist
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
                    
                    <th>Title</th>
                    @can('edit_checklistmgmts', 'delete_checklistmgmts')                 
                    <th>Action</th>
                    @endcan
                   
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($data as $datas)   	
                <tr>
                    <td>{{ $i }}</td>
                    
                    <td>{{ $datas['title']}}</td>
                    @can('edit_checklistmgmts')
                    <td>
                    
                    <a href="{{ route('checklist.edit', $datas->id)}}" class="action-btns">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                   
                        <a href="{{ route('checklist.delete', $datas->id)}}" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span></a>
                    
                  
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