@extends('layouts.master')

@section('content')


         <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Search 1
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <form  method="POST" action="javascript:;" id="filter-search-comm-med" class="form-grid-v2">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <?php /*
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="control-label">District</label>
                                                    <div class="">
                                                         <select class="sumoSelect" name="district_id[]" multiple="" >
                                                    <option value="" disabled="">-- Select --</option>
                                                    @foreach ($districts as $d_key => $d_val)
                                                        <option value="{{$d_key}}"> {{ $d_val}} </option>
                                                    @endforeach
                                                               
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                          */ ?>


                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Project Code</label>
                                                    <div class="">
                                                        <select class="sumoSelect" name="project_code">
                                                    <option value="">-- Select --</option>
                                                    @foreach ($project_codes as $d_key => $d_val)
                                                        <option value="{{$d_key}}"> {{ $d_val}} </option>
                                                    @endforeach
                                                               
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Type of Case</label>
                                                    <div class="">
                                                             <select class="form-control sumoSelect" name="type_of_case">
                                                                <option value="">-- Select --</option>
                                                                <option value="gender">Gender Base</option>
                                                                <option value="land">Land Dispute</option>
                                                                <option value="dowry">Dowry</option>
                                                                <option value="verbal">Verbal Abuse</option>
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Resolve</label>
                                                    <div class="">
                                                             <select class="form-control sumoSelect" name="resolve">
                                                                <option value="">-- Select --</option>
                                                                <option value="yes">Yes</option>
                                                                <option value="no">No</option>
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                           

                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Quarter</label>
                                                    <div class="">
                                                        <select class="sumoSelect" name="quarter">
                                                        <option value="">-- Select --</option>
                                                  
                                                        <option value="1"> 1<sup>st</sup> </option>
                                                        <option value="2"> 2<sup>st</sup> </option>
                                                        <option value="3"> 3<sup>st</sup> </option>
                                                        <option value="4"> 4<sup>st</sup> </option>
                                                    
                                                               
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>



                                             <div class="col-md-4 col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Quarter Year</label>
                                                    <div class="">
                                                          
                                                        <select class="sumoSelect" name="quarter_year">
                                                            <option value="">-- Select --</option>
                                                            <option value="2000">2000</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2030">2030</option>
                                                                   
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-footer text-right">
                                            
                                             <button type="submit" class="btn btn-success btn-sm">Get</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                Search 2
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <form  method="POST" action="javascript:;" id="filter-search-comm-med2" class="form-grid-v2">
                                    {{ csrf_field() }}
                                    <div class="row">
                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Project <span class="required">*</span></label>
                                                    <div class="">
                                                        <select class="form-control sumoSelect" name="goal_id" id="goalreportid" data-format="searchFilter" required>
                                                            <option value="">-- Select --</option>
                                                            @foreach ($goals as  $key=>$goal)
                                                                <option value="{{$key}}"> {{ $goal}} </option>
                                                            @endforeach
                                                        </select>
                                                        {{-- {!! Form::select('goal_id', $goals  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','id'=>'goalreportid','data-format'=>'searchFilter','required']) !!} --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="" id="goal-report" style="display: none;">
                                  
                                                report will be shown
                                            </div>
                                        </div>


                                        <div class="form-footer text-right">
                                            
                                             <button type="submit" class="btn btn-success btn-sm">Get</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>


    <div class="x_panel">
        <div class="x_title">
            <h2> Community Mediator Centre</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                        <span>
                           <a href="{!! route('communitymed.create') !!}" class="btn btn-primary">
                                  Add New Community Mediator Centre
                              </a>
                       </span>

                </li>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
             <div class="table_in_div">
            <table id="comm-med-index" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                  <!--   <th>Districts</th> -->
                     <th>Person's </th>
                   <th>Project <br>Code</th>
                    <th>Case <br>Registered Date </th>
                     <th>Type of Case</th>
                    <th>Nature of Case</th>
                    <th>Resolve</th>
                     <th>Resolve Date</th>
                    <th>Status</th>
                 
                    <th>Quarter & Year</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($community_med as  $commed)

                    <?php 
                        
                         $person_name_exp = explode(',', $commed->person_name);
                         $person_name_array = array();
                       
                           foreach($person_name_exp as $person) {
                              array_push($person_name_array, $person);
                          }
                      
                          $persons = implode(', ', $person_name_array);


                        //Typ of Case 
                        if($commed->type_of_case == 'gender'){
                                $type_of_case ='Gender Base'; }
                        if($commed->type_of_case == 'land'){
                                $type_of_case ='Land Dispute'; }        
                        if($commed->type_of_case == 'dowry') {
                                $type_of_case ='Dowry'; }        
                        if($commed->type_of_case == 'verbal') {
                                $type_of_case ='Verbal Abuse'; } 

                    ?>

                <tr>
                    <td> {{ $i }}</td>
                   <td> {{ $persons }}  </td>
                  <td>  @foreach($project_codes as $id=>$project_code)
                       
                            @if($id == $commed->project_id)  
                                {{$project_code}}
                            @endif
                      
                       @endforeach </td>
                    <td>        
                         @php
                         $date =  $commed->case_registered_date;
                         $time = strtotime($date);
                                                
                        @endphp 
                        {{ date(' F jS, Y',$time) }}
                     </td>
                     <td>   {{ $type_of_case }}
                        </td>
                    <td> {{ $commed->nature_of_case }}</td>
                    <td> {{ $commed->resolve }}</td>
                    <td>   
                        @php
                         $date =  $commed->resolve_date;
                         $time = strtotime($date);
                                                
                        @endphp 

                        {{ date(' F jS, Y',$time) }}
                    </td>
                        <td> {{ $commed->status }} </td>
                                       <?php /* <td>@foreach($benef_id as $bid=>$bname) @if($commed->benef_id == $bid)  <a href="{{ url('benef/'. $commed->benef_id .'/edit/')}}"> {{  $bname }}@endif @endforeach</a></td> */ ?>
                   
                        
                     <?php  /*
                    <td>
                               $benef_exp = explode(',', $commed->benef_id);
                        $benef_array = array();
                        $benef_district_array = array();
                    
                       foreach($benef_exp as $new_benef_id) {
                           $benefname = DB::table('benef')->select('name','district_id')->where('id',$new_benef_id)->first();
                            $distrct_name = DB::table('districts')->select('district_name')->where('id',$benefname->district_id)->first();
                           //print_r($benefname->name);
                           ?>
                           <a class="link" href="<?php echo $baseurl.'/benef/'.$new_benef_id .'/edit'?>">{{ $benefname->name }}</a> ({{ $distrct_name->district_name }}), 
                           <?php 
                          // array_push($benef_array, $benefname->name);
                          // array_push($benef_district_array, $benefname->district_id); 
                        }
                     
                        // $benefs = implode(', ', $benef_array);
                        // $district_names = implode(', ', $benef_district_array);  
                  
                        
                    </td>  */ ?>
                   
                    <td>    @if($commed->quarter == 1)
                                1<sup>st</sup> Quarter, {{ $commed->quarter_year }}
                            @elseif($commed->quarter == 2)
                                2<sup>nd</sup>  Quarter,  {{ $commed->quarter_year }}
                            @elseif($commed->quarter == 3)
                                3<sup>rd</sup>  Quarter, {{ $commed->quarter_year }}
                            @elseif($commed->quarter == 4)
                                4<sup>th</sup>  Quarter, {{ $commed->quarter_year }}
                            @endif   
                        </td>

                    <td>
                        <a href="{{ route('communitymed.edit',$commed->id) }}" class="action-btns"> 
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                   
                    {{Form::open(['route'=>['communitymed.destroy', $commed->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                        <a href="javascript:void(0);" class="submit action-btns"><span class="glyphicon glyphicon-trash"></span></a>
                    {{Form::close()}}
                   
                    </td>
                </tr>
                <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>

        


    </div>
       

@endsection
