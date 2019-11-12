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
                                <label for="" class="control-label">@lang('pages.policy_mgmt.project_name')</label>
                                <div class="">
                                    <input type="text" name="project-type" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.municipality_report.mun')</label>
                                <div class="">
                                    <input type="text" name="municipality_id" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.municipality_report.ward')</label>
                                <div class="">
                                    <input type="text" name="ward_id" class="form-control">
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
            <h2>@lang('sidebar.edu_ins')</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                  
                    <span>
                        <a href="{{ route('educational.create') }}" class="btn btn-primary">
                            @lang('pages.educational.add_educational')
                        </a>
                     </span>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table_in_div">
                <table class="dataTableClass table table-bordered table-striped table-hover c-blue">
            <thead>
            <tr>
                <th>@lang('pages.labels.id')</th>
                <th>@lang('pages.educational.type_of_institution')</th>
                <th>@lang('pages.educational.no_of_students')</th>
                <th class="text-center">@lang('labels.action')</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Public</td>
                    <td>400</td>
                    <td>@include('shared._actions', [
                            'entity' => 'educational',
                            'id' => 1
                        ])</td>
                </tr>
            </tbody>
        </table>
            </div>
        </div> 
</div>
@endsection        
