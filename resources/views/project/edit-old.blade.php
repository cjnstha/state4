@extends('layouts.master')
    @section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Project </h2>
            
            <?php /*
             <div class="pull-right">
            <table id="edit_detail_datatable" class="table table-striped table-bordered display table_edit_data" style="display: none;">
             <thead >
                <tr>
                    <th>  </th>
                    <th>  </th>
                </tr>
                      
                </thead>
                <tbody>
                   
                         <tr>
                            <td> Project Code  </td>
                            <td>  {{ $project->project_code }}</td>
                        </tr>
                        <tr>
                            <td> Project Name    </td>
                            <td >  {{ $project->project_name }}</td>
                        </tr>
                         <tr>
                            <td>Donor Code     </td>
                            <td>  {{ $project->donor_code }}</td>
                         </tr>
                        <tr>
                            <td>  Partners/NGO   </td>
                            <td>  @foreach($partners as $key => $value)
                                        @foreach($partners_id as $k => $val) 
                                            @if($key == $val) 
                                                {{ $value }} 
                                            @endif    
                                        @endforeach 
                                 @endforeach 
                            </td>
                        </tr>
                        
                        <tr>
                       
                            <td>  District  </td>
                            <td>  @foreach($districts as $district)
                                     @foreach($district_id as $val) 
                                        @if($district->district_id == $val)
                                            {{ $district->district_name}}, 
                                        @endif   
                                    @endforeach 
                                 @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>  Start Date   </td>
                            <td>  <?php   $date = $project->start_date;
                                      $time = strtotime($date); ?>
                                     {{ date(' F jS, Y',$time) }} 
                                    
                            </td>
                        </tr>
                        <tr>
                            <td> End Date   </td>
                            <td>  <?php   $date = $project->end_date;
                                      $time = strtotime($date); ?>
                                     {{ date(' F jS, Y',$time) }} 
                                    
                            </td>
                           
                        </tr>
                        <tr>
                            <td> Signed Date   </td>
                            <td>  <?php   $date = $project->signed_date;
                                      $time = strtotime($date); ?>
                                     {{ date(' F jS, Y',$time) }} 
                                    
                            </td>
                            
                         </tr>
                        <tr>
                            <td>  Theme   </td>
                            <td>    @if( $project->theme_others== null ) 
                                        @foreach($theme as $them_id => $them_val)
                                 
                                            @if($them_id == $project->theme)
                                                 {{ $them_val}} 
                                            @endif   
                             
                                        @endforeach
                                    @else
                                          {{ $project->theme_others }}
                                   @endif
                               </td>
                        </tr>
                        <tr>
                            <td>   Donor Mailing    </td>
                            <td> {{ $project->d_mailing  }} </td>
                        </tr>
                        <tr>
                            <td>   Donor Contact    </td>
                            <td>  {{ $project->d_contact  }}</td>
                        </tr>
                        <tr>
                            <td>   Total Budget    </td>
                            <td>  NPR {{ $project->total_budget  }} </td>
                            
                        </tr>
                         <tr>
                            <td> Quarter & Year </td>
                                   <td>    @if($project->quarter == 1)
                                        1st Quarter, {{ $project->quarter_year }}
                                    @elseif($project->quarter == 2)
                                        2nd  Quarter,  {{ $project->quarter_year }}
                                    @elseif($project->quarter == 3)
                                        3rd  Quarter, {{ $project->quarter_year }}
                                    @elseif($project->quarter == 4)
                                        4th  Quarter, {{ $project->quarter_year }}
                                    @endif   
                                </td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>

            */ ?>

                                  
                                   
        <div class="clearfix"></div>
    </div>

                              

                             
                                
            <div class="x_content">
                                   

                   {{Form::model($project, ['route'=>['project.update', $project->id], 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate', 'method'=>'patch'])}}

                    {{ Form::hidden('id', $project->id) }}


                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Project Code <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <input type="text" name="project_code" required="required" class="form-control col-md-7 col-xs-12" value="{{ $project->project_code }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Project Name <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <input type="text" id="last-name" name="project_name" value="{{ $project->project_name }}" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Donor Code<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <input name="donor_code" class="form-control col-md-7 col-xs-12" value="{{ $project->donor_code }}" type="text" name="middle-name" required>
                    </div>
                </div>
                                        

                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">
                        Partners/NGO<span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-7 col-xs-12">

                          <select class="form-control sumoSelect" name="partners[]" multiple="" required="">
                                 @foreach($partners as $key => $value)
                                        <option value="{{ $key }}"    @foreach($partners_id as $k => $val) @if($key == $val) selected @endif    @endforeach >{{ $value }}</option>
                                 @endforeach
                        </select>                     
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('provinces', 'Province *',array('class'=>'control-label col-md-4 col-sm-3 col-xs-12')) !!}

                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <select class="form-control sumoSelect miscProvince" name="province_id[]" placeholder="-- Select Province --" multiple required>
                            @foreach($provinces as $distk=>$distv)
                            <option value="{{$distk}}"  @foreach($province_id_exp as $k => $val) @if($distk == $val) selected @endif    @endforeach > {{$distv}}</option>
                           @endforeach
                     </select>
                    </div>
                </div> 
                <div class="form-group">
                    {!! Form::label('districts', 'Districts *',array('class'=>'control-label col-md-4 col-sm-3 col-xs-12')) !!}

                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <select class="form-control sumoSelect miscDistrict" name="district_id[]" placeholder="-- Select District --" multiple required>
                            @foreach($districts as $distk=>$distv)
                            <option value="{{$distk}}"  @foreach($district_id_exp as $k => $val) @if($distk == $val) selected @endif    @endforeach > {{$distv}}</option>
                           @endforeach
                     </select>
                        {{-- {!! Form::select('district_id[]', $districts, array_map('intval', explode(',', $posts->districts)) ,['class' => 'form-control sumoSelect', 'multiple', 'required'] ) !!} --}}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('LocalGovernmentUnit', 'Local Government Unit *',array('class'=>'control-label col-md-4 col-sm-3 col-xs-12')) !!}

                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <select class="form-control sumoSelect miscLgu" name="lgu_id[]" placeholder="-- Select Lgu --" multiple required>
                            @foreach($lgus as $distk=>$distv)
                            <option value="{{$distk}}"  @foreach($lgu_id_exp as $k => $val) @if($distk == $val) selected @endif    @endforeach > {{$distv}}</option>
                           @endforeach
                        </select>
                    </div>
                </div>
                
                <?php /*
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Zone<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        
                         <select class="form-control   zone sumoSelect" name="zone_id[]" multiple required>
                            
                            @foreach($zones as $zid=> $zname )
                         
                            <option value="{{$zid}}"  @foreach($zoneid_exp as $k => $val) @if($zid == $val) selected @endif    @endforeach > {{$zname}}</option>

                            @endforeach
                        </select>
                         

                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">District<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-7 col-xs-12">

                     <select class="form-control   district sumoSelect" name="district_id[]" placeholder="-- Select District --" data-district ="{{$project->district_id}}" multiple required>

                    @foreach($districts as $district)
                         <option  value="{{ $district->id}}" data-attr="{{$district->zone_id}}"  @foreach($district_id as $val) @if($district->district_id == $val) selected @endif    @endforeach 
                         class="@foreach($zoneid_exp as $val) @if($district->zone_id != $val) hide @endif    @endforeach"  > {{ $district->district_name}}</option>
                    @endforeach
                    </select>
                    
                    </div>
                </div>

                */ ?>

                                        
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Start Date <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                     
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                      
                                        <input type="text" name="start_date" value="{{ $project->start_date }}" class="form-control has-feedback-left"  id="datepick-all" aria-describedby="inputSuccess2Status4">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                   
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">End Date <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                     
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                       
                                        <input type="text" name="end_date" value="{{ $project->end_date }}" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                   
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Signed Date <span class="r<option>equired">*</span>
                    </label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                       
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    
                                    <input type="text" value="{{ $project->signed_date }}" name="signed_date" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                   
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('Theme','Theme',array('class'=>'control-label col-md-4 col-sm-3 col-xs-12')) !!}
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        
                                
                        {{ Form::select('theme', $theme ,null, ['placeholder'=>'--Select--','class' => 'form-control col-md-7 col-xs-12  sumoSelect','id'=>'theme_select','required']) }}
                        @if( $project->theme_others== null ) 
                        {!! Form::text('theme_others', null ,['class' => 'form-control theme_others hide'] ) !!}
                        @else
                       {!! Form::text('theme_others', null ,['class' => 'form-control theme_others'] ) !!}
                       @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Objectives">
                    Donor Mailing</label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                      {{Form::textarea('d_mailing', null, ['class'=>'form-control col-md-7 col-xs-12','size' => '3x3', 'required'])}}
                    
                    </div>
                </div> 

                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Objectives">
                    Donor Contact</label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                      {{Form::textarea('d_contact', null, ['class'=>'form-control col-md-7 col-xs-12','size' => '3x3', 'required'])}}
                    
                    </div>
                </div> 
                                  
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Total Budget<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon">NPR</span>
                            {{ Form::input('number', 'total_budget',  $project->total_budget, ['step'=>'any', 'min'=>'1', 'placeholder'=>'Enter Total Budget', 'class' => 'form-control col-md-7 col-xs-12', 'required']) }}
                        </div>
                        {{-- <input id="middle-name" class="form-control col-md-7 col-xs-12" value="{{ $project->total_budget }}" type="text" name="total_budget"> --}}
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
                    
            <div class="form-footer">
            <div class="col-md-8 col-sm-7 col-xs-12 col-md-offset-2 col-sm-offset-3">
               
                <button type="submit"  class="btn btn-success">Submit</button>
                <a href="{{ url('/project') }}" class="btn btn-danger">Cancel</a>

             </div>
         </div>

                {{ Form::close() }}
            </div>
         </div>
    
   
    @endsection



