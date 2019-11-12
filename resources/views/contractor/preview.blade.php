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
                    <td>@lang('pages.contractor_management.contractor_code')</td>
                    <td>Company 1</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.company_name')</td>
                    <td>ABC Company</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.address')</td>
                    <td>Kusunti</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.company_established')</td>
                    <td>2010-01-02</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.contact_person') / @lang('pages.contractor_management.designation') / @lang('pages.contractor_management.mobile')</td>
                    <td>Yojan Shrestha / Developer / 9841028736</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.another_contact_person') / @lang('pages.contractor_management.designation') / @lang('pages.contractor_management.mobile')</td>
                    <td>Dinesh Karki / CEO / 9841073645</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.landline_number')</td>
                    <td>01-5543658</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.email_address')</td>
                    <td>abc@gmail.com</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.pan')</td>
                    <td>393-84748-323</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.vat')</td>
                    <td>7393-84-33</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.register_certificate')</td>
                    <td></td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.pan_registration')</td>
                    <td></td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.tax_clearance')</td>
                    <td></td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.audit_report')</td>
                    <td></td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.profile')</td>
                    <td></td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.expertise')</td>
                    <td>@lang('pages.contractor_management.building_construction') | @lang('pages.contractor_management.bridge_construction')</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.past_experience') (@lang('pages.contractor_management.ministry_province_municipality_sectorname'))</td>
                    <td>Nepal Government</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.past_experience') (@lang('pages.contractor_management.project_name'))</td>
                    <td>Project 1</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.past_experience') (@lang('pages.contractor_management.project_brief'))</td>
                    <td>Project was for rural development.</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.past_experience') (@lang('pages.contractor_management.start_date'))</td>
                    <td>2011-01-03</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.past_experience') (@lang('pages.contractor_management.end_date'))</td>
                    <td>2015-01-03</td>
                </tr>
                <tr>
                    <td>@lang('pages.contractor_management.past_performance')</td>
                    <td>@lang('pages.contractor_management.dropdown.average')</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection