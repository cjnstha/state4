@extends('layouts.master')

@section('content')

    <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form  method="POST" action="javascript:;" class="form-grid-v2 FilterForm" data-base="staffs" data-filter="filter">
                    {{ csrf_field() }}
                    <div class="row">

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Gender</label>
                                <div class="">
                                {{Form::select('gender',  [''=>'-- Select Gender --','Male' => 'Male','Female' => 'Female','Others' => 'Others'], null, ['class'=>'form-control sumoSelect'])}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Designation</label>
                                <div class="">
                                {{Form::text('designation', null, ['class'=>'form-control', 'placeholder'=>'Enter Designation'])}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Base</label>
                                <div class="">
                                {{Form::select('base',  [''=>'-- Select Base --','Kathmandu' => 'Kathmandu','Regional Office' => 'Regional Office'], null, ['class'=>'form-control sumoSelect'])}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Caste / Ethnicity</label>
                                <div class="">
                                    <select class="sumoSelect form-control" name="caste_id">
                                        <option value="">-- Select Caste --</option>
                                        @foreach ($caste as $d_key => $d_val)
                                            <option value="{{$d_key}}"> {{ $d_val}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Assigned Project</label>
                                <div class="">
                                    <select class="sumoSelect form-control" name="project_id">
                                        <option value="">-- Select Project --</option>
                                        @foreach ($projects as $d_key => $d_val)
                                            <option value="{{$d_key}}"> {{ $d_val}} </option>
                                        @endforeach
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

    <div class="x_panel">
        <div class="x_title">
            <h2>Staff Management</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                  
                     <span>
                           <a href="{!! route('staffs.create') !!}" class="btn btn-primary">
                                  Add New  Staff
                              </a>
                       </span>

                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table_in_div">
                <table class="dataTableClass table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact No</th>
                        <th>Email</th>
                        <th>Joined Date</th>
                        <th>Designation</th>
                      
                        <th>Assigned Project</th>
                       
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        <?php  $i=1; ?>
                    @foreach($staffs as $staff)

                    <tr>
                        <td> {{ $i }}</td>
                        <td> {{ $staff->name }}</td>
                        <td> {{ $staff->address }}</td>
                        <td> {{ $staff->contact_no }}</td>
                        <td> {{ $staff->email }}</td>
                        <td> 
                        @php
                             $date = $staff->joined_date;
                             $time = strtotime($date);
                            
                        @endphp 
                            {{ date(' F jS, Y',$time) }}

                          

                        </td>
                        <td> {{ $staff->designation }}</td>
                    
                        <td> {{ isset($staff->project) ? $staff->project->project_name : '' }}</td>
                       
                        <td>
                           
                            <a href="{{ route('staffs.edit',$staff->id) }}" class="action-btns"> 
                                <span class="glyphicon glyphicon-pencil"></span>
                           </a>
                        {{Form::open(['route'=>['staffs.destroy', $staff->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
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
