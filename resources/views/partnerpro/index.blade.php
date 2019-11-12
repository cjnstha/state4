@extends('layouts.master')

@section('content')
    
    <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form  method="POST" action="javascript:;" class="form-grid-v2 FilterForm" data-base="partnerpro" data-filter="filter">
                    {{ csrf_field() }}
                    <div class="row">
                            <div class="col-md-4 col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Name of NGO</label>
                                    <select class="sumoSelect" name="ngo_id">
                                        <option value="">-- Select --</option>
                                        @foreach ($ngo_name as $d_key => $d_val)
                                            <option value="{{$d_key}}"> {{ $d_val}} </option>
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
            <h2>Partner's Profile</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                
                     <span>
                        <a href="{!! route('partnerpro.create') !!}" class="btn btn-primary">
                            Add New  Partner's Profile
                        </a>
                     </span>
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
                    
                    <th>Name of NGO</th>

                    <th>Address</th>

                    <th>District</th>
                                     
                    <th>Action</th>
                   
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($posts as $p)

                <tr>
                   <td> {{ $i }}</td>
                    
                    <td> 
                         @foreach($ngo_name as $id=>$name)
                            @if($id == $p->ngo_id)
                       
                                    {{ $name }}
                            @endif
                        @endforeach

                    </td>

                    <td> 
                        {{ $p->address }}
                    </td>

                    <?php 

                        $dist_exp = explode(',', $p->district_id); 
                        $dis_array = array();

                        foreach($dist_exp as $dist)
                        {
                           $distname = DB::table('districts')->select('district_name')->where('id',$dist)->first();
                           array_push($dis_array, $distname->district_name); 
                        }

                        $districts = implode(',<br>', $dis_array);

                    ?>
                    <td> {!! $districts !!}</td>
                   
                    <td>
                 
                    <a href=" {{ route('partnerpro.edit',$p->id) }}" class="action-btns">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    {{Form::open(['route'=>['partnerpro.destroy', $p->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
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

       

@endsection
