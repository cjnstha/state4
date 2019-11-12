@extends('layouts.master')

@section('content')

    <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form  method="POST" action="javascript:;" class="form-grid-v2 FilterForm" data-base="prostat" data-filter="filter">
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4 col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Project Code</label>
                                    <div class="">
                                        <select class="sumoSelect" name="project_code">
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
                                    <label for="" class="control-label">Provinces</label>
                                    <div class="">
                                        {{ Form::select('province_id[]', $provinces ,null, ['class' => 'form-control sumoSelect miscProvince','multiple']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Districts</label>
                                    <div class="">
                                    {{ Form::select('district_id[]', [] ,null, ['class' => 'form-control sumoSelect miscDistrict','multiple']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Local Government Unit</label>
                                    <div class="">
                                    {{ Form::select('lgu_id[]', [] ,null, ['class' => 'form-control sumoSelect miscLgu','multiple']) }}
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
            <h2>Project Status</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                   @can('add_prostats') 
                     <span>
                           <a href="{!! route('prostat.create') !!}" class="btn btn-primary">
                                  Add New Project Status 
                              </a>
                       </span>
                    @endcan    
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
                        <th>Project Code</th>
                       
                     @can('edit_prostats', 'delete_prostats') 
                        <th>Action</th>
                       @endcan
                    </tr>
                    </thead>

                    <tbody>
                        <?php  $i=1; ?>
                    @foreach($posts as $p)

                    <tr>
                       <td> {{ $i }}</td>
                        <td> @foreach($project_code as $pck=> $pcv) @if($pck == $p->project_code) {{ $pcv }} @endif @endforeach </td>
                       

                        @can('edit_prostats') 
                        <td>
                        <a href=" {{ route('prostat.edit', $p->id ) }}" class="action-btns">
                           {{--{{ link_to_route('prostat.edit','',[$p->id],['class'=>'btn btn-primary btn-sm glyphicon glyphicon-edit']) }} --}}
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        {{Form::open(['route'=>['prostat.destroy', $p->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                            <a href="javascript:void(0);" class="submit action-btns "><span class="glyphicon glyphicon-trash"></span></a>
                        {{Form::close()}}
                        {{-- <a href="#"  class="btn btn-danger btn-lg">
                        <span class="glyphicon glyphicon-remove"></span>
                        </a> --}}
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

       

@endsection
