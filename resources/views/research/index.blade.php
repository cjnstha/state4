@extends('layouts.master')

@section('content')

<div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form  method="POST" action="javascript:;" class="form-grid-v2 FilterForm" data-base="research" data-filter="filter">
                    {{ csrf_field() }}
                    <div class="row">

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Type</label>
                                <div class="">
                                    {{Form::select('re_type',  [''=>'-- Select --', 'Baseline'=>'Baseline','Survey'=>'Survey'], null, ['class'=>'form-control sumoSelect'])}}
                                </div>
                            </div>
                        </div>
                        
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

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label class="control-label"> Publish Date </label>
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                    
                                                  {{ Form::text('publish_date', null, ['class' => 'form-control has-feedback-left' , 'aria-describedby'=>'inputSuccess2Status4','id'=>'datepick-all', 'placeholder'=>'-- Select Date --']) }}

                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                                            </div>
                                        </div>
                                    </fieldset>
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
            <h2>Research</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
              
                     <span>
                           <a href="{!! route('research.create') !!}" class="btn btn-primary">
                                  Add New  Research
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
                        <th>Type</th>
                        <th>Objective</th>
                        <th>Location</th> 
                        <th>Publish date</th>                   
                        <th>Action</th>
                       
                    </tr>
                    </thead>

                    <tbody>
                        <?php  $i=1; ?>
                    @foreach($posts as $p)

                    <tr>
                        <td> {{ $i }}</td>
                        <td> {{ $p->re_type }}</td>
                        <td> {{ $p->obj}}</td>
                        <td> {{ $p->location}}</td>
                        <td> {{ $p->publish_date}}</td>
                       
                        <td>
                      
                        <a href=" {{ route('research.edit',$p->id) }}" class="action-btns">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        {{Form::open(['route'=>['research.destroy', $p->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
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
