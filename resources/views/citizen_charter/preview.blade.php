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
                    <td>@lang('pages.citizen_charter.municipality')</td>
                    <td>Besisahar Municipality</td>
                </tr>
                <tr>
                    <td>@lang('pages.citizen_charter.ward')</td>
                    <td>Ward No 2</td>
                </tr>
                <tr>
                    <td>@lang('pages.citizen_charter.file_upload')</td>
                    <td></td>
                </tr>
            </tbody>
         </table>
    </div>
</div>
@endsection            