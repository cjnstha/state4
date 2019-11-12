@extends('layouts.master')
    @section('content')


      
   {{Form::open(['route'=>'qna.store', 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'id'=>'uploadForm', 'data-parsley-validate', 'files'=> 'true'])}}

         <div id="add-slider-wrap" >  
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="panel panel-default">
                  <div class="panel-body">

                    <div class="title-input-filed">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">
                                Question Set Name<span class="required">*</span>
                              </label>
                            <div class="col-md-6 col-sm-7 col-xs-12">
                              {{Form::text('question_set_name', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                            </div>
                        </div> 
                    </div>

                    <div class="repeat-block-wrap">
                      <div class="input-field-group">
                        <div class="repeatdiv">
                          <input type="hidden" class="sliderid" name="question_set_id" value="{{ $lastv }}" />
                          <input type="hidden" class="counter" name="counter[]" value="0" />

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">
                              Question <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-7 col-xs-12">
                              {{Form::text('question[]', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                            </div>
                          </div>       

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Answer Type <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-7 col-xs-12">
                              {{ Form::select('answer_type[]', [
                              ''  => '--Select--',
                              'tick' => 'Tick Options',
                              'text' => 'Text Option'] ,null, ['class' => 'form-control sumoSelect','id'=>'answer_type', 'onchange'=>'disablenable(this, "#addmore","#answers", "#addmoreid")','required']) }}
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Answer Option <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-7 col-xs-12">
                              {{ Form::select('answer_option[]', [
                              ''  => '--Select--',
                              'single' => 'Only One Answer',
                              'multiple' => 'Multiple Answers'] ,null, ['class' => 'form-control sumoSelect','required']) }}
                            </div>
                          </div>


                          <div class="form-group" id="i_partners">   
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Answers<span class="required">*</span>
                            </label> 
                            <div class="col-md-6 col-sm-7 col-xs-12" >
                              <div class="test2" id="addmoreid">
                                {!! Form::text('answers[0][]', '' ,['class' => 'form-control answers',"id"=>"answers"] ) !!}
                              </div>
                            <div class="addmore" id="addmore" >
                              <a href="javascript:;" class="add_morebtn_answers_qnacreate  btn btn-default btn-sm" id="add_morebtn_answers_qnacreate" >
                                <i class="fa fa-plus"></i> Add New 
                              </a>
                            </div>
                            </div>

                          </div>
                        </div> <!-- / repeatdiv -->
                      </div>
                      <div class="addmore col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                       <a href="javascript:;" class="addmorebtn_qna btn btn-default btn-sm"><i class="fa fa-plus"></i> Add New Question/Answer</a>
                      </div>
                    </div>

                    <div class="form-footer">                            
                      <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        {{ Form::submit('Submit', ['class'=>'btn btn-success']) }}        
                        <a href="{{ route('qna.index') }}" class="btn btn-danger">Cancel</a>
                      </div>
                      </div>

                  </div> <!-- /.panel-body -->
              </div> <!-- /.panel-panel -default -->                   
            </div><!-- /.col- -->                            
          </div><!--/ add slider-wrap -->

          

          <!-- 
            var html = $('.add_answers').html();
            // $('.test2').append(html);
          -->     
          
          {{ form::close() }}

            <div class="add" style="display: none;">
              <div class="repeatdiv">
              
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Question
                          <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-7 col-xs-12">
                          {{Form::text('question[]', null, ['class'=>'form-control question col-md-7 col-xs-12','id'=>'question','required'])}}
                          </div>
                      </div>       

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Answer Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                          {{ Form::select('answer_type[]', [
                            ''  => '--Select--',
                           'tick' => 'Tick Options',
                           'text' => 'Text Option'] ,null, ['class' => 'form-control sumoSelect answer_type','id'=>'answer_type', 'onchange'=>'disablenable(this, "","")','required']) }}
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Answer Option <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                          {{ Form::select('answer_option[]', [
                          ''  => '--Select--',
                          'single' => 'Only One Answer',
                          'multiple' => 'Multiple Answers'] ,null, ['class' => 'form-control sumoSelect answer_option','id'=>'answer_option','required']) }}
                        </div>
                      </div>

                      <div class="form-group" id="i_partners">   
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Answers
                        <span class="required">*</span></label> 
                        <div class="col-md-6 col-sm-7 col-xs-12 " >
                          <div class="test2" id="addmoreid" >
                           {!! Form::text('answers[0][]', '' ,['class' => 'form-control answers','id'=>'answers'] ) !!}
                          </div>
                          <div class="addmore" id="addmore"  >
                            <a href="javascript:;" class="add_morebtn_answers_qnacreate  btn btn-default btn-sm" id="add_morebtn_answers_qnacreate"><i class="fa fa-plus"></i> Add New </a>
                          </div>
                        </div>
                      </div>
           
                      <input class="counter" type="hidden" name="counter[]" value="">
                
              </div>  <!-- /.col  -->
            </div>   <!-- /.row --> 

@endsection
