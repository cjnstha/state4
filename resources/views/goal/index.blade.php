@extends('layouts.master')

@section('content')
    
    <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form  method="POST" action="javascript:;" class="form-grid-v2 FilterForm" data-base="goal" data-filter="filter">
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
                        </div>
                        
                        <div class="form-footer text-right">
                            
                             <button type="submit" class="btn btn-success btn-sm">Get</button>
                        </div>
                </form>
                            
            </div>

        </div>

    <div class="x_panel">
        <div class="x_title">
            <h2>Goal / Impact</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                    <span>
                       <a href="{!! route('goal.create') !!}" class="btn btn-primary">
                              Add New  Goal / Impact 
                          </a>
                   </span>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table_in_div">
                <table id="tesgin" class="dataTableClass table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Project Code</th>                     
                         <th>Project Name</th>
                        <th>Goal</th>
                        <th>Action</th>
                       
                    </tr>
                    </thead>

                    <tbody>
                          <?php  $i=1; ?>
                    @foreach($posts as $p)

                    <tr>
                        <td> {{ $i }}</td>
                          
                        
                        <td> <a class="link-anchor" href="{{ url('project/'.(isset($p->project)? $p->project->id : '').'/edit/')}}">{{ isset($p->project)? $p->project->project_code : ''}} </a></td>

                        <td>  {{ isset($p->project)? $p->projectname->project_name : ''}} </td>
                        <td> {{ $p->goal}}</td>
                          
                        <td>


                         
                         <a href=" {{ route('goal.edit', $p->id) }}" class="action-btns"> 
                            <span class="glyphicon glyphicon-pencil"></span> 
                         </a>
                      
                        
                        {!!Form::open(['route'=>['goal.destroy', $p->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])!!}
                            <a href="javascript:void(0);" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span></a>
                        {!!Form::close()!!}
                        
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
