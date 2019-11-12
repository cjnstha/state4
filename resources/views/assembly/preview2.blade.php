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
                    <td>@lang('pages.assembly.fullname')</td>
                    <td>Baburam Kunwar</td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.designation')</td>
                    <td>Governer</td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.sex')</td>
                    <td>Male</td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.mobile_number')</td>
                    <td>NA</td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.email_address')</td>
                    <td>NA</td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.municipality')</td>
                    <td></td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.ward')</td>
                    <td></td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.image')</td>
                    <td><a href="{{ asset('images/profile_image/BaburamKunwar.jpg') }}">Image.jpg</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection