@extends('layouts.master')
    @section('content')
<div class="hide add_cd">
    <div class="x_panel new_cd">
                                   
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('name','Name',array('class'=>'control-label')) !!}
                                        <input type="text" name="cd_name[]"  class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                  {!! Form::label('duration_from','Duration From',array('class'=>'control-label')) !!}
                                        <div class="project_agt">
                                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('duration_from[]', null, ['class'=>'form-control has-feedback-left col-md-7 col-xs-12', 'id'=>'datepick-all'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                                        </div>
                                            </div>
                                        </div>
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                  {!! Form::label('duration_to','Duration To',array('class'=>'control-label')) !!}
                                        <div class="project_agt">
                                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('duration_to[]', null, ['class'=>'form-control has-feedback-left col-md-7 col-xs-12', 'id'=>'datepick-all'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                                        </div>
                                            </div>
                                        </div>                                 
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('family_number','Family Members',array('class'=>'control-label')) !!}
                                        <input type="number" name="family_number[]"  class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                         
                                                <a href="javascript:;">
                                            <span class="del_cd  delete-icon fa fa-trash-o "> </span>
                                        </a>
                                            
                                    
                                  
                             
    </div>
</div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Add New General Agreement Profile</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <div class="text-manage">
                                (The elements having the symbol * are mandatory. Please fill them before submitting the form)
                             </div>
                {{Form::open(['route'=>'generalagreements.store', 'id'=>'demo-form2', 'class'=>'form-horizontal', 'data-parsley-validate'])}}
                <input type="hidden" name="user_id" value="{{$user_id}}">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Name of INGO *</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="ingo_id" required class="form-control sumoSelect">
                                <option>--Select Here--</option>
                                @foreach($ingos as $ingo)
                                <option value="{{$ingo->id}}"> {{$ingo->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                   <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">General Agreement Code *</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="ga_code" required placeholder="Enter Code" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">
                            Finance Grant
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="number" name="finance_grant" required placeholder="Enter Finance Grant" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">
                            Commodity Grant
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="number" name="commodity_grant" required placeholder="Enter Commodity Grant" class="form-control">
                        </div>
                    </div>                     

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Social Welfare Reccomendation Date *</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('sw_recco_date', null, ['class'=>'form-control has-feedback-left col-md-7 col-xs-12', 'id'=>'datepick-all','required'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                     <div class="form-group">
                                {!! Form::label('Thematic Area *','Thematic Area *',array('class'=>'control-label col-md-4 col-sm-3 col-xs-12')) !!}
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        
                                                
                                        {{ Form::select('thematic_area[]', $thematic_area ,null, ['placeholder'=>'--Select--','class' => 'form-control col-md-7 col-xs-12  sumoSelect','multiple','id'=>'theme_select','required']) }}
                                        
                                       
                                    </div>
                                </div>

                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Time Bound *</label>
                        <div class="col-md-3 col-sm-7 col-xs-12">
                            <select name="year" required class="sumoSelect">
                                <option>-Select Here--</option>
                              @for($i = 1900; $i <= date('Y'); $i++)
                                <option value="{{$i}}" > {{$i}} </option>
                                @endfor
                            </select>
                        </div>
                         <div class="col-md-3 col-sm-7 col-xs-12">
                           <select class="sumoSelect" name="month" >
                            <option>-Select Here--</option>
                               @foreach($months as $month)
                               <option value="{{$month->name}}" > {{$month->name}} </option>
                               @endforeach
                           </select>
                        </div>
                    </div>

                  <div class="form-group">
                                {!! Form::label('Country Director:','Country Director:',array('class'=>'control-label col-md-4 col-sm-3 col-xs-12')) !!}
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="table-wrapper">
                                        <div class="x_panel">
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('cd_name','Name *',array('class'=>'control-label')) !!}
                                        <input type="text" name="cd_name[]" required class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                  {!! Form::label('duration_from','Duration From',array('class'=>'control-label')) !!}
                                        <div class="project_agt">
                                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('duration_from[]', null, ['class'=>'form-control has-feedback-left col-md-7 col-xs-12', 'id'=>'datepick-all'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                                        </div>
                                            </div>
                                        </div>
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                  {!! Form::label('duration_to','Duration To',array('class'=>'control-label')) !!}
                                        <div class="project_agt">
                                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('duration_to[]', null, ['class'=>'form-control has-feedback-left col-md-7 col-xs-12', 'id'=>'datepick-all'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                                        </div>
                                            </div>
                                        </div>                                 
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('family_number','Family Members',array('class'=>'control-label')) !!}
                                        <input type="number" name="family_number[]"  class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        
                                    </div>
                                   <div class="more_cd"></div>
                                    <div class="button-wrap">
                                                <a href="javascript:;">
                                            <span class="addmore_cd ngo-submit btn-primary fa fa-plus"> Add More</span>
                                        </a>
                                            </div>
                                </div>  
                               
                                
                                           
                                       
                                    </div>
                            </div>

                   

                   <div class="form-footer">
                        <div class="form-group">
                            <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('ingo.index') }}" class="cancel-button">Cancel</a>
                            </div>
                        </div>
                    </div>

                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
