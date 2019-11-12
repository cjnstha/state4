@extends('layouts.master')
    @section('content')


    {{Form::model($model, ['route'=>['qna.update', $model->id], 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'id'=>'uploadForm','data-parsley-validate', 'method'=>'patch'])}}
    
    {{ Form::hidden('id', $model->id) }}
    {{ Form::hidden('question_set_id', $model->question_set_id) }}



         <div id="add-slider-wrap" >  
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="title-input-filed">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Question Set Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {{Form::text('question_set_name', null, ['class'=>'form-control col-md-7 col-xs-12','disabled','required'])}}
                                {{Form::hidden('question_set_name', $model->question_set_name)}}
                                </div>
                            </div>
                        </div>

                        <div class="repeat-block-wrap">
                            <div class="input-field-group">
                                <div class="repeatdiv">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Question
                                        <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-7 col-xs-12">
                                            {{Form::text('question', null, ['class'=>'form-control col-md-7 col-xs-12 ','required'])}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Answer Type <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-7 col-xs-12">
                                            {{ Form::select('answer_type', [
                                                ''  => '--Select--',
                                                'tick' => 'Tick Options',
                                                'text' => 'Text Option'] ,isset($models) ?$model->answer_type : '', ['class' => 'form-control sumoSelect','id'=>'answer_type', 'onchange'=>'disablenable(this, "#addmore","#answers", "#addmoreid")','required']) }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Answer Option <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-7 col-xs-12">
                                            {{ Form::select('answer_option', [
                                                ''  => '--Select--',
                                                'single' => 'Only One Answer',
                                                'multiple' => 'Multiple Answers'] ,isset($models) ?$model->answer_option : '', ['class' => 'form-control sumoSelect','required']) }}
                                        </div>
                                    </div>

                                    <div class="form-group" id="i_partners">   
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Answers
                                        <span class="required">*</span></label> 
                           
                                        <?php //dd($key, $value); ?>
                                        <div class="col-md-6 col-sm-7 col-xs-12">
                                            <div class="test2" id="addmoreid">
                                                @foreach($models as $key => $value)
                                                <?php  /* @if($key == 0)
                                                <div class="new-field"> 
                                                 <input type="text" class="form-control answers" name="answers[<?php echo $value->id; ?>]" value="<?php echo isset($value) ? $value->answer : ''; ?>"> 
                                                    <span class="glyphicon glyphicon-trash" id="del_input"></span> 
                                                </div>
                                               @else  
                                               */ ?>   
                
                                                <div class="new-field"> 
                                                    <input type="text" class="form-control answers" name="answers[<?php echo $value->id; ?>]" value="<?php echo isset($value->answer) ? $value->answer : ''; ?>"> 
                                                    <span class="glyphicon glyphicon-trash" id="del_input"></span> 
                                                </div>
                                               <?php // @endif ?>
                                                @endforeach
                                            </div>
                                            <div class="addmore" id="addmore" >
                                                <a href="javascript:;" class="add_morebtn_answers_qnaupdate btn btn-default btn-sm" id="add_morebtn_answers_qnaupdate" >
                                                    <i class="fa fa-plus"></i> Add New 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- / repeat block wrap -->    

                        <div class="form-footer">
                            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                {{ Form::submit('Update', ['class'=>'btn btn-success']) }}
                                <a href="{{ route('qna.show', $model->question_set_id) }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>              
                    </div> <!-- /.panel-body -->
                </div> <!-- /.panel-panel -default -->                      
            </div>
        </div>

{{ form::close() }}

      
@endsection
