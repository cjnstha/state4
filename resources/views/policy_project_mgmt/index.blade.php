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
                                <label for="" class="control-label">@lang('pages.policy_mgmt.district')</label>
                                <div class="">
                                    <select class="form-control sumoSelect" multiple="">
                                        <option value="1">Mustang</option>
                                        <option value="2">Manag</option>
                                        <option value="3">Gorkha</option>
                                        <option value="4">Myaghdi</option>
                                        <option value="5">Kaski</option>
                                        <option value="6">Lamjung</option>
                                        <option value="7">Baghlung</option>
                                        <option value="8">Parbat</option>
                                        <option value="9">Syangja</option>
                                        <option value="10">Tanahu</option>
                                        <option value="11">Nawalparasi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">@lang('pages.municipality_report.mun')</label>
                                <div class="">
                                    <select class="form-control sumoSelect" multiple="">
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
                                <label for="" class="control-label">@lang('pages.policy_mgmt.national')</label>
                                <div class="">
                                    <select name="national" class="form-control sumoSelect">
                                        <option value="" selected disabled>Select Here</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
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
            <h2>@lang('sidebar.policy_project')</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                  
                    <span>
                        <a href="{{ route('policy.create') }}" class="btn btn-primary">
                            @lang('pages.policy_mgmt.add_new_project')
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
                <th>@lang('labels.id')</th>
                <th>@lang('pages.policy_mgmt.project_code')</th>
                <th>@lang('pages.policy_mgmt.project_name')</th>
                <th>@lang('pages.policy_mgmt.project_location')</th>
                <th>@lang('pages.policy_mgmt.project_budget')</th>
                <th>@lang('pages.policy_mgmt.awarded')</th>
                <th>@lang('pages.policy_mgmt.national')</th>
                <th class="text-center">@lang('labels.action')</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><a href="{{ route('policy.preview', '1') }}">MGD001</a></td>
                    <td>Facilities to improve tourist accomodation in the region</td>
                    <td>Pokhara, Kaski</td>
                    <td>100000</td>
                    <td>ABC Company</td>
                    <td>Yes</td>
                    <td>
                        <a href="{{ route('policy.preview' ,'1') }}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                         <a href="{{ route('policy.edit', '1')  }}" class="action-btns"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="{{ route('policy.destroy', '1')  }}" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><a href="{{ route('policy.preview', '2') }}">BSM001</a></td>
                    <td>Sera Buspark Construction</td>
                    <td>Besishara, Lamjung</td>
                    <td>42,00,000</td>
                    <td>XYZ Company</td>
                    <td>No</td>
                    <td>
                        <a href="{{ route('policy.preview', '2') }}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                         <a href="{{ route('policy.edit', '2')  }}" class="action-btns"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="{{ route('policy.destroy', '2')  }}" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><a href="{{ route('policy.preview', '3') }}">BSM002</a></td>
                    <td>Black topping of road from Highschool avenue till Ringroad junction</td>
                    <td>Besisahar, Lamjung</td>
                    <td>25,00,000</td>
                    <td>QWERTY Company</td>
                    <td>No</td>
                    <td>
                        <a href="{{ route('policy.preview', '3') }}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                         <a href="{{ route('policy.edit', '3')  }}" class="action-btns"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="{{ route('policy.destroy', '3')  }}" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            </tbody>
        </table>
            </div>
        </div>  
</div>       
@endsection