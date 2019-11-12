@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('pages.assembly.add_assembly')</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('assembly.update', '1') }}">
                {{ csrf_field() }}
                {{Form::hidden('_method', 'patch')}}
        		<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.assembly.fullname')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                           <input type="text" name="name" class="form-control" value="Guman Singh Aryal">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.assembly.designation')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                           <input type="text" name="designation" class="form-control" value="Mayor">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.3'). @lang('pages.assembly.sex')
                        </label>
                       	<div class="radio-wrap">
                                <ul>
                                    <li>
                                        <div class="radio-group">	
                                            <input type="radio" name="sex" class="donthaveclass priority" id="male" value="male" checked>
                                            <label for="male">@lang('pages.assembly.dropdown.male')</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            <input type="radio" name="sex" class="donthaveclass priority" id="female" value="female">
                                            <label for="female">@lang('pages.assembly.dropdown.female')</label>
                                        </div>
                                    </li>
                                </ul>
                            </div> <!-- end radio-wrap -->
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.4'). @lang('pages.assembly.mobile_number')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                           <input type="text" name="mobile" class="form-control" value="9856046510">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.5'). @lang('pages.assembly.email_address')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                           <input type="text" name="email" class="form-control" value="gumansingh98@gmail.com">
                        </div>
                </div>

                {{-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.6'). @lang('pages.assembly.state')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select class="form-control" name="state">
                            	<option value="">@lang('pages.labels.dropdown_select')</option>
                            	<option value="1">@lang('pages.assembly.dropdown.state_1')</option>
                            	<option selected value="2">@lang('pages.assembly.dropdown.state_2')</option>
                            </select>
                        </div>
                </div> --}}

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.6'). @lang('pages.assembly.municipality')
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
                                        <option value="15" selected>Besisahar</option>
                                    </select>
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.7'). @lang('pages.assembly.ward')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select class="form-control sumoSelect">
                                        <option value="">--Select--</option>
                                        <option value="1">Ward No 1</option>
                                        <option value="2">Ward No 2</option>
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

                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
									@lang('pages.numbers.8'). @lang('pages.assembly.image') 
								</label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="browse input-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                <i class="fa fa-folder-open"></i>
                                                @lang('pages.labels.browse') <input type="file" name="file_upload" class="form-control">
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" disabled>
                                    </div>
                                    </div>
                </div>

                <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.assembly.update_assembly') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('assembly.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>
        	</form>
        </div>
</div>
@endsection 