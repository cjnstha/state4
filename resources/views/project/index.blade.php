@extends('layouts.master')
    @section('content')
     
   
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12"> 

         <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content bg-gray no-search">

                <form method="POST" action="javascript:;" id="filter-search-project" class="form-grid-v2" >
                     {{ csrf_field() }}
                    <div class="row">
                        
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Project Code</label>
                                <div class="">
                                    <select class="sumoSelect" name="project_code">
                                <option value="">-- Select --</option>
                                @foreach ($project_codes as $project_code)
                                    <option value="{{$project_code->project_code}}">{{ $project_code->project_code}}</option>
                                @endforeach
                                           
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">General Agreement Code</label>
                                <div class="">
                                    <select class="sumoSelect" name="ga_code">
                                <option value="">-- Select --</option>
                                @foreach ($generalAgreements as $ga)
                                    <option value="{{$ga->ga_code}}"> {{ $ga->ga_code}} </option>
                                @endforeach
                                           
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Project Status</label>
                                <div class="">
                                    <select class="sumoSelect" name="project_status">
                                <option value="">-- Select --</option>
                                @foreach ($project_status as $prostat)
                                    <option value="{{$prostat}}">{{$prostat}}</option>
                                @endforeach
                                           
                                </select>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Provinces</label>
                                <div class="">
                                    <select class="sumoSelect" name="province">
                                <option value="">-- Select --</option>
                                @foreach ($provinces as $province)
                                    <option value="{{$province->id}}"> {{ $province->name}} </option>
                                @endforeach
                                           
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Districts</label>
                                <div class="">
                                    <select class="sumoSelect" name="districts">
                                <option value="">-- Select --</option>
                                @foreach ($districts as $district)
                                    <option value="{{$district->id}}">{{ $district->name}}</option>
                                @endforeach
                                           
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Municipality/Rural Municipality</label>
                                <div class="">
                                    <select class="sumoSelect" name="municipality">
                                <option value="">-- Select --</option>
                                @foreach ($municipality as $mun)
                                    <option value="{{$mun}}"> {{ $mun}} </option>
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
                <h2>Project Agreement</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li >
                   @can('add_projects')  
                     <span> <a href="{{ url('project/create') }}"> <button class="btn btn-primary">Add New Project Agreement</button> </a> </span>
                     @endcan
                    </li>
                </ul>

                <div class="clearfix"></div>
            </div>

          
            <div class="x_content">
               
                <div class="table_in_project">
                <table id="project-index-report" class="table table-striped table-bordered display c-blue">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Project <br>Code</th>
                        <th>Project <br> Name</th>
                        <th>General <br> Agreement <br>Code</th>
                         <th>Project <br> Status</th>
                         <th>SW <br> Date</th>
                         @can('edit_projects', 'delete_projects')  
                        <th>Action</th>
                        @endcan
                    </tr>
                    </thead>

                    <tbody>
                       <?php  $i=1; ?>
                    @foreach($projects as $key=>$project)
                       

                    <tr>
                        <td> <?php echo $i; ?></td>
                        <td> {{ $project->project_code }}</td>
                        <td> {{ $project->project_name }}</td>
                        <td> {{ $project->generalAgreement->ga_code }}</td>
                        <td> {{ $project->project_status}} </td>
                        <td> {{ $project->sw_date}} </td>
                        @can('edit_projects') 
                        <td>
                            <div class="btn-group btn-group-xs">
                              <!--   <a href="{{ $project->id }}" id="detail-popup" class="action-btns" data-toggle="modal" > 
                                    <i class="glyphicon glyphicon-circle-arrow-right"></i>
                                </a> -->

                          
                                 <a href="{{ route('project.edit',$project->id) }}" class="action-btns" data-toggle="tooltip" title="" data-original-title="Edit" > 
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                @if($user->hasRole( 'Admin'))
                                {{Form::open(['route'=>['project.destroy', $project->id] , 'method'=>'DELETE', 'class'=>'' ])}}
                                    <a href="javascript:void(0);" class="action-btns submit" data-toggle="tooltip" title="" data-original-title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                                {{Form::close()}}
                                @endif
                                <a target="_blank" href="{{url('project/preview')}}/{{$project->id}}" class="action-btns" data-toggle="tooltip"> 
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                

                            </div>
                        </td>
                        @endcan
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                    </tbody>

                   
                </table>
           
        </div>


            </div>

        

                  


        </div>




            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Project</h4>
                        </div>
                        <div class="modal-body showhtml">
                         
                          <p> Loading...</p>
                        
                        </div>
                      <!--   <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div> -->

                      </div>
                    </div>
                  </div>



 </div>
 </div>  



@endsection



