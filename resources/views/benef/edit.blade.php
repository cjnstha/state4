@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Beneficiaries</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                {{Form::open(['route'=>['benef.update', $posts->id], 'id'=>'demo-form2', 'class'=>'form-grid','method'=>'patch', 'data-parsley-validate'])}}
               
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('name',  isset($posts) ? $posts->name : '' ,['class' => 'form-control'] ) !!}
                    </div>
                </div> 

                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Beneficiary Type <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <select class="form-control sumoSelect benef-group-ind-select" name="benef_type">
                            <option value="">--Select--</option>
                            <option value="Group" @if ($posts->benef_type== "Group" ) selected   @endif >Group</option>
                            <option value="Individual" @if ($posts->benef_type== "Individual" ) selected @endif  >Individual</option>
                        </select>
                    </div>
                </div>  

                <div class="form-group ind-age @if ($posts->benef_type== "Individual" ) @else hide   @endif">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Age<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <select class=" sumoSelect form-control " id="sel1" name="age">
                            <option value="">--Select--</option>
                            <option value="Below 15" @if ($posts->age== "Below 15") selected @endif>Below 15</option>
                            <option value="15-29"  @if ($posts->age== "15-29" ) selected @endif>15-29</option>
                            <option value="30-45" @if ($posts->age== "30-45" ) selected  @endif>30-45</option>
                            <option value="45-Above" @if ($posts->age== "45-Above") selected @endif>45-Above</option>
                         </select>                         
                    </div>
                </div>

                <div class="form-group group-age  @if ($posts->benef_type== "Group" ) @else hide   @endif">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Age<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="last-name">Below 15</label>
                            <input type="text" name="age_below_15" value="@if ($posts->age_below_15 != '' || $posts->age_below_15 != 0) {!! $posts->age_below_15 !!} @endif" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="last-name">15-29</label>
                             <input type="text" name="age_15_29" value="@if ($posts->age_15_29 != '' || $posts->age_15_29 != 0) {!! $posts->age_15_29 !!} @endif" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="last-name">30-45</label>
                            <input type="text" name="age_30_45" value="@if ($posts->age_30_45 != '' || $posts->age_30_45 != 0) {{ $posts->age_30_45 }} @endif" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label " for="last-name">45-Above</label>
                             <input type="text" name="age_45_above" value="@if ($posts->age_45_above != '' || $posts->age_45_above != 0) {{ $posts->age_45_above }} @endif" class="form-control">
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group ind-gender @if ($posts->benef_type== "Individual" ) @else hide   @endif"">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Gender <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <select class="form-control sumoSelect" id="sel1" name="gender">
                            <option value="">--Select--</option>
                            <option value="Male" @if ($posts->gender== "Male") selected @endif >Male</option>
                            <option value="Female"  @if ($posts->gender== "Female") selected  @endif>Female</option>
                            <option value="Others" @if ($posts->gender== "Others") selected  @endif>Others</option>      
                        </select>
                    </div>
                </div> 

                <div class="form-group group-gender @if ($posts->benef_type== "Group" ) @else hide   @endif ">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Gender<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="last-name">Male<span class="required">*</span></label>
                            <input type="text" name="gender_male" value="@if ($posts->gender_male != '' || $posts->gender_male != 0) {{ $posts->gender_male }} @endif " class="form-control genderAdd">
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="last-name">Female<span class="required">*</span></label>
                            <input type="text" name="gender_female" value="@if ($posts->gender_female != '' || $posts->gender_female != 0) {{ $posts->gender_female }} @endif" class="form-control genderAdd">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="last-name">Others<span class="required">*</span></label>
                            <input type="text" name="gender_others" value=" @if ($posts->gender_others != '' || $posts->gender_others != 0) {{ $posts->gender_others }} @endif" class="form-control genderAdd">
                        </div>

                            <div class="form-group">
                            <label class="control-label" for="last-name">Total<span class="required">*</span></label>
                            <input type="text" name="gender_total" value=" @if ($posts->gender_total != '' || $posts->gender_total != 0) {{ $posts->gender_total }} @endif" class="form-control genderAddTotal">
                        </div>

                        </div>
                    </div>

                    <div class="form-group ind-identity @if ($posts->benef_type== "Individual" ) @else hide   @endif"">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Identity <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <select class="form-control sumoSelect" id="sel1" name="identity">
                                <option value="">--Select--</option>
                                @foreach($identity as $id => $name)
                                <option   value="{{ $id }}" @if($id == $posts->identity) selected @endif >{{ $name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 

                    <div class="form-group group-identity @if ($posts->benef_type== "Group" ) @else hide   @endif ">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Identity<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            @foreach($identity as $id => $name)
                                <div class="form-group">
                                    <label class="control-label">{{ $name}}</label>
                                        <?php 
                                            $value = \DB::table('benef_identity_if_group')
                                                ->select('identity_value')
                                                ->where('benef_id',$posts->id)
                                                ->where('identity_id',$id)
                                                ->first();

                                                    // print_r($value);
                                                    // die;
                                        ?>
                                    <input type="text" name="identity_group[{{$id}}]" class="form-control" value="<?php echo isset($value->identity_value)? $value->identity_value: ''; ?>">
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="form-group ind-cast-eth @if ($posts->benef_type== "Individual" ) @else hide   @endif"">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Caste/Ethnicity <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <select class="form-control sumoSelect" id="sel1" name="caste">
                                <option value="">--Select--</option>
                                @foreach($caste as $id => $name)
                                    <option   value="{{ $id }}" @if($id == $posts->caste) selected @endif >{{ $name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group group-cast-eth @if ($posts->benef_type== "Group" ) @else hide   @endif">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Caste/Ethnicity<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            @foreach ($caste as $id => $name)
                                <div class="form-group">
                                    <label class="control-label ">{{ $name}}</label>
                                        <?php 
                                        // print_r($id);
                                        // die;
                                            $value = \DB::table('benef_caste_eth_if_group')
                                                ->select('cast_eth_value')
                                                ->where('benef_id',$posts->id)
                                                ->where('caste_eth_id',$id)
                                                ->first();

                                        ?>
                                    <input type="text" name="caste_eth_group[{{ $id }}]" class="form-control"  value="<?php echo isset($value->cast_eth_value)? $value->cast_eth_value: ''; ?>" >
                                </div>
                            @endforeach
                        </div>
                    </div>

                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Organization
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('organization', isset($posts) ? $posts->organization : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div> 
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Designation
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('designation', isset($posts) ? $posts->designation : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>  



                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Contact Number
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('c_number',  isset($posts) ? $posts->c_number : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div> 
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Email address
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('email',  isset($posts) ? $posts->email : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div> 
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               District
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                <select class=" sumoSelect form-control " name="district_id" required>
                                            <option value="">-- Select District --</option>
                                            @foreach($districts as $district)
                                            @if($district->district_id== $posts->district_id)
                                            <option  value="{{$district->district_id }}" selected>{{$district->district_name}}</option>
                                            @else
                                             <option  value="{{$district->district_id }}">{{$district->district_name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               VDC/Municipality
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('vdc',  isset($posts) ? $posts->vdc : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Ward No.
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('ward_no',  isset($posts) ? $posts->ward_no : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                    
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Venue 
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('venue', isset($posts) ? $posts->venue : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                      
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Implementing Organization
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('imp_org',  isset($posts) ? $posts->imp_org : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Donors Code
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                          <select class=" sumoSelect form-control " name="donor_code" required>
                                            <option value="">-- Select --</option>
                                            @foreach($donor_codes as $id => $donor_code)
                                            
                                            <option   value="{{ $id }}" @if($id == $posts->donor_code) selected @endif >{{ $donor_code}}</option>
                                            
                                            @endforeach
                                        </select>
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Date From <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                     
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                   
                                                <input type="text" name="date_from" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4" value="{{isset($posts) ? $posts->date_from : ''}}">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Date To<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                        
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                  
                                                <input type="text" name="date_to" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4" value="{{isset($posts) ? $posts->date_to : ''}}">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                   
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>


                             <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Activity Type
                                <span class="required">*</span></label>
                                
                                <div class="col-md-8 col-sm-7 col-xs-12">

                                <select class=" sumoSelect form-control select-act-type" id="sel1" name="act_type">
                                <option value="">--Select--</option>
                                  @foreach($activity as $id => $name)
                                             
                                            <option   value="{{ $id }}" @if($id == $posts->act_type) @endif selected>{{ $name}}</option>
                                            
                                    @endforeach
                                                                                          
                                </select>
                                   
                               </div>
                    </div>  

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Project Code
                                <span class="required">*</span></label>
                                
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    {{ Form::select('project_id', $projects ,$posts->project_id, ['class' => 'form-control sumoSelect','placeholder'=>'-- Select Here --','required']) }}
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
                                                    {{ Form::radio('quarter', '1', ($posts->quarter=='1')? true: false,['class' => 'quarter_year_select','id' => 'radio-1','required']) }}  
                                                    <label for="radio-1">1<sup>st</sup> </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="radio-group">
                                                    {{ Form::radio('quarter', '2', ($posts->quarter=='2')? true: false,['class' => 'quarter_year_select','id' => 'radio-2','required']) }}  
                                                    <label for="radio-2">2<sup>nd</sup></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="radio-group">
                                                    {{ Form::radio('quarter', '3', ($posts->quarter=='3')? true: false,['class' => 'quarter_year_select','id' => 'radio-3','required']) }}  
                                                    <label for="radio-3">3<sup>rd</sup></label>
                                                </div>
                                            </li>
                                             <li>
                                                <div class="radio-group">
                                                    {{ Form::radio('quarter', '4', ($posts->quarter=='4')? true: false,['class' => 'quarter_year_select','id' => 'radio-4','required']) }}  
                                                    <label for="radio-4">4<sup>th</sup></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> <!-- end radio-wrap -->

                                    <div class="form-group hide" id="quarter-year">
                                        {{ Form::selectRange('quarter_year', 2000, 2030 ,$posts->quarter_year, ['class'=>'sumoSelect','id'=>'quarter_select_year']) }}
                                    </div>
                               
                                </div>
                            </div>

                    <div class="x_panel x_panel-box">
            
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12"> Project <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::select('goal_id', $data['goals'] , $posts->goal_id, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','id'=>'goalreportedit','data-format'=>'vertical','required']) !!}
                            </div>
                        </div>

                        
                    {{-- <div class="x_content" id="goal-report" style="display: none;">
                  
                    
                    </div> --}}
            
                        <div class="x_content goalClass" id="goal-report">
                            <div class="form-group indicatoredit">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12"> Indicator <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">

                                    <select class="form-control sumoSelect" id="indicatoredit" name="indicator_id[]" multiple required>
                                       <option disabled="disabled"> -- Select --</option>
                                        @foreach($data['allgoalreports']['indicator'] as $key => $value )
                                        
                                            <option value="{{$key }}"  @foreach($data['indicator_exp'] as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                        @endforeach
                                    </select>

                                </div>
                            </div>
    

                            <div class="form-group outputedit">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12"> Output <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">


                                       <select class="form-control sumoSelect" id="outputedit" name="output_id[]" multiple required>
                                       <option disabled="disabled"> -- Select --</option>
                                        @foreach($data['allgoalreports']['output'] as $key => $value )
                                        
                                            <option value="{{$key }}"  @foreach($data['output_exp'] as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="form-group activityedit">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12"> Activity <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">

                
                                       <select class="form-control sumoSelect" id="activityedit" name="activity_id[]" multiple required>
                                       <option disabled="disabled"> -- Select --</option>
                                        @foreach($data['allgoalreports']['activity'] as $key => $value )
                                        
                                            <option value="{{$key }}"  @foreach($data['activity_exp'] as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
        
                    </div>


                    <div class="form-footer">
                        <div class="form-group">
                            <div class="submit-btn col-md-8 col-sm-7 col-xs-12 col-md-offset-4 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                               <a href="{{ route('benef.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                            
                        </div>
                    </div>
                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
