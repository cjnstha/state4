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
                    <td>@lang('pages.health.year')</td>
                    <td>2074</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.birth_rate')</td>
                    <td>3.4</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.infant_rate')</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.maternal_rate')</td>
                    <td>6</td>
                </tr>
                 <tr>
                    <td>@lang('pages.health.cause_maternal') (@lang('pages.health.postpartum'))</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_maternal') (@lang('pages.health.high_bp'))</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_maternal') (@lang('pages.health.termination'))</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_maternal') (@lang('pages.health.pulmonary'))</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_maternal') (@lang('pages.health.direct'))</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_maternal') (@lang('pages.health.indirect'))</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.fertility')</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.life_exp')</td>
                    <td>70</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.nutritional') (@lang('pages.health.shunt'))</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.nutritional') (@lang('pages.health.percentage'))</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.major_disease') (@lang('pages.health.hiv'))</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.major_disease') (@lang('pages.health.malaria'))</td>
                    <td>300</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.major_disease') (@lang('pages.health.tuberculosis'))</td>
                    <td>300</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.various_disease') (@lang('pages.health.hiv'))</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.various_disease') (@lang('pages.health.malaria'))</td>
                    <td>300</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.various_disease') (@lang('pages.health.tuberculosis'))</td>
                    <td>300</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.various_disease') (@lang('pages.health.viral'))</td>
                    <td>250</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.various_disease') (@lang('pages.health.cancer'))</td>
                    <td>350</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.various_disease') (@lang('pages.health.others'))</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.tobacco_sex') (@lang('pages.health.male'))</td>
                    <td>1200</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.tobacco_sex') (@lang('pages.health.female'))</td>
                    <td>800</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.tobacco_adult') (@lang('pages.health.age_20_25'))</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.tobacco_adult') (@lang('pages.health.age_26_30'))</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.tobacco_adult') (@lang('pages.health.age_31_35'))</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.tobacco_adult') (@lang('pages.health.age_36_above'))</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.tobacco_teen') (@lang('pages.health.age_13_15'))</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.tobacco_teen') (@lang('pages.health.age_15_17'))</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.tobacco_teen') (@lang('pages.health.age_17_19'))</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_death') (@lang('pages.health.old_age'))</td>
                    <td>800</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_death') (@lang('pages.health.cardio'))</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_death') (@lang('pages.health.cancer'))</td>
                    <td>120</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_death') (@lang('pages.health.respiratory'))</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_death') (@lang('pages.health.diabetes'))</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_death') (@lang('pages.health.hiv'))</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_death') (@lang('pages.health.accidents'))</td>
                    <td>150</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_death') (@lang('pages.health.natural'))</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_death') (@lang('pages.health.homicides'))</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.cause_death') (@lang('pages.health.others'))</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.health_ins') (@lang('pages.health.government'))</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.health_ins') (@lang('pages.health.private'))</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.health_ins') (@lang('pages.health.phcc'))</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.health_ins') (@lang('pages.health.hp'))</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.health_ins') (@lang('pages.health.shp'))</td>
                    <td>300</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.beds')</td>
                    <td>3500</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.pathology')</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>@lang('pages.health.radiology')</td>
                    <td>20</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection