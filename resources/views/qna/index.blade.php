@extends('layouts.master')

@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Questions and Answers</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                
                     <span>
                           <a href="{!! route('qna.create') !!}" class="btn btn-primary">
                                  Add New  Questions and Answers
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
                             
                    <th>Question Set </th>
                   
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                 <?php $i=1; ?>
                @foreach($services as $key=>$service)

                <tr>
                    <td> {{ $i }}</td>
                    
                    <td> {{ $service->question_set_name }}</td>      

                    <td>
                   
                        {{-- {{ link_to_route('qna.show','',[$service->question_set_id],['class'=>'glyphicon glyphicon-list']) }}--}}
                    <a href=" {{ route('qna.show',$service->question_set_id) }}" class="action-btns">
                        <span class="fa fa-list-ul"></span>
                    </a>
                   
                    {{Form::open(['route'=>['qna.destroy', $service->question_set_id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                        <a href="javascript:void(0);" class=" submit action-btns"><span class="glyphicon glyphicon-trash"></span></a>
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
