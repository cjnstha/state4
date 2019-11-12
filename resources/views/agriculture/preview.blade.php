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
                    <td>@lang('pages.agriculture.year')</td>
                    <td>2074</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.total')</td>
                    <td>17777776</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.sex') (@lang('pages.agriculture.male_pop'))</td>
                    <td>9999999</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.sex') (@lang('pages.agriculture.female_pop'))</td>
                    <td>7777777</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.cultivable')</td>
                    <td>5000</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.household_farm')</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.household_livestock') (@lang('pages.agriculture.cattle'))</td>
                    <td>1200</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.household_livestock') (@lang('pages.agriculture.buff'))</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.household_livestock') (@lang('pages.agriculture.yak'))</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.household_livestock') (@lang('pages.agriculture.sheep'))</td>
                    <td>150</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.household_livestock') (@lang('pages.agriculture.goat'))</td>
                    <td>600</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.household_livestock') (@lang('pages.agriculture.pig'))</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.irrigation') (@lang('pages.agriculture.pond'))</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.irrigation') (@lang('pages.agriculture.seasonal'))</td>
                    <td>120</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.irrigation') (@lang('pages.agriculture.perennial'))</td>
                    <td>150</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.irrigation') (@lang('pages.agriculture.tube'))</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.irrigation') (@lang('pages.agriculture.mix'))</td>
                    <td>300</td>
                </tr>
                <tr>
                    <td>@lang('pages.agriculture.irrigation') (@lang('pages.agriculture.others'))</td>
                    <td>100</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection