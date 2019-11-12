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
                    <td>@lang('pages.hdi.year')</td>
                    <td>2075</td>
                </tr>
                <tr>
                    <td>@lang('pages.hdi.hdi')</td>
                    <td>0.44</td>
                </tr>
                <tr>
                    <td>@lang('pages.hdi.life_birth')</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>@lang('pages.hdi.expect_school')</td>
                    <td>+12</td>
                </tr>
                <tr>
                    <td>@lang('pages.hdi.mean_school')</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>@lang('pages.hdi.gni')</td>
                    <td>100000</td>
                </tr>
                <tr>
                    <td>@lang('pages.hdi.gni_hdi')</td>
                    <td>22</td>
                </tr>
                <tr>
                    <td>@lang('pages.hdi.rank')</td>
                    <td>144</td>
                </tr>
                <tr>
                    <td>@lang('pages.hdi.poverty')</td>
                    <td>23</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection