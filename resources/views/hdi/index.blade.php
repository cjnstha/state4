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
                                        <option value="pop_dis_year" selected>Human Development Index</option>
                                        <option value="pop_dis_sex" selected>Poverty Rate</option>
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
                    <h2>Human Development Index</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="graph_bar_hdi" style="height:350px;"></div>
                  </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Poverty Rate</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="graph_bar_poverty" style="height:350px;"></div>
                  </div>
                </div>
            </div>
</div>
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('sidebar.hdi')</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                  
                    <span>
                        <a href="{{ route('hdi.create') }}" class="btn btn-primary">
                            @lang('pages.labels.add_new') @lang('sidebar.hdi')
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
                <th>@lang('pages.hdi.year')</th>
                <th>@lang('pages.hdi.hdi')</th>
                <th>@lang('pages.hdi.rank')</th>
                <th class="text-center">@lang('labels.action')</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2074</td>
                    <td>0.44</td>
                    <td>144</td>
                    <td>
                        <a href="{{ route('hdi.preview') }}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="{{route('hdi.edit', '1')}}" class="action-btns"><i class="glyphicon glyphicon-pencil"></i> </a>
                        <a href="{{route('hdi.delete', '1')}}" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
            </div>
        </div> 
</div>
@endsection        
