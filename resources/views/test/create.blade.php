
        <div class="modal-block">
            <div class="modal-title">
                <h2> {{ $question_set_name }} </h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="modal-content">
                {{Form::open(['route'=>'test.store', 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left nepalitext-form', 'data-parsley-validate'])}}
        
              <input type="hidden" name="question_set_id" value="{{ $question_set_id}}" >
              <input type="hidden" name="question_set_name" value="{{ $question_set_name}}" > 
               
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                  Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {!! Form::select('benef_name',   $benef  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) !!}
                </div>
              </div>
              
          <?php $i=0; ?>
              @foreach($questions as $key)
                   <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          {{$i+1}}. {{ $key->question }}
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">


                        
                              @if($key->answer_type == 'text' && $key->answer_option == 'multiple')

                                  <div class="form-group" id="i_partners{{ $i }}">   
                                      <div class="test2" id="addmoreid{{ $i }}" >
                                          <div class="form-group">
                                            <input type="text" id ="ticked_answers{{ $i }}"  name="written_answers[{{ $key->id }}][]"  class="form-control" value="" placeholder="उत्तर यहाँ लेखनुहोस " required="required">
                                          </div>
                                        </div>

                                        <div class="addmore{{ $i }}" id="addmore{{ $i }}"  >
                                            <a href="javascript:;" class="add_morebtn_mulanswers btn btn-default btn-sm" id="add_morebtn_mulanswers" ><i class="fa fa-plus"></i> Add New </a>
                                        </div>
                                  </div><!--/i_partners -->

                              @elseif($key->answer_type == 'text' && $key->answer_option == 'single')
                                   <div class="form-group">
                                          <input type="text" name="written_answers[{{ $key->id }}][]"  class="form-control" value="" placeholder="उत्तर यहाँ लेखनुहोस " required="required">
                                    </div>   
                              @endif 
                              <div class="checkbox-wrap"> 
                          @foreach($key->answers as $k=>$answer)

                              @if($key->answer_type == 'tick' && $key->answer_option == 'multiple')

                                  <div class="checkbox checkbox-primary">
                                      <input id ="checkbox{{$answer->qid}}-{{ $k }}" type="checkbox" name="ticked_answers[{{ $answer->qid }}][]"  value="{{ $answer->id}}" >
                                      <label for="checkbox{{$answer->qid}}-{{ $k}}"> 
                                         <?php //var_dump($value->qid, $k);  ?>
                                         {{ $answer->answer}}
                                        </label>
                                  </div>

                              @else($key->answer_type == 'tick' && $key->answer_option == 'single')

                                  
                                  
                                    <div class="radio-group">
                                      <input type="radio" required="required" name="ticked_answers[{{ $answer->qid }}][]"  value="{{ $answer->id}}" id="radiobox{{$answer->qid}}-{{ $k}}"/> 
                                      <label for="radiobox{{$answer->qid}}-{{ $k}}"> 
                                         <?php //var_dump($value->qid, $k);  ?>
                                         {{ $answer->answer}}
                                      </label>
                                    </div>
                              
                              @endif
                                     
                          @endforeach
                            </div><!--end checkbox-wrap -->
                        </div><!-- end col-->
                     </div>
               <?php $i++;?>
            @endforeach

                   
                    
                    <div class="form-footer">
                        <div class="submit-btn col-md-6 col-md-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('test.index') }}" class="btn btn-danger">Cancel</a>    
                        </div>
                    </div>

                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

   