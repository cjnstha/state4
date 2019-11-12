@extends('layouts.master')
    @section('content')
   
        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Visa Recommendation</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content"> 	
            <div class="text-manage">
                                (The elements having the symbol * are mandatory. Please fill them before submitting the form)
                             </div>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('visa.store')}} " method="post">
                    {{ csrf_field() }} 

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">
                        General Agreement Code
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select class="form-control sumoSelect MiscProject" required name="ga_id">
                                    <option selected disabled>-- Select --</option>
                                    @foreach($general_agreement as $ga)
                                        <option value="{{ $ga['id'] }}">{{ $ga['ga_code']}}</option>
                                    @endforeach
                                 </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">
                        INGO Name
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select class="form-control sumoSelect " required name="ingo_id">
                                    <option selected disabled>-- Select --</option>
                                    @foreach($ingos as $ingo)
                                        <option value="{{ $ingo['id'] }}">{{ $ingo['name']}}</option>
                                    @endforeach
                                 </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Project Agreement Code
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                                 
                                 {{ Form::select('project_id', [] ,null, ['class' => 'form-control sumoSelect MiscExpName','placeholer'=>'Select','required']) }}
                        </div>
                    </div>

                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Exptriate Name *
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                                 

                                 <select name="exp_id" required class="form-control sumoSelect MiscExPDetails">
                                     <option disabled> Select Here </option>
                                 </select>
                        </div>
                    </div>

                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Designation *
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                                <div class="designation"></div>
                        </div>
                    </div>

                   <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Person Name *
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                               <input type="text" required name="person_name" placeholder="Enter Person Name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Relation to Expatriate *
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                               <select name="relation" required class="form-control sumoSelect">
                                <option>--Select Here--</option>
                                   @foreach($relations as $relation)
                                   <option value=" {{$relation}} "> {{$relation}} </option>
                                   @endforeach
                               </select>
                        </div>
                    </div>
    
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Visa Reccomendation Date Range *
                                </label>
                                <div class="col-md-3 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                   
                                                <input type="text" required name="visa_from" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                
                                <div class="col-md-3 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                   
                                                <input type="text" required name="visa_to" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                    </div>
                        
                  <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Social Welfare Council Date  * 
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                   
                                                <input type="text" required name="swc_date" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                    </div>

                 <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Home Ministry’s Agreement Date *  
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                   
                                                <input type="text" required name="hm_agree_date" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                    </div>
                    
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Visa Recommended Date  *
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                   
                                                <input type="text" required name="visa_recom_date" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                    </div>  
                    <div class="form-footer">
                        <div class="form-group">
                            <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('visa.index') }}" class="cancel-button">Cancel</a>
                            </div>
                        </div>
                    </div>               
            </form>
            </div>
        </div>
    @endsection  
