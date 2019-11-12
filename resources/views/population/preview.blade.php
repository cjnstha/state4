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
                    <td>@lang('pages.population.year')</td>
                    <td>2074</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.total_pop')</td>
                    <td>10000</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.sex_wise') (@lang('pages.population.male'))</td>
                    <td>6000</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.sex_wise') (@lang('pages.population.female'))</td>
                    <td>4000</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.age_wise') (@lang('pages.population.median_age'))</td>
                    <td>30</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.age_wise') (@lang('pages.population.youth'))</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.age_wise') (@lang('pages.population.adult'))</td>
                    <td>6000</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.age_wise') (@lang('pages.population.aged'))</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.caste_wise') (@lang('pages.population.caste_1'))</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.caste_wise') (@lang('pages.population.caste_2'))</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.caste_wise') (@lang('pages.population.caste_3'))</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.caste_wise') (@lang('pages.population.caste_4'))</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.caste_wise')(@lang('pages.population.caste_5'))</td>
                    <td>2000</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.disability_wise') (@lang('pages.population.physical'))</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.disability_wise') (@lang('pages.population.visual'))</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.disability_wise') (@lang('pages.population.hearing'))</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.disability_wise') (@lang('pages.population.deaf_blind'))</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.disability_wise') (@lang('pages.population.mental'))</td>
                    <td>25</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.disability_wise') (@lang('pages.population.intellectual'))</td>
                    <td>60</td>
                </tr>
                <tr>
                    <td>@lang('pages.population.disability_wise') (@lang('pages.population.multiple'))</td>
                    <td>5</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection