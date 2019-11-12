

@extends('layouts.master')

    @section('content')
       

    <!--     <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12"> -->
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Small Grant <small></small></h2>

                               <div class="pull-right">
                                        <table id="edit_detail_datatable" class="table table-striped table-bordered display table_edit_data" style="display: none;">
                                         <thead >
                                            <tr>
                                                        <th>  </th>
                                                        <th>  </th>
                                                    </tr>
                                                  
                                            </thead>

                                            <?php 
                                            //theme
                                              // if($iecmaterial->theme == 'education'){
                                              //           $theme ='Education'; }
                                              //   if($iecmaterial->theme == 'gender'){
                                              //           $theme ='Gender base'; }        
                                              //   if($iecmaterial->theme == 'violence') {
                                              //           $theme ='Violence'; }  

                                            if($posts->district_id != ''){

                                                      $dist_exp = explode(',', $posts->district_id); 
                                                    $dis_array = array();

                                                    foreach($dist_exp as $dist)
                                                    {
                                                       $distname = DB::table('districts')->select('district_name')->where('id',$dist)->first();
                                                       array_push($dis_array, $distname->district_name); 
                                                    }

                                                    $district_list = implode(',<br>', $dis_array);
                                                }


                                               // date
                                                $pro_date =  $posts->g_date;
                                                $prod_date = strtotime($pro_date);

                                                // print_r($prod_date); die();

                                              $benef_exp = explode(',', $posts->benef_id);
                                            $benef_array = array();

                                        
                                           foreach($benef_exp as $dist) {
                                               $benefname = DB::table('benef')->select('name')->where('id',$dist)->first();
                                               if (!empty($benefname)) { //condition added -yojan
                                                array_push($benef_array, $benefname->name); 
                                               }

                                            }
                                         
                                            $benef_name = implode(', ', $benef_array);  
                                            //print_r($benefs); die();

                                        
                                            ?>
                                            <tbody>
                                       
                                                       <tr>
                                                        <td> Group or Individual  </td>
                                                        <td>  {{ $posts->group_in }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Beneficiaries Names  </td>
                                                        <td>   @if($benef_name != '') {{ $benef_name }}  @endif </td>
                                                    </tr>

                                                    @if($posts->group_in == 'Individual')
                                                     <tr>
                                                        <td> District  </td>
                                                        <td>  @if($posts->district_id != '') {{ $district_list }}  @endif </td>
                                                    </tr>

                                                     <tr>
                                                        <td>    Vdc/Muncipality  </td>
                                                        <td>  {{ $posts->vdc_or_munciplity }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td> Ward No.  </td>
                                                        <td>  {{ $posts->ward_no }}</td>
                                                    </tr>

                                                    @endif
                                                      <tr>
                                                        <td> Amount  </td>
                                                        <td>  {{ $posts->amount }}</td>
                                                    </tr>

                                                 
                                                    <tr>
                                                        <td>   No of Beneficiars  </td>
                                                        <td>  {{ $posts->n_benef }}</td>
                                                    </tr>

                                                      <tr>
                                                        <td>   Nature of Project  </td>
                                                        <td>  {{ $posts->n_project }}</td>
                                                    </tr>

                                                      <tr>
                                                        <td>   Status  </td>
                                                        <td>  {{ isset($posts->status) ? $posts->status : null }}</td>
                                                    </tr>

                                                      <tr>
                                                        <td>   Date  </td>
                                                        <td>     @if($prod_date != '')  {{ date(' F jS, Y',$prod_date) }}  @endif  </td>
                                                    </tr>

                                                     <tr>
                                                        <td>     Indirect beneficiaries  </td>
                                                        <td>  {{ isset($posts) ? $posts->i_benef : null }}</td>
                                                    </tr>


                                                            <tr>
                                                        <td> Project Code  </td>
                                                        <td>  @foreach($projects as $id=>$project_code)
                       
                                                                @if($id == $posts->project_id)  
                                                                    {{$project_code}}
                                                                @endif
                                                          
                                                           @endforeach
                                                       </td>
                                                    </tr>
                                                                                <tr>
                                                        <td> Project   </td>
                                                        <td>  
                                                              @foreach($goals as $id=>$goal)
                                                                
                                                                @if($id == $posts->goal_id)  
                                                                    {{$goal}}
                                                                @endif

                                                           @endforeach
                                                       </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Indicator   </td>
                                                        <td>  
                                                              @foreach($allgoalreports['indicator'] as $key => $value )
                                
                                                                @foreach($indicator_exp as $k => $val) 
                                                                    @if($key  == $val)  
                                                                        {{$value}}, 

                                                                    @endif    
                                                                @endforeach 

                                                            @endforeach
                                
                                                       </td>
                                                    </tr>

                                                       <tr>
                                                        <td> Output   </td>
                                                        <td>  
                                                              @foreach($allgoalreports['output'] as $key => $value )
                                
                                                                @foreach($output_exp as $k => $val) 
                                                                    @if($key  == $val)  
                                                                        {{$value}}, 

                                                                    @endif    
                                                                @endforeach 

                                                            @endforeach
                                
                                                       </td>
                                                    </tr>
                                               <tr>
                                                        <td> Activity   </td>
                                                        <td>  
                                                              @foreach($allgoalreports['activity'] as $key => $value )
                                
                                                                @foreach($activity_exp as $k => $val) 
                                                                    @if($key  == $val)  
                                                                        {{$value}}, 

                                                                    @endif    
                                                                @endforeach 

                                                            @endforeach
                                
                                                       </td>
                                                    </tr>






                                                 <tr>
                                                        <td> Quarter & Year </td>
                                                               <td>    @if($posts->quarter == 1)
                                                                    1st Quarter, {{ $posts->quarter_year }}
                                                                @elseif($posts->quarter == 2)
                                                                    2nd  Quarter,  {{ $posts->quarter_year }}
                                                                @elseif($posts->quarter == 3)
                                                                    3rd  Quarter, {{ $posts->quarter_year }}
                                                                @elseif($posts->quarter == 4)
                                                                    4th  Quarter, {{ $posts->quarter_year }}
                                                                @endif   
                                                            </td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                           <!--  <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                           {{Form::model($posts, ['route'=>['sgrant.update', $posts->id], 'id'=>'demo-form2', 'class'=>'form-grid','method'=>'patch', 'data-parsley-validate','accept-charset'=>'UTF-8'])}}
                {{ Form::hidden('id', $posts->id) }}

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Group or Individual
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                   
                               {{ Form::select('group_in', [
                                   'Group' => 'Group',
                                   'Individual' => 'Individual'] ,null, ['class' => 'form-control  select-individual sumoSelect group_ind','id'=>'select-individual','required','placeholder'=>'--Select Option --']) }}

                                </div>
                            </div> 
                            


                         <div class="form-group beneficiary_in_training">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" >Beneficiaries Names
                            </label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                                 <div class="input-field-group benef-detail">
                                <select class="form-control sumoSelect col-md-7 col-xs-12 benefhideselectedit" name="benef_id[]" data-benefhideselect ="{{$posts->benef_id}}" multiple required>
                                    
                                    @foreach($benefs as $benef)

                                 
                                    <option  <?php if($posts->group_in != $benef->benef_type) { echo 'class="hide"'; } else{ foreach($benef_id as $k => $val) { if($benef->id == $val) { echo'selected="selected"'; } }  } ?>  data-attr="{{$benef->benef_type}}" value="{{$benef->id}}"  >{{$benef->name}}</option>

                                    @endforeach

                                </select>
                              </div>

                               <div class="addmore">
                                   <a href="javascript:;" class="btn btn-default btn-sm adding_benef_in_training">
                                        <i class="fa fa-plus"></i> Add New Beneficiaries
                                    </a>
                                </div>

                            </div>
                        </div>

                                <div @if($posts->group_in != 'Individual') style="display: none" @endif id="divindividualhideshow" >
                         <div class="form-group  " id="divdistrict">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="district_id">Districts
                            <span class="required">*</span></label>
                            <div class="col-md-8 col-sm-7 col-xs-12">
                            {{ Form::select('district_id', $districts ,null, ['class' => 'form-control districtifindividual sumoSelect ','placeholder'=>'Select District']) }}

                            </div>
                        </div>  
                              
                        <div class="form-group  " id="divvdcmuncipality">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="vdcmunciplity">
                               Vdc/Muncipality
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::textarea('vdc_or_munciplity', null, ['class'=>'form-control','size' => '3x3'])}}
                                             
                         </div>
                        </div>
                         <div class="form-group  " id="divwardnumber">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="ward_number">
                               ward No.
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::textarea('ward_no', null, ['class'=>'form-control ward_number ','size' => '3x3'])}}
                              
                         </div>
                        </div>
                        </div>

                         
                       <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Amount
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('amount', isset($posts) ? $posts->amount : null,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                No of Beneficiars
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('n_benef', isset($posts) ? $posts->n_benef : null ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Nature of Project
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('n_project', isset($posts) ? $posts->n_project : null,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Status
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('status', isset($posts) ? $posts->status : null ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Date<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                      
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                   
                                                <input type="text" name="g_date" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4" value="{{ isset($posts) ? $posts->g_date : null  }}">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                                Indirect beneficiaries
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('i_benef', isset($posts) ? $posts->i_benef : null ,['class' => 'form-control'] ) !!}
                                </div>
                        </div>    

                         <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type">Quarter
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
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

                            <div class="form-group" >
                               
                                {{ Form::selectRange('quarter_year', 2000, 2030 ,null, ['class'=>'sumoSelect','id'=>'quarter_select_year']) }}
                            </div>
                       
                        </div>
                    </div> 




        <div class="x_panel x_panel-box">


              
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Project Code <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-7 col-xs-12">

                        {!! Form::select('project_id', $projects,  null, ['placeholder'=>'--Select Option --','class' => 'form-control sumoSelect','required']) !!}

                    </div>
                </div>
                    
              <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12"> Project <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">

                             {!! Form::select('goal_id', $goals  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','id'=>'goalreportedit','data-format'=>'vertical','required']) !!}

                        </div>
                    </div>
        
                       <div class="form-group outputedit">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12"> Output <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">


                               <select class="form-control sumoSelect" id="outputedit" name="output_id[]" multiple required>
                               <option disabled="disabled"> -- Select --</option>
                                @foreach($allgoalreports['output'] as $key => $value )
                                
                                    <option value="{{$key }}"  @foreach($output_exp as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>

                    
                     <div class="form-group indicatoredit">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12"> Inidicator <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">

                            <select class="form-control sumoSelect" id="indicatoredit" name="indicator_id[]" multiple required>
                               <option disabled="disabled"> -- Select --</option>
                                @foreach($allgoalreports['indicator'] as $key => $value )
                                
                                    <option value="{{$key }}"  @foreach($indicator_exp as $k => $val) @if($key  == $val) selected @endif    @endforeach > {{$value}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>
    

                  

                      <div class="form-group activityedit">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12"> Activity <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">

        
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
                                <div class="form-group">
                                    <div class="submit-btn col-md-8 col-sm-7 col-xs-12 col-md-offset-4 col-sm-offset-3">
                                        <button type="submit"  class="btn btn-success">Submit</button>
                                        <a href="{{ route('sgrant.index') }}" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </div>
                   

                        </div>
                    </div>{!! Form::close() !!}



                               <div class="modal fade benef_create_form_modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                              </button>
                              <h4 class="modal-title" id="myModalLabel">Add New Beneficiaries</h4>
                            </div>
                            
                            <form id="benef_modal_create" class="form-horizontal form-label-left" method="POST" action="javascript:;">
                        
                                {{ csrf_field() }}

                                <div class="modal-body" id="modal_body_to_place_html">
                               
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--  end of modal -->

                
                <!-- </div> 
            </div>
        </div> -->

      @endsection