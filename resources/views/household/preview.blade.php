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
                    <td>@lang('pages.household.year')</td>
                    <td>2074</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.total')</td>
                    <td>10000</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.average')</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.drink_water') (@lang('pages.household.access_water'))</td>
                    <td>8000</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.drink_water') (@lang('pages.household.no_access_water'))</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.source_water') (@lang('pages.household.pipe'))</td>
                    <td>5000</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.source_water') (@lang('pages.household.tube'))</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.source_water') (@lang('pages.household.sprout'))</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.source_water') (@lang('pages.household.uncovered'))</td>
                    <td>600</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.source_water') (@lang('pages.household.covered'))</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.source_water') (@lang('pages.household.river'))</td>
                    <td>800</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.source_water') (@lang('pages.household.other'))</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.source_water') (@lang('pages.household.not_stated'))</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.toilet_facility') (@lang('pages.household.flush'))</td>
                    <td>5000</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.toilet_facility') (@lang('pages.household.ordinary'))</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.toilet_facility') (@lang('pages.household.no_toilet'))</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.toilet_facility') (@lang('pages.household.not_stated'))</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.access_electricity') (@lang('pages.household.access_elec'))</td>
                    <td>9000</td>
                </tr>
                <tr>
                    <td>@lang('pages.household.access_electricity') (@lang('pages.household.no_access_elec'))</td>
                    <td>1000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection