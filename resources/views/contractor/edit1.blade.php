@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.contractor_management.add_new_contractor')</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="hide add_past">
                <div class="new-field border-block">
                    <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.ministry_province_municipality_sectorname')</label>
                                        <input type="text" name="past_name" class="form-control">
                                    </div>
                            </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.project_name')</label>
                                        <input type="text" name="project_name" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.project_brief')</label>
                                        <textarea name="project_brief" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.start_date')</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                        <input type="text" name="start_date" class="form-control col-md-7 col-xs-12 datepick">
                                                </div>
                                            </div>
                                        </fieldset>     
                                    </div>
                                </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.end_date')</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                        <input type="text" name="end_date" class="form-control col-md-7 col-xs-12 datepick" id="datepick-all">
                                                </div>
                                            </div>
                                        </fieldset>     
                                    </div>
                                </div>
                            </div>

                            <div id="del_past">
                            <a href="javascript:;" class="delete_past_experience red" ><i class="fa fa-trash"></i> @lang('pages.labels.delete')</a>
                            </div>
                </div>
            </div>


            <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('contractor.update', '1')}}">
                {{ csrf_field() }}
                {{Form::hidden('_method', 'patch')}}

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.contractor_management.contractor_code')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="c_code" class="form-control" value="Company 1">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.contractor_management.contractor_company_detail')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.company_name')</label>
                                        <input type="text" name="company_name" class="form-control" value="ABC Company">
                                    </div>
                            </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.address')</label>
                                        <input type="text" name="address" class="form-control" value="Kusunti">
                                    </div>
                                </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.company_established')</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                        <input type="text" name="established" class="form-control col-md-7 col-xs-12" id="datepick-all" value="2010-01-02">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">                      
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.contact_person')</label>
                                        <input type="text" name="c_person1" class="form-control" value="Yojan Shrestha">
                                    </div>
                                </div>
                            
                      
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.designation')</label>
                                        <input type="text" name="designation1" class="form-control" value="Developer">
                                    </div>
                                </div>
                     
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.mobile')</label>
                                        <input type="text" name="mobile1" class="form-control" value="9841028736">
                                    </div>
                                </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.another_contact_person')</label>
                                        <input type="text" name="c_person2" class="form-control" value="Dinesh Karki">
                                    </div>
                                </div>
                            
                      
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.designation')</label>
                                        <input type="text" name="designation2" class="form-control" value="CEO">
                                    </div>
                                </div>
                     
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.mobile')</label>
                                        <input type="text" name="mobile2" class="form-control" value="9841073645">
                                    </div>
                                </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.landline_number')</label>
                                        <input type="text" name="landline" class="form-control" value="01-5543658">
                                    </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.email_address')</label>
                                        <input type="text" name="email" class="form-control" value="abc@gmail.com">
                                    </div>
                            </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.pan')</label>
                                        <input type="text" name="pan" class="form-control" value="393-84748-323">
                                    </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.vat')</label>
                                        <input type="text" name="vat" class="form-control" value="7393-84-33">
                                    </div>
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12" >
                                <div class="form-group">
                                <label class="control-label">
                                    @lang('pages.contractor_management.register_certificate')
                                </label>
                                    <div class="browse input-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                <i class="fa fa-folder-open"></i>
                                                @lang('pages.labels.browse') <input type="file" name="register_certificate" class="form-control">
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
                                    @lang('pages.contractor_management.pan_registration')
                                </label>
                                    <div class="browse input-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                <i class="fa fa-folder-open"></i>
                                                @lang('pages.labels.browse') <input type="file" name="pan_registration" class="form-control">
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
                                    @lang('pages.contractor_management.tax_clearance')
                                </label>
                                    <div class="browse input-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                <i class="fa fa-folder-open"></i>
                                                @lang('pages.labels.browse') <input type="file" name="tax_clearance" class="form-control">
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
                                    @lang('pages.contractor_management.audit_report')
                                </label>
                                    <div class="browse input-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                <i class="fa fa-folder-open"></i>
                                                @lang('pages.labels.browse') <input type="file" name="audit_report" class="form-control">
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
                                    @lang('pages.contractor_management.profile')    
                                </label>
                                    <div class="browse input-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                <i class="fa fa-folder-open"></i>
                                                @lang('pages.labels.browse') <input type="file" name="profile" class="form-control">
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
                        @lang('pages.numbers.3'). @lang('pages.contractor_management.expertise')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="checkbox-wrap">
                                <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="checkbox checkbox-primary">
                                                
                                                <input id="building_construction" type="checkbox" name="building" value="1" checked>
                                    
                                                <label for="building_construction">@lang('pages.contractor_management.building_construction')</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="checkbox checkbox-primary">
                                                
                                                <input id="bridge_construction" type="checkbox" name="bridge" value="2" checked>
                                    
                                                <label for="bridge_construction">@lang('pages.contractor_management.bridge_construction')</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="checkbox checkbox-primary">
                                                
                                                <input id="road_construction" type="checkbox" name="road" value="3">
                                    
                                                <label for="road_construction">@lang('pages.contractor_management.road_construction')</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="checkbox checkbox-primary">
                                                
                                                <input id="etc" type="checkbox" name="etc" value="4">
                                    
                                                <label for="etc">@lang('pages.contractor_management.etc')</label>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.4'). @lang('pages.contractor_management.past_experience')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="div_to_append border-block">
                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.ministry_province_municipality_sectorname')</label>
                                        <input type="text" name="past_name" class="form-control" value="Nepal Government">
                                    </div>
                            </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.project_name')</label>
                                        <input type="text" name="project_name" class="form-control" value="Project 1">
                                    </div>
                                </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.project_brief')</label>
                                        <textarea name="project_brief" class="form-control" rows="5">Project was for rural development.</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.start_date')</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                        <input type="text" name="start_date" class="form-control col-md-7 col-xs-12" id="datepick-all" value="2011-01-03">
                                                </div>
                                            </div>
                                        </fieldset>     
                                    </div>
                                </div>
                            </div>

                            <div class="row">                      
                            <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.contractor_management.end_date')</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                        <input type="text" name="end_date" class="form-control col-md-7 col-xs-12" id="datepick-all" value="2015-01-03">
                                                </div>
                                            </div>
                                        </fieldset>     
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="addmore">
                                <a href="javascript:;" class="add_past_experience btn btn-default btn-sm" ><i class="fa fa-plus"></i> @lang('pages.labels.add_another') </a>
                            </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.5'). @lang('pages.contractor_management.past_performance')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select class="form-control" name="p_performance">
                                <option value="">@lang('pages.labels.dropdown_select')</option>
                                <option value="1">@lang('pages.contractor_management.dropdown.below_average')</option>
                                <option selected value="2" >@lang('pages.contractor_management.dropdown.average')</option>
                                <option value="3">@lang('pages.contractor_management.dropdown.above_average')</option>
                            </select>
                        </div>
                    </div>       


                </div> 

                <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.contractor_management.update_contractor') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('contractor.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>

@endsection