

    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                    Name <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-7 col-xs-12">
                    {!! Form::text('name', '' ,['class' => 'form-control'] ) !!}
                </div>
            </div> 

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                    Beneficiary Type <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-7 col-xs-12">
                    {{ Form::select('benef_type', [
                        ''  => '--Select Option --',
                        'Group' => 'Group',
                        'Individual' => 'Individual'] ,null, ['class' => 'form-control benef-group-ind-select sumoSelect','required']) }}
                </div>
            </div> 

            <div class="form-group ind-age hide">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">    Age<span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-7 col-xs-12">
                    <select class="form-control sumoSelect" id="sel1" name="age">
                        <option value="">--Select--</option>
                        <option value="Below 15">Below 15</option>
                        <option value="15-29">15-29</option>
                        <option value="30-45">30-45</option>
                        <option value="45-Above">45-Above</option>
                     </select>                          
                </div>
            </div>

           <div class="form-group group-age hide">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">    Age<span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-7 col-xs-12">
                    <div class="form-group">
                        <label class="control-label" for="last-name">Below 15</label>
                        {!! Form::text('age_below_15', '' ,['class' => 'form-control'] ) !!}
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="last-name">15-29</label>
                        {!! Form::text('age_15_29', '' ,['class' => 'form-control'] ) !!}
                    </div>

                    <div class="form-group">
                        <label class="control-label " for="last-name">30-45</label>
                        {!! Form::text('age_30_45', '' ,['class' => 'form-control'] ) !!}
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="last-name">45-Above</label>
                        {!! Form::text('age_45_above', '' ,['class' => 'form-control'] ) !!}
                    </div>
                        
                </div>
            </div>

            <div class="form-group ind-gender hide">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">    Gender <span class="required">*</span>
                </label>
                                
                <div class="col-md-9 col-sm-7 col-xs-12">
                    <select class="form-control sumoSelect" id="sel1" name="gender">
                        <option value="">--Select--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                         <option value="Others">Others</option>          
                    </select>
                </div>
            </div> 

            <div class="form-group group-gender hide">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                    Gender<span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-7 col-xs-12">
                    <div class="form-group">
                        <label class="control-label" for="last-name">
                            Male<span class="required">*</span>
                        </label>
                        {!! Form::text('gender_male', '' ,['class' => 'form-control'] ) !!}
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="last-name">
                            Female<span class="required">*</span>
                        </label>
                        {!! Form::text('gender_female', '' ,['class' => 'form-control'] ) !!}
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="last-name">
                            Others<span class="required">*</span>
                        </label>
                        {!! Form::text('gender_others', '' ,['class' => 'form-control'] ) !!}
                    </div>
                </div>
            </div>

                    <div class="form-group ind-identity hide">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Identity
                                <span class="required">*</span></label>
                                
                                <div class="col-md-9 col-sm-7 col-xs-12">

                                <select class="form-control sumoSelect" id="sel1" name="identity">
                                <option value="">--Select--</option>
                                  @foreach($identity as $id => $name)           
                                            <option   value="{{ $id }}" >{{ $name}}</option>                  
                                    @endforeach                 
                                </select>
                                   
                               </div>
                    </div> 

                        <div class="form-group group-identity hide">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Identity<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-7 col-xs-12">
                                
                            @foreach($identity as $id => $name)
                            
                                <div class="form-group">
                                <label class="control-label">{{ $name}}</label>

                                        <input type="text" name="identity_group[{{$id}}]" class="form-control">
                                </div>
                            @endforeach

            
                            </div>
                    </div>


                   <div class="form-group ind-cast-eth hide">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Caste/Ethnicity
                                <span class="required">*</span></label>
                                
                                <div class="col-md-9 col-sm-7 col-xs-12">

                                <select class="form-control sumoSelect" id="sel1" name="caste">
                                <option value="">--Select--</option>
    

                                  @foreach($caste as $id => $name)
                                          
                                            
                                            <option   value="{{ $id }}" >{{ $name}}</option>
                                            
                                    @endforeach

                                </select>
                                   
                               </div>
                    </div>

                    <div class="form-group group-cast-eth hide">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Caste/Ethnicity<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-7 col-xs-12">
                                
                            @foreach ($caste as $id => $name)
                                <div class="form-group">
                                <label class="control-label ">{{ $name}}</label>

                                        <input type="text" name="caste_eth_group[{{ $id }}]" class="form-control">
                                </div>
                            @endforeach

            
                            </div>
                    </div>

                                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Activity Type
                                <span class="required">*</span></label>
                                
                                <div class="col-md-9 col-sm-7 col-xs-12">

                                <select class="form-control select-act-type sumoSelect" id="sel1" name="act_type">
                                <option value="">--Select--</option>
                               @foreach($activity as $id=> $name)
                                    <option value="{{$id}}">{{$name}}</option>
                               @endforeach
                                                                                          
                                </select>
                                   
                               </div>
                    </div> 

                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                               Donors Code
                                <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-7 col-xs-12">
                          <select class="form-control sumoSelect " name="donor_code" required>
                                            <option value="">-- Select --</option>
                                            @foreach($donor_codes as $id => $donor_code)
                                            <option   value="{{$id }}">{{ $donor_code }}</option>
                                            @endforeach
                                        </select>
                                </div>
                        </div>



                     <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date From <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-7 col-xs-12">
                                        
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                  
                                                <input type="text" name="date_from" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                   
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date To<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-7 col-xs-12">
                                      
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                  
                                                <input type="text" name="date_to" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>


                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                               District
                                <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-7 col-xs-12">
                                      <select class="form-control sumoSelect " name="district_id" required>
                                                        <option value="">-- Select District --</option>
                                                        @foreach($districts as $district)
                                                        <option  data-attr="{{$district->zone_id}}" value="{{$district->district_id }}">{{$district->district_name}}</option>
                                                        @endforeach
                                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Organization
                                <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-7 col-xs-12">
                                {!! Form::text('organization', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div> 
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Designation
                                <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-7 col-xs-12">
                                {!! Form::text('designation', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>  
    




                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Contact Number
                                <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-7 col-xs-12">
                                {!! Form::text('c_number', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div> 
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Email address
                                <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-7 col-xs-12">
                                {!! Form::text('email', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div> 
                
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                               VDC/Municipality
                                <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-7 col-xs-12">
                                    {!! Form::text('vdc', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>

                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ward No. <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-7 col-xs-12">
                           

                                 {{Form::text('ward_no', null, ['class'=>'form-control'])}}
                             
                            </div>
                           
                            
                    </div>
                    
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Venue 
                                <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-7 col-xs-12">
                                {!! Form::text('venue', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>

                               
                      
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Implementing Organization
                                <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-7 col-xs-12">
                                {!! Form::text('imp_org', '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        
            


                        <div class="form-footer">
                            <div class="form-group">
                                <div class="submit-btn col-md-8 col-sm-7 col-xs-12 col-md-offset-3 col-sm-offset-3">
                                   <!--  {!! Form::submit('Submit',['class'=>'btn btn-success']) !!} -->
                                   <button type="submit" class="btn btn-success btn-sm button_save_benef">Submit</button>
                                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   <!--  <a href="{{ route('benef.index') }}" class="btn btn-danger">Cancel</a> -->
                                </div>
                            </div>
                        </div>

                
            </div>
        </div>


<script type="text/javascript">



$(document).ready(function(){

    $('select.sumoSelect').SumoSelect({search: true, searchText: 'Search Here.'});

    
        var date_input=$('input[id="datepick-all"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        // alert(container);
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            // todayBtn: true,
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
        })



    });

</script>