@extends('layouts.master')


    @section('content')
       

    <!--     <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12"> -->
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add New DIP <small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <div class="hide add_c_partners">
                                <div class="new-field">
                                {!! Form::text('c_partners[]', '' ,['class' => 'form-control c_part'] ) !!}
                                 <span class="glyphicon glyphicon-trash" id="del_input"></span>
                                </div>
                            </div>

                            <div class="hide add_i_partners">
                                <div class="new-field">
                                {!! Form::text('i_partners[]', '' ,['class' => 'form-control'] ) !!}
                                 <span class="glyphicon glyphicon-trash " id="del_input"></span>
                                </div>
                            </div>

                            <div class="hide add_r_persons">
                                <div class="new-field multiple-field">
                                   {!! Form::text('r_persons[]', '' ,['class' => 'form-control'] ) !!}
                                        <select class="form-control test" id="sel1" name="res_p[]" >
                                        <option value="">--Select--</option>
                                        <option value="1">Internal</option>
                                        <option value="2">External</option>
                                    </select>
                                    <div id="del_input">
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                    </div>
                                </div>    
                            </div>
                            
                            <div class="hide add_responsible">
                                 <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">Name</label>
                                                <input type="text" class="form-control" name="staff[responsible][name]">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for=""s class="control-label">Designation</label>
                                                <input type="text" class="form-control" name="staff[responsible][designation]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="responsible-delete" id="del_input">
                                    <span class="glyphicon glyphicon-trash"></span> Delete
                                    </div>
                        </div>

                        <div class="hide add_accountable">
                             <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="control-label">Name</label>
                                            <input type="text" class="form-control" name="staff[accountable][name]">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for=""s class="control-label">Designation</label>
                                            <input type="text" class="form-control" name="staff[accountable][designation]">
                                        </div>
                                    </div>
                                </div>
                                <div class="accountable-delete" id="del_input">
                                <span class="glyphicon glyphicon-trash"></span> Delete
                                </div>
                        </div>

                        <div class="hide add_approver">
                             <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="control-label">Name</label>
                                            <input type="text" class="form-control" name="staff[approver][name]">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for=""s class="control-label">Designation</label>
                                            <input type="text" class="form-control" name="staff[approver][designation]">
                                        </div>
                                    </div>
                                </div>
                                <div class="approver-delete" id="del_input">
                                <span class="glyphicon glyphicon-trash"></span> Delete
                                </div>
                        </div>




                           {!! Form::open( array( 'route'=> 'dips.store','files' => 'true','accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
                    
                                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Activity-Code">
                        Activity Code:
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                                 <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                  
                                    {!! Form::text('activity_code[]', null ,['class' => 'form-control','placeholder'=>'AAA', 'maxlength'=>'3'] ) !!}
                                </div>
                            </div> 

                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                  
                                   {!! Form::text('activity_code[]', null ,['class' => 'form-control','placeholder'=>'MON', 'maxlength'=>'3'] ) !!}
                                </div>
                            </div> 

                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    
                                   {!! Form::text('activity_code[]', null ,['class' => 'form-control','placeholder'=>'YEAR', 'maxlength'=>'4'] ) !!}
                                </div>
                            </div> 

                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                   
                                   {!! Form::text('activity_code[]', null ,['class' => 'form-control','placeholder'=>'001', 'maxlength'=>'3'] ) !!}
                                </div>
                            </div>

                        </div>
                     
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                            Name of Activities <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {!! Form::text('name', '' ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Activity-Type">
                       Activity Type:  
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="checkbox-wrap">
                                <div class="row">
                                @foreach($activity as $id=>$name)
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="checkbox checkbox-primary">
                                        <input id ="checkbox10-{{$id}}" type="checkbox" name="act_type[]" value="{{ $id}}" @if($id == "Other")  class="classforother" @endif>
                                
                                            <label for="checkbox10-{{$id}}"> 
                                             
                                             {{ $name}}
                                            </label>
                                            </div>
                                    </div>

                                
                                @endforeach
                                </div>
                            </div>

                            <div class="form-group col-md-12 hide" id ="otherinput_text" >
                          
                                <input type="text" name="act_others" class= "form-control" placeholder="Other">
                                
                            </div>
                        </div>

                    </div>

                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="obj">
                                    Main objective <span class="required">*</span>
                                </label>
                               
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    {!! Form::text('obj', '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>  

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                    Expected outcomes <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    {!! Form::text('outcome', '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>  

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                    Indicator for this activity <span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="indication-wrap ">
                                        <select class="form-control sumoSelect" id="sel1" name="ind_act">
                                            <option value="0">--Select--</option>
                                            <option value="1">Outcome </option>
                                            <option value="2">Output</option>
                                        </select>
                                        <div class="indication-text-field ">
                                             <label class="control-label" for="first-name">
                                                Indicator No: 
                                            </label>
                                            {!! Form::text('ind_no', '' ,['class' => 'form-control'] ) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>  

                            <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                    Priority of police strategy <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    {!! Form::text('police_str', '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>  
                                
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Implementation date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="text" name="imp_date" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('imp_area','Implementation area:(VDCs or Venue)',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    {!! Form::text('imp_area', '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div> 

                       
                            
                            <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Nature of Activity <span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    
                                    <div class="form-group">
                                        <label for="type" class="control-label">
                                            Responsible   </label>
                                
                                        <div class="input-field-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="" class="control-label">Name</label>
                                                      
                                                         {{ Form::select('staff[responsible][id]', $staffs ,null, ['class' => 'form-control sumoSelect','placeholder'=>'-- Select --']) }}
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="" class="control-label">Designation</label>
                                                        <input type="text" class="form-control" readonly="">
                                                    </div>
                                                </div>
                                            </div>

                                            <p id="notinlist-responsible">Not in the list? <a href="javascript:;" id="addnew-responsible" class="link-anchor">Add new</a></p>
                                            
                                            <div class="new-field border-block hide" id="responsible-addnewdiv">
                                       
                                            </div>
                                        </div>
                             
                            </div>


                            <div class="form-group">
                                        <label for="type" class="control-label">
                                            Accountable   </label>
                                
                                        <div class="input-field-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="" class="control-label">Name</label>
                                                      
                                                         {{ Form::select('staff[accountable][id]', $staffs ,null, ['class' => 'form-control sumoSelect','placeholder'=>'-- Select --']) }}
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="" class="control-label">Designation</label>
                                                        <input type="text" class="form-control" readonly="">
                                                    </div>
                                                </div>
                                            </div>

                                            <p id="notinlist-accountable">Not in the list? <a href="javascript:;" id="addnew-accountable" class="link-anchor">Add new</a></p>
                                            
                                            <div class="new-field border-block hide" id="accountable-addnewdiv">
                                       
                                            </div>
                                        </div>
                             
                            </div>


                              <div class="form-group">
                                        <label for="type" class="control-label">
                                            Approver   </label>
                                
                                        <div class="input-field-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="" class="control-label">Name</label>
                                                      
                                                         {{ Form::select('staff[approver][id]', $staffs ,null, ['class' => 'form-control sumoSelect','placeholder'=>'-- Select --']) }}
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="" class="control-label">Designation</label>
                                                        <input type="text" class="form-control" readonly="">
                                                    </div>
                                                </div>
                                            </div>

                                            <p id="notinlist-approver">Not in the list? <a href="javascript:;" id="addnew-approver" class="link-anchor">Add new</a></p>
                                            
                                            <div class="new-field border-block hide" id="approver-addnewdiv">
                                       
                                            </div>
                                        </div>
                             
                            </div>






                                </div>
                            </div> 


                 

                            <div class="form-group">
                                {!! Form::label('est_ben','Estimated beneficiaries /participants (No)',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="row">
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                    {!! Form::label('eb_female','Female:',array('class'=>'control-label  ')) !!}
                                                    {!! Form::text('eb_female', '' ,['class' => 'form-control eb_female'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('eb_male','Male:',array('class'=>'control-label')) !!}
                                                {!! Form::text('eb_male', '' ,['class' => 'form-control eb_male'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('eb_total','Total:',array('class'=>'control-label')) !!}
                                                {!! Form::text('eb_total', '' ,['class' => 'form-control eb_total'] ) !!}
                                            </div>
                                        </div>
                                        {{--
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('eb_dis_grp','Dis. Group:',array('class'=>'control-label')) !!}
                                                 {!! Form::text('eb_dis_grp', '' ,['class' => 'form-control'] ) !!}
                                            </div>
                                        </div>
                                        --}}
                                    </div>
                                </div>
                            </div> 

                            <div class="form-group">
                                {!! Form::label('p_budget','Planned budget (NRS)',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
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
                                <label  class="control-label col-md-3 col-sm-3 col-xs-12" for="sel1">
                                    Target group
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <select class="form-control sumoSelect tgroup" id="sel1" name="target_grp">
                                        <option value="">--Select--</option>
                                        <option value="Marginalized Community">Marginalized Community</option>
                                        <option value="Women">Women</option>
                                        <option value="Police/Security institution">Police/Security institution</option>
                                        <option value="Court/Lawyers">Court/Lawyers</option>
                                        <option value="Mediators/Centre">Mediators/Centre</option>
                                        <option value="Activist/professional">Activist/professional</option>
                                        <option value="Other Govt. organization">Other Govt. organization</option>
                                        <option value="General community">General community</option>
                                        <option value="Civil society">Civil society</option>
                                        <option value="Political leaders">Political leaders</option>
                                        <option value="Journalist">Journalist</option>
                                        <option value="others">Others</option>
                                    </select>
                                    {!! Form::text('tg_others', '' ,['class' => 'form-control tgroupText hide'] ) !!}
                                </div>
                            </div>

                            <div class="form-group" id="i_partners">    
                                {!! Form::label('name','Implementing Partners',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                                <div class="col-md-6 col-sm-7 col-xs-12" >
                                    <div class="input-field-group test2">
                                        {!! Form::text('i_partners[]', '' ,['class' => 'form-control'] ) !!}
                                    </div>

                                    <div class="addmore">
                                        <a href="javascript:;" class="addmorebtn_i_partners btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" id="c_partners">
                                {!! Form::label('name','Collaborative Partners',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                <div class="col-md-6 col-sm-7 col-xs-12 ">
                                    <div class="input-field-group test1">
                                        {!! Form::text('c_partners[]', '' ,['class' => 'form-control'] ) !!}
                                    </div>
                                    <div class="addmore">
                                        <a href="javascript:;" class="addmorebtn_c_partners btn btn-default btn-sm"><i class="fa fa-plus"></i> Add New </a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group more-field" id="r_persons">
                                {!! Form::label('r_persons[]','Resource persons',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="input-field-group test3">
                                        {!! Form::text('r_persons[]', '' ,['class' => 'form-control'] ) !!}
                                        <select class="form-control sumoSelect" id="sel1" name="res_p[]" >
                                            <option value="">--Select--</option>
                                            <option value="1">Internal</option>
                                            <option value="2">External</option>
                                        </select>
                                    </div>
                                    <div class="addmore">
                                        <a href="javascript:;" class="addmorebtn_r_persons btn btn-default btn-sm">
                                            <i class="fa fa-plus"></i> Add New 
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('contact_person','Contact person for this activity',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                 
                                 <div class="col-md-6 col-sm-7 col-xs-12">
                                     <div class="row">
                                         <div class="col-md-6 col-sm-6">
                                             <div class="form-group">
                                                 {!! Form::label('ct_name','Name:',array('class'=>'control-label')) !!}
                                                 {!! Form::text('ct_name', '' ,['class' => 'form-control'] ) !!}
                                             </div>
                                         </div>
                                         <div class="col-md-6 col-sm-6">
                                             <div class="form-group">
                                                {!! Form::label('ct_pos','Position:',array('class'=>'control-label')) !!}
                                                {!! Form::text('ct_pos', '' ,['class' => 'form-control'] ) !!}
                                             </div>
                                         </div>
                                         <div class="col-md-6 col-sm-6">
                                             <div class="form-group">
                                                 {!! Form::label('ct_cell','Cell:',array('class'=>'control-label')) !!} 
                                                {!! Form::text('ct_cell', '' ,['class' => 'form-control'] ) !!}
                                             </div>
                                         </div>
                                         
                                     </div>
                                 </div>
                            </div> 

   

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Quarter
                        <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-7 col-xs-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="radio-wrap">
                                            <ul>
                                                <li>
                                                    <div class="radio-group">
                                                        {{ Form::radio('quarter', '1', false,['class' => 'quarter_year_select','id' => 'radio-5','required']) }}  
                                                        <label for="radio-5">1<sup>st</sup> </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-group">
                                                        {{ Form::radio('quarter', '2', false,['class' => 'quarter_year_select','id' => 'radio-6','required']) }}  
                                                        <label for="radio-6">2<sup>nd</sup></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-group">
                                                        {{ Form::radio('quarter', '3', false,['class' => 'quarter_year_select','id' => 'radio-7','required']) }}  
                                                        <label for="radio-7">3<sup>rd</sup></label>
                                                    </div>
                                                </li>
                                                 <li>
                                                    <div class="radio-group">
                                                        {{ Form::radio('quarter', '4', false,['class' => 'quarter_year_select','id' => 'radio-8','required']) }}  
                                                        <label for="radio-8">4<sup>th</sup></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group hide" id="quarter-year">
                                                {{ Form::selectRange('quarter_year', 2000, 2030 ,null, ['class'=>'sumoSelect','id'=>'quarter_select_year','placeholder'=>'-- Select Year --']) }}
                                            </div>
                                    </div>
                                </div>
                                 <!-- end radio-wrap -->

                               
                            </div>
                        </div>
                
                <div class="x_panel x_panel-box">
               
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                    Project Code <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    {{ Form::select('project_id', $project_code ,null, ['class' => 'form-control sumoSelect','placeholder'=>'-- Select --','required']) }}
                                </div>
                            </div>


            
              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Project <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

                             {!! Form::select('goal_id', $goals  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','id'=>'goalreportid','data-format'=>'horizontal','required']) !!}

                        </div>
                    </div>
            
                  <div class="x_content" id="goal-report" style="display: none;">
                  
                    report will be shown
                </div>



        
          </div>

                            <div class="form-footer">
                                <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                    <button type="submit"  class="btn btn-success">Submit</button>
                                    <a href="{{ route('dips.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                   

                        </div>
                    </div>{!! Form::close() !!}
                <!-- </div> 
            </div>
        </div> -->

      @endsection