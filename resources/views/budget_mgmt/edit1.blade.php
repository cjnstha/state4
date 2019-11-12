@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.budget_mgmt.update_budget')</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('budget.update', '1')}}">
        		{{ csrf_field() }}
        		@hasanyrole(['Admin','State User'])
        		<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.budget_mgmt.municipality')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select class="form-control sumoSelect">
                                        <option value="">--Select--</option>
                                        <option value="1" selected>Pokhara</option>
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
                @endhasanyrole

                @hasanyrole('Municipality User')
        		<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.budget_mgmt.ward')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select class="form-control sumoSelect">
                                        <option value="">--Select--</option>
                                        <option value="1">Ward No 1</option>
                                        <option value="2" selected>Ward No 2</option>
                                        <option value="3">Ward No 3</option>
                                        <option value="4">Ward No 4</option>
                                        <option value="5">Ward No 5</option>
                                        <option value="6">Ward No 6</option>
                                        <option value="7">Ward No 7</option>
                                        <option value="8">Ward No 8</option>
                                        <option value="9">Ward No 9</option>
                                        <option value="10">Ward No 10</option>
                                        <option value="11">Ward No 11</option>
                                        <option value="12">Ward No 12</option>
                                        <option value="13">Ward No 13</option>
                                        <option value="14">Ward No 14</option>
                                        <option value="15">Ward No 15</option>
                                        <option value="16">Ward No 16</option>
                                    </select>
                        </div>
                </div>
                @endhasanyrole

                @hasanyrole('Ward User')
        		<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.budget_mgmt.municipality')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
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
                @endhasanyrole

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.budget_mgmt.sector')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select class="form-control sumoSelect" name="sector">
                            	<option value="1">Education</option>
                                <option value="2">Agriculture</option>
                                <option value="3" selected>Construction</option>
                                <option value="4">Road</option>
                                <option value="5">Electrical</option>
                            </select>
                        </div>
                </div>

                <div class="form-group">
                	<label class="control-label col-md-3 col-sm-3 col-xs-12">
                		@lang('pages.numbers.3'). @lang('pages.budget_mgmt.total_budget')
                	</label>
                	<div class="col-md-6 col-sm-7 col-xs-12">
                		<input type="number" name="budget" min="0" class="form-control" value="10000">
                	</div>
                </div>

                <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.budget_mgmt.update_budget') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('budget.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>
        	</form>	
        </div>
</div>
@endsection        	