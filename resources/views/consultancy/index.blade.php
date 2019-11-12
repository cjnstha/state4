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
                                <form  method="POST" action="javascript:;" id="filter-search-consultancy-service" class="form-grid-v2 FilterForm" data-base="consultancy" data-filter="filter">
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
                                                    <label for="" class="control-label">Type </label>
                                                    <div class="">
                                                        {{Form::text('type', null, ['class'=>'form-control', 'placeholder'=>'Enter Type'])}}
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
                                <form  method="POST" action="javascript:;" id="filter-search-consultancy-service2" class="form-grid-v2 FilterForm" data-base="consultancy" data-filter="filter2">
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
            <h2>Consultancy Service</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                  
                    <span>
                        <a href="{!! route('consultancy.create') !!}" class="btn btn-primary">
                            Add New Consultancy Service
                        </a>
                     </span>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table_in_div">
                <table id="consultancy-service-index" class="dataTableClass table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                         <th>Name</th>
                        <th>Type</th>
                        <th>Hired Date</th>
                        <th>Duration</th>
                        <th>Total fee</th>
                        <th>Contract Sign Date</th>
                        <th>Delivery Date</th>
                        <th>TOR</th>
                         <th>Quarter & Year</th>
                       
            
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        <?php  $i=1; ?>
                    @foreach($services as $key=>$service)

                    <tr>
                       <td> {{ $i }}</td>
                       <td>  
                            @foreach($consultant_name as $id=>$name)
                                @if($id == $service->consultant_id)
                           
                                        {{ $name }}
                                @endif
                            @endforeach
                       </td>
                        <td> {{ $service->type }}</td>
                        <td> 
                              @php
                             $date = $service->hired_date;
                             $hired_date = strtotime($date);
                            
                             @endphp 
                        {{ date(' F jS, Y',$hired_date) }}

                        </td>
                        <td> {{ $service->duration }}</td>
                        <td> {{ $service->total_fee }}</td>
                        <td>     @php
                             $date = $service->contract_signed_date;
                             $contract_signed_date = strtotime($date);
                            
                             @endphp 
                        {{ date(' F jS, Y',$contract_signed_date) }}
                        </td>
                        
                        <td>     @php
                             $date = $service->delivery_date;
                             $delivery_date = strtotime($date);
                            
                             @endphp 
                        {{ date(' F jS, Y',$delivery_date) }}
                         </td>
                        
                        <td> {{ $service->tor_text }}</td>

                         <td>    @if($service->quarter == 1)
                                    1<sup>st</sup> Quarter, {{ $service->quarter_year }}
                                @elseif($service->quarter == 2)
                                    2<sup>nd</sup>  Quarter,  {{ $service->quarter_year }}
                                @elseif($service->quarter == 3)
                                    3<sup>rd</sup>  Quarter, {{ $service->quarter_year }}
                                @elseif($service->quarter == 4)
                                    4<sup>th</sup>  Quarter, {{ $service->quarter_year }}
                                @endif   
                            </td>

                        <td>
                        <a href="{{ route('consultancy.edit',$service->id) }}" class="action-btns"> 
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            
                        {{Form::open(['route'=>['consultancy.destroy', $service->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                            <a href="javascript:void(0);" class=" action-btns submit"><span class="glyphicon glyphicon-trash"></span></a>
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
