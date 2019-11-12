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
                    <td>@lang('pages.economic.year')</td>
                    <td>2074</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.total_employ')</td>
                    <td>3.40</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.employ_sex') (@lang('pages.economic.male_employ'))</td>
                    <td>3.40</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.employ_sex') (@lang('pages.economic.female_employ'))</td>
                    <td>3.40</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.total_unemploy')</td>
                    <td>1.99</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.male_unemploy')</td>
                    <td>1.45</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.female_unemploy')</td>
                    <td>2.1</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.employ_status') (@lang('pages.economic.agriculture'))</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.employ_status') (@lang('pages.economic.manufacturing'))</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.employ_status') (@lang('pages.economic.construction'))</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.employ_status') (@lang('pages.economic.transport'))</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.employ_status') (@lang('pages.economic.accomodation'))</td>
                    <td>5000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.employ_status') (@lang('pages.economic.administration'))</td>
                    <td>4000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.employ_status') (@lang('pages.economic.education'))</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.employ_status') (@lang('pages.economic.others'))</td>
                    <td>6000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.foreign')</td>
                    <td>10000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.migration_sex') (@lang('pages.economic.migration_male'))</td>
                    <td>7000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.migration_sex') (@lang('pages.economic.migration_female'))</td>
                    <td>3000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.migration_age') (@lang('pages.economic.age_0_14'))</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.migration_age') (@lang('pages.economic.age_15_25'))</td>
                    <td>6000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.migration_age') (@lang('pages.economic.age_26_35'))</td>
                    <td>3000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.migration_age') (@lang('pages.economic.age_36_above'))</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.countries') (@lang('pages.economic.india'))</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.countries') (@lang('pages.economic.china'))</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.countries') (@lang('pages.economic.dubai'))</td>
                    <td>3000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.countries') (@lang('pages.economic.qatar'))</td>
                    <td>3000</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.countries') (@lang('pages.economic.usa'))</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.countries') (@lang('pages.economic.canada'))</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.countries') (@lang('pages.economic.aus'))</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>@lang('pages.economic.countries') (@lang('pages.economic.other'))</td>
                    <td>300</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection