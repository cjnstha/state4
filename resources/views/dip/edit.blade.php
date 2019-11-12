@extends('layouts.master')


    @section('content')
       

    <!--     <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12"> -->
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit DIP <small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                        <select class="form-control test" id="sel1" name="res_p[]">
                                        <option value="0">--Select--</option>
                                        <option value="1">Internal</option>
                                        <option value="2">External</option>
                                    </select>
                                    <div id="del_input">
                                        <span class="glyphicon glyphicon-trash " ></span> Delete
                                     </div>
                                </div>    
                            </div>

                             {{Form::model($posts, ['route'=>['dips.update', $posts->id], 'id'=>'demo-form2', 'class'=>'form-horizontal','method'=>'patch', 'files'=> 'true','accept-charset'=>'UTF-8'])}}

                                
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Activity-Code">
                                Activity Code:
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                         <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                          
                                            {!! Form::text('activity_code[]', $activity_code_exp[0] ,['class' => 'form-control', 'maxlength'=>'3'] ) !!}
                                        </div>
                                    </div> 

                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                          
                                           {!! Form::text('activity_code[]', $activity_code_exp[1] ,['class' => 'form-control', 'maxlength'=>'3'] ) !!}
                                        </div>
                                    </div> 

                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            
                                           {!! Form::text('activity_code[]', $activity_code_exp[2] ,['class' => 'form-control', 'maxlength'=>'4'] ) !!}
                                        </div>
                                    </div> 

                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                           
                                           {!! Form::text('activity_code[]', $activity_code_exp[3] ,['class' => 'form-control', 'maxlength'=>'3'] ) !!}
                                        </div>
                                    </div>

                                </div>
                             
                                </div>
                            </div>


   
                           <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name of Activities
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('name', isset($posts) ? $posts->name : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>
       
                                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Activity-Type">
               2. Activity Type: 
                <span class="required">*</span></label>
                <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="checkbox-wrap">
                        <div class="row">
                        @foreach($activity as $id=>$name)
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="checkbox checkbox-primary">
                                <input id ="checkbox10-{{$id}}" type="checkbox" name="act_type[]" value="{{ $id}}" @if($id == "Other")  class="classforother" @endif  @if(in_array($id, $act_type_id)) checked @endif  >
                        
                                    <label for="checkbox10-{{$id}}"> 
                                     
                                     {{ $name}}
                                    </label>
                                    </div>
                            </div>

                        
                        @endforeach
                        </div>
                    </div>
                    
             

                    <div class="form-group col-md-12 @if(!in_array("Other", $act_type_id)) hide @endif" id="otherinput_text" >
                        
                         {!! Form::text('act_others', null ,['class' => 'form-control','placeholder'=>'Other'] ) !!}    
                    
                    </div>

                    


                </div>

            </div>

         

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="obj">
                                Main objective <span class="required">*</span></label>
                               
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('obj', isset($posts) ? $posts->obj : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                Expected outcomes
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('outcome', isset($posts) ? $posts->outcome : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                    Indicator for this activity
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="indication-wrap ">
                                        <select class="form-control sumoSelect" id="sel1" name="ind_act">
                                        <option value="">--Select--</option>

                                         @if ($posts->ind_act=='1')
                                        <option value="1"  selected }} >Outcome</option>
                                        @else
                                        <option value="1"  }} >Outcome</option>
                                        @endif
                                         @if ($posts->ind_act=='2')
                                        <option value="2"  selected }} >Output</option>
                                        @else
                                        <option value="2"  }} >Output</option>
                                        @endif
                                    
                                        </select>
                                        <div class="indication-text-field ">
                                             <label class="control-label" for="first-name">
                                          Indicator No: </label>
                                            {!! Form::text('ind_no', isset($posts) ? $posts->ind_no : '' ,['class' => 'form-control'] ) !!}
                                        </div>
                                    </div>
                                
                                <!-- <div class="form-group">
                                     <label class="control-label" for="first-name">
                                  Indicator No: </label>
                                    {!! Form::text('ind_no', '' ,['class' => 'form-control'] ) !!}
                                </div> -->
                                </div>

                            </div>  
                            <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                    Priority of police strategy
                                <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('police_str', isset($posts) ? $posts->police_str : '' ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>  
                                
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Implementation date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                       
                                        <div class="control-group">
                                            <div class="controls">
                                                  
                                                <input type="text" name="imp_date" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4" value="{{ isset($posts) ? $posts->imp_date : '' }}">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                   
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('imp_area','Implementation area:(VDCs or Venue)',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}

                                <div class="col-md-6 col-sm-7 col-xs-12">
                                {!! Form::text('imp_area', isset($posts) ? $posts->imp_area : '' ,['class' => 'form-control'] ) !!}
                                </div>

                            </div> 
                            <div class="form-group">
                                {!! Form::label('est_ben','Estimated beneficiaries /participants (No)',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="row">
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                    {!! Form::label('eb_female','Female:',array('class'=>'control-label  ')) !!}
                                                    {!! Form::text('eb_female', isset($posts) ? $posts->eb_female : ''  ,['class' => 'form-control eb_female'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('eb_male','Male:',array('class'=>'control-label')) !!}
                                                {!! Form::text('eb_male', isset($posts) ? $posts->eb_male : ''  ,['class' => 'form-control eb_male'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('eb_total','Total:',array('class'=>'control-label')) !!}
                                                {!! Form::text('eb_total', isset($posts) ? $posts->eb_total : ''  ,['class' => 'form-control eb_total'] ) !!}
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
                                                {!! Form::text('pb_travel', isset($posts) ? $posts->pb_travel : ''  ,['class' => 'form-control pb_travel'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_accom','Accom/Per-diem:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_accom', isset($posts) ? $posts->pb_accom : ''  ,['class' => 'form-control pb_accom'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_program','Program:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_program', isset($posts) ? $posts->pb_program : ''  ,['class' => 'form-control pb_program'] ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('pb_total','Total:',array('class'=>'control-label')) !!}
                                                {!! Form::text('pb_total', isset($posts) ? $posts->pb_total : ''  ,['class' => 'form-control pb_total'] ) !!}
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div> 

                            <div class="form-group">
                                <label  class="control-label col-md-3 col-sm-3 col-xs-12" for="sel1">Target group</label>
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                 
                                  {{ Form::select('target_grp', [
                                    ''  => '--Select Option --',
                                   'Marginalized Community' => 'Marginalized Community',
                                   'Women' => 'Women',
                                   'Police/Security institution' => 'Police/Security institution',
                                   'Court/Lawyers' => 'Court/Lawyers',
                                   'Mediators/Centre' => 'Mediators/Centre',
                                   'Activist/professional' => 'Activist/professional',
                                   'Other Govt. organization' => 'Other Govt. organization',
                                   'General community' => 'General community',
                                   'Civil society' => 'Civil society',
                                   'Political leaders' => 'Political leaders',
                                   'Journalist' => 'Journalist',
                                   'others' => 'others'] ,null, ['class' => 'form-control sumoSelect']) }}

                                                                
                                
                                {!! Form::text('tg_others', isset($posts) ? $posts->tg_others : '' ,['class' => 'form-control sumoSelect tgroupText hide'] ) !!}
                                </div>

                            </div>
                            <!-- <div class="form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                             
                                 <span class="required"></span></label>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                 
                                 </div>
                             </div> --> 
                            <div class="form-group" id="i_partners">    
                                {!! Form::label('name','Implementing Partners',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                <?php $count= 1; ?> 
                                <div class="col-md-6 col-sm-7 col-xs-12 " >
                                    <div class="input-field-group test2">
                                         @foreach ($i_partners as $i)
                                        @if ($count==1)
                                   
                                        {!! Form::text('i_partners[]',$i,['class' => 'form-control'] ) !!}
                                    
                                        @else
                                        <div class="add_c_partners">
                                            <div class="new-field">
                                                {!! Form::text('i_partners[]', $i ,['class' => 'form-control'] ) !!}
                                                <span class="glyphicon glyphicon-trash " id="del_input"></span>
                                            </div>
                                        </div>

                                        @endif
                                        <?php $count +=1; ?>   
                                        @endforeach
                                    </div>
                                    <div class="addmore"  >
                                        <a href="javascript:;" class="addmorebtn_i_partners btn btn-default btn-sm" >
                                            <i class="fa fa-plus"></i> Add New 
                                        </a>
                                    </div>
                                </div>
                               
                            </div>
                            
                            <div class="form-group" id="c_partners">
                                {!! Form::label('name','Collaborative Partners',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                <?php $count= 1; ?> 
                                 <div class="col-md-6 col-sm-7 col-xs-12 ">
                                     <div class="input-field-group test1">
                                        @foreach ($c_partners as $c)
                                            @if ($count==1)
                                           
                                                {!! Form::text('c_partners[]',$c,['class' => 'form-control'] ) !!}
                                            
                                            @else

                                            <div class="add_c_partners">
                                                <div class="new-field">
                                                    {!! Form::text('c_partners[]', $c ,['class' => 'form-control c_part'] ) !!}
                                                    <span class="glyphicon glyphicon-trash" id="del_input"></span>
                                                </div>
                                            </div>

                                            @endif
                                            <?php $count +=1; ?>   
                                        @endforeach    
                                     </div>
                                     <div class="addmore">
                                        <a href="javascript:;" class="addmorebtn_c_partners btn btn-default btn-sm">
                                            <i class="fa fa-plus"></i> Add New 
                                        </a>
                                    </div>
                                </div>
                               
                                
                                {{-- <div class="add_c_partners" style="display:none;">
                                    <div class="inner-wrap second">
                                    <input type="hidden" class="counter" name="counter[]" value="">
                                    <div class="col-sm-12 col-md-12">
                                    {!! Form::text('c_partners[]', '' ,['class' => 'form-control'] ) !!}
                                    </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="form-group more-field" id="r_persons">
                                {!! Form::label('r_persons[]','Resource persons',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="input-field-group test3">
                                        <?php $count= 1; ?> 
                                        @for  ($r = 0; $r < $r_persons_count; $r++)
                                        @if ($count==1)
                                 
                                        {!! Form::text('r_persons[]', $r_persons[$r],['class' => 'form-control'] ) !!}
                                        <select class="form-control sumoSelect" id="sel1" name="res_p[]">
                                            <option value="0">--Select--</option>
                                            @if ($res_p[$r]=='1')
                                                <option value="1"  selected }} >External</option>
                                            @else
                                                <option value="1"  }} >External</option>
                                            @endif
                                            @if ($res_p[$r]=='2')
                                                <option value="2"  selected }} >Internal</option>
                                            @else
                                                <option value="2"  }} >Internal</option>
                                            @endif
                                        </select>
                                        @else
                                        <div class="new-field">
                                            {!! Form::text('r_persons[]', $r_persons[$r],['class' => 'form-control'] ) !!}

                                            <select class="form-control sumoSelect" id="sel1" name="res_p[]">
                                                <option value="0">--Select--</option>
                                                @if ($res_p[$r]=='1')
                                                    <option value="1"  selected }} >External</option>
                                                @else
                                                    <option value="1"  }} >External</option>
                                                @endif
                                                @if ($res_p[$r]=='2')
                                                    <option value="2"  selected }} >Internal</option>
                                                @else
                                                    <option value="2"  }} >Internal</option>
                                                @endif
                                                  
                                            </select>
                                            <div id="del_input">
                                                <span class="glyphicon glyphicon-trash "></span>Delete
                                            </div>
                                        </div>
                                        @endif
                                          <?php $count +=1; ?>  
                                        @endfor  
                                    </div>
                                    <div class="addmore">
                                        <a href="javascript:;" class="addmorebtn_r_persons btn btn-default btn-sm">
                                            <i class="fa fa-plus"></i> Add New 
                                        </a>
                                </div>
                                </div>
                                
                                {{-- <div class="add_r_persons" style="display:none;">
                                    <div class="inner-wrap second">
                                    <input type="hidden" class="counter" name="counter[]" value="">
                                    <div class="col-sm-12 col-md-12">
                                    {!! Form::text('r_persons[]', '' ,['class' => 'form-control'] ) !!}
                                    <select class="form-control" id="sel1" name="res_p[]">
                                    <option value="0">--Select--</option>
                                    <option value="1">Internal</option>
                                    <option value="2">External</option>
                                </select>
                                    </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="form-group">
                                {!! Form::label('contact_person','Contact person for this activity',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                 
                                 <div class="col-md-6 col-sm-7 col-xs-12">
                                     <div class="row">
                                         <div class="col-md-6 col-sm-6">
                                             <div class="form-group">
                                                 {!! Form::label('ct_name','Name:',array('class'=>'control-label')) !!}
                                                 {!! Form::text('ct_name', isset($posts) ? $posts->ct_name : '' ,['class' => 'form-control'] ) !!}
                                             </div>
                                         </div>
                                         <div class="col-md-6 col-sm-6">
                                             <div class="form-group">
                                                {!! Form::label('ct_pos','Position:',array('class'=>'control-label')) !!}
                                                {!! Form::text('ct_pos', isset($posts) ? $posts->ct_pos : '' ,['class' => 'form-control'] ) !!}
                                             </div>
                                         </div>
                                         <div class="col-md-6 col-sm-6">
                                             <div class="form-group">
                                                 {!! Form::label('ct_cell','Cell:',array('class'=>'control-label')) !!} 
                                                {!! Form::text('ct_cell', isset($posts) ? $posts->ct_cell : '' ,['class' => 'form-control'] ) !!}
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
                                    <div class="form-group" >
                                            {{ Form::selectRange('quarter_year', 2000, 2030 ,null, ['class'=>'sumoSelect','id'=>'quarter_select_year','placeholder'=>'-- Select Year --']) }}
                                        </div>
                                </div>
                            </div>
                             <!-- end radio-wrap -->

                           
                        </div>
                    </div>  




        <div class="x_panel x_panel-box">


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Project Code
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                                 {{ Form::select('project_id', $project_code ,isset($posts) ?$posts->project_id : '', ['class' => 'form-control sumoSelect','placeholder'=>'-- Select --','required']) }}

                                </div>
                            </div>


              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Project <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

                             {!! Form::select('goal_id', $goals  ,  isset($posts) ?$posts->goal_id : '', ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','id'=>'goalreportedit','data-format'=>'horizontal','required']) !!}

                        </div>
                    </div>
        
                    

                     <div class="form-group outputedit">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Output <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">


                               <select class="form-control sumoSelect" id="outputedit" name="output_id[]" multiple required>
                               <option disabled="disabled"> -- Select --</option>
                                @foreach($allgoalreports['output'] as $key => $value )
                                
                                    <option value="{{$key }}"  @foreach($output_exp as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>


                     <div class="form-group indicatoredit">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Inidicator <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

                            <select class="form-control sumoSelect" id="indicatoredit" name="indicator_id[]" multiple required>
                               <option disabled="disabled"> -- Select --</option>
                                @foreach($allgoalreports['indicator'] as $key => $value )
                                
                                    <option value="{{$key }}"  @foreach($indicator_exp as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>
    


                      <div class="form-group activityedit">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Activity <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">

        
                               <select class="form-control sumoSelect" id="activityedit" name="activity_id[]" multiple required>
                               <option disabled="disabled"> -- Select --</option>
                                @foreach($allgoalreports['activity'] as $key => $value )
                                
                                    <option value="{{$key }}"  @foreach($activity_exp as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="x_content" id="goal-report" style="display: none;">
                  
                    
                    </div>

          
            </div>

            
                            <div class="form-footer">
                                <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6">
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