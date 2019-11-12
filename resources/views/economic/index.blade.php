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
                                <label for="" class="control-label">Graph Options</label>
                                <div class="">
                                    <select class="form-control sumoSelect" id="popSelect" multiple>
                                        <option value="pop_dis_year" selected>Employment Rate</option>
                                        <option value="pop_dis_sex" selected>Unemployment Rate</option>
                                        <option value="pop_dis_age" selected>Employment Rate By Sex</option>
                                        <option value="pop_dis_caste" selected>Unemployment Rate By Sex</option>
                                    </select>
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

<div class="x_content">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('pages.economic.employ')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="echart_line_employ" style="height:350px;"></div>
                  </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('pages.economic.unemploy')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="echart_line_unemploy" style="height:350px;"></div>
                  </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>@lang('pages.economic.employ_sex')</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id="echart_pie_sex_employ" style="height:350px; width: 350px;"></div>
                      </div>
                    </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>@lang('pages.economic.unemploy_sex')</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id="echart_pie_sex_unemploy" style="height:350px; width: 350px;"></div>
                      </div>
                    </div>
            </div>
</div>
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('sidebar.economic')</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                  
                    <span>
                        <a href="{{ route('eco.create') }}" class="btn btn-primary">
                            @lang('pages.economic.add_economic')
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
                <th>@lang('pages.economic.year')</th>
                <th>@lang('pages.economic.employ')</th>
                <th>@lang('pages.economic.unemploy')</th>
                <th>@lang('pages.economic.total_migration')</th>
                <th class="text-center">@lang('labels.action')</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2074</td>
                    <td>3.40</td>
                    <td>1.99</td>
                    <td>10000</td>
                    <td>
                        <a href="{{ route('eco.preview') }}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="{{route('eco.edit', '1')}}" class="action-btns"><i class="glyphicon glyphicon-pencil"></i> </a>
                        <a href="{{route('eco.delete', '1')}}" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
            </div>
        </div> 
</div>
@endsection        
