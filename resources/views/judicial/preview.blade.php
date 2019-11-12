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
                    <td>@lang('pages.judicial.mediators') (@lang('pages.judicial.male'))</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>@lang('pages.judicial.mediators') (@lang('pages.judicial.female'))</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>@lang('pages.judicial.mediators') (@lang('pages.judicial.less_15'))</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>@lang('pages.judicial.mediators') (@lang('pages.judicial.16_29'))</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>@lang('pages.judicial.mediators') (@lang('pages.judicial.30_40'))</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>@lang('pages.judicial.mediators') (@lang('pages.judicial.40_above'))</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>@lang('pages.judicial.name_of_case')</td>
                    <td>NEP001</td>
                </tr>
                <tr>
                    <td>@lang('pages.judicial.type_of_case')</td>
                    <td>civil</td>
                </tr>
                <tr>
                    <td>@lang('pages.judicial.date')</td>
                    <td>2018-10-23</td>
                </tr>
                <tr>
                    <td>@lang('pages.judicial.nature')</td>
                    <td>Serious</td>
                </tr>
                <tr>
                    <td>@lang('pages.judicial.status')</td>
                    <td>Active</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection