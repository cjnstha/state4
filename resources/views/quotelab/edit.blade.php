@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Quote Lab</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                {{Form::model($quotelab, ['route'=>['quotelab.update', $quotelab->id], 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate', 'method'=>'patch', 'files'=> 'true'])}}
                {{ Form::hidden('id', $quotelab->id) }}
               
               
            
                <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type"> Project Code
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::select('project_code', $projects,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) !!}
                        </div>
                </div>
               
                <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Type</label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{ Form::select('type', [
                                    ''  => '--Select--',
                                   'Case Studies' => 'Case Studies',
                                   'Quotes' => 'Quotes'] ,null, ['class' => 'form-control sumoSelect','required']) }}
                          
                        </div>
                </div>
                 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type"> Activity
                         <span class="required">*</span></label>
                          <div class="col-md-8 col-sm-7 col-xs-12">

                          {!! Form::select('activity', $activity,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) !!}
                        
                    </div>
                        
                </div>




                <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Theme <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{ Form::select('theme', [
                                    ''  => 'Choose Option',
                                   'Education' => 'Education',
                                   'Gender Base' => 'Gender Base',
                                   'Violence' => 'Violence'] ,null, ['class' => 'form-control sumoSelect','required']) }}
                          
                        </div>
                </div>

                 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type"> Beneficiars
                         <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::select('beneficiar', $benef_name,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) !!}
                          
                        </div>  
                </div>
               
                <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type"> Location
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{Form::text('location', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                </div>

                 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type"> Occupation
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{Form::text('occupation', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                </div>

                 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type"> Education
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{Form::text('education', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                </div>

                 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type"> Group/Individual
                         <span class="required">*</span></label>

                         <div class="col-md-8 col-sm-7 col-xs-12">
                        {{ Form::select('group_individual', [
                                    ''  => '--Select--',
                                   'Group' => 'Group',
                                   'Individual' => 'Individual'] ,null, ['class' => 'form-control sumoSelect','required']) }}
                          
                        </div>
                        
                </div>
                                

                
                 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type"> Main Quote
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{Form::text('main_quote', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                </div> 

                   <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type">Quarter
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
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
                                </ul>
                            </div> <!-- end radio-wrap -->

                            <div class="form-group" >
                               
                                {{ Form::selectRange('quarter_year', 2000, 2030 ,null, ['class'=>'sumoSelect','id'=>'quarter_select_year']) }}
                            </div>
                       
                        </div>
                    </div>              

                    
                    <div class="form-footer" >
                        <div class="col-md-8 col-sm-7 col-xs-12 col-md-offset-2 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('quotelab.index') }}" class="btn btn-danger">Cancel</a>
                            {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                        </div>
                    </div>

                {{Form::close()}}
            </div>
        </div>

    @endsection
