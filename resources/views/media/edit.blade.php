@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Media</h2>

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
                                               // Broadcast date
                                                // $b_date =  $posts->b_date;
                                                //  print_r($b_date);
                                                // $borad_date = strtotime($b_date);
                                                // print_r($borad_date); die();

                                                                  $bdate = $posts->b_date;
                                                                    $btime = strtotime($bdate);
                                                 // Broadcast air date
                                                $b_air_date =  $posts->boardcast_air_date;
                                                $borad_air_date = strtotime($b_air_date);

                                                //produced date
                                                
                                                  $prod_date =  $posts->p_date;
                                                $produced_date = strtotime($prod_date);

                                           //    $benef_exp = explode(',', $posts->benef_id);
                                           //  $benef_array = array();

                                        
                                           // foreach($benef_exp as $dist) {
                                           //     $benefname = DB::table('benef')->select('name')->where('id',$dist)->first();

                                           //    array_push($benef_array, $benefname->name); 
                                           //  }
                                         
                                           //  $benef_name = implode(', ', $benef_array);  
                                            //print_r($benefs); die();

                                        
                                            ?>
                                            <tbody>

                                                  <tr>
                                                        <td> District  </td>
                                                        <td>  @if($posts->district_id != '') {{ $district_list }}  @endif </td>
                                                    </tr>
                                      

                                                    <tr>
                                                        <td>    Station  </td>
                                                        <td>  {{ $posts->station }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td> Type of Program  </td>
                                                        <td>  {{ $posts->p_type }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td> Episode Number </td>
                                                        <td>  {{ $posts->ep_num }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td> BoardCast Date  </td>
                                                        <td>  
                                                          
                                                           {{ date(' F jS, Y',$btime) }}  </td>
                                                    </tr>

                                                 
 
                                                     <tr>
                                                        <td> Braodcast </td>
                                                        <td>  {{ $posts->braodcast }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td>  BoardCast Air Date  </td>
                                                        <td>   {{ date(' F jS, Y',$borad_air_date) }} </td>
                                                    </tr>

                                                 <tr>
                                                        <td> Braodcast By </td>
                                                        <td>  {{ $posts->braodcast_by }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td>   Produce Date  </td>
                                                        <td>     {{ date(' F jS, Y',$produced_date) }}  </td>
                                                    </tr>

                                                     <tr>
                                                        <td> Invited Guest </td>
                                                        <td>  {{ $posts->in_guest }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td> Beneficiars </td>
                                                        <td>  {{ $posts->benef }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td> Polical Affilation </td>
                                                        <td>  {{ $posts->p_aff }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td> Theme </td>
                                                        <td>  {{ $posts->theme }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td> Produce By </td>
                                                        <td>  {{ $posts->produce_by }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td> URL </td>
                                                        <td>  {{ $posts->url }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td> Language </td>
                                                        <td>  {{ $posts->language }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td> Objectives </td>
                                                        <td>  {{ $posts->objectives }}</td>
                                                    </tr>

                                                     <tr>
                                                        <td> Keywords </td>
                                                        <td>  {{ $posts->keywords }}</td>
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
                                                        <td> Goal   </td>
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

                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <br />
                {{Form::model($posts, ['route'=>['media.update', $posts->id], 'id'=>'demo-form2', 'class'=>'form-grid','method'=>'patch', 'data-parsley-validate'])}}
    

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">District</label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                           <select class="form-control sumoSelect" name="district_id[]" multiple="" required="">
                                        <option value="">--Select--</option>
                                     @foreach($districts as $key => $value)
                                            <option value="{{ $key }}"    @foreach($district_id as $k => $val) @if($key == $val) selected @endif    @endforeach >{{ $value }}</option>
                                     @endforeach
                            </select> 
                        </div>
                </div>



          


                    
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Station
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{ Form::select('station', [
                                    ''  => '--Select--',
                                   'TV' => 'TV',
                                   'FM' => 'FM'] ,null, ['class' => 'form-control sumoSelect']) }}
                          
                        
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Type of Program
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{ Form::select('p_type', [
                                    ''  => '--Select--',
                                   'Talk show' => 'Talk show',
                                   'Radio Drama' => 'Radio Drama',
                                    'Magazine' => 'Magazine',
                                    'Report' => 'Report',
                                    'Reality Show' => 'Reality Show',
                                    'Public Screening' => 'Public Screening',
                                    'Others' => 'Other'
                                   ] ,null, ['class' => 'form-control select-p-type sumoSelect']) }}
                          
                        @if($posts->p_type== "Others")
                            {!! Form::text('p_others', null ,['class' => 'form-control p_others'] ) !!}
                        @else 
                            {!! Form::text('p_others', null ,['class' => 'form-control p_others hide'] ) !!}
                        @endif
                        
                        </div>
                    </div>

                     
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Episode Number
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('ep_num', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div> 
                    <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">BoardCast Date<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                      
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                               
                                                 {{ Form::text('b_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4']) }}    
                                                
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    {{--</div>--}}
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>


                                 <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Braodcast">
                               Braodcast <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  {{Form::textarea('braodcast', null, ['class'=>'form-control ','size' => '3x3'])}}
                                
                                </div>
                    </div> 
                           <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">BoardCast Air Date<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                            
                                               {{ Form::text('boardcast_air_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4']) }}    
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Braodcast By">
                               Braodcast By <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  {{Form::textarea('braodcast_by', null, ['class'=>'form-control ','size' => '3x3'])}}
                                
                                </div>
                    </div> 



                    <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Produce Date<span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                        {{--<input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">--}}
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                   
                                                {{ Form::text('p_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4']) }}   
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    {{--</div>--}}
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Invited Guest
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('in_guest', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Beneficiars
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('benef', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Polical Affilation
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('p_aff', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Theme
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('theme', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Produce By
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('produce_by', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        URL
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('url', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                        Language
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {!! Form::text('language', null ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Objectives">
                               Objectives</label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  {{Form::textarea('objectives', null, ['class'=>'form-control ','size' => '3x3'])}}
                                
                                </div>
                    </div> 

                        
           
                        <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Keywords">
                               Keywords</label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  {{Form::textarea('keywords', null, ['class'=>'form-control ','size' => '3x3'])}}
                                
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
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Project Code<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            {{Form::select('project_id', $projects, null, ['class'=>'form-control sumoSelect', 'placeholder'=>'--Select--'])}}
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
                                <a href="{{ route('media.index') }}" class="btn btn-danger">Cancel</a>    
                             </div>
                        </div>
                    </div>
                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
