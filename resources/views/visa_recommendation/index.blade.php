@extends('layouts.master')
    @section('content')
    <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content bg-gray no-search">

                <form method="POST" action="javascript:;" id="filter-search-visa" class="form-grid-v2" >
                     {{ csrf_field() }}
                    <div class="row">
                        
                        <div class="col-md-6 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Duration From</label>
                                <div class="">
                                    <input type="text" id="datepick-all" autocomplete="off" name="duration_from" class="form-control" aria-describedby="inputSuccess2Status4" width >
                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Duration To</label>
                                <div class="">
                                    <input type="text" id="datepick-all" autocomplete="off" name="duration_to" class="form-control" aria-describedby="inputSuccess2Status4" width >
                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">General Agreement Code</label>
                                <div class="">
                                    <select class="sumoSelect" name="ga_code">
                                    <option value="">-- Select --</option>
                              
                                    @foreach($general as $gen)
                                    <option value=" {{$gen->id}} "> {{$gen->ga_code}} </option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Project Code</label>
                                <div class="">
                                    <select class="sumoSelect" name="pro_code">
                                    <option value="">-- Select --</option>
                              
                                    @foreach($projects as $pro)
                                    <option value=" {{$pro->id}} "> {{$pro->project_code}} </option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Expatriate Name</label>
                                <div class="">
                                    <input type="text" name="exp_name" class="form-control" >
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">INGO Name</label>
                                <div class="">
                                <select class="sumoSelect" name="ingo_id">
                                    <option value="">-- Select --</option>                              
                                    @foreach($ingos as $ingo)
                                    <option value="{{$ingo->id}}"> {{$ingo->name}} </option>
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
            <h2>Visa Recommendation</h2>
            <ul class="nav navbar-right panel_toolbox">

                <li >
                    @can('add_visareccomendations')
                     <span>
                           <a href="{{ route('visa.create') }}" class="btn btn-primary">
                                  Add New Visa Recommendation
                              </a>
                       </span>
                    @endcan  
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="tbl_in_visa">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Designation</th>
                    <th>Person Name</th>
                    
                    <th>Relation</th>
                    
                                    
                    @can('edit_visareccomendations', 'delete_visareccomendations')                 
                    <th>Action</th>
                    @endcan
                    
                   
                </tr>
                </thead>

                <tbody>
                    <?php $i=1; ?>
                    @foreach($info as $data)
                     <tr>
                    <td>{{$i}}</td>
                    <td>{{ $data->expatriate['designation'] }}</td>
                    <td>{{ $data['person_name'] }}</td>
                    <td>{{ $data['relation'] }}</td>
                    <td>
                    @can('edit_visareccomendations')
                    <a href="{{ route('visa.edit', $data->id)}}" class="action-btns">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    @endcan
                    @can('delete_visareccomendations')
                   
                        <a href="{{ route('visa.delete', $data->id)}}" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span></a>
                        
                    @endcan
                    <a target="_blank" href="{{ route('visa.preview', $data->id)}} "><span class="glyphicon glyphicon-eye-open"></span></a>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection                