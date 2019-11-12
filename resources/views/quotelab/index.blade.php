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

                <form method="POST" action="javascript:;" id="filter-search-quotelab" class="form-grid-v2" >
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
                                <label for="" class="control-label">Activity Code</label>
                                <div class="">
                                    <select class="sumoSelect" name="activity_id">
                                        <option value="">-- Select --</option>
                                        @foreach ($activities as $d_key => $d_val)
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
                            
                                    <option value="Case Studies"> Case Studies </option>
                                    <option value="Quotes"> Quotes </option>
                                       
                            </select>
                            </div>
                        </div>
                    </div>

                      <div class="col-md-4 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label for="" class="control-label">Theme </label>
                            <div class="">

                                 <select class="sumoSelect" name="theme">
                                    <option value="">-- Select --</option>
                                    <option value="Education"> Education </option>
                                    <option value="Gender Base"> Gender Base </option>
                                    <option value="Violence"> Violence </option>
                                       
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
            <h2>Quote Lab</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                
                      <span>
                       <a href="{!! route('quotelab.create') !!}" class="btn btn-primary">
                             Add New Quote Lab
                          </a>
                   </span>

                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table_in_div">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Code</th>
                    <th>Type</th>
                    <th>Theme</th>
                     <th>Activity</th>
                    <th>Beneficar</th>
                    <th>Occupation</th>
                    <th>Education</th>
                    <th>Quarter & Year</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($quotelabs as $key=>$qt)
 
                <tr>
                    <td> {{ $i }}</td>
                    <td> <a class="link-anchor" href="{{ url('project/'.(isset($qt->project)? $qt->project->id : '').'/edit/')}}">{{ isset($qt->project)? $qt->project->project_code : ''}} </a></td> 
                    <td> {{ $qt->type }}</td>
                    <td> {{ $qt->theme }}</td>
                    <td> {{ $qt->activityname->name }}</td>

                     
                    <td> <a class="link-anchor" href="{{ url('benef/'.(isset($qt->benef)? $qt->benef->id : '').'/edit/')}}">{{ isset($qt->benef)? $qt->benef->name : ''}} </a></td> 
                    <td> {{ $qt->occupation }}</td>
                    <td> {{ $qt->education }}</td>
                    <td>    @if($qt->quarter == 1)
                                1<sup>st</sup> Quarter, {{ $qt->quarter_year }}
                            @elseif($qt->quarter == 2)
                                2<sup>nd</sup>  Quarter,  {{ $qt->quarter_year }}
                            @elseif($qt->quarter == 3)
                                3<sup>rd</sup>  Quarter, {{ $qt->quarter_year }}
                            @elseif($qt->quarter == 4)
                                4<sup>th</sup>  Quarter, {{ $qt->quarter_year }}
                            @endif   
                    </td>
                   

                    <td>
                        <a href="{{ route('quotelab.edit',$qt->id) }}" class="action-btns"> 
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                       
                   
                    {{Form::open(['route'=>['quotelab.destroy', $qt->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
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

</div>
</div>
       

@endsection
