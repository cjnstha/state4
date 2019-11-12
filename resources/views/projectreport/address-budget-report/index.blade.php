@extends('layouts.master')
@section('content')
   
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12"> 

         <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content bg-gray no-search">

                <form method="POST" action="javascript:;" class="form-grid-v2 filterReportForm" data-report="address-budget-report" data-filter="filter" >
                     {{ csrf_field() }}
                    <div class="row">

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Province<em>*</em></label>
                                <div class="">
                                    {{ Form::select('province_id[]', $provinces ,null, ['class' => 'form-control sumoSelect miscProvince','multiple','required']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">District</label>
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
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Year (From)</label>
                                <div class="">
                                    <select name="duration_from_year" required="" id="from" class="form-control sumoSelect">
                                        <option value=" " >--Select Here--</option>
                                          @for($i = 1900; $i <= date('Y'); $i++)
                                          <option value="{{$i}}" > {{$i}} </option>
                                          @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Project Status</label>
                                <div class="">
                                    <select name="project_status" id="project_status" class="form-control sumoSelect">
                                        <option value=" "> --Select Here-- </option>
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="New">New</option>
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


  

        <div class="x_panel tableContent hide">
            <div class="x_title">
                <h2>Project Report</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="table_in_div">
                    
                </div>
            </div>
        </div>
     </div>
</div>  

@endsection



