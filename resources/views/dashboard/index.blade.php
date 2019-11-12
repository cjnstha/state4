@extends('layouts.master')

@section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>@lang('sidebar.dashboard')</h2>
            <ul class="nav navbar-right panel_toolbox">
               
            </ul>
            <div class="clearfix"></div>
        </div>

        @hasanyrole(['Admin','State User'])
        <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count blue">
                  <div class="data-count">
                    <div class="count">@lang('labels.pop_no')</div>
                    <span class="count_top"> @lang('labels.population')</span>
                  </div><i class="fa fa-users"></i>
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count orange">
                <div class="data-count">
                 <div class="count">@lang('labels.area_no')</div>
                <span class="count_top"> @lang('labels.area')</span>
               </div><i class="fa fa-map"></i>
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count green">
                <div class="data-count">
                <div class="count">@lang('labels.project_no')</div>
                <span class="count_top"> @lang('labels.project')</span>
                </div><i class="fa fa-briefcase"></i>
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count reds">
                <div class="data-count">
                <div class="count">@lang('labels.pokhara')</div>
                <span class="count_top"> @lang('labels.capital')</span>
                </div><i class="fa fa-institution"></i>
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count blue">
                <div class="data-count">
                <div class="count">@lang('labels.district_no')</div>
                <span class="count_top"> @lang('labels.district')</span>
                </div><i class="fa fa-map-marker"></i>
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6 ">
               <div class="tile_stats_count orange">
                <div class="data-count">
                <div class="count">@lang('labels.literacy_no')</div>
                  <span class="count_top"> @lang('labels.literacy')</span>
                  </div>
                  <i class="fa fa-graduation-cap"></i>
                </div> 
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count green">
                <div class="data-count">
                <div class="count">@lang('labels.mun_no')</div>
                <span class="count_top"> @lang('labels.municipality')</span>
                </div><i class="fa fa-building"></i>
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count reds">
                <div class="data-count">
                <div class="count">@lang('labels.vdc_no')</div>
                <span class="count_top"> @lang('labels.vdc')</span>
                </div><i class="fa fa-building-o"></i>
              </div>
            </div>
          </div>
        @endhasanyrole

        @hasanyrole(['Municipality User'])
        <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count blue">
                  <div class="data-count">
                    <div class="count">@lang('labels.mun_pop')</div>
                    <span class="count_top"> @lang('labels.population')</span>
                  </div><i class="fa fa-users"></i>
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count orange">
                <div class="data-count">
                 <div class="count">@lang('labels.mun_area')</div>
                <span class="count_top"> @lang('labels.area')</span>
               </div><i class="fa fa-map"></i>
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count green">
                <div class="data-count">
                <div class="count">@lang('labels.project_no')</div>
                <span class="count_top"> @lang('labels.project')</span>
                </div><i class="fa fa-briefcase"></i>
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count reds">
                <div class="data-count">
                <div class="count">@lang('labels.mun_wards')</div>
                <span class="count_top">@lang('labels.total_wards')</span>
                </div><i class="fa fa-building-o"></i>
              </div>
            </div>
        </div>
        @endhasanyrole

        @hasanyrole(['Ward User'])
        <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count blue">
                  <div class="data-count">
                    <div class="count">@lang('labels.ward_pop')</div>
                    <span class="count_top"> @lang('labels.population')</span>
                  </div><i class="fa fa-users"></i>
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count orange">
                <div class="data-count">
                 <div class="count">@lang('labels.ward_area')</div>
                <span class="count_top"> @lang('labels.area')</span>
               </div><i class="fa fa-map"></i>
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6">
              <div class="tile_stats_count green">
                <div class="data-count">
                <div class="count">@lang('labels.project_no')</div>
                <span class="count_top"> @lang('labels.project')</span>
                </div><i class="fa fa-briefcase"></i>
              </div>
            </div>

          </div>

        @endhasanyrole

        <div class="x_content">

            <div class="row">

          <div class="x_panel filter">
          

            <div class="x_content bg-gray no-search">

                <form method="get" action="javascript:;" class="form-grid-v2 filterDemo" data-filter="filter" >
                     {{ csrf_field() }}
                    <div class="row">

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('labels.fiscal')</label>
                                <div class="">
                                  <select class="form-control sumoSelect" multiple>
                                    <option value="1">2069</option>
                                    <option value="2">2070</option>
                                    <option value="3">2071</option>
                                    <option value="4">2072</option>
                                    <option value="5">2073</option>
                                    <option value="6">2074</option>
                                    <option value="7">2075</option>
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


               <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('labels.project_vs_status')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="barchartProjectVsStatus"></canvas>
                  </div>
                </div>
              </div>
              <!-- /bar charts -->
                {{-- <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sonar</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_sonar" style="width:100%; height:300px;"></div>

                  </div>
                </div>
              </div> --}}
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('labels.year_vs_budget')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="barchartYearVsBudget"></canvas>
                  </div>
                </div>
              </div>

               <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('labels.contractor_detail')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="barchartContractor"></canvas>
                  </div>
                </div>
              </div>

             {{--  <div class="col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2>@lang('labels.latest_project')</h2>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table class="table table-striped table-bordered">
                        <tr>
                            <td><a class="link-green" href="#">Project 1</a></td>
                        </tr>
                        <tr>
                            <td><a class="link-green" href="#">Project 2</a></td>
                        </tr>
                        <tr>
                            <td><a class="link-green" href="#">Project 3</a></td>
                        </tr>
                        <tr>
                            <td><a class="link-green" href="#">Project 4</a></td>
                        </tr>
                        <tr>
                            <td><a class="link-green" href="#">Project 5</a></td>
                        </tr>
                      </table>
                  </div>
                </div>
              </div> --}}
             

             
              

                

        </div>

        </div>
    </div>

       

@endsection
