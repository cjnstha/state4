@extends('layouts.master')

@section('content')
  
   <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form  method="POST" action="javascript:;" class="form-grid-v2 FilterForm" data-base="ngo" data-filter="filter">
                    {{ csrf_field() }}
                    <div class="row">
                            <div class="col-md-4 col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Name of NGO</label>
                                    {{Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Enter NGO Name'])}}
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
            <h2>NGO Profile Management</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                    @can('add_ngos')
                     <span>
                           <a href="{!! route('ngo.create') !!}" class="btn btn-primary">
                                  Add New  NGO Profile
                              </a>
                       </span>
                       @endcan

                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table_in_div">
            <table id="" class="dataTableClass table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Established At</th>
                    <th>Primary Project</th>
                    <th>Funded By</th>
                   @can('edit_ngos', 'delete_ngos')
                <th class="text-center">Actions</th>
                @endcan
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($ngos as $ngo)

                <tr>
                     <td> {{ $i }}</td>
                    <td> {{ $ngo->name }}</td>
                    <td> {{ $ngo->address }}</td>
                    <td> {{ $ngo->contact_no }}</td>
                    <td> {{ $ngo->email }}</td>
                    <td>
                        @php
                         $date = $ngo->established_date;
                         $time = strtotime($date);
                        
                         @endphp 
                {{ date(' F jS, Y',$time) }}
                    </td>
                    <td> {{ $ngo->primary_project }}</td>
                    <td> {{ $ngo->funded_by }}</td>
                    @can('edit_ngos')
                   <td>
                          <a href="{{ route('ngo.edit',$ngo->id) }}" class="action-btns"> 
                            <span class="glyphicon glyphicon-pencil"></span>
                       </a>
                    {{Form::open(['route'=>['ngo.destroy', $ngo->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                        <a href="javascript:void(0);" class="submit action-btns"><span class="glyphicon glyphicon-trash"></span></a>
                    {{Form::close()}}
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
