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
                    <td>Dinesh Karki</td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.designation')</td>
                    <td>Chief Administrative Officer</td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.sex')</td>
                    <td>Male</td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.mobile_number')</td>
                    <td>9856009111</td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.email_address')</td>
                    <td>bptiwari45@gmail.com</td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.municipality')</td>
                    <td>Besisahar Municipality</td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.ward')</td>
                    <td></td>
                </tr>
                <tr>
                    <td>@lang('pages.assembly.image')</td>
                    <td><a href="{{ asset('images/profile_image/bhim tiwari.jpg') }}">Image.jpg</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection