@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Community Mediator Centre</h2>

                 <div class="pull-right">
                                        <table id="edit_detail_datatable" class="table table-striped table-bordered display table_edit_data" style="display: none;">
                                         <thead >
                                            <tr>
                                                        <th>  </th>
                                                        <th>  </th>
                                                    </tr>
                                                  
                                            </thead>

                                            <?php 
                                            //Benef name
                                           //    $benef_exp = explode(',', $comm_med->benef_id);
                                           //  $benef_array = array();

                                           // foreach($benef_exp as $dist) {
                                           //     $benefname = DB::table('benef')->select('name')->where('id',$dist)->first();

                                           //    array_push($benef_array, $benefname->name); 
                                           //  }
                                         
                                           //  $benef_name = implode(', ', $benef_array);  
                                            //print_r($benefs); die();

                                            //Person's Name

                                             $person_name_exp = explode(',', $comm_med->person_name);
                                             $person_name_array = array();
                                           
                                               foreach($person_name_exp as $person) {
                                                  array_push($person_name_array, $person);
                                              }
                                          
                                              $persons_name = implode(', ', $person_name_array);


                                              //Indicator name
                                              $ind_exp = explode(',', $comm_med->indicator_id);
                                            $ind_array = array();

                                           foreach($ind_exp as $dist) {
                                               $indicator_name = DB::table('logical')->select('ind')->where('id',$dist)->first();

                                              array_push($ind_array, $indicator_name->ind); 
                                            }
                                         
                                            $indicator_name = implode(', ', $ind_array);  
                                              // print_r($indicator_name); die();

                                            //Output Names
                                              $op_exp = explode(',', $comm_med->output_id);
                                            $output_array = array();

                                           foreach($op_exp as $dist) {
                                               $ouput_name = DB::table('output')->select('content')->where('id',$dist)->first();

                                              array_push($output_array, $ouput_name->content); 
                                            }
                                         
                                            $ouput_name_list = implode(', ', $output_array);  
                                              // print_r($output_array); 
                                            //   print_r($ouput_name); 
                                            // die();


                                            //Activity Names
                                              $act_exp = explode(',', $comm_med->activity_id);
                                              $act_array = array();

                                           foreach($act_exp as $dist) {
                                               $activity_name = DB::table('activity')->select('name')->where('id',$dist)->first();
                                              // print_r($activity_name); 

                                              array_push($act_array, $activity_name->name); 

                                            }
                                         
                                            $activity_name_list = implode(', ', $act_array);  
                                              // print_r($activity_name_list);
                                               // die();




                                            // if($comm_med->district_id != ''){

                                            //           $dist_exp = explode(',', $comm_med->district_id); 
                                            //         $dis_array = array();

                                            //         foreach($dist_exp as $dist)
                                            //         {
                                            //            $distname = DB::table('districts')->select('district_name')->where('id',$dist)->first();
                                            //            array_push($dis_array, $distname->district_name); 
                                            //         }

                                            //         $district_list = implode(',<br>', $dis_array);
                                            //     }


                                            
                                            //case registered date
                                            $crdate         =   $comm_med->case_registered_date;
                                            $case_reg_date  =   strtotime($crdate);
                                            $case_reg       =   date(' F jS, Y',$case_reg_date);

                                              //resolve date
                                            $res_date         =   $comm_med->resolve_date;
                                            $resol_date  =   strtotime($res_date);
                                            $resolve_date       =   date(' F jS, Y',$resol_date);

                                                // print_r($resolve_date); die();

                                                //Type of Case

                                                if($comm_med->type_of_case == 'gender'){
                                                    $type_of_case ='Gender Base'; }
                                                if($comm_med->type_of_case == 'land'){
                                                    $type_of_case ='Land Dispute'; }        
                                                if($comm_med->type_of_case == 'dowry') {
                                                    $type_of_case ='Dowry'; }  
                                                if($comm_med->type_of_case == 'verbal') {
                                                    $type_of_case ='Verbal Abuse'; }  
                                        
                                            ?>
                                            <tbody>
                                                   <tr>
                                                        <td> Project Code  </td>
                                                        <td>  @foreach($projects as $id=>$project_code)
                       
                                                                @if($id == $comm_med->project_id)  
                                                                    {{$project_code}}
                                                                @endif
                                                          
                                                           @endforeach
                                                       </td>
                                                    </tr>

                                                      <tr>
                                                        <td> Person's Name  </td>
                                                        <td>   @if($persons_name != '') {{ $persons_name }}  @endif </td>
                                                    </tr>
<?php /*
                                                    <tr>
                                                        <td> Beneficiaries Names  </td>
                                                        <td>   @if($benef_name != '') {{ $benef_name }}  @endif </td>
                                                    </tr>
*/ ?>

                                                    <tr>
                                                        <td> Case  Registered Date  </td>
                                                        <td>   @if($case_reg != '') {{ $case_reg }}  @endif </td>
                                                    </tr>

                                                     <tr>
                                                        <td> Nature of Case  </td>
                                                        <td> {{ $comm_med->nature_of_case }}  </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Type of Case  </td>
                                                        <td>   @if($type_of_case != '') {{ $type_of_case }}  @endif  </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Resolve  </td>
                                                        <td>  {{ $comm_med->resolve }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Resolve Date  </td>
                                                        <td>  @if($resolve_date != '') {{ $resolve_date }}  @endif </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Future Action  </td>
                                                        <td>  {{ $comm_med->future_action }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Status  </td>
                                                        <td>  {{ $comm_med->status }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Goal  </td>
                                                        <td> 
                                                                 @foreach($goals as $id=>$goal_name)
                       
                                                                    @if($id == $comm_med->goal_id)  
                                                                        {{$goal_name}}
                                                                    @endif
                                                              
                                                               @endforeach

                                                              </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Inidicator  </td>
                                                        <td>  @if($indicator_name != '') {{ $indicator_name }}  @endif </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Output  </td>
                                                        <td> @if($ouput_name_list != '') {{ $ouput_name_list }}  @endif </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Activity  </td>
                                                        <td>  @if($activity_name_list != '') {{ $activity_name_list }}  @endif   </td>
                                                    </tr>

                                               
                                                 <tr>
                                                        <td> Quarter & Year </td>
                                                               <td>    @if($comm_med->quarter == 1)
                                                                    1st Quarter, {{ $comm_med->quarter_year }}
                                                                @elseif($comm_med->quarter == 2)
                                                                    2nd  Quarter,  {{ $comm_med->quarter_year }}
                                                                @elseif($comm_med->quarter == 3)
                                                                    3rd  Quarter, {{ $comm_med->quarter_year }}
                                                                @elseif($comm_med->quarter == 4)
                                                                    4th  Quarter, {{ $comm_med->quarter_year }}
                                                                @endif   
                                                            </td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                <div class="clearfix"></div>
            </div>
            <div class="x_content">



                      <div class="hide add_people">
                    <div class="new-field">
                    {!! Form::text('person_name[]', null ,['class' => 'form-control'] ) !!}

                    <div id="del_input">
                            <span class="glyphicon glyphicon-trash"></span>
                        </div>
                    </div>
                </div>


                {{Form::model($comm_med, ['route'=>['communitymed.update', $comm_med->id], 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate', 'method'=>'patch', 'files'=> 'true'])}}
            
                           
 <?php /*
                 {{ Form::hidden('comm_med_id', $comm_med->id) }}
                             <div class="beneficiary-wrap clearfix" >
                            <h4 class="inner-title">Beneficiary Detail</h4>
                                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Name
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('name',  isset($beneficiar) ? $beneficiar->name : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div> 



                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Age<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                            <select class=" sumoSelect form-control " id="sel1" name="age">
                            <option value="">--Select--</option>
                            @if ($beneficiar->age== "Below 15" )
                            <option value="Below 15" selected>Below 15</option>
                            @else
                            <option value="Below 15">Below 15</option>
                            @endif
                            @if ($beneficiar->age== "15-29" )
                            <option value="15-29" selected>15-29</option>
                            @else
                            <option value="15-29">15-29</option>
                            @endif
                            @if ($beneficiar->age== "30-45" )
                            <option value="30-45" selected>30-45</option>
                            @else
                            <option value="30-45">30-45</option>
                            @endif
                            @if ($beneficiar->age== "45-Above" )
                            <option value="45-Above" selected>45-Above</option>
                            @else
                            <option value="45-Above">45-Above</option>
                            @endif
                            
                             </select>                          
                            </div>
                    </div>

                    <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Gender
                                <span class="required">*</span></label>
                                
                                <div class="col-md-8 col-sm-7 col-xs-12">

                                <select class=" sumoSelect form-control select-act-type" id="sel1" name="gender">
                                <option value="">--Select--</option>
                                
                                @if ($beneficiar->gender== "Male" )
                                <option value="Male" selected>Male</option>
                                @else
                                <option value="Male">Male</option>
                                @endif
                                @if ($beneficiar->gender== "Female" )
                                <option value="Female" selected>Female</option>
                                @else
                                <option value="Female">Female</option>
                                @endif
                                 @if ($beneficiar->gender== "Others" )
                                <option value="Others" selected>Others</option>
                                @else
                                <option value="Others">Others</option>
                                @endif               
                                </select>
                                   
                               </div>
                            </div>  
                    <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Identity
                                <span class="required">*</span></label>
                                
                                <div class="col-md-8 col-sm-7 col-xs-12">

                                <select class=" sumoSelect form-control select-act-type" id="sel1" name="identity">
                                <option value="">--Select--</option>
                                @foreach ($identity as $i)
                                @if($beneficiar->identity== $i->id )
                                    <option value="{{$i->id}}" selected>{{$i->name}}</option>
                                @else
                                    <option value="{{$i->id}}" >{{$i->name}}</option>
                                @endif
                                @endforeach
                                           
                                </select>
                                   
                               </div>
                    </div> 
                   <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Caste/Ethnicity
                                <span class="required">*</span></label>
                                
                                <div class="col-md-8 col-sm-7 col-xs-12">

                                 <select class=" sumoSelect form-control " name="caste" required>
                                            <option value="">-- Select --</option>
                                            @foreach($caste as $ckey =>$cval)
                                            @if($beneficiar->caste== $ckey)
                                            <option   value="{{$ckey }}" selected>{{$cval}}</option>
                                            @else
                                            <option   value="{{$ckey }}" >{{$cval}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                   
                               </div>
                    </div>    
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Organization
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('organization', isset($beneficiar) ? $beneficiar->organization : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div> 
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Designation
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('designation', isset($beneficiar) ? $beneficiar->designation : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>  

                           <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Beneficiary Type
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    
                                      <select class="form-control sumoSelect select-act-type" id="sel1" name="benef_type">
                                <option value="">--Select--</option>
                                
                                @if ($beneficiar->benef_type== "Group" )
                                <option value="Group" selected>Group</option>
                                @else
                                <option value="Group">Group</option>
                                @endif

                                @if ($beneficiar->benef_type== "Individual" )
                                <option value="Individual" selected>Individual</option>
                                @else
                                <option value="Individual">Individual</option>
                                @endif

                                            
                                </select>

                                </div>
                        </div> 


                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Contact Number
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('c_number',  isset($beneficiar) ? $beneficiar->c_number : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div> 
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Email address
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('email',  isset($beneficiar) ? $beneficiar->email : '' ,['class' => 'form-control'] ) !!}
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
                                            @if($district->district_id== $beneficiar->district_id)
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
                                {!! Form::text('vdc',  isset($beneficiar) ? $beneficiar->vdc : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>

                          <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Ward No.
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('ward_no',  isset($beneficiar) ? $beneficiar->ward_no : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Venue 
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('venue', isset($beneficiar) ? $beneficiar->venue : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                      
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Implementing Organization
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('imp_org',  isset($beneficiar) ? $beneficiar->imp_org : '' ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Donors Code
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                          <select class=" sumoSelect form-control " name="donor_code" required>
                                            <option value="">-- Select --</option>
                                            @foreach($donor_codes as $ckey =>$cval)
                                            @if($beneficiar->donor_code== $ckey)
                                            <option   value="{{$ckey }}" selected>{{$cval}}</option>
                                            @else
                                            <option   value="{{$ckey }}" >{{$cval}}</option>
                                            @endif
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
                                                   
                                                <input type="text" name="date_from" class="form-control has-feedback-left" id="single_cal4" aria-describedby="inputSuccess2Status4" value="{{isset($beneficiar) ? $beneficiar->date_from : ''}}">
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
                                        {{--<input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">--}}
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                    {{--<div class="col-md-11 xdisplay_inputx form-group has-feedback">--}}
                                                <input type="text" name="date_to" class="form-control has-feedback-left" id="single_cal3" aria-describedby="inputSuccess2Status4" value="{{isset($beneficiar) ? $beneficiar->date_to : ''}}">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    {{--</div>--}}
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
                               @foreach($activity as $a)
                                    @if($beneficiar->act_type== $a->id)
                                    <option value="{{$a->id}}" selected="">{{$a->name}}</option>
                                    @else
                                    <option value="{{$a->id}}">{{$a->name}}</option>
                                    @endif
                               @endforeach
                                                                                          
                                </select>
                                   
                               </div>
                    </div>  


                          </div>


*/ ?>
                              <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Name of Person
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            
                                <div  id="i_partners">    
                              
                                <div class="input-field-group peopleaddingclass">
                                    
                                      <?php $count= 1; ?> 
                                         @foreach ($persons as $i)
                                        
                                         @if ($count==1)

                                        {!! Form::text('person_name[]', $i ,['class' => 'form-control'] ) !!}
                                        
                                         @else

                                            <div class="new-field">
                                                <input class="form-control" name="person_name[]" type="text" value="{{ $i }}">
                                                 <span class="glyphicon glyphicon-trash " id="del_input"></span>
                                            </div>

                                        @endif
                                        <?php $count +=1; ?>   
                                        @endforeach


                                </div>

                                <div class="addmore">
                                    <a href="javascript:;" class="addmorebtn_addingpeople btn btn-default btn-sm" >
                                        <i class="fa fa-plus"></i> Add New 
                                    </a>
                                </div>
                            </div>


                           <?php  /* <select class="form-control   district sumoSelect" name="benef_id[]" placeholder="-- Select Here --" multiple required>
                                 @foreach($beneficiars as $key=>$value)
                               <option value="{{$key}}"  @foreach($benef_id_exp as $val) @if($key == $val) selected @endif    @endforeach > {{$value}}</option>
                               @endforeach
                            </select> */ ?>


                        </div>
                    </div>


                                <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Case Registered Date <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">            
                                               
                                                 {{ Form::text('case_registered_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span> 
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type"> Nature of Case
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{Form::text('nature_of_case', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Type of Case <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                       
                          
                          {{ Form::select('type_of_case', [
                                    'gender' => 'Gender Base',
                                    'land' => 'Land Dispute',
                                    'dowry' => 'Dowry',
                                    'verbal' => 'Verbal Abuse'] ,null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) }}


                        </div>
                      </div>

                   

                   

                   
                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Resolve <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{ Form::select('resolve', [
                                    ''  => '--Select--',
                                   'yes' => 'yes',
                                   'no' => 'No'] ,null, ['class' => 'form-control sumoSelect','required']) }}
                          
                        </div>
                      </div>

                        
                      <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Resolve Date <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                    
                                                 {{ Form::text('resolve_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Future Action <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                           

                                 {{Form::text('future_action', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                             
                            </div>
                           
                            
                    </div>

                  
                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                           

                                 {{Form::text('status', null, ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'solved, unsolved, etc','required'])}}
                             
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

                        <div class="x_panel x_panel-box">


                          <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Project Code
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            
                             {{ Form::select('project_id', $projects ,null, ['class' => 'form-control sumoSelect','placeholder'=>'-- Select Here --','required']) }}

                        </div>
                    </div> 

                    
              <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12"> Project <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">

                             {!! Form::select('goal_id', $goals  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','id'=>'goalreportedit','data-format'=>'vertical','required']) !!}

                        </div>
                    </div>
        

                     <div class="form-group indicatoredit">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12"> Inidicator <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">

                            <select class="form-control sumoSelect" id="indicatoredit" name="indicator_id[]" multiple required>
                               <option disabled="disabled"> -- Select --</option>
                                @foreach($allgoalreports['indicator'] as $key => $value )
                                
                                    <option value="{{$key }}"  @foreach($indicator_exp as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>
    

                     <div class="form-group outputedit">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12"> Output <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">


                               <select class="form-control sumoSelect" id="outputedit" name="output_id[]" multiple required>
                               <option disabled="disabled"> -- Select --</option>
                                @foreach($allgoalreports['output'] as $key => $value )
                                
                                    <option value="{{$key }}"  @foreach($output_exp as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>

                      <div class="form-group activityedit">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12"> Activity <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">

        
                               <select class="form-control sumoSelect" id="activityedit" name="activity_id[]" multiple required>
                               <option disabled="disabled"> -- Select --</option>
                                @foreach($allgoalreports['activity'] as $key => $value )
                                
                                    <option value="{{$key }}"  @foreach($activity_exp as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="x_content" id="goal-report" style="display: none;">
                  
                    
                    </div>

          
            </div>
                    
                    
                    <div class="form-footer" >
                        <div class="col-md-8 col-sm-7 col-xs-12 col-md-offset-2 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('communitymed.index') }}" class="btn btn-danger">Cancel</a>
                            {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                        </div>
                    </div>

                {{Form::close()}}
            </div>
        </div>

    @endsection
