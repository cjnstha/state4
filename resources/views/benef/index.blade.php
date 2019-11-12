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
                                <form  method="POST" action="javascript:;" class="form-grid-v2 FilterForm" data-base="benef" data-filter="filter">
                                    {{ csrf_field() }}
                                    <div class="row">

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
                                <form  method="POST" action="javascript:;" class="form-grid-v2 FilterForm" data-base="benef" data-filter="filter2">
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
            <h2>Beneficiaries</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                    <span>
                       <a href="{!! route('benef.create') !!}" class="btn btn-primary">
                              Add New Beneficiaries
                          </a>
                   </span>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <div class="table_in_div">
                <table id="benef-group-ind-index" class="table table-striped table-bordered display">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Group/Individual</th>
                        <th>Age</th>
                        <th>Age Group</th>                   
                        <th>Gender</th>
                        <th>Group - Gender</th> 
                        <th>Caste</th>
                        <th>Group - Caste</th>
                         <th>Identity</th>
                         <th>Group - Identity</th>
                         <th>Activity</th> 
                        <th>Action</th>
                       
                    </tr>
                    </thead>

                    <tbody>
                        <?php  $i=1; ?>
                    @foreach($posts as $p)

                    <tr>
                        <td> {{ $i }}</td>
                        <td> {{ $p->name}}</td>
                        <td> {{ $p->benef_type}}</td>
                        <td> {{ $p->age}}</td>
                          <td> 
                        @if ($p->age_below_15 != '' || $p->age_below_15 != 0)   Below 15 : {!! $p->age_below_15 !!} <br>@endif 
                        @if ($p->age_15_29 != '' || $p->age_15_29 != 0) 15-29 : {!! $p->age_15_29 !!} <br> @endif
                        @if ($p->age_30_45 != '' || $p->age_30_45 != 0)  30-45 :  {{ $p->age_30_45 }}  <br>@endif
                        @if ($p->age_45_above != '' || $p->age_45_above != 0)  45-Above : {{ $p->age_45_above }} <br> @endif

                        </td>
                        <td> {{ $p->gender}}</td>
                          <td> 
                          @if ($p->gender_male != '' || $p->gender_male != 0) Male: {{ $p->gender_male }} <br> @endif
                          @if ($p->gender_female != '' || $p->gender_female != 0) Female {{ $p->gender_female }} <br> @endif
                          @if ($p->gender_others != '' || $p->gender_others != 0) Others: {{ $p->gender_others }} <br> @endif
                        </td>
                        <td> {{ isset($p->castes)? $p->castes->name : ''}}</td>
                         <td> 
                            @foreach ($caste as $id => $name)
                              
                                <?php 
                                   $value = \DB::table('benef_caste_eth_if_group')
                                                            ->select('cast_eth_value')
                                                            ->where('benef_id',$p->id)
                                                            ->where('caste_eth_id',$id)
                                                            ->first();
                                                            // echo $value->cast_eth_value;
                                    // echo isset($value->cast_eth_value)? $value->cast_eth_value: ''; 
                                if(isset($value->cast_eth_value))
                                  {

                                    echo $name .':'.$value->cast_eth_value.', ';
                                  }

                                    ?>  
                                        
                            @endforeach 
                           

                        </td>
                         <td> {{ isset($p->identities)? $p->identities->name : ''}}</td>
                         <td>  @foreach($identity as $id => $name)
                                 <?php 
                                    $value = \DB::table('benef_identity_if_group')
                                                                    ->select('identity_value')
                                                                    ->where('benef_id',$p->id)
                                                                    ->where('identity_id',$id)
                                                                    ->first();

                                  // echo isset($value->identity_value)? $value->identity_value: ''; 
                                  if(isset($value->identity_value))
                                  {
                                    echo $name .':'.$value->identity_value.', ';
                                  }
                                  ?>         
                            @endforeach 
                        </td>
                          <td> {{ isset($p->activity)? $p->activity->name : ''}}</td>
                        <td>
                      
                        <a href=" {{ route('benef.edit',$p->id) }}" class="action-btns">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        {{Form::open(['route'=>['benef.destroy', $p->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
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



        <div class="row">
            <div class="col-sm-3">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Age Group</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Age-Group</th>
                             
                               
                              
                                <th>Total</th>
                            </tr>
                            <tr>
                                <th>Below 15</th>
                               
                                <td>{{$age_below_15 }} </td>
                            </tr>
                            <tr>
                                <th>15-29</th>
                             
                                <td>{{$age_15_29 }}</td>
                            </tr>
                            <tr>
                                <th>30-45</th>
                              
                                <td>{{$age_30_45}}</td>
                            </tr>
                            <tr>
                                <th>45-Above</th>
                              
                                <td>{{$age_45_above}}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                               
                                <td>{{ $age_below_15 + $age_15_29 + $age_30_45 + $age_45_above }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

                        <div class="col-sm-3">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Gender Group</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Gender</th>
                             
                               
                              
                                <th>Total</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                               
                                <td>{{$gender_male }} </td>
                            </tr>
                            <tr>
                                <th>Female</th>
                             
                                <td>{{$gender_female }}</td>
                            </tr>
                            <tr>
                                <th>Othes</th>
                              
                                <td>{{$gender_others}}</td>
                            </tr>
                         
                            <tr>
                                <th>Total</th>
                               
                                <td>{{ $gender_male + $gender_female + $gender_others }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


                        <div class="col-sm-3">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Identity Group</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Identity</th>
                                <th>Total</th>
                            </tr>
                        @foreach($identity_count as $name=>$value ) 
                            <tr>
                                <th>  {{ $name }} </th>
                               
                                <td>{{$value  }} </td>
                            </tr>
                        @endforeach
                 
                            <tr>
                                <th>Total</th>
                               
                                <td>{{ $identity_total }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>



                        <div class="col-sm-3">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Caste Group</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Caste</th>
                                <th>Total</th>
                            </tr>
                        @foreach($caste_count as $name=>$value ) 
                            <tr>
                                <th>  {{ $name }} </th>
                               
                                <td>{{$value  }} </td>
                            </tr>
                        @endforeach
                 
                            <tr>
                                <th>Total</th>
                               
                                <td>{{ $caste_total }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
     
        </div>
       

       

@endsection
