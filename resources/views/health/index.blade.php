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
                                        <option value="pop_dis_year" selected>Birth Rate</option>
                                        <option value="pop_dis_sex" selected>Infant Mortalitiy Rate</option>
                                        <option value="pop_dis_age" selected>Maternal Mortality Rate</option>
                                        <option value="pop_dis_caste" selected>Causes of Maternal Mortality</option>
                                        <option value="pop_dis_disability" selected>Total Fertility Rate</option>
                                        <option value="" selected>Life Expectancy</option>
                                        <option value="" selected>Prevalance of Major Diseases</option>
                                        <option value="" selected>Reported Case of Major Diseases</option>
                                        <option value="" selected>Causes of Death in General Population</option>
                                        <option value="" selected>Prevalence Of Tobacco And Alcohol Use By Sex</option>
                                        <option value="" selected>Prevalence Of Tobacco And Alcohol Use Among Adults</option>
                                        <option value="" selected>Prevalence Of Tobacco And Alcohol Use Among Adolscence</option>
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
                    <h2>@lang('pages.health.birth_rate')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="echart_line_birthrate" style="height:350px;"></div>
                  </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('pages.health.infant_rate')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="graph_bar_infant" style="height:350px;"></div>
                  </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('pages.health.maternal_rate')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="graph_bar_maternal" style="height:350px;"></div>
                  </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>@lang('pages.health.cause_maternal')</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id="echart_pie_cause_maternal" style="height:350px"></div>
                      </div>
                    </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('pages.health.fertility')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="echart_line_fertility" style="height:350px;"></div>
                  </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('pages.health.life_exp')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="echart_line_life" style="height:350px;"></div>
                  </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>@lang('pages.health.major_disease')</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id="echart_pie_major_diseases" style="height:350px"></div>
                      </div>
                    </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>@lang('pages.health.various_disease')</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id="echart_pie_various_diseases" style="height:350px"></div>
                      </div>
                    </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>@lang('pages.health.cause_death')</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id="echart_pie_death" style="height:350px"></div>
                      </div>
                    </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>@lang('pages.health.tobacco_sex')</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id="echart_pie_tobacco_sex" style="height:350px"></div>
                      </div>
                    </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>@lang('pages.health.tobacco_adult')</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id="echart_pie_tobacco_adult" style="height:350px"></div>
                      </div>
                    </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>@lang('pages.health.tobacco_teen')</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id="echart_pie_tobacco_teen" style="height:350px"></div>
                      </div>
                    </div>
            </div>
</div>            
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('sidebar.health')</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                  
                    <span>
                        <a href="{{ route('health.create') }}" class="btn btn-primary">
                            @lang('pages.health.add_health')
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
                <th>@lang('pages.health.year')</th>
                <th>@lang('pages.health.birth_rate')</th>
                <th>@lang('pages.health.infant_rate')</th>
                <th>@lang('pages.health.maternal_rate')</th>
                <th class="text-center">@lang('labels.action')</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2074</td>
                    <td>3.4</td>
                    <td>6</td>
                    <td>6</td>
                    <td>
                      <a href="{{ route('health.show', '1')}}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                      @include('shared._actions', [
                            'entity' => 'health',
                            'id' => 1
                        ])</td>
                </tr>
            </tbody>
        </table>
            </div>
        </div> 
</div>
@endsection        
