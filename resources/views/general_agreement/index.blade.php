@extends('layouts.master')

@section('content')
  
    <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content bg-gray no-search">

                <form method="POST" action="javascript:;" id="filter-search-generalagreements" class="form-grid-v2" >
                     {{ csrf_field() }}
                    <div class="row">
                        
                        <div class="col-md-6 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">INGO Name</label>
                                <div class="">
                                    <select name="ingo" class="form-control sumoSelect">
                                      <option value="">--Select Here--</option>
                                @foreach($ingos as $ingo)
                                <option value="{{$ingo->id}}"> {{$ingo->name}} </option>
                                @endforeach
                            </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12 col-sm-4">
                             <div class="form-group">
                                <label for="" class="control-label">General Agreement</label>
                                <div class="">
                                    <select name="ga_code" class="form-control sumoSelect">
                                      <option value="">--Select Here--</option>
                                @foreach($generalagreements as $ga)
                                <option value="{{$ga->ga_code}}"> {{$ga->ga_code}} </option>
                                @endforeach
                            </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12 col-sm-4">
                             <div class="form-group">
                                <label for="" class="control-label">Thematic Area</label>
                                <div class="">
                                    <select name="theme" class="form-control sumoSelect">
                                      <option value="">--Select Here--</option>
                                @foreach($themes as $theme)
                                <option value="{{$theme->id}}"> {{$theme->name}} </option>
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
            <h2>General Agreement Profile Management</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                    @can('add_generalagreements')
                     <span>
                           <a href="{!! route('generalagreements.create') !!}" class="btn btn-primary">
                                  Add New  General Agreement Profile
                              </a>
                       </span>
                       @endcan

                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table_in_generalagreements">
            <table id="datatable" class=" table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>INGO Name</th>
                    <th>General Agreement Code</th>
                    <th>Reccomendation Date</th>
                   @can('edit_generalagreements', 'delete_generalagreements')
                <th class="text-center">Actions</th>
                @endcan
                </tr>
                </thead>

                <tbody>
                     <?php  $i=1; ?>
                @foreach($generalagreements as $generalagreement)

                <tr>
                     <td> {{ $i }}</td>
                    <td> {{ $generalagreement->ingo->name }}</td>
                    <td> {{ $generalagreement->ga_code }}</td>
                    <td>
                        @php
                         $date = $generalagreement->sw_recco_date;
                         $time = strtotime($date);
                        
                         @endphp 
                {{ date(' F jS, Y',$time) }}
                    </td>
                    @can('edit_generalagreements')
                   <td>
                          <a href="{{ route('generalagreements.edit',$generalagreement->id) }}" class="action-btns"> 
                            <span class="glyphicon glyphicon-pencil"></span>
                       </a>

                   @if($role->name == 'Admin')
                    {{Form::open(['route'=>['generalagreements.destroy', $generalagreement->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                        <a href="javascript:void(0);" class="submit action-btns"><span class="glyphicon glyphicon-trash"></span></a>
                    {{Form::close()}}
                    @endif
                     <a target="_blank" href="{{ route('generalagreements.preview',$generalagreement->id) }}" class="action-btns"> <span class="glyphicon glyphicon-eye-open"></span> </a>
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
