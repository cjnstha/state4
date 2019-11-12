@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.policy_mgmt.add_new_project')</h2>
            <div class="clearfix"></div>
        </div>
        <div class="hide add_cost">
                <div class="new-field border-block">
                    <div class="row">
                    	<div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.type_cost')</label>
                                        <input type="text" name="type_of_cost" class="form-control">
                                    </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.cost')</label>
                                        <input type="text" name="cost" class="form-control">
                                    </div>
                            </div>
                    </div>
                    <div id="del_budget">
                            <a href="javascript:;" class="delete_cost red" ><i class="fa fa-trash"></i> Delete</a>
                            </div>
                </div>
        </div>  

        <div class="hide add_milestone">
        	<div class="new_field">
        					
                            
                      
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.amount')</label>
                                        <input type="text" name="designation1" class="form-control">
                                    </div>
                            </div>
                     
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.date')</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                        <input type="text" name="completion_date" class="form-control col-md-7 col-xs-12" id="datepick-all">
                                                </div>
                                            </div>
                                        </fieldset> 
                                    </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.remark')</label>
                                        <input type="text" name="c_person1" class="form-control">
                                    </div>
                            </div>

                            
                            <div id="del_payment" class="col-md-12">
                            <a href="javascript:;" class="delete_cost red" ><i class="fa fa-trash"></i> Delete</a>
                            </div>
                   
        	</div>
        </div>          	
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('policy.store') }}">
            {{ csrf_field() }}

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.policy_mgmt.project_fiscal')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="project_fiscal" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.policy_mgmt.project_code')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="project_code" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.3'). @lang('pages.policy_mgmt.project_name')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="project_name" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.4'). @lang('pages.policy_mgmt.project_location')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="row">                      
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.district')</label>
                                        <select class="form-control sumoSelect">
                                        <option value="">--Select--</option>
                                        <option value="1">Mustang</option>
                                        <option value="2">Manag</option>
                                        <option value="3">Gorkha</option>
                                        <option value="4">Myaghdi</option>
                                        <option value="5">Kaski</option>
                                        <option value="6">Lamjung</option>
                                        <option value="7">Baghlung</option>
                                        <option value="8">Parbat</option>
                                        <option value="9">Syangja</option>
                                        <option value="10">Tanahu</option>
                                        <option value="11">Nawalparasi</option>
                                    </select>
                                    </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.municipality')</label>
                                        <select class="form-control sumoSelect">
                                        <option value="">--Select--</option>
                                        <option value="1">Pokhara</option>
                                        <option value="2">Annapurna</option>
                                        <option value="3">Machhapuchchhre</option>
                                        <option value="4">Rupa</option>
                                        <option value="5">Madi</option>
                                        <option value="6">Gorkha</option>
                                        <option value="7">Palungtar</option>
                                        <option value="8">Sulikot</option>
                                        <option value="9">Siranchok</option>
                                        <option value="10">Dalome</option>
                                        <option value="11">Lomanthang</option>
                                        <option value="12">Myagdi</option>
                                        <option value="13">Devghat</option>
                                        <option value="14">Bandipur</option>
                                        <option value="15">Besisahar</option>
                                    </select>
                                    </div>
                            </div>
                            </div>
                        </div>
                </div> 

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.5'). @lang('pages.policy_mgmt.start_date')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="text" name="start_date" class="form-control col-md-7 col-xs-12" id="datepick-all">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.6'). @lang('pages.policy_mgmt.deadline')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="text" name="deadline" class="form-control col-md-7 col-xs-12" id="datepick-all">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.7'). @lang('pages.policy_mgmt.thematic')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="thematic" class="form-control">
                            	<option value="">--Select--</option>
                            	<option value="1">Women</option>
                            	<option value="2">Children</option>
                            	<option value="3">Disabled</option>
                            	<option value="">Others</option>
                            </select>
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.8'). @lang('pages.policy_mgmt.project_budget')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="div_to_append">
                            <div class="row">                      
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.type_cost')</label>
                                        <input type="text" name="type_of_cost" class="form-control">
                                    </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.cost')</label>
                                        <input type="text" name="cost" class="form-control">
                                    </div>
                            </div>
                            </div>
                        </div>
                        <div class="addmore">
                                <a href="javascript:;" class="add_budget btn btn-default btn-sm" ><i class="fa fa-plus"></i> @lang('pages.policy_mgmt.add_another') </a>
                        </div>
                        </div>
                </div> 

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.9'). @lang('pages.policy_mgmt.awarded_company')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.contractor_name')</label>
                                        <select name="contractor_id" class="form-control">
                                        	<option value="">--Select--</option>
                                        	<option value="1">Contractor A</option>
                                        	<option value="2">Contractor B</option>
                                        	<option value="3">Contractor C</option>
                                        	<option value="4">Contractor D</option>
                                        	<option value="5">Contractor E</option>
                                        </select>
                                    </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.contractor_budget')</label>
                                        <input type="text" name="contract_budget" class="form-control">
                                    </div>
                            </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.contract_signed')</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                        <input type="text" name="signed_date" class="form-control col-md-7 col-xs-12" id="datepick-all">
                                                </div>
                                            </div>
                                        </fieldset>     
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12" >
                                <div class="form-group">
                                <label class="control-label">
                                    @lang('pages.policy_mgmt.tor')
                                </label>
                                    <div class="browse input-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                <i class="fa fa-folder-open"></i>
                                                @lang('pages.labels.browse') <input type="file" name="tor" class="form-control">
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" disabled>
                                    </div>
                            </div>
                            </div>
                            </div>
                        </div>
                </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.policy_mgmt.contract_doc')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12" >
                                <div class="form-group">
                                <label class="control-label">
                                    @lang('pages.policy_mgmt.mou')
                                </label>
                                    <div class="browse input-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                <i class="fa fa-folder-open"></i>
                                                @lang('pages.labels.browse') <input type="file" name="mou" class="form-control">
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" disabled>
                                    </div>
                            </div>
                            </div>
                            </div>

                           

                            <div class="row">
                                <div class="col-md-12 col-sm-12" >
                                <div class="form-group">
                                <label class="control-label">
                                    @lang('pages.policy_mgmt.contract_doc')
                                </label>
                                    <div class="browse input-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                <i class="fa fa-folder-open"></i>
                                                @lang('pages.labels.browse') <input type="file" name="contract_document" class="form-control">
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" disabled>
                                    </div>
                            </div>
                            </div>
                            </div>


                             <div class="row">                      
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.completion')</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                        <input type="text" name="completion_date" class="form-control col-md-7 col-xs-12" id="datepick-all">
                                                </div>
                                            </div>
                                        </fieldset>     
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.project_status')</label>
                                        <select name="project_stattus" class="form-control status">
                                            <option value="">--Select--</option>
                                            <option value="1">Yet To Start</option>
                                            <option value="2">Started</option>
                                        </select>
                                    </div>
                            </div>
                            </div>

                            <div class="row percentage_complete hide">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.percentage')</label>
                                        <input type="text" name="percentage_complete" class="form-control">
                                    </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.completion_review')</label>
                                        <textarea class="form-control" name="completion_review" rows="5"></textarea>
                                    </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.remark')</label>
                                        <textarea class="form-control" name="remark" rows="5"></textarea>
                                    </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.qow')</label>
                                        <div class="radio-wrap">
                                <ul>
                                    <li>
                                        <div class="radio-group">   
                                            <input type="radio" name="qow" class="donthaveclass" id="radio-1" value="very_good">
                                            <label for="radio-1">@lang('pages.policy_mgmt.very_good')</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            <input type="radio" name="qow" class="donthaveclass" id="radio-2" value="good">
                                            <label for="radio-2">@lang('pages.policy_mgmt.good')</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            <input type="radio" name="qow" class="donthaveclass" id="radio-3" value="poor"> 
                                            <label for="radio-3">@lang('pages.policy_mgmt.poor')</label>
                                        </div>
                                    </li>
                                </ul>
                            </div> <!-- end radio-wrap -->
                                    </div>
                            </div>
                            </div>


                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.timely')</label>
                                        <div class="radio-wrap">
                                <ul>
                                    <li>
                                        <div class="radio-group">   
                                            <input type="radio" name="delivery" class="donthaveclass" id="timely_delivery-1" value="very_good">
                                            <label for="timely_delivery-1">@lang('pages.policy_mgmt.very_good')</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            <input type="radio" name="delivery" class="donthaveclass" id="timely_delivery-2" value="good">
                                            <label for="timely_delivery-2">@lang('pages.policy_mgmt.good')</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            <input type="radio" name="delivery" class="donthaveclass" id="timely_delivery-3" value="poor"> 
                                            <label for="timely_delivery-3">@lang('pages.policy_mgmt.poor')</label>
                                        </div>
                                    </li>
                                </ul>
                            </div> <!-- end radio-wrap -->
                                    </div>
                            </div>
                            </div>



                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.policy_mgmt.payment_detail')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                             <div class="row">   
                            <div class="div_apppend_pay">                  
                            
                            
                      
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.amount')</label>
                                        <input type="text" name="designation1" class="form-control">
                                    </div>
                                </div>
                     
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.date')</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                        <input type="text" name="completion_date" class="form-control col-md-7 col-xs-12" id="datepick-all">
                                                </div>
                                            </div>
                                        </fieldset> 
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.remark')</label>
                                        <input type="text" name="c_person1" class="form-control">
                                    </div>
                                </div>
                            </div> 
                            <div class="addmore col-md-12">
                                <a href="javascript:;" class="add_payment btn btn-default btn-sm" ><i class="fa fa-plus"></i> @lang('pages.policy_mgmt.milestone') </a>
                            </div>
                            </div>



                        </div>    
                    </div>  

                     




                         

                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Progress Document">
                            @lang('pages.numbers.1')@lang('pages.numbers.0'). @lang('pages.policy_mgmt.necessary_doc')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    @lang('pages.labels.browse') 
                                     <input type="file" id="fileupload" name="tmp_file[]"  class="form-control" multiple />
                                </span>
                            </label>
                            <input type="text" class="form-control" value="Mulitple Files" disabled>
                        </div>
                        <div class="recent-file-preview">
                            <div id="files_list"></div>
                            <div id="progress" class="progress hide">
                                <div class="progress-bar progress-bar-success"></div>
                            </div>
                        </div>
                      
                        </div>


    
     
    <input type="hidden" name="progress_doc_id" id="file_ids" value="" />
    
                    </div>   

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1')@lang('pages.numbers.1'). @lang('pages.policy_mgmt.amended')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="amend" class="form-control" id="amended">
                            	<option value="">--Select--</option>
                            	<option value="1">@lang('pages.policy_mgmt.yes')</option>
                            	<option value="2">@lang('pages.policy_mgmt.no')</option>
                            </select>
                        </div>

                </div>

                <div class="form-group hide amendment">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.amend') @lang('pages.policy_mgmt.date')</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                        <input type="text" name="amendate_date" class="form-control col-md-7 col-xs-12" id="datepick-all">
                                                </div>
                                            </div>
                                        </fieldset> 
                                    </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.amend') @lang('pages.policy_mgmt.amount')</label>
                                        <input type="text" name="cost" class="form-control">
                                    </div>
                            </div>
                            </div>
                        </div>
                </div>            

				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1')@lang('pages.numbers.2'). @lang('pages.policy_mgmt.priority_project')
                        </label>
                       	<div class="radio-wrap">
                                <ul>
                                    <li>
                                        <div class="radio-group">	
                                            <input type="radio" name="priority" class="donthaveclass priority" id="yes" value="yes">
                                            <label for="yes">@lang('pages.policy_mgmt.yes')</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            <input type="radio" name="priority" class="donthaveclass priority" id="no" value="no">
                                            <label for="no">@lang('pages.policy_mgmt.no')</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    <!-- end radio-wrap -->
                </div>

                <div class="form-group project_priority hide">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">

                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.policy_mgmt.priority')</label>
                                        <input type="number" name="priority_no" class="form-control" min="1" max="5">
                                    </div>
                            </div>
                            </div>
                        </div>
                </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                    @lang('pages.numbers.1')@lang('pages.numbers.3'). @lang('pages.policy_mgmt.national')
                </label>
                <div class="radio-wrap">
                    <ul>
                        <li>
                            <div class="radio-group">
                                <input type="radio" name="national" class="donthaveclass national" id="yess" value="yes">
                                <label for="yess">@lang('pages.policy_mgmt.yes')</label>
                            </div>
                        </li>
                        <li>
                            <div class="radio-group">
                                <input type="radio" name="national" class="donthaveclass national" id="noo" value="no">
                                <label for="noo">@lang('pages.policy_mgmt.no')</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

				<div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.policy_mgmt.save_project') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('policy.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>
        </form>        
</div>
@endsection        