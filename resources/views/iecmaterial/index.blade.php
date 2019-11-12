@extends('layouts.master')

@section('content')
    
             <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Search 1
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <form  method="POST" action="javascript:;" id="filter-search-iec" class="form-grid-v2">
                                    {{ csrf_field() }}
                                    <div class="row">
                     
                                        <div class="col-md-4 col-xs-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="" class="control-label">Project Code</label>
                                                <div class="">
                                                    <select class="sumoSelect" name="project_code">
                                                <option value="">-- Select --</option>
                                                @foreach ($projects as $d_key => $d_val)
                                                    <option value="{{$d_key}}"> {{ $d_val}} </option>
                                                @endforeach
                                                           
                                                </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-xs-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="" class="control-label">Theme</label>
                                                <div class="">
                                                         <select class="form-control sumoSelect" name="theme">
                                                            <option value="">-- Select --</option>
                                                            <option value="education">Education</option>
                                                            <option value="gender">Gender base</option>
                                                            <option value="violence">Violence</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-xs-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="" class="control-label">Type </label>
                                                <div class="">
                                                        <select class="form-control sumoSelect" name="type">
                                                            <option value="">-- Select --</option>
                                                            <option value="Poster">Poster</option>
                                                            <option value="Broucher">Broucher</option>
                                                            <option value="Audio">Audio</option>
                                                            <option value="Video">Video</option>
                                                            <option value="Print">Print</option>
                                                            <option value="Banner">Banner</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-4 col-xs-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="" class="control-label">Quarter</label>
                                                <div class="">
                                                    <select class="sumoSelect" name="quarter">
                                                    <option value="">-- Select --</option>
                                              
                                                    <option value="1"> 1<sup>st</sup> </option>
                                                    <option value="2"> 2<sup>st</sup> </option>
                                                    <option value="3"> 3<sup>st</sup> </option>
                                                    <option value="4"> 4<sup>st</sup> </option>
                                                
                                                           
                                                </select>
                                                </div>
                                            </div>
                                        </div>



                                         <div class="col-md-4 col-xs-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="" class="control-label">Quarter Year</label>
                                                <div class="">
                                                      
                                                    <select class="sumoSelect" name="quarter_year">
                                                        <option value="">-- Select --</option>
                                                        <option value="2000">2000</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                               
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-footer text-right">
                                        
                                         <button type="submit" class="btn btn-success btn-sm">Get</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                Search 2
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <form  method="POST" action="javascript:;" id="filter-search-iec2" class="form-grid-v2">
                                    {{ csrf_field() }}
                                    <div class="row">
                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Project  <span class="required">*</span></label>
                                                    <div class="">
                                                        <select class="form-control sumoSelect" name="goal_id" id="goalreportid" data-format="searchFilter" required>
                                                            <option value="">-- Select --</option>
                                                            @foreach ($goals as  $key=>$goal)
                                                                <option value="{{$key}}"> {{ $goal}} </option>
                                                            @endforeach
                                                        </select>
                                                        {{-- {!! Form::select('goal_id', $goals  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','id'=>'goalreportid','data-format'=>'searchFilter','required']) !!} --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="" id="goal-report" style="display: none;">
                                  
                                                report will be shown
                                            </div>
                                        </div>

                                        <div class="form-footer text-right">
                                            
                                             <button type="submit" class="btn btn-success btn-sm">Get</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>



    <div class="x_panel">
        <div class="x_title">
            <h2>IEC Materials</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li >
               
                    <span>
                        <a href="{!! route('iecmaterial.create') !!}" class="btn btn-primary">
                            Add New IEC Materials
                        </a>
                     </span>

                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table_in_div">
            <table id="datatable-table-index" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Code</th>
                    <th>Theme</th>
                    <th>Type</th>
                    <th>Production Date</th>
                    <th>No. of Copies</th>
                    <th>Cost</th>
                    <th>Quarter & Year</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($iecmaterials as $key=>$mat)
               
              <?php 
                        if($mat->theme == 'education'){
                                $theme ='Education'; }
                        if($mat->theme == 'gender'){
                                $theme ='Gender base'; }        
                        if($mat->theme == 'violence') {
                                $theme ='Violence'; }    


                $pro_date =  $mat->production_date;
                $prod_date = strtotime($pro_date);
  
               ?>

                <tr>
                    <td> {{ $i }}</td>
                    <td> 

                     @foreach($projects as $id=>$project_code)
                       
                            @if($id == $mat->project_id)  
                                {{$project_code}}
                            @endif
                      
                       @endforeach
                    </td>
                      <td> @if($theme != '') {{ $theme }}  @endif </td>
                     <td> {{ $mat->type }} </td>
                    <td> {{ date(' F jS, Y',$prod_date)   }}</td>
                    <td> {{ $mat->no_of_copies }}</td>
                    <td> {{ $mat->cost }}</td>
                     <td>    @if($mat->quarter == 1)
                                1<sup>st</sup> Quarter, {{ $mat->quarter_year }}
                            @elseif($mat->quarter == 2)
                                2<sup>nd</sup>  Quarter,  {{ $mat->quarter_year }}
                            @elseif($mat->quarter == 3)
                                3<sup>rd</sup>  Quarter, {{ $mat->quarter_year }}
                            @elseif($mat->quarter == 4)
                                4<sup>th</sup>  Quarter, {{ $mat->quarter_year }}
                            @endif   
                        </td>

                    <td>
                        <a href="{{ route('iecmaterial.edit',$mat->id) }}" class="action-btns"> 
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                   
                     
                   
                    {{Form::open(['route'=>['iecmaterial.destroy', $mat->id] , 'method'=>'DELETE', 'class'=>'form-inline' ])}}
                        <a href="javascript:void(0);" class="submit action-btns"><span class="glyphicon glyphicon-trash"></span></a>
                    {{Form::close()}}
                   
                    </td>
                </tr>
                 <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
       

@endsection
