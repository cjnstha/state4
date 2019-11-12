@extends('layouts.master')

@section('content')
    <div class="x_panel">
        <div class="x_title clearfix">
            <h2>{{ $question_set_name }}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <span>
                        <a href="{{ route('qna.index') }}" class="btn btn-primary">Back</a>
                    </span>
                </li>
                <li>
                     <span>
                           <a href="{!! route('qna-addmore', $question_set_id) !!}" class="btn btn-primary">
                                  Add More Questions and Answers
                              </a>
                       </span>

                </li>
            </ul>
        </div>

        <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>

                         <th>Question </th>
                        <th>Answer Options</th>
                        <th>Answer Type</th>
                         <th>Answer</th>
                        
                        <th>Action</th> 
                    </tr>
                </thead>

                <tbody>
                 <?php $i=1; ?>
                @foreach($models as $key=>$model)
              
                <tr>
                    <td> {{ $i }}</td>

                    <td> {{ $model->question }}</td>
                     <td>@if($model->answer_option == 'multiple') Multiple Answers  @else Only One Answer @endif </td>
                    <td> @if($model->answer_type == 'tick') Tick Options  @else Text Option @endif</td>

                     <td>  
                        @if($model->answer_type == 'tick')
                          <?php $j=1;?>
                             @foreach($model->answers as $ans)
                                
                                     {{ $j }} . {{ $ans->answer}} <br />
                               <?php $j++; ?>
                            @endforeach
                        @else 
                        User write's answer
                        @endif

                     </td>
           
                    <td>
                   
                        {{--{{ link_to_route('qna.edit','',[$model->id],['class'=>'btn btn-primary btn-sm glyphicon glyphicon-edit']) }}--}}
                    <a href=" {{ route('qna.edit',$model->id) }}" class="action-btns">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                   
                    {{Form::open(['route'=>['qna.single.delete', $model->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
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
