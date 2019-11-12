@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Project Document</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                {{Form::open(['route'=>'prodoc.store', 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate', 'files'=> 'true'])}}
		
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        Project Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-7 col-xs-12">
                        {!! Form::select('project_id', $projects,  null, ['placeholder'=>'--Select --','class' => 'form-control sumoSelect','required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Proposal Document">
                        Proposal Document <br />(doc, docx or pdf)
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse {{Form::file('proposal_doc',null, ['class'=>'form-control'])}}
                                </span>
                            </label>
                            <input type="text" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                    
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Contact Documentation">
                        Contract Document <br />(doc, docx or pdf)
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse {{Form::file('contract_doc',null, ['class'=>'form-control'])}}
                                </span>
                            </label>
                            <input type="text" class="form-control" disabled>
                        </div>
                      
                        </div>
                    </div>

		<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Budget Documentation">Budget Document <br />(excel)
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse {{Form::file('budget_doc',null, ['class'=>'form-control'])}}
                                </span>
                            </label>
                            <input type="text" class="form-control" disabled>
                        </div>
                      
                        </div>
                    </div>

                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Budget Documentation">Log Frame <br />(doc, docx or pdf)
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse {{Form::file('log_frame',null, ['class'=>'form-control'])}}
                                </span>
                            </label>
                            <input type="text" class="form-control" disabled>
                        </div>
                      
                        </div>
                    </div>

                     
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Progress Document">Progress Document <br /> Multiple (doc, docx or pdf)
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse 
                                     <input type="file" id="fileupload" name="tmp_file[]"  class="form-control" multiple />
                                </span>
                            </label>
                            <input type="text" class="form-control" value="Mulitple Files" disabled>
                        </div>
                        <div class="recent-file-preview">
                            <div id="files_list"></div>
                            <div id="progress" class="progress hide">
                                <div class="progress-bar progress-bar-success"></div>
                            </div>
                        </div>
                      
                        </div>


    
     
    <input type="hidden" name="progress_doc_id" id="file_ids" value="" />
    
                    </div>
                    


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keywords">Keywords For Search 
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::textarea('keywords', null, ['class'=>'form-control col-md-7 col-xs-12','size' => '3x3'])}}
                        </div>
                    </div>



                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="duration">Contact Person
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{Form::text('contact_person', null, ['class'=>'form-control col-md-7 col-xs-12'])}}
                        </div>
                    </div>

                    
            

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Quarter
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="radio-wrap">
                                <ul>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('quarter', '1', false,['class' => 'quarter_year_select','id' => 'radio-1','required']) }}  
                                            <label for="radio-1">1<sup>st</sup> </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('quarter', '2', false,['class' => 'quarter_year_select','id' => 'radio-2','required']) }}  
                                            <label for="radio-2">2<sup>nd</sup></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('quarter', '3', false,['class' => 'quarter_year_select','id' => 'radio-3','required']) }}  
                                            <label for="radio-3">3<sup>rd</sup></label>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="radio-group">
                                            {{ Form::radio('quarter', '4', false,['class' => 'quarter_year_select','id' => 'radio-4','required']) }}  
                                            <label for="radio-4">4<sup>th</sup></label>
                                        </div>
                                    </li>
                                      <li>
                                        <div class="form-group hide" id="quarter-year">
                                           
                                            {{ Form::selectRange('quarter_year', 2000, 2030 ,null, ['class'=>'sumoSelect','id'=>'quarter_select_year','placeholder'=>'-- Select Year --']) }}
                                        </div>
                                    </li>
                                </ul>
                            </div> <!-- end radio-wrap -->

                           
                       
                        </div>
                    </div>


                            <div class="form-footer" >
                        
                         <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('prodoc.index') }}" class="btn btn-danger">Cancel</a>
                            
                        </div>
                    </div>


                {{Form::close()}}
            </div>
        </div>

      
    @endsection

