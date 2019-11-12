@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New SIP</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">


                <div class="hide add_result_outcome">
                    <div class="new-field">
                    {!! Form::text('major_result_outcome[]', null ,['class' => 'form-control','required'] ) !!}

                    <div id="del_input">
                        <span class="glyphicon glyphicon-trash"></span>
                    </div>
                     
                    </div>
                </div>  

                <div class="hide add_learn_activities">
                    <div class="new-field">
                    {!! Form::text('major_learn_act[]', null ,['class' => 'form-control','required'] ) !!}

                    <div id="del_input">
                        <span class="glyphicon glyphicon-trash"></span>
                    </div>
                     
                    </div>
                </div>  


                <div class="hide add_quote_participant">
                
                    <div class="new-field border-block ">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                   {!! Form::label('Participant-Name','Participants Name',array('class'=>'control-label')) !!}
                                                    {!! Form::text('quote_part_name[]', null ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                   {!! Form::label('profession','Profession',array('class'=>'control-label')) !!}
                                                    {!! Form::text('quote_part_profession[]', null ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                     {!! Form::label('organization','Organization',array('class'=>'control-label')) !!}
                                                    {!! Form::text('quote_part_organization[]', null ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('address','Address',array('class'=>'control-label')) !!}
                                    {!! Form::text('quote_part_address[]', null ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                     {!! Form::label('Quotes','Quotes',array('class'=>'control-label')) !!}
                                    {!! Form::textarea('part_quotes[]', null ,['class' => 'form-control','size'=>'10x2'] ) !!}
                                </div>
                            </div>
                        </div>
                        
                        <div id="del_input">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </div>
                    </div>
                </div>


                <div class="hide add_followup_action_plan">
                
                    <div class="new-field border-block ">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                   {!! Form::label('What','What',array('class'=>'control-label')) !!}
                                    <input  type="text"  name="followup_action_plan_what[]" class="form-control"  value="">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                   {!! Form::label('When','When',array('class'=>'control-label')) !!}
                                    <input  type="text"  name="followup_action_plan_when[]" class="form-control"  value="">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                     {!! Form::label('Where','Where',array('class'=>'control-label')) !!}
                                      <input  type="text"  name="followup_action_plan_where[]" class="form-control"  value="">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('who','Who',array('class'=>'control-label')) !!}
                                   <input  type="text"  name="followup_action_plan_who[]" class="form-control"  value="">
                                </div>
                            </div>
                        </div>
                        
                        <div id="del_input">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </div>
                    </div>
                </div>


    


                {{Form::open(['route'=>'sip.store', 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate', 'files'=>'true'])}}
                

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name of NGO">
                           Activity Code:
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                       
                          {!! Form::select('activity_code', $activity_code  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect sipAcitivity','required']) !!}
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name-of-the-Activities">
                    1. Name of the Activities:
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {!! Form::text('name_of_activity', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Activity-Type">
                       2. Activity Type: 
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="checkbox-wrap">
                                <div class="row">
                                    @foreach($activity_type as $id=>$name)
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="checkbox checkbox-primary">
                                                
                                                <input id ="checkbox10-{{$id}}" type="checkbox" name="activity_id[]" data-id="{{$id}}" value="{{ $id}}" @if($id == "Other")  class="classforother" @endif>
                                    
                                                <label for="checkbox10-{{$id}}"> 
                                                 
                                                 {{ $name}}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="hide" id ="otherinput_text" >
                                <div class="form-group">
                                    <input type="text" name="activity_other" class= "form-control" placeholder="Other">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                            3. Main objective: 
                       </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="form-group">
                                {!! Form::textarea('main_objective', null ,['class' => 'form-control','size'=>'10x2'] ) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                            4. Major contents of the activity: 
                       </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="form-group">
                                {!! Form::textarea('major_content_act', null ,['class' => 'form-control','size'=>'10x2'] ) !!}
                            </div>
                        </div>
                    </div>
    
                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Activity-Type">
                       5. Indicator for this activity: 
                        <span class="required">*</span></label>

                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="form-group">
                            <select class="form-control sumoSelect" name="indicator_activity[]">
                                <option value="0">--Select--</option>
                                <option value="1">Outcome </option>
                                <option value="2">Output</option>
                            </select>
                        </div>
                            {{-- <div class="checkbox checkbox-primary col-md-12">
                               
                                    <div class="form-group col-md-6">
                              
                                        <input id ="checkbox25-outcome" type="checkbox" name="indicator_activity[]"  value="outcome">
                                
                                            <label for="checkbox25-outcome"> 
                                             
                                             Outcome
                                            </label>
                                    </div>


                                    <div class="form-group col-md-6">
                              
                                        <input id ="checkbox25-output" type="checkbox" name="indicator_activity[]"  value="output">
                                
                                            <label for="checkbox25-output"> 
                                             
                                             Output
                                            </label>
                                    </div>

                                    

                            </div> --}}

                            <div class="form-group"  >
                                <label for="Indicator"> 
                                    Indicator
                                </label>

                                       
                                <input type="text" name="indicator" class= "form-control" >
                                    
                                
                            </div>
                        </div>
                    </div>



                <div class="form-group">
                    {!! Form::label('Major-results-and-outcomes ','6. Major results and outcomes :',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                    <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="form-group" id="i_partners">    
                        
                                <div class="input-field-group divappend1">
                                    {!! Form::text('major_result_outcome[]', null ,['class' => 'form-control'] ) !!}
                                </div>

                                <div class="addmore">
                                    <a href="javascript:;" class="addmorebtn_result_outcome btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                                </div>
                        </div>
                           
                    </div>
                </div> 
                

                            <div class="form-group">
                                {!! Form::label('p_budget','Planned budget (NRS) :',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="row">
                                         
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_travel','Travel:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_travel', '' ,['class' => 'form-control pb_travel'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_accom','Accom/Per-diem:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_accom', '' ,['class' => 'form-control pb_accom'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_program','Program:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_program', '' ,['class' => 'form-control pb_program'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_total','Total:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_total', '' ,['class' => 'form-control pb_total'] ) !!}
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div> 


            <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Implemented-date">
               7. Implemented date:
                    <span class="required">*</span></label>
                <div class="col-md-6 col-sm-7 col-xs-12">
                   <div class="control-group">
                        <div class="controls">
                
                             {{ Form::text('implemented_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                             
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Implemented-area-VDCs-or-Venue">
           8.Implemented area: (VDCs or Venue) :
                <span class="required">*</span></label>
                <div class="col-md-6 col-sm-7 col-xs-12">
                {!! Form::text('implemented_area', null ,['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Participants-Excluding-facilitators-organizers):','9. Participants (Excluding facilitators and organizers) :',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                
                <div class="col-md-6 col-sm-7 col-xs-12">
                   
                    <div class="table-responsive">
                      <!--   <h4 class="inner-title">Please, mention name and position of board/executive members:</h4> -->
                        <table class="table ">
                            <thead>
                                <tr>
                                 
                                  <th> Caste</th>
                                  <th> Female </th>
                                  <th> Male </th>
                                  <th> Total </th>
                                 
                                </tr>
                            </thead>
                            <tbody  class="castetable">
                                     <?php $i=1 ; ?>
                                  @foreach($castes as $id=>$name)
                                     <tr>
                                       
                                        <td> {{ $name }} </td>
                                        <td>   <input type="text" name="caste[{{$name}}][female]"  value="" class= "form-control cf{{$i}}" data-attr="{{$i}}" id="castid" ></td>
                                        <td>   <input type="text" name="caste[{{$name}}][male]"  value="" class="form-control cm{{$i}}" data-attr="{{$i}}" id="castid" ></td>
                                        <td>   <input type="text" name="caste[{{$name}}][mf_total]"  value="" class= "form-control ct{{$i}}" data-attr="{{$i}}" id="castid"></td>
                                    </tr>
                               <?php $i +=1 ; ?>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                 
                                  <th> Professional</th>
                                  <th> Female </th>
                                  <th> Male </th>
                                  <th> Total </th>
                                 
                                </tr>
                            </thead>
                            <tbody class="professional">
                                  
                                    <?php $i=1 ; ?>
                                  @foreach($professionals as $id=>$name)
                                     <tr>
                                     
                                        <td> {{ $name }} </td>
                                        <td>   <input type="text" name="professional[{{$name}}][female]"   value=""  class= "form-control pf{{$i}}" data-attr="{{$i}}" id="prof"></td>
                                        <td>   <input type="text" name="professional[{{$name}}][male]" value=""   class="form-control pm{{$i}}" data-attr="{{$i}}" id="prof"></td>
                                        <td>   <input type="text" name="professional[{{$name}}][mf_total]"  value=""  class= "form-control pt{{$i}}" data-attr="{{$i}}" id="prof"></td>
                                    </tr>
                                  <?php $i +=1 ; ?>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                 
                                  <th> Age</th>
                                  <th> Female </th>
                                  <th> Male </th>
                                  <th> Total </th>
                                 
                                </tr>
                            </thead>
                            <tbody class="age_groupclass">
                                    <?php $i = 1; ?>  
                                  @foreach($age_groups as $id=>$name)
                                     <tr>
                                     
                                        <td> {{ $name }} </td>
                                        <td>   <input type="text" name="age_group[{{$name}}][female]"  value=""  class= "form-control af{{$i}}" data-attr="{{$i}}" id="ageid" ></td>
                                        <td>   <input type="text" name="age_group[{{$name}}][male]"  value="" class="form-control am{{$i}}" data-attr="{{$i}}" id="ageid"></td>
                                        <td>   <input type="text" name="age_group[{{$name}}][mf_total]"  value=""  class= "form-control at{{$i}}" data-attr="{{$i}}" id="ageid"></td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>


            </div> 



               <div class="form-group">
                         {!! Form::label('Quotes-from-the-participants','10. Quotes from the participants related to results/outcomes (Atleast 2) :',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                        <div class="col-md-6 col-sm-7 col-Informationxs-12">
                            <div class="divappend2">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('Participant-Name','Participants Name',array('class'=>'control-label')) !!}
                                                    {!! Form::text('quote_part_name[]', null ,['class' => 'form-control'] ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                             {!! Form::label('profession','Profession',array('class'=>'control-label')) !!}
                                                    {!! Form::text('quote_part_profession[]', null ,['class' => 'form-control'] ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('organization','Organization',array('class'=>'control-label')) !!}
                                                    {!! Form::text('quote_part_organization[]', null ,['class' => 'form-control'] ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('address','Address',array('class'=>'control-label')) !!}
                                                    {!! Form::text('quote_part_address[]', null ,['class' => 'form-control'] ) !!}
                                        </div>
                                    </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                     {!! Form::label('Quotes','Quotes',array('class'=>'control-label')) !!}
                                                    {!! Form::textarea('part_quotes[]', null ,['class' => 'form-control','size'=>'10x2'] ) !!}
                                                </div>
                                            </div>
                                </div>
                            </div>

                            <div class="addmore">
                                <a href="javascript:;" class="addmorebtn_quote_participant btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                            </div>
                           
                        </div>
                    </div> 


            <div class="form-group">
                    {!! Form::label('Major-learning-from-the-activities','11. Major learning from the activities :',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                    <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="form-group" id="i_partners">    
                        
                                <div class="input-field-group divappend3">
                                    {!! Form::text('major_learn_act[]', null ,['class' => 'form-control'] ) !!}
                                </div>

                                <div class="addmore">
                                    <a href="javascript:;" class="addmorebtn_learn_activities btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                                </div>
                        </div>
                           
                    </div>
            </div>


                        <div class="form-group">
                         {!! Form::label('Follow-up-and-action-plan','12. Follow-up and action plan :',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                        <div class="col-md-6 col-sm-7 col-Informationxs-12">
                            <div class="divappend12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('What','What',array('class'=>'control-label')) !!}
                                            <input  type="text"  name="followup_action_plan_what[]" class="form-control"  value="">
                                                
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                             {!! Form::label('When','When',array('class'=>'control-label')) !!}
                                              <input  type="text"  name="followup_action_plan_when[]" class="form-control"  value="">
                                                    
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('Where','Where',array('class'=>'control-label')) !!}
                                             <input  type="text"  name="followup_action_plan_where[]" class="form-control"  value="">
                                                   
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('Who','Who',array('class'=>'control-label')) !!}
                                             <input  type="text"  name="followup_action_plan_who[]" class="form-control"  value="">
                                                
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>

                            <div class="addmore">
                                <a href="javascript:;" class="addmorebtn_followup_action_plan btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                            </div>
                           
                        </div>
                    </div> 

            

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Activity-Type">
             13 Implemented M&E tools : 
                <span class="required">*</span></label>
                <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="checkbox-wrap">
                        <div class="row">
                        @foreach($mne_tools as $value=>$name)
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="checkbox checkbox-primary">
                                    <input id ="checkbox11-{{$value}}" type="checkbox" name="mne_tools[]"  value="{{ $value}}" >

                                    <label for="checkbox11-{{$value}}"> 
                                        {{ $name}}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>



                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">14. Is future short term or long term impact survey needed?  <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="radio-wrap">
                                <ul>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('yn_survey', 'yes', false, ['class' => 'inbox','id'=>'survey-yes']) }}
                                            <label for="survey-yes"> Yes</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio-group">
                                            {{ Form::radio('yn_survey', 'no', false, ['class' => 'inbox','id'=>'survey-no']) }}
                                            <label for="survey-no">No</label>
                                        </div> 
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>


                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Activity-Type">
                    15. Future monitoring for outcome/output level indicators : 
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                           
                            <div class="checkbox-wrap">
                                <div class="row">
                                    @foreach($future_monitoring as $value=>$name)
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="checkbox checkbox-primary">
                                                <input id ="checkbox12-{{$value}}" type="checkbox" name="fut_mon_outcome_put_indi[]"  value="{{ $value}}" @if($value == "Others")  class="fut_mon_other_class" @endif>
                                        
                                                    <label for="checkbox12-{{$value}}"> 

                                                     {{ $name}}
                                                    </label>
                                                
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
            
                            <div class="hide" id ="fut_mon_otherinput_text" >
                                <div class="form-group">
                                    <input type="text" name="fut_mon_outcome_put_indi_other" class= "form-control" placeholder="Other">
                                </div>
                            
                            </div>

                        </div>
                </div>


                   <div class="form-group">
                        {!! Form::label('Participants-Excluding-facilitators-organizers):','16. Participants (Excluding facilitators and organizers) :',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                   
                                    <div class="totalWrapper">
                                        <h4 class="inner-title">Planned</h4>
                                        <div class="table-responsive">
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                      <th>SN</th>
                                                      <th> Area</th>
                                                      <th> Planned </th>
                                                     
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  $i=1; ?>
                                                       @foreach($participant_exp['planned'] as $id=>$name)
                                                         <tr>
                                                             <td> @if($name != 'Total') {{ $i }} @endif </td>
                                                            <td> {{ $name }} </td>
                                                            <td>   <input  type="text"  name="participant_exp_planned[{{ $name }}]" class="form-control individual"  value=""></td>
                                                        </tr>
                                                       <?php $i++; ?>
                                                    @endforeach

                                                     

                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                 
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="totalWrapper">
                                        <h4 class="inner-title">Actual Expenditure</h4>
                                        <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                  <th>SN</th>
                                                  <th> Area</th>
                                                  <th> Planned </th>
                                                 
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                  <?php  $i=1; ?>
                                                   @foreach($participant_exp['actual'] as $id=>$name)
                                                     <tr>
                                                         <td> @if($name != 'Total') {{ $i }} @endif </td>
                                                        <td> {{ $name }} </td>
                                                        <td>   <input  type="text"  name="participant_exp_actual[{{ $name }}]" class="form-control individual"  value=""></td>
                                                    </tr>
                                                   <?php $i++; ?>
                                                @endforeach

                                                       
                                              
                                            </tbody>
                                        </table>
                                            
                                        </div>
                                    </div>

                                 
                                </div>
                            </div>
                        </div>


                    </div> 




              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                    17. Challenges: 
                </label>
                <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="form-group">
                        {!! Form::textarea('challenges', null ,['class' => 'form-control','size'=>'10x2'] ) !!}
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                    18. Lesson Learned: 
                </label>
                <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="form-group">
                        {!! Form::textarea('lesson_learned', null ,['class' => 'form-control','size'=>'10x2'] ) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                    19. Others: 
                </label>
                <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="form-group">
                        {!! Form::textarea('others', null ,['class' => 'form-control','size'=>'10x2'] ) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">20. Project Code
                <span class="required">*</span></label>
                
                <div class="col-md-6 col-sm-7 col-xs-12">
                    <select class="form-control sumoSelect" name="project_id" required>
                        <option value="">--Select--</option>
                        @foreach($projects as $id=> $name)
                            <option value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
            </div> 

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">21. Quarter
                <span class="required">*</span></label>
                <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="radio-wrap">
                        <ul>
                            <li>
                                <div class="radio-group">
                                    {{ Form::radio('quarter', '1', false,['class' => 'quarter_year_select','id' => 'radio-1','required']) }}  
                                    <label for="radio-1">1<sup>st</sup> </label>
                                </div>
                            </li>
                            <li>
                                <div class="radio-group">
                                    {{ Form::radio('quarter', '2', false,['class' => 'quarter_year_select','id' => 'radio-2','required']) }}  
                                    <label for="radio-2">2<sup>nd</sup></label>
                                </div>
                            </li>
                            <li>
                                <div class="radio-group">
                                    {{ Form::radio('quarter', '3', false,['class' => 'quarter_year_select','id' => 'radio-3','required']) }}  
                                    <label for="radio-3">3<sup>rd</sup></label>
                                </div>
                            </li>
                             <li>
                                <div class="radio-group">
                                    {{ Form::radio('quarter', '4', false,['class' => 'quarter_year_select','id' => 'radio-4','required']) }}  
                                    <label for="radio-4">4<sup>th</sup></label>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- end radio-wrap -->

                    <div class="form-group hide" id="quarter-year">
                        {{ Form::selectRange('quarter_year', 2000, 2030 ,null, ['class'=>'sumoSelect','id'=>'quarter_select_year','placeholder'=>'-- Select Year --']) }}
                    </div>
               
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">22. Project <span class="required">*</span></label>
                <div class="col-md-6 col-sm-7 col-xs-12">

                     {!! Form::select('goal_id', $goals  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','id'=>'goalreportid','data-format'=>'sip','required']) !!}

                </div>
            </div>
            
            <div class="x_content" id="goal-report" style="display: none;">
                report will be shown
            </div>





                
                <div class="form-footer">
                    <div class="form-group">
                        <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('sip.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>


                {{Form::close()}}

            </div>
        </div>




    @endsection
