@extends('layouts.master')

@section('content')
<div class="x_panel filter">
            <div class="x_title">
                <h2>@lang('pages.labels.filter')</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content bg-gray no-search">

                <form method="get" action="javascript:;" class="form-grid-v2 filterDemo" data-report="thematic-activity-search" data-filter="filter" >
                     {{ csrf_field() }}
                    <div class="row">

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.municipality_report.project_type')</label>
                                <div class="">
                                    <select class="form-control sumoSelect" name="status" multiple="">
                                        <option value="1">Road</option>
                                        <option value="2">Bridges</option>
                                        <option value="3">Buildings</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.municipality_report.project_class')</label>
                                <div class="">
                                    <select class="form-control sumoSelect" name="status" multiple="">
                                        <option value="1">National Prioritized</option>
                                        <option value="2">Regular</option>
                                        <option value="3">Maintenance</option>
                                        <option value="4">New</option>
                                    </select>
                                </div>
                            </div>
                        </div>

            
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.municipality_report.status')</label>
                                <div class="">
                                    <select class="form-control sumoSelect" name="status">
                                        <option value="">--Select--</option>
                                        <option value="1">Yet To Start</option>
                                        <option value="2">Ongoing</option>
                                        <option value="3">Completed</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.municipality_report.start_date')</label>
                                <div class="">
                                    <input type="text" name="start_date" class="form-control" id="datepick-all">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.municipality_report.end_date')</label>
                                <div class="">
                                    <input type="text" name="end_date" class="form-control" id="datepick-all">
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="form-footer text-right">
                        <button type="submit" class="btn btn-success btn-sm">@lang('pages.labels.get')</button>
                    </div>
                </form>
            </div>
</div>
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.municipality_report.project_report')</h2>
            {{-- <ul class="nav navbar-right panel_toolbox">
                <li >
                  
                    <span>
                        <a href="{{ route('report_project.create')}}" class="btn btn-primary">
                            @lang('pages.municipality_report.add_new_report')
                        </a>
                     </span>
                </li>
            </ul> --}}
            <div class="clearfix"></div>
        </div>
            
        <div class="x_content">
            <div class="table_in_div">
                <table class="dataTableClass table table-bordered table-striped table-hover c-blue">
            <thead>
            <tr>
                <th>@lang('pages.labels.id')</th>
                <th>@lang('pages.municipality_report.project_name')</th>
                <th>@lang('pages.municipality_report.project_type')</th>
                <th>@lang('pages.municipality_report.mun')</th>
                <th>@lang('pages.municipality_report.ward')</th>
                <th>@lang('pages.municipality_report.address')</th>
                <th>@lang('pages.municipality_report.start_date')</th>
                <th>@lang('pages.municipality_report.end_date')</th>
                <th>@lang('pages.municipality_report.budget')</th>
                <th>@lang('pages.municipality_report.status')</th>
                <th>@lang('pages.municipality_report.expenses')</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Project 2</td>
                    <td>Construction</td>
                    <td>Pokhara</td>
                    <td>2</td>
                    <td>Lakeside</td>
                    <td>2017/09/25</td>
                    <td>2018/10/14</td>
                    <td>10000</td>
                    <td>Ongoing</td>
                    <td>999</td>
                   
                </tr>
            </tbody>
        </table>
            </div>
        </div> 
</div>
@endsection        
