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
            		<td>@lang('pages.decision_progress.decision')</td>
            		<td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</td>
            	</tr>
            	<tr>
            		<td>@lang('pages.decision_progress.progress')</td>
            		<td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</td>
            	</tr>
            	<tr>
            		<td>@lang('pages.decision_progress.status')</td>
            		<td>Ongoing</td>
            	</tr>
            </tbody>
        </table>
    </div>
</div>
@endsection        	
