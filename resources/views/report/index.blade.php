@extends('layouts.master')

@section('content')
    
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12"> 

         <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <form method="POST" action="javascript:;" id="filter-search-report" class="form-grid-v2" >
                     {{ csrf_field() }}
                    <div class="row">

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Project Code</label>
                                <div class="">
                                    <select class="sumoSelect" name="project_id">
                                <option value="">-- Select --</option>
                                @foreach ($project_code as $d_key => $d_val)
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

                                     <select class="sumoSelect" name="type">
                                        <option value="">-- Select --</option>
                                
                                        <option value="QPR"> QPR </option>
                                        <option value="APR"> APR </option>
                                        <option value="Project Completion Report"> Project Completion Report </option>
                                        <option value="Bi Annually"> Bi Annually </option>
                                        <option value="Base Line"> Base Line </option>
                                

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
            <h2>Reports</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                 
                     <span>
                           <a href="{!! route('report.create') !!}" class="btn btn-primary">
                                  Add New  Report
                              </a>
                       </span>

                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
             <div class="table_in_div">
            <table id="datatable-table-index" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Draft By</th>
                    <th>Draft Date</th>
                    <th>Final Date</th>
                    <th>Project Code</th>
                    <th>Approve By</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($reports as $key=>$qt)

                <tr>
                    <td> {{ $i }}</td>
                    <td> {{ $qt->title }}</td>
                    <td> {{ $qt->type }}</td>
                    <td> {{ $qt->draft_by }}</td>
                    <td> 
                         @php
                         $date = $qt->draft_date;
                         $draft_date = strtotime($date);
                        
                        @endphp 
                            {{ date(' F jS, Y',$draft_date) }}

                       
                    </td>
                    <td> 
                          @php
                         $date = $qt->final_date;
                         $final_date = strtotime($date);
                        
                        @endphp 
                            {{ date(' F jS, Y',$final_date) }}

                     
                    </td>
                    <td> <a class="link-anchor" href="{{ url('project/'.(isset($qt->project)? $qt->project->id : '').'/edit/')}}">{{ isset($qt->project)? $qt->project->project_code : ''}} </a></td>
                    <td> {{ $qt->approve_by }}</td>
                   
                    <td>
                        <a href="{{ route('report.edit',$qt->id) }}" class="action-btns"> 
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                   
                    {{Form::open(['route'=>['report.destroy', $qt->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                        <a href="javascript:void(0);" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span></a>
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
       



</div>
</div>


@endsection
