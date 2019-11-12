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
                    <td>@lang('pages.policy_mgmt.project_fiscal')</td>
                    <td>2074/2075</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.project_code')</td>
                    <td>BSM001</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.project_name')</td>
                    <td>Sera Buspark Construction</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.project_location') (@lang('pages.policy_mgmt.district'))</td>
                    <td>Lamjung</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.project_location') (@lang('pages.policy_mgmt.municipality'))</td>
                    <td>Besisahar</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.start_date')</td>
                    <td>2018-09-11</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.deadline')</td>
                    <td>2019-09-11</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.thematic')</td>
                    <td>Others</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.project_budget') (@lang('pages.policy_mgmt.type_cost'))</td>
                    <td>Construction</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.project_budget') (@lang('pages.policy_mgmt.cost'))</td>
                    <td>4200000</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.contractor_name')</td>
                    <td>Contractor B</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.contractor_budget')</td>
                    <td>3500000</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.contract_signed')</td>
                    <td>2018-08-12</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.tor')</td>
                    <td></td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.contract_doc')</td>
                    <td></td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.mou')</td>
                    <td></td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.completion')</td>
                    <td>2019-05-11</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.project_status')</td>
                    <td>Yet To Start</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.completion_review')</td>
                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.remark')</td>
                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.qow')</td>
                    <td>@lang('pages.policy_mgmt.very_good')</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.timely')</td>
                    <td>@lang('pages.policy_mgmt.very_good')</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.payment_detail') (@lang('pages.policy_mgmt.amount'))</td>
                    <td>999</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.payment_detail') (@lang('pages.policy_mgmt.date'))</td>
                    <td>2018-12-12</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.payment_detail') (@lang('pages.policy_mgmt.remark'))</td>
                    <td>First Down Payment</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.necessary_doc')</td>
                    <td></td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.amended')</td>
                    <td>@lang('pages.policy_mgmt.no')</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.priority_project')</td>
                    <td>@lang('pages.policy_mgmt.no')</td>
                </tr>
                <tr>
                    <td>@lang('pages.policy_mgmt.national')</td>
                    <td>No</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection