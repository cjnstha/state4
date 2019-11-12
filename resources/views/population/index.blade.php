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
                                        <option value="pop_dis_year" selected>Population Distribution By Year</option>
                                        <option value="pop_dis_sex" selected>Population Distribution By Sex</option>
                                        <option value="pop_dis_age" selected>Population Distribution By Age</option>
                                        <option value="pop_dis_caste" selected>Population Distribution By Caste</option>
                                        <option value="pop_dis_disability" selected>Population Distribution By Disability</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                       {{--  <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.municipality_report.mun')</label>
                                <div class="">
                                    <input type="text" name="municipality_id" class="form-control">
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.municipality_report.ward')</label>
                                <div class="">
                                    <input type="text" name="ward_id" class="form-control">
                                </div>
                            </div>
                        </div> --}}
                    </div>
                        
                    <div class="form-footer text-right">
                        <button type="submit" class="btn btn-success btn-sm">@lang('pages.labels.get')</button>
                    </div>
                </form>
            </div>

</div>

        <div class="x_content" id="pop_content">
            <div class="col-md-8 col-sm-8 col-xs-12 pop_dis_year">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('pages.population.total_pop')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="echart_line_pop" style="height:350px;"></div>
                  </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 pop_dis_sex">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>@lang('pages.population.sex_wise')</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id="echart_pie_sex" style="height:350px; width: 350px;"></div>
                      </div>
                    </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 pop_dis_age">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('pages.population.age_wise')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="graph_bar_age" style="height:350px;"></div>
                  </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 pop_dis_caste">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('pages.population.caste_wise')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="graph_bar_caste" style="height:350px;"></div>
                  </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 pop_dis_disability">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('pages.population.disability_wise')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="graph_bar_disability" style="height:350px;"></div>
                  </div>
                </div>
            </div>
        </div>



<div class="x_panel">
        <div class="x_title">
            <h2>@lang('sidebar.population')</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                  
                    <span>
                        <a href="{{ route('population.create') }}" class="btn btn-primary">
                            @lang('pages.population.add_new')
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
                <th>@lang('pages.population.year')</th>
                <th>@lang('pages.population.total_pop')</th>
                <th>@lang('pages.population.sex_wise') (@lang('pages.population.male'))</th>
                <th>@lang('pages.population.sex_wise') (@lang('pages.population.female'))</th>
                <th class="text-center">@lang('labels.action')</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2074</td>
                    <td>10000</td>
                    <td>6000</td>
                    <td>4000</td>
                    <td>
                        <a href="{{ route('population.preview') }}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="{{route('population.edit', '1')}}" class="action-btns"><i class="glyphicon glyphicon-pencil"></i> </a>
                        <a href="{{route('population.delete', '1')}}" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
            </div>
        </div> 
</div>
@endsection        
