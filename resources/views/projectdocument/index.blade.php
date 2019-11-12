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

                <form method="POST" action="javascript:;" id="filter-search-prodocument" class="form-grid-v2" >
                     {{ csrf_field() }}
                    <div class="row">

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Project Name</label>
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
                                <label for="" class="control-label">Project Code</label>
                                <div class="">
                                    <select class="sumoSelect" name="project_code">
                                <option value="">-- Select --</option>
                                @foreach ($projects as $d_key => $d_val)
                                    <option value="{{$d_key}}"> {{ $d_val}} </option>
                                @endforeach
                                           
                                </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Quarter</label>
                                <div class="">
                                    <select class="sumoSelect" name="quarter">
                                    <option value="">-- Select --</option>
                              
                                    <option value="1"> 1<sup>st</sup> </option>
                                    <option value="2"> 2<sup>st</sup> </option>
                                    <option value="3"> 3<sup>st</sup> </option>
                                    <option value="4"> 4<sup>st</sup> </option>
                                
                                           
                                </select>
                                </div>
                            </div>
                        </div>

                         <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Quarter Year</label>
                                <div class="">
                                      
                                    <select class="sumoSelect" name="quarter_year">
                                        <option value="">-- Select --</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                               
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
            <h2>Project Document</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
               

                       <span>
                       <a href="{!! route('prodoc.create') !!}" class="btn btn-primary">
                             Add New Project Document
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
                    <th>Project Name</th>
                    <th>Contact Person</th>
                    <th>Proposal Document</th>
                    <th>Contract Document</th>
                    <th>Progress Document</th>
                    <th>Quarter & Year</th>
        
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                        <?php  $i=1; ?>
                @foreach($services as $key=>$service)

                <tr>
                    <td> {{ $i }}</td>
                    <td> {{ $service->projectlist->project_name }}</td>
                    <td> {{ $service->contact_person}}</td>

                    <td> 
                        <a class="link" href="{{ url('/prodoc/downloadFile/'.$service->proposal_doc) }}">{{isset($service->original_proposal_doc) ? $service->original_proposal_doc: ''}}</a>
                    </td>
                    <td> <a class="link" href="{{ url('/prodoc/downloadFile/'.$service->contract_doc) }}">{{isset($service->original_contract_doc) ? $service->original_contract_doc: ''}}</a>
                    </td>
                    <td>
                    <ul>
                    @foreach($service['multiple'] as $s)
                        <li><a class="link" href="{{ url('/prodoc/downloadFile/'.$s->progress_doc ) }}">{{ $s->original_progress_doc }}</a>
                        </li>
                         
                    @endforeach
                    </ul>
                    </td>
                    <td>    @if($service->quarter == 1)
                                1<sup>st</sup> Quarter, {{ $service->quarter_year }}
                            @elseif($service->quarter == 2)
                                2<sup>nd</sup>  Quarter,  {{ $service->quarter_year }}
                            @elseif($service->quarter == 3)
                                3<sup>rd</sup>  Quarter, {{ $service->quarter_year }}
                            @elseif($service->quarter == 4)
                                4<sup>th</sup>  Quarter, {{ $service->quarter_year }}
                            @endif   
                        </td>
                    <td>
                   
                      

                    <a href="{{ route('prodoc.edit',$service->id) }}" class="action-btns"> 
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                   
                    {{Form::open(['route'=>['prodoc.destroy', $service->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
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
