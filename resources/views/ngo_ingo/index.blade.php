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
                                <label for="" class="control-label">@lang('pages.ngo_ingo.name')</label>
                                <div class="">
                                    <input type="text" name="project-type" class="form-control">
                                </div>
                            </div>
                        </div>



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

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.municipality_report.location')</label>
                                <div class="">
                                    <input type="text" name="ward_id" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.ngo_ingo.category')</label>
                                <div class="">   
                                <select name="category" class="form-control sumoSelect">
                                    <option value=""></option>
                                    <option value="1">NGO</option>
                                    <option value="2">INGO</option>
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.ngo_ingo.fow')</label>
                                <div class="">   
                                <select name="fow" class="form-control sumoSelect" multiple="">
                                <option value="1">@lang('pages.ngo_ingo.aware')</option>
                                <option value="2">@lang('pages.ngo_ingo.agriculture')</option>
                                <option value="3">@lang('pages.ngo_ingo.business')</option>
                                <option value="4">@lang('pages.ngo_ingo.child')</option>
                                <option value="5">@lang('pages.ngo_ingo.youth')</option>
                                <option value="6">@lang('pages.ngo_ingo.conflict')</option>
                                <option value="7">@lang('pages.ngo_ingo.peace')</option>
                                <option value="8">@lang('pages.ngo_ingo.rural')</option>
                                <option value="9">@lang('pages.ngo_ingo.culture')</option>
                                <option value="10">@lang('pages.ngo_ingo.democracy')</option>
                                <option value="11">@lang('pages.ngo_ingo.disability')</option>
                                <option value="12">@lang('pages.ngo_ingo.education')</option>
                                <option value="13">@lang('pages.ngo_ingo.environment')</option>
                                <option value="14">@lang('pages.ngo_ingo.family')</option>
                                <option value="15">@lang('pages.ngo_ingo.women')</option>
                                <option value="16">@lang('pages.ngo_ingo.charity')</option>
                                <option value="17">@lang('pages.ngo_ingo.governance')</option>
                                <option value="18">@lang('pages.ngo_ingo.health')</option>
                                <option value="19">@lang('pages.ngo_ingo.human')</option>
                                <option value="20">@lang('pages.ngo_ingo.labor')</option>
                                <option value="21">@lang('pages.ngo_ingo.law')</option>
                                <option value="22">@lang('pages.ngo_ingo.relief')</option>
                                <option value="23">@lang('pages.ngo_ingo.reconstruction')</option>
                                <option value="24">@lang('pages.ngo_ingo.migrant')</option>
                                <option value="25">@lang('pages.ngo_ingo.rehabilitation')</option>
                                <option value="26">@lang('pages.ngo_ingo.train')</option>
                                <option value="27">@lang('pages.ngo_ingo.other')</option>
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
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('sidebar.ngo')</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                  
                    <span>
                        <a href="{{ route('ngoingo.create') }}" class="btn btn-primary">
                            @lang('pages.ngo_ingo.add_ngo_ingo')
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
                <th>@lang('pages.ngo_ingo.name')</th>
                <th>@lang('pages.ngo_ingo.registration_date')</th>
                <th>@lang('pages.ngo_ingo.category')</th>
                <th>@lang('pages.ngo_ingo.fow')</th>
                <th class="text-center">@lang('labels.action')</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>NGO 1</td>
                    <td>2015-08-01</td>
                    <td>NGO</td>
                    <td>Agriculture</td>
                    <td>
                        <a href="{{ route('ngoingo.show', '1') }}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                        @include('shared._actions', [
                            'entity' => 'ngoingo',
                            'id' => 1
                        ])
                        
                    </td>
                </tr>
            </tbody>
        </table>
            </div>
        </div> 
</div>
@endsection        
