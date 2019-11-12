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
                    <td>@lang('pages.education.year')</td>
                    <td>2074</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.total')</td>
                    <td>46</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.literacy_sex') (@lang('pages.education.literate') (@lang('pages.education.male')))</td>
                    <td>700</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.literacy_sex') (@lang('pages.education.literate') (@lang('pages.education.female')))</td>
                    <td>700</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.literacy_sex') (@lang('pages.education.illiterate') (@lang('pages.education.male')))</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.literacy_sex') (@lang('pages.education.illiterate') (@lang('pages.education.female')))</td>
                    <td>150</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.literacy_sex') (@lang('pages.education.read') (@lang('pages.education.male')))</td>
                    <td>310</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.literacy_sex') (@lang('pages.education.read') (@lang('pages.education.female')))</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.literacy_sex') (@lang('pages.education.not_mentioned') (@lang('pages.education.male')))</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.literacy_sex') (@lang('pages.education.not_mentioned') (@lang('pages.education.female')))</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.below_slc') (@lang('pages.education.male')))</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.below_slc') (@lang('pages.education.female')))</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.slc') (@lang('pages.education.male')))</td>
                    <td>150</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.slc') (@lang('pages.education.female')))</td>
                    <td>300</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.intermediate') (@lang('pages.education.male')))</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.intermediate') (@lang('pages.education.female')))</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.non_formal') (@lang('pages.education.male')))</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.non_formal') (@lang('pages.education.female')))</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.graduate') (@lang('pages.education.male')))</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.graduate') (@lang('pages.education.female')))</td>
                    <td>150</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.post_grad') (@lang('pages.education.male')))</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.post_grad') (@lang('pages.education.female')))</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.not_stated') (@lang('pages.education.male')))</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.distribution') (@lang('pages.education.not_stated') (@lang('pages.education.female')))</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.list') (@lang('pages.education.community'))</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>@lang('pages.education.list') (@lang('pages.education.institutional'))</td>
                    <td>50</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection