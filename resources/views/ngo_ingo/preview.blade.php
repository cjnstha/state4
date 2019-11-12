@extends('layouts.master')
@section('content')
<div class="x_panel">
  <div class="x_title">
    </div>
    <div class="x_content">
    	 <table id="edit_detail_datatable" class="table table-striped table-bordered display table_edit_data">
            <thead >
            	<tr>
            		<th>@lang('labels.title')</th>
                    <th>@lang('labels.values')</th>
            	</tr>
            </thead>
            <tbody>
                <tr>
                    <td>@lang('pages.ngo_ingo.name')</td>
                    <td>CSO 123</td>
                </tr>
                <tr>
                    <td>@lang('pages.ngo_ingo.registration_date')</td>
                    <td>2018-10-28</td>
                </tr>
                <tr>
                    <td>@lang('pages.ngo_ingo.category')</td>
                    <td>NGO</td>
                </tr>
                <tr>
                    <td>@lang('pages.ngo_ingo.pan')</td>
                    <td>78-567-1234</td>
                </tr>
                <tr>
                    <td>@lang('pages.ngo_ingo.fow')</td>
                    <td>Agriculture</td>
                </tr>
                <tr>
                    <td>@lang('pages.ngo_ingo.working') (@lang('pages.ngo_ingo.mun'))</td>
                    <td>Besisahar</td>
                </tr>
                <tr>
                    <td>@lang('pages.ngo_ingo.working') (@lang('pages.ngo_ingo.ward'))</td>
                    <td>Ward No 2</td>
                </tr>
                <tr>
                    <td>@lang('pages.ngo_ingo.working') (@lang('pages.ngo_ingo.location'))</td>
                    <td>Tole 2</td>
                </tr>
                <tr>
                    <td>@lang('pages.ngo_ingo.social_welfare')</td>
                    <td>Yes</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection