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
                        {{-- <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.policy_mgmt.project_name')</label>
                                <div class="">
                                    <input type="text" name="project-type" class="form-control">
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.municipality_report.mun')</label>
                                <div class="">
                                    <select class="form-control sumoSelect" multiple="">
                                        <option value="" disabled=""></option>
                                        <option value="1">Pokhara</option>
                                        <option value="2">Annapurna</option>
                                        <option value="3">Machhapuchchhre</option>
                                        <option value="4">Rupa</option>
                                        <option value="5">Madi</option>
                                        <option value="6">Gorkha</option>
                                        <option value="7">Palungtar</option>
                                        <option value="8">Sulikot</option>
                                        <option value="9">Siranchok</option>
                                        <option value="10">Dalome</option>
                                        <option value="11">Lomanthang</option>
                                        <option value="12">Myagdi</option>
                                        <option value="13">Devghat</option>
                                        <option value="14">Bandipur</option>
                                        <option value="15">Besisahar</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.municipality_report.ward')</label>
                                <div class="">
                                    <select class="form-control sumoSelect" multiple="">
                                        <option value="" disabled=""></option>
                                        <option value="1">Ward No 1</option>
                                        <option value="2">Ward No 2</option>
                                        <option value="3">Ward No 3</option>
                                        <option value="4">Ward No 4</option>
                                        <option value="5">Ward No 5</option>
                                        <option value="6">Ward No 6</option>
                                        <option value="7">Ward No 7</option>
                                        <option value="8">Ward No 8</option>
                                        <option value="9">Ward No 9</option>
                                        <option value="10">Ward No 10</option>
                                        <option value="11">Ward No 11</option>
                                        <option value="12">Ward No 12</option>
                                        <option value="13">Ward No 13</option>
                                        <option value="14">Ward No 14</option>
                                        <option value="15">Ward No 15</option>
                                        <option value="16">Ward No 16</option>
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

    <div class="x_panel filter">
            <div class="x_title">
                <h2>@lang('sidebar.budget')</h2>
                <div class="clearfix"></div>
            </div>
             <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@hasanyrole(['Admin','State User'])
                    @lang('pages.budget_mgmt.municipality_graph')
                  @endhasanyrole
                  @hasanyrole('Municipality User')
                    @lang('pages.budget_mgmt.ward_graph')
                  @endhasanyrole
                  @hasanyrole('Ward User')
                    @lang('pages.budget_mgmt.project')
                  @endhasanyrole</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @hasanyrole(['Admin','State User','Municipality User'])
                    <div id="echart_bar_horizontal" style="height:370px;"></div>
                    @endhasanyrole
                    @hasanyrole('Ward User')
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
                    @endhasanyrole

                  </div>
                </div>
              </div>


               <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('pages.budget_mgmt.sector_graph')</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_sonar" style="height:370px;"></div>

                  </div>
                </div>
              </div>
              
        <div class="x_panel">
        <div class="x_title">
           
            <ul class="nav navbar-right panel_toolbox">
                <li >
                  
                    <span>
                        <a href="{{ route('budget.create') }}" class="btn btn-primary">
                            @lang('pages.budget_mgmt.add_new')
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
                      <th>@lang('pages.budget_mgmt.municipality')</th>
                      <th>@lang('pages.budget_mgmt.ward')</th>
                      <th>@lang('labels.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pokhara</td>
                            <td>Ward No 1</td>
                            <td>
                                <a href="{{ route('budget.preview') }}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                                <a href="{{ route('budget.edit', '1')}}" class="action-btns"><i class="glyphicon glyphicon-pencil"></i> </a>
                                <a href="{{ route('budget.delete', '1' ) }}" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
        </div>          

    </div>
@endsection            