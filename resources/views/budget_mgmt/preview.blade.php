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
                    <td>@lang('pages.budget_mgmt.municipality')</td>
                    <td>Pokhara</td>
                </tr>
                <tr>
                    <td>@lang('pages.budget_mgmt.sector')</td>
                    <td>Construction</td>
                </tr>
                <tr>
                    <td>@lang('pages.budget_mgmt.total_budget')</td>
                    <td>10000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection