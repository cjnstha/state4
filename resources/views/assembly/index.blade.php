@extends('layouts.master')

@section('content')
{{-- <div class="x_panel filter">
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
</div> --}}
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('sidebar.formation_assembly')</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
                  
                    <span>
                        <a href="{{ route('assembly.create') }}" class="btn btn-primary">
                            @lang('pages.assembly.add_assembly')
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
                <th>@lang('pages.assembly.fullname')</th>
                <th>@lang('pages.assembly.designation')</th>
                <th>@lang('pages.assembly.image')</th>
                <th class="text-center">@lang('labels.action')</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Dinesh Karki</td>
                    <td>CEO (3Hammers Pvt Ltd)</td>
                    <td><a href="#">Image.jpg</a></td>
                    <td>
                        <a href="{{ route('assembly.show','1')}}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                        @include('shared._actions', [
                            'entity' => 'assembly',
                            'id' => 1
                        ])</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Baburam Kunwar</td>
                    <td>Governer (Province 4)</td>
                    <td><a href="{{ asset('images/profile_image/BaburamKunwar.jpg') }}">Image.jpg</a></td>
                    <td>
                        <a href="{{ route('assembly.show','2')}}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                        @include('shared._actions', [
                            'entity' => 'assembly',
                            'id' => 2
                        ])</td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Prithvi Subba Gurung</td>
                    <td>Chief Minister (Province 4)</td>
                    <td><a href="{{ asset('images/profile_image/PrithviSubba.JPG') }}">Image.jpg</a></td>
                    <td>
                        <a href="{{ route('assembly.show','3')}}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                        @include('shared._actions', [
                            'entity' => 'assembly',
                            'id' => 3
                        ])</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Guman Singh Aryal</td>
                    <td>Mayor (Besisahar Municipality)</td>
                    <td><a href="{{ asset('images/profile_image/guman sing ten copy.jpg') }}">Image.jpg</a></td>
                    <td>
                        <a href="{{ route('assembly.show','4')}}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                        @include('shared._actions', [
                            'entity' => 'assembly',
                            'id' => 4
                        ])</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Laxmi Adhikari</td>
                    <td>Deputy Mayor (Besisahar Municipality)</td>
                    <td><a href="{{ asset('images/profile_image/laxmi adhikari.jpg') }}">Image.jpg</a></td>
                    <td>
                        <a href="{{ route('assembly.show','5')}}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                        @include('shared._actions', [
                            'entity' => 'assembly',
                            'id' => 5
                        ])</td>
                </tr>

                <tr>
                    <td>6</td>
                    <td>Bhim Prasad Tiwari</td>
                    <td>Chief Administrative Officer (Besisahar Municipality)</td>
                    <td><a href="{{ asset('images/profile_image/bhim tiwari.jpg') }}">Image.jpg</a></td>
                    <td>
                        <a href="{{ route('assembly.show','6')}}" class="action-btns" target="_blank"> <span class="glyphicon glyphicon-eye-open"></span></a>
                        @include('shared._actions', [
                            'entity' => 'assembly',
                            'id' => 6
                        ])</td>
                </tr>

            </tbody>
        </table>
            </div>
        </div> 
</div>
@endsection        
