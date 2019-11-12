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

                <form method="POST" action="javascript:;" id="filter-search-logical" class="form-grid-v2" >
                     {{ csrf_field() }}
                    <div class="row">

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Project</label>
                                <div class="">
                                    <select class="sumoSelect" name="goal_id">
                                        <option value="">-- Select --</option>
                                        @foreach ($goals as $d_key => $d_val)
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
            <h2>Logical Framework</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                
                      <span>
                           <a href="{!! route('logical.create') !!}" class="btn btn-primary">
                                  Add New  Logical Framework
                              </a>
                       </span>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
             <div class="table_in_div">
            <table id="datatable-table-index" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Project</th>
                    <th>Subject</th>
                    <th>Objectively variable ind.</th>
                    <th>Indicator def.</th> 
                    <th>Data source</th>                   
                    <th>Action</th>
                   
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($posts as $p)

                <tr>
                    <td> {{ $i }}</td>
                    <td> {{ $p->goalname->goal}}</td>
                    <td> {{ $p->sub}}</td>
                    <td> {{ $p->obj_i}}</td>
                    <td> {{ $p->ind}}</td>
                    <td> {{ $p->data_s}}</td>
                    
                    <td>
                  
                        <a href=" {{ route('logical.edit',$p->id) }}" class="action-btns">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        {{Form::open(['route'=>['logical.destroy', $p->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                            <a href="javascript:void(0);" class="action-btns submit">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
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
