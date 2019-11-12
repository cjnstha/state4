@extends('layouts.master')

@section('content')
  
   <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content bg-gray no-search">
                <form  method="POST" action="javascript:;" class="form-grid-v2" id="filter-search-ingo" data-base="ingo" data-filter="filter">
                    {{ csrf_field() }}
                    <div class="row">
                            <div class="col-md-4 col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Name of INGO</label>
                                    {{Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Enter NGO Name'])}}
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Country</label>
                                    <select name="country" class="sumoSelect">
                                      <option> -- Select Here-- </option>
                                      @foreach($countries as $country)
                                      <option value="{{$country->name}}">{{$country->name}}</option>
                                      @endforeach
                                    </select>
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
            <h2>INGO Profile Management</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                    @can('add_ingos')
                     <span>
                           <a href="{!! route('ingo.create') !!}" class="btn btn-primary">
                                  Add New  INGO Profile
                              </a>
                       </span>
                       @endcan

                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="tbl_in_ingo">
            <table id="datatable" class=" table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Established At</th>
                   @can('edit_ingos', 'delete_ingos')
                <th class="text-center">Actions</th>
                @endcan
                </tr>
                </thead>

                <tbody>
                  <?php  $i=1; ?>
                @foreach($ingos as $ingo)

                <tr>
                     <td> {{ $i }}</td>
                    <td> {{ $ingo->name }}</td>
                    <td> {{ $ingo->address }}</td>
                    <td> {{ $ingo->country }}</td>
                    <td> {{ $ingo->contact_no }}</td>
                    <td> {{ $ingo->email }}</td>
                    <td>
                        @php
                         $date = $ingo->estd_date;
                         $time = strtotime($date);
                        
                         @endphp 
                {{ date(' F jS, Y',$time) }}
                    </td>
                    
                    @can('edit_ingos')
                   <td>
                          <a href="{{ route('ingo.edit',$ingo->id) }}" class="action-btns"> 
                            <span class="glyphicon glyphicon-pencil"></span>
                       </a>
                       @if($role->name == 'Admin')
                    {{Form::open(['route'=>['ingo.destroy', $ingo->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                        <a href="javascript:void(0);" class="submit action-btns"><span class="glyphicon glyphicon-trash"></span></a>
                    {{Form::close()}}
                      @endif
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
