@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Partner's Profile</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">

                <div class="hide add_networks">
                    <div class="new-field">
                    {!! Form::text('networks[]', null ,['class' => 'form-control','required'] ) !!}
                     <span class="glyphicon glyphicon-trash " id="del_input"></span>
                    </div>
                </div>

                 <div class="hide add_ex_n_endors_policy">
                    <div class="new-field">
                    {!! Form::text('ex_n_endors_policy[]', null ,['class' => 'form-control','required'] ) !!}
                     <span class="glyphicon glyphicon-trash " id="del_input"></span>
                    </div>
                </div>


                 <div class="hide add_organization_expertise">
                    <div class="new-field">
                    {!! Form::text('organization_expertise[]', null ,['class' => 'form-control','required'] ) !!}
                     <span class="glyphicon glyphicon-trash " id="del_input"></span>
                    </div>
                </div>

                <div class="hide add_publications">
                    <div class="new-field">
                    {!! Form::text('publications[]', null ,['class' => 'form-control','required'] ) !!}
                     <span class="glyphicon glyphicon-trash " id="del_input"></span>
                    </div>
                </div>
                
                 <div class="hide add_geo_coverage">
                    <div class="new-field border-block">
                         <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::select('district_id[]', $district_list,  null, ['placeholder'=>'--Select Option --','class' => 'form-control test','required']) !!}
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::text('geo_coverage[]', null ,['class' => 'form-control','required'] ) !!}
                                </div>
                            </div>
                        </div>
                        <div id="del_input">
                                    <span class="glyphicon glyphicon-trash"></span> Delete
                                </div>
                    </div>
                </div>      
        

               <div class="hide add_info_project_cover">
                
                    <div class="new-field border-block ">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Name of Project/s</label>  
                                    {!! Form::text('projectinfo[]', null ,['class' => 'form-control','required'] ) !!}

                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Funding Agencies </label>
                                    {!! Form::text('fuding_agency[]', null ,['class' => 'form-control','required'] ) !!}
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Thematic Area Coverage </label>
                                    {!! Form::text('thematic_area[]', null ,['class' => 'form-control','required'] ) !!}
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Districts</label>
                                    {!! Form::select('info_project_district[]', $district_list,  null, ['placeholder'=>'--Select Option --','class' => 'form-control test','required']) !!}
                                </div>
                            </div>
                        </div>
                        
                        <div id="del_input">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </div>
                    </div>
                </div>





                {{Form::model($posts, ['route'=>['partnerpro.update', $posts->id], 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left','method'=>'patch','files'=> 'true','data-parsley-validate'])}}
               
                 
                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name of NGO">
                        Name of NGO:
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                       
                          {!! Form::select('ngo_id', $ngo_name  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) !!}
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Logo<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="preview-logo-wrap">
                                <div class="preview-logo">
                                    <img class="hide" id="previewLogo" src="#" alt="Logo" />
                                </div>
                                @if(!empty($posts->partnerlogo))

                                    <div class="preview-logo" id="img-preview">
                                        <img class="img-center" src="{{ url('files/partnerpro/'.$posts->partnerlogo) }}"  alt = "{{ $posts->partnerlogo }}" title="image preview">
                                       
                                    </div>
                                @endif
                            </div>

                            <div class="browse input-group image-browse-btn">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        <i class="fa fa-folder-open"></i>
                                        Browse
                                         <input type="file" name="partnerlogo" id="imgLogo" accept="image/*" class="image-upload" onchange="readLogoURL(this);">
                                    </span>
                                </label>
                                
                            </div>


                            <!-- <input type="file" name="partnerlogo" id="imgLogo" accept="image/*" class="image-upload" onchange="readLogoURL(this);"> -->
                        </div>
                    </div>


                    
                        <div class="form-group">
                            {!! Form::label('Address:','Address:',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                            <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('address','Address',array('class'=>'control-label')) !!}
                                        {!! Form::text('address', null ,['class' => 'form-control'] ) !!}
                                    </div>
                               
                                    <div class="form-group">
                                            {!! Form::label('po_box','P.O Box No.',array('class'=>'control-label')) !!}
                                            {!! Form::text('po_box', null ,['class' => 'form-control'] ) !!}
                                    </div>
                               </div>
                        </div> 
                    
                    
                    <div class="form-group">
                                {!! Form::label('Office Contact:','Office Contact:',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                   <div class="form-group">
                                            {!! Form::label('office_phone','Phone',array('class'=>'control-label')) !!}
                                            {!! Form::text('office_phone', null ,['class' => 'form-control'] ) !!}
                                        </div>
                                   
                                        <div class="form-group">
                                                {!! Form::label('office_email','Email',array('class'=>'control-label')) !!}
                                                {!! Form::text('office_email', null,['class' => 'form-control'] ) !!}
                                        </div>
                                   
                                        <div class="form-group">
                                                {!! Form::label('office_website','Website',array('class'=>'control-label')) !!}
                                                {!! Form::text('office_website', null ,['class' => 'form-control'] ) !!}
                                        </div>
                                    </div> 
                    </div>

                    <div class="form-group">
                                {!! Form::label('Contact Person:','Contact Person:',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                                <div class="col-md-6 col-sm-7 col-xs-12">
                                           <div class="form-group">
                                                {!! Form::label('person_name','Name',array('class'=>'control-label')) !!}
                                                {!! Form::text('person_name', null ,['class' => 'form-control'] ) !!}
                                            </div>
                                      
                                            <div class="form-group">
                                                    {!! Form::label('person_detail','Detail',array('class'=>'control-label')) !!}
                                                    {!! Form::textarea('person_detail', null ,['class' => 'form-control','size' => '3x3'] ) !!}
                                            </div>
                                        
                                    </div>
                    </div> 
                     
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name of NGO">
                       Project Code:
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {!! Form::select('project_name', $projects,  null, ['class' => 'form-control selectpicker','placeholder'=>'-- Select Project Code --','required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name of NGO">
                        Period of Partnership:
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {!! Form::text('period_of_partnership', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name of NGO">
                        Budget of Partnership:
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {!! Form::text('budget_of_partnership', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('Legitimacy and Affiliation:','Legitimacy and Affiliation:',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                        
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="border-block">
                                    <div class="form-group">
                                        {!! Form::label('la_registration_no','Registration No.',array('class'=>'control-label')) !!}
                                        {!! Form::text('la_registration_no', null ,['class' => 'form-control'] ) !!}
                                    </div>
                                    <div class="form-group">
                                            {!! Form::label('la_place','Place',array('class'=>'control-label')) !!}
                                            {!! Form::text('la_place', null ,['class' => 'form-control'] ) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Registration Date',' Registration Date',array('class'=>'control-label')) !!}
                                        <div class="control-group">
                                            <div class="controls">
                                              
                                                 {!! Form::text('la_date', null ,['class' => 'form-control has-feedback-left','id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4'] ) !!}
                                                 <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                               
                                            </div>
                                        </div>
                                     </div>
                            </div>
                            
                            <div class="form-group">
                                {!! Form::label('la_panvat','PAN/VAT No.',array('class'=>'control-label')) !!}
                                {!! Form::text('la_panvat', null ,['class' => 'form-control'] ) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('tax_clearance',' Tax Clearance',array('class'=>'control-label')) !!}
                                {!! Form::text('tax_clearance', null ,['class' => 'form-control'] ) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('last_audited_year',' Last Audited Year',array('class'=>'control-label')) !!}
                                {!! Form::text('last_audited_year', null ,['class' => 'form-control'] ) !!}
                            </div>

                            <div class="border-block">

                                <div class="form-group">
                                    {!! Form::label('affiliations_with',' Affiliations with',array('class'=>'control-label')) !!}
                                    {!! Form::text('affiliations_with', null ,['class' => 'form-control'] ) !!}
                                </div>

                                
                                <div class="form-group">                                   
                                   
                                      {!! Form::label('Affiliations Date',' Affiliations Date',array('class'=>'control-label')) !!}
                                    <div class="control-group">
                                        <div class="controls">
                                          
                                             {!! Form::text('affiliation_date', null ,['class' => 'form-control has-feedback-left','id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4'] ) !!}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="form-group">
                                    {!! Form::label('affiliation_no',' Affiliations No.',array('class'=>'control-label')) !!}
                                    {!! Form::text('affiliation_no', null ,['class' => 'form-control'] ) !!}
                                </div>
                            </div>
                                

                                  
                            <div class="form-group">
                                {!! Form::label('social_welfare_council',' Social Welfare Council',array('class'=>'control-label')) !!}
                                {!! Form::text('social_welfare_council', null ,['class' => 'form-control'] ) !!}
                            </div>
                                
                            <div class="form-group" id="i_partners">    
                                    
                                     {!! Form::label('Networks',' Networks',array('class'=>'control-label')) !!}
                                     
                                        <div class="input-field-group test3">
                                        <?php $count= 1; ?> 
                                         @foreach ($networks_exp as $i)
                                        
                                         @if ($count==1)

                                        {!! Form::text('networks[]', $i ,['class' => 'form-control'] ) !!}
                                        
                                         @else

                                            <div class="new-field">
                                                <input class="form-control" name="networks[]" type="text" value="{{ $i }}">
                                                 <span class="glyphicon glyphicon-trash " id="del_input"></span>
                                            </div>

                                        @endif
                                        <?php $count +=1; ?>   
                                        @endforeach

                                        </div>

                                        <div class="addmore">
                                            <a href="javascript:;" class="addmorebtn_networks btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                                        </div>
                        
                                </div>
                     
                             <div class="form-group" id="i_partners">    
                                    
                                     {!! Form::label('Existing and endorsed policies','  Existing and endorsed policies in the organization',array('class'=>'control-label')) !!}
                                

                                     <div class="input-field-group test4">

                                        <?php $count= 1; ?> 
                                         @foreach ($ex_n_endors_policy_exp as $i)
                                        
                                         @if ($count==1)

                                        {!! Form::text('ex_n_endors_policy[]', $i ,['class' => 'form-control'] ) !!}
                                        
                                          @else

                                            <div class="new-field">
                                                <input class="form-control" name="ex_n_endors_policy[]" type="text" value="{{ $i }}">
                                                 <span class="glyphicon glyphicon-trash " id="del_input"></span>
                                            </div>

                                        @endif
                                        <?php $count +=1; ?>   
                                        @endforeach
                                        
                                        </div>

                                        <div class="addmore">
                                            <a href="javascript:;" class="addmorebtn_ex_n_endors_policy btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                                        </div>
                        
                                </div>
                            


                          
                        </div>
                    </div> 


                             <div class="form-group">
                        {!! Form::label('Composition of Members:','Composition of Board and General Members:',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                        
                        <div class="col-md-6 col-sm-7 col-xs-12">
                                
                                    <div class="form-group">
                                        {!! Form::label('Please, mention name and position of member','Please, mention name and position of board/executive members.',array('class'=>'control-label')) !!}
                     

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody_np_bec">
                                          <?php $i=1; ?>
                                          @foreach($staff_unser as $s)
                                          <?php //var_dump($s); die; ?>
                                        <tr>
                                            <td class="lh34">{{ $i }}</td>
                                            <td><input type="text" name="staff[{{$i}}][name]" class="form-control" value="{{ $s['name']}}" ></td>
                                            <td><input type="text" name="staff[{{$i}}][designation]" class="form-control" value="{{ $s['designation']}}" ></td>
                                            <td class="lh34">
                                                <div id="del_inpu" class="text-center del_tr" required="">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                 <div class="addmore">
                                    <a href="javascript:;" class="addmorebtn_name_position_bec btn btn-default btn-sm" >
                                        <i class="fa fa-plus"></i> Add New 
                                    </a>
                                </div>
                            </div>
                            
                    </div>

                     <div class="form-group">
                                        {!! Form::label('Composition of Executive Committee:','Composition of Executive Committee:',array('class'=>'control-label')) !!}
                                        <div class="member-composition">
                                              <ol>
                                       
                                         @php $i=1 @endphp
                                        @foreach($compos_exe_comm as $exe_member_name => $exe_member_arr)

                                       
                                        
                                        <li>
                                            <label>{{ $exe_member_name }} : <input type="text" class="form-control" name="exe_member_composition[{{$i}}]" readonly=""> 
                                            </label>
                                            <div class="row">
                                                  @foreach($exe_member_arr as $id => $val_name)
                                                   <?php //var_dump($arr); var_dump($id); die; ?>
                                                    


                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            
                                                            <label>a. {{ $val_name }}:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="exe_member_composition[{{$i}}][{{$id}}]" >
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                               

                                                 @endforeach
                                              
                                            </div>
                                        </li>
                                        
                                       @php $i++ @endphp
                                    @endforeach

                                        </div>

                                    </div>
                   <div class="form-group">
                                <h4 class="inner-title">Ethnicity Description of Members:</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                         
                                          <th> Board Members </th>
                                          <th> </th>
                                          <th>General Members</th>
                                          <th>  </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($castes as $id =>$name)
                                        
                                        @foreach($member_ethnicity_unser as $em_id =>$em_value)
                                        
                                       
                                        @if($id == $em_id)
                                        <tr>
                                            <td>  {{ $name }}    </td>
                                            <td> <input type="text" name="member_ethnicity[{{ $id }}][board]" class="form-control" value="{{ $em_value['board'] }}">  </td>
                                            <td> {{ $name }}</td>
                                            <td> <input type="text" name="member_ethnicity[{{ $id }}][general]" class="form-control" value="{{ $em_value['general'] }}" > </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>




                </div>
            </div> 

              <div class="form-group">
                        {!! Form::label('Composition of Employees:','Composition of Employees:',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                        
                        <div class="col-md-6 col-sm-7 col-xs-12">  
                            <div class="form-group">
                                <h4 class="inner-title">Employee Details:</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Employee category </th>
                                            <th>Female</th>
                                            <th>Male</th>
                                            <th>Other</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                       @foreach($employee_details as $ed_key => $ed_name)
                                        
                                         @foreach($employee_detail_unser as $emp_id =>$emp_value)
                                             <?php // var_dump($ed_key); var_dump($emp_id); var_dump($emp_value); die;?>
                                             @if($ed_key == $emp_id)
                    
                                        <tr>
                                            <td> {{ $ed_name }} </td>
                                            <td> <input type="text" name="employee_detail[{{$ed_key}}][female]" class="form-control" value="{{ $emp_value['female'] }}" > </td>
                                            <td> <input type="text" name="employee_detail[{{$ed_key}}][male]" class="form-control" value="{{ $emp_value['male'] }}"></td>
                                             <td><input type="text" name="employee_detail[{{$ed_key}}][other]" class="form-control" value="{{ $emp_value['other'] }}"> </td>
                                            <td> <input type="text" name="employee_detail[{{$ed_key}}][total]" class="form-control" value="{{ $emp_value['total'] }}"></td>
                                        </tr>

                                            @endif
                                        @endforeach
                                    @endforeach
                                       
                                    </tbody>
                                </table>  
                            </div>

                            <div class="form-group">
                                <h4 class="inner-title">Ethnicity Description of Employee:</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                          <th> Ethnicity </th>
                                          <th>Female</th>
                                          <th>Male</th>
                                           <th>Other</th>
                                            <th>Total</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        @foreach($castes as $id =>$name)
                                         @foreach($ethnicity_description_unser as $eth_id =>$eth_value)
                                             @if($ed_key == $eth_id)
                                             <?php   //var_dump($emp_id); var_dump($emp_value); die;?>

                                         <tr>
                                            <td> {{ $name }} </td>
                                            <td> <input type="text" name="ethnicity_description[{{ $id }}][female]" class="form-control" value="<?php echo $emp_value['female'] ?>">  </td>
                                            <td> <input type="text" name="ethnicity_description[{{ $id }}][male]" class="form-control" value="{{ $emp_value['male'] }}"> </td>
                                            <td> <input type="text" name="ethnicity_description[{{ $id }}][other]" class="form-control" value="{{ $emp_value['other'] }}"> </td>
                                             <td> <input type="text" name="ethnicity_description[{{ $id }}][total]" class="form-control" value="{{ $emp_value['total'] }}"> </td>
                                           
                                        </tr>
                                        @endif
                                        @endforeach
                                      @endforeach
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 


                    <div class="form-group">
                            {!! Form::label('Areas of expertise:','Areas of expertise:',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                            <div class="col-md-6 col-sm-7 col-xs-12">
                             <div class="form-group" id="i_partners">    
                                    
                                     {!! Form::label('1. Please, mention your organizational areas of expertise','1. Please, mention your organizational areas of expertise:',array('class'=>'control-label')) !!}

                                        <div class="input-field-group test5">

                                        <?php $count= 1; ?> 
                                         @foreach ($organization_expertise_exp as $i)
                                        
                                         @if ($count==1)

                                        {!! Form::text('organization_expertise[]', $i ,['class' => 'form-control'] ) !!}
                                        
                                          @else

                                            <div class="new-field">
                                                <input class="form-control" name="organization_expertise[]" type="text" value="{{ $i }}">
                                                 <span class="glyphicon glyphicon-trash " id="del_input"></span>
                                            </div>

                                        @endif
                                        <?php $count +=1; ?>   
                                        @endforeach
                                        
                                        </div>

                                        <div class="addmore">
                                            <a href="javascript:;" class="addmorebtn_organization_expertise btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                                        </div>
                        
                               
                                </div>
                               
                           </div>
                    </div>






                            <div class="form-group geo-coverage">
                        {!! Form::label('Geographical Coverage:','Geographical Coverage:',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="form-group">                                    
                                <h4 class="inner-title" > Please, mention your organization’s coverage area (districts) from beginning till present date: </h4>

                                <div class="form-group" id="i_partners">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label>District</label>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>Municipals( Urban/Rural)</label>
                                        </div>
                                    </div>
                                
                                    <div class="test7" >


                                        <?php $count= 0; ?> 
                                         @foreach ($geo_coverage_exp as $i)
                                          
                                         @if ($count==0)

                                        

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                  

                                            <select class="form-control sumoSelect" name="district_id[]"  required="">
                                              <option value=""> -- Select District </option>
                                                 @foreach($district_list as $key => $value)
                                                      
                                                <option value="{{ $key }}" @foreach($district_id_exp as $k => $v)   @if($count == $k) @if($key == $v) selected @endif @endif @endforeach >{{ $value }}</option>
                                                 @endforeach
                                        </select> 



                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    {!! Form::text('geo_coverage[]', $i ,['class' => 'form-control','required'] ) !!}
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                
                                            </div>
                                        </div>

                                        
                                          @else

                                          <div class="new-field border-block">
                                             <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                          
                                        <select class="form-control sumoSelect" name="district_id[]"  required="">
                                              <option value=""> -- Select District </option>
                                                 @foreach($district_list as $key => $value)
                                                      
                                                <option value="{{ $key }}" @foreach($district_id_exp as $k => $v)   @if($count == $k) @if($key == $v) selected @endif @endif @endforeach >{{ $value }}</option>
                                                 @endforeach
                                        </select> 

                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        {!! Form::text('geo_coverage[]', $i ,['class' => 'form-control','required'] ) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="del_input">
                                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                                    </div>
                                        </div>



                                        @endif
                                        <?php $count +=1; ?>   
                                        @endforeach
                                     


                                        
                                    </div>
                          
                                    <div class="addmore">
                                        <a href="javascript:;" class="addmorebtn_geo_coverage btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 








                     <div class="form-group">
                        {!! Form::label('Information of projects and coverage:','Information of projects and coverage:',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="test8">

                            <?php $count= 0; ?> 
                             @foreach($projectinfo_exp as $i)
                              
                             @if ($count==0)

                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Name of Project/s</label>
                                            {!! Form::text('projectinfo[]', $i ,['class' => 'form-control','required'] ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Funding Agencies </label>

                                    @foreach($fuding_agency_exp as $k => $v)  
                                    
                                     @if($count == $k)
                                            {!! Form::text('fuding_agency[]', $v ,['class' => 'form-control','required'] ) !!}
                                     @endif 
                                    @endforeach

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Thematic Area Coverage </label>
                                             @foreach($thematic_area_exp as $k => $v)  
                                             @if($count == $k)
                                            {!! Form::text('thematic_area[]', $v ,['class' => 'form-control','required'] ) !!}
                                             @endif 
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Districts</label>

                                             <select class="form-control sumoSelect" name="info_project_district[]"  required="">
                                              <option value=""> -- Select District </option>
                                                 @foreach($district_list as $key => $value)
                                                      
                                                <option value="{{ $key }}" @foreach($info_project_district_exp as $k => $v)   @if($count == $k) @if($key == $v) selected @endif @endif @endforeach >{{ $value }}</option>
                                                 @endforeach
                                        </select> 


                                        </div>
                                    </div>
                                </div>



                            @else
                                 <div class="new-field border-block">
                                
                                     <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Name of Project/s</label>
                                            {!! Form::text('projectinfo[]', $i ,['class' => 'form-control'] ) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Funding Agencies </label>
                                            @foreach($fuding_agency_exp as $k => $v)  
                                             @if($count == $k)
                                            {!! Form::text('fuding_agency[]', $v ,['class' => 'form-control','required'] ) !!}
                                             @endif 
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Thematic Area Coverage </label>
                                           
                                            @foreach($thematic_area_exp as $k => $v)  
                                             @if($count == $k)
                                            {!! Form::text('thematic_area[]', $v ,['class' => 'form-control','required'] ) !!}
                                             @endif 
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Districts</label>
                                            
                                             <select class="form-control sumoSelect" name="info_project_district[]"  required="">
                                              <option value=""> -- Select District </option>
                                                 @foreach($district_list as $key => $value)
                                                      
                                                <option value="{{ $key }}" @foreach($info_project_district_exp as $k => $v)   @if($count == $k) @if($key == $v) selected @endif @endif @endforeach >{{ $value }}</option>
                                                 @endforeach
                                        </select> 
                                        </div>
                                    </div>

                                </div>

                                <div id="del_input">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </div>

                                 </div> 
                                

                            @endif
                            <?php $count +=1; ?>   
                            @endforeach
                            </div>

                            <div class="addmore">
                                <a href="javascript:;" class="addmorebtn_info_project_cover btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                            </div>
                           
                        </div>
                    </div> 
                    

                           
                    <div class="form-group">
                            {!! Form::label('Publication/s:','Publication/s:',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                            <div class="col-md-6 col-sm-7 col-xs-12">
                            
                               <div class="form-group" id="i_partners">    
                                    
                                     {!! Form::label('Please, mention any publications your organization has published:','Please, mention any publications your organization has published:',array('class'=>'control-label')) !!}

                                   
                                        <div class="input-field-group test6">

                                        <?php $count= 1; ?> 
                                         @foreach ($publications_exp as $i)
                                        
                                         @if ($count==1)

                                        {!! Form::text('publications[]', $i ,['class' => 'form-control'] ) !!}
                                        
                                          @else

                                            <div class="new-field">
                                                <input class="form-control" name="publications[]" type="text" value="{{ $i }}">
                                                 <span class="glyphicon glyphicon-trash " id="del_input"></span>
                                            </div>

                                        @endif
                                        <?php $count +=1; ?>   
                                        @endforeach
                                        
                                        </div>

                                        <div class="addmore">
                                            <a href="javascript:;" class="addmorebtn_publications btn btn-default btn-sm" ><i class="fa fa-plus"></i> Add New </a>
                                        </div>
                               
                                </div>
                           
                           </div>
                    </div>


                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                           2. Narrative description of the NGO in couple of paragraphs. 
                       </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="form-group">
                                {!! Form::textarea('narrative_description_of_ngo', null ,['class' => 'form-control'] ) !!}
                            </div>
                        </div>
                    </div>
                        

                       

                        
                    <div class="form-footer">
                        <div class="form-group">
                            <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('partnerpro.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
          
                {{Form::close()}}
            </div>
        </div>

    @endsection


