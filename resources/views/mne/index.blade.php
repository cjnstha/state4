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

                <form method="POST" action="javascript:;" id="filter-search-mne" class="form-grid-v2" >
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

                                     <select class="sumoSelect" name="mne_type">
                                        <option value="">-- Select --</option>
                                
                                        <option value="Planning review"> Planning review </option>
                                        <option value="Follow up"> Follow up </option>
                                           
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
            <h2>M&E forms and Format</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                  
                    <span> <a href="{{ url('mne/create') }}" class="btn btn-primary">Add New  M&E forms</a> </span>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
             <div class="table_in_div">
            <table id="datatable-table-index" class="table table-striped table-bordered display">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                     <th>Project <br>Code</th>
                    <th>Objective</th>
                    <th>Prepared date</th>
                    <th>Uploaded date</th> 
                    <th>Document</th>  
                    <th>Keywords</th>
                                       
                    <th>Action</th>
                   
                </tr>
                </thead>

                <tbody>
                       <?php  $i=1; ?>
                @foreach($posts as $p)

                <tr>
                    <td> {{ $i }}</td>
                    <td> @if($p->mne_type != '') {{ $p->mne_type}} @endif</td>
                    <td> @if($p->project_id != '')
                            @foreach($project_code as $id => $val) 
                                @if($id == $p->project_id)
                                    {{ $val }} 
                                @endif
                            @endforeach
                        @endif
                    </td>
                    
                    <td>@if($p->obj != '')  {{ $p->obj}}  @endif</td>
                    <td>
                        @if($p->p_date != '') 
                             @php
        
                             $date = $p->p_date;
                             $p_date = strtotime($date);
                            
                             @endphp  

                            {{ date(' F jS, Y',$p_date) }} 
                         @endif
                    </td>
                    <td> 
                        @if($p->u_date != '')
                            @php
        
                             $date = $p->u_date;
                             $u_date = strtotime($date);
                            
                             @endphp 

                            {{ date(' F jS, Y',$u_date) }}
                        @endif
                     </td>
                    <td> @if($p->original_document != '')
                        <a class="link" href="{{ url('mne/downloadFile/'.$p->document ) }}" target="_blank">
                           {{isset($p->original_document) ? $p->original_document: ''}}
                        </a>
                         @endif
                                   
                    </td>
                     <td> @if($p->keywords != '') {{ $p->keywords }}  @endif</td>
                    <td>
                  
                    <a href=" {{ route('mne.edit',$p->id) }}" class="action-btns">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    {{Form::open(['route'=>['mne.destroy', $p->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
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
