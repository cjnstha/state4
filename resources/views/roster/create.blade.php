@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Consultant Roster</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                {{Form::open(['route'=>'roster.store', 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate', 'files'=>'true'])}}
               
                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Full Name
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('fullname', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Your Email
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('email', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>  

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="contact-no">
                        Contact No.
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('contact', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>  

                     
                  
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Previously worked
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                         {{ Form::select('p_work', [
                                    
                                   'Yes' => 'Yes',
                                   'No' => 'No'] ,null, ['placeholder'=>'--Select --', 'class' => 'form-control select-act-type sumoSelect','id'=>'sel1','required']) }}
                        </div>
                    </div>   
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> 
                            Past performance <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{ Form::select('p_perf', [
                                'Below the average' => 'Below the average',
                                'Average' => 'Average',
                                'Above average' => 'Above average'] ,null, ['placeholder'=>'--Select --','class' => 'form-control select-act-type sumoSelect','id'=>'sel1','required']) }}
                        </div>
                    </div>     

                  
                        
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Upload Resume
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        
                            <div class="input-group browse">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        <i class="fa fa-folder-open"></i>
                                        Browse {{ Form::file('resume_file', ['class' => 'btn btn-default btn-file'] ) }}
                                    </span>
                                </label>
                                <input type="text" class="form-control" disabled>
                            </div>
                       
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Other Document (jpeg)
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        
                            <div class="input-group browse">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        <i class="fa fa-folder-open"></i>
                                        Browse {{ Form::file('otherdoc',['class' => 'btn btn-default btn-file'] ) }}
                                    </span>
                                </label>
                                <input type="text" class="form-control" disabled>
                            </div>
                        
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        PAN/VAT document (jpeg)
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        
                            <div class="input-group browse">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        <i class="fa fa-folder-open"></i>
                                        Browse {{ Form::file('panvat', ['class' => 'btn btn-default btn-file'] ) }}
                                    </span>
                                </label>
                                <input type="text" class="form-control" disabled>
                            </div>
                      
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Expertise
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="checkbox checkbox-primary">
                                            @foreach($expertise as $id=>$name)
                                            <div class="form-group">
                                          
                                              <input id ="checkbox{{$id}}-0" type="checkbox" name="expertise_id[]"  value="{{ $id}}" >
                                            
                                            <label for="checkbox{{$id}}-0"> 
                                             
                                             {{ $name}}
                                            </label>
                                              </div>
                                              @endforeach
                                          

                        </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <div class="form-group">
                            <div class="submit-btn col-md-8 col-sm-7 col-xs-12 col-md-offset-4 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('roster.index') }}" class="cancel-button">Cancel</a>
                            </div>
                        </div>
                    </div>


                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
