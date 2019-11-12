@extends('layouts.master')

@section('content')
<div class="x_panel">
        <div class="x_title">
            <h2>@lang('sidebar.ngo')</h2>
            <div class="clearfix"></div>
        </div>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="demo-form2" action="{{ route('ngoingo.store')}}">
            {{csrf_field()}}
        	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.1'). @lang('pages.ngo_ingo.name')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="name" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.2'). @lang('pages.ngo_ingo.registration_date')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="text" name="register_date" class="form-control col-md-7 col-xs-12" id="datepick-all">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.3'). @lang('pages.ngo_ingo.category')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="category" class="form-control sumoSelect">
                                <option value=""></option>
                                <option value="1">NGO</option>
                                <option value="2">INGO</option>
                            </select>
                        </div>
                </div>

            

                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.4'). @lang('pages.ngo_ingo.pan')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="pan" class="form-control">
                        </div>
                </div> 

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.5'). @lang('pages.ngo_ingo.fow')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="fow" class="form-control sumoSelect" multiple="">
                                <option value="1">@lang('pages.ngo_ingo.aware')</option>
                                <option value="2">@lang('pages.ngo_ingo.agriculture')</option>
                                <option value="3">@lang('pages.ngo_ingo.business')</option>
                                <option value="4">@lang('pages.ngo_ingo.child')</option>
                                <option value="5">@lang('pages.ngo_ingo.youth')</option>
                                <option value="6">@lang('pages.ngo_ingo.conflict')</option>
                                <option value="7">@lang('pages.ngo_ingo.peace')</option>
                                <option value="8">@lang('pages.ngo_ingo.rural')</option>
                                <option value="9">@lang('pages.ngo_ingo.culture')</option>
                                <option value="10">@lang('pages.ngo_ingo.democracy')</option>
                                <option value="11">@lang('pages.ngo_ingo.disability')</option>
                                <option value="12">@lang('pages.ngo_ingo.education')</option>
                                <option value="13">@lang('pages.ngo_ingo.environment')</option>
                                <option value="14">@lang('pages.ngo_ingo.family')</option>
                                <option value="15">@lang('pages.ngo_ingo.women')</option>
                                <option value="16">@lang('pages.ngo_ingo.charity')</option>
                                <option value="17">@lang('pages.ngo_ingo.governance')</option>
                                <option value="18">@lang('pages.ngo_ingo.health')</option>
                                <option value="19">@lang('pages.ngo_ingo.human')</option>
                                <option value="20">@lang('pages.ngo_ingo.labor')</option>
                                <option value="21">@lang('pages.ngo_ingo.law')</option>
                                <option value="22">@lang('pages.ngo_ingo.relief')</option>
                                <option value="23">@lang('pages.ngo_ingo.reconstruction')</option>
                                <option value="24">@lang('pages.ngo_ingo.migrant')</option>
                                <option value="25">@lang('pages.ngo_ingo.rehabilitation')</option>
                                <option value="26">@lang('pages.ngo_ingo.train')</option>
                                <option value="27">@lang('pages.ngo_ingo.other')</option>
                            </select>
                        </div>
                </div>

                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.6'). @lang('pages.ngo_ingo.working')
                        </label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">                   
                            
                            
                      
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.ngo_ingo.mun')</label>
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
                     
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.ngo_ingo.ward')</label>
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

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">@lang('pages.ngo_ingo.location')</label>
                                        <input type="text" name="c_1" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        @lang('pages.numbers.7'). @lang('pages.ngo_ingo.social_welfare')
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select class="form-control sumoSelect">
                                <option value=""></option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                </div> 


                      	

				<div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success submitBtn">@lang('pages.ngo_ingo.save_ngo_ingo') <span class="loading hide"><i class="fa fa-spinner fa-spin"></i></span></button>
                            <a href="{{ route('ngoingo.index') }}" class="btn btn-danger">@lang('pages.labels.cancel')</a>
                        </div>
                    </div>
                </div>
        
        </form>	
</div>
@endsection        