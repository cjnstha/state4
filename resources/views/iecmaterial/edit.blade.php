@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit IEC Material</h2>


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
                                              if($iecmaterial->theme == 'education'){
                                                        $theme ='Education'; }
                                                if($iecmaterial->theme == 'gender'){
                                                        $theme ='Gender base'; }        
                                                if($iecmaterial->theme == 'violence') {
                                                        $theme ='Violence'; }  


                                                //production date
                                                $pro_date =  $iecmaterial->production_date;
                                                $prod_date = strtotime($pro_date);

                                            ?>
                                            <tbody>
                                                <tr>
                                                        <td> Theme  </td>
                                                        <td>  @if($theme != '') {{ $theme }}  @endif  </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Focal Person  </td>
                                                        <td>  
                                                              @foreach($staff_name as $id=>$name)
                       
                                                                @if($id == $iecmaterial->staff_id)  
                                                                    {{$name}}
                                                                @endif
                                                          
                                                           @endforeach

                                                     </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Type  </td>
                                                        <td>  {{ $iecmaterial->type }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Target Audience  </td>
                                                        <td>  {{ $iecmaterial->target_audience }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Production Date  </td>
                                                        <td>    {{ date(' F jS, Y',$prod_date)   }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td>  No. of Copies  </td>
                                                        <td>  {{ $iecmaterial->no_of_copies }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Cost  </td>
                                                        <td>  {{ $iecmaterial->cost }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Sample  </td>
                                                        <td>  {{ $iecmaterial->sample }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Language  </td>
                                                        <td>  {{ $iecmaterial->language }}</td>
                                                    </tr>


                                                    <tr>
                                                        <td> Project code  </td>
                                                        <td>  
                                                              @foreach($projects as $id=>$project_code)
                       
                                                                @if($id == $iecmaterial->project_id)  
                                                                    {{$project_code}}
                                                                @endif
                                                          
                                                           @endforeach
                                                       </td>
                                                    </tr>

                                                   <tr>
                                                        <td> Goal   </td>
                                                        <td>  
                                                              @foreach($goals as $id=>$goal)
                                                                
                                                                @if($id == $iecmaterial->goal_id)  
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
                                                               <td>    @if($iecmaterial->quarter == 1)
                                                                    1st Quarter, {{ $iecmaterial->quarter_year }}
                                                                @elseif($iecmaterial->quarter == 2)
                                                                    2nd  Quarter,  {{ $iecmaterial->quarter_year }}
                                                                @elseif($iecmaterial->quarter == 3)
                                                                    3rd  Quarter, {{ $iecmaterial->quarter_year }}
                                                                @elseif($iecmaterial->quarter == 4)
                                                                    4th  Quarter, {{ $iecmaterial->quarter_year }}
                                                                @endif   
                                                            </td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                {{Form::model($iecmaterial, ['route'=>['iecmaterial.update', $iecmaterial->id], 'id'=>'demo-form2', 'class'=>'form-grid', 'data-parsley-validate', 'method'=>'patch', 'files'=> 'true'])}}
                {{ Form::hidden('id', $iecmaterial->id) }}
               
                           <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Theme <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{ Form::select('theme', [
                                    ''  => '--Select Option --',
                                   'education' => 'Education',
                                   'gender' => 'Gender base',
                                   'violence' => 'Violence'] ,null, ['class' => 'form-control sumoSelect','required']) }}
                          
                        </div>
                </div>


                 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Focal Person <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">

                             {!! Form::select('staff_id',   $staff_name  ,  null, ['placeholder'=>'--Select Option --','class' => 'form-control sumoSelect','required']) !!}

                        </div>
                    </div>

                <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Type</label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{ Form::select('type', [
                                    ''  => '--Select Option --',
                                   'Poster' => 'Poster',
                                   'Broucher' => 'Broucher',
                                   'Audio' => 'Audio',
                                    'Video' => 'Video',
                                   'Print' => 'Print',
                                   'Banner' => 'Banner'] ,null, ['class' => 'form-control sumoSelect','required']) }}
                           
                        </div>
                </div>


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type">Target Audience
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{Form::text('target_audience', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                    </div>

                <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Production Date <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">            
                                               
                                                 {{ Form::text('production_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span> 
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>


                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type"> No. of Copies
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{Form::text('no_of_copies', null, ['class'=>'form-control col-md-7 col-xs-12','required'])}}
                        </div>
                    </div>

                     <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Cost<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-7 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">NPR</span>
                                            {{ Form::text('cost', null, ['placeholder'=>'Enter Total Cost', 'class' => 'form-control col-md-7 col-xs-12', 'required']) }}
                                        </div>
                                       
                                    </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="type">Sample</label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{Form::text('sample', null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'https://www.google.com'])}}
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Language<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                
                          {{ Form::select('language[]', [
                                    'nepali' => 'Nepali',
                                   'english' => 'English'] ,$language, ['class' => 'form-control sumoSelect','multiple','required']) }}
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
                        <label class="control-label col-md-4 col-sm-3 col-xs-12"> Indicator <span class="required">*</span></label>
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

                                             

                    
                    <div class="form-footer" >
                        <div class="col-md-8 col-sm-7 col-xs-12 col-md-offset-2 col-sm-offset-3">
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{ route('iecmaterial.index') }}" class="btn btn-danger">Cancel</a>
                            {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                        </div>
                    </div>

                {{Form::close()}}
            </div>
        </div>

    @endsection
