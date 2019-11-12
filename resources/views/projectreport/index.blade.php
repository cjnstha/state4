@extends('layouts.master')
    @section('content')
     
   
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12"> 

         <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content bg-gray no-search">

                <form method="POST" action="javascript:;" id="filter-search-project-report" class="form-grid-v2" >
                     {{ csrf_field() }}
                    <div class="row">
                        
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">INGO</label>
                                <div class="">
                                    <select class="sumoSelect" name="ingo">
                                <option value="">-- Select --</option>
                               @foreach($ingosx as $ingx)
                               <option value="{{$ingx->name}}"> {{$ingx->name}} </option>
                                   @endforeach        
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


  

        <div class="x_panel">
            <div class="x_title">
                <h2>Project Report</h2>
                <ul class="nav navbar-right panel_toolbox">
                   
                </ul>

                <div class="clearfix"></div>
            </div>

          
            {{-- <div class="x_content">
               
                <div class="table_in_project">
                <table id="project-index" class="table table-striped table-bordered display c-blue">
                    <thead>
                    <tr>
                        <th>INGO  Name</th>
                        <th>Thematic Area</th>
                        <th>Project  Name</th>
                        <th>Status </th>
                         <th>Project  Domain</th>
                         <th>Budget</th>
                         <th>Coverage Area</th>
                         <th>Expatriate No.</th>
                    </tr>
                    </thead>

                    <tbody>
                     
                    </tbody>

                   
                </table>
           
        </div>


            </div> --}}

            <div class="x_content">
               
                <div class="table_in_project_report">
                <table id="edit_detail_datatable" class="table table-striped table-bordered display c-blue">
                    <thead>
                    <tr>
                        <th>INGO <br> Name</th>
                        <th>Country</th>
                        <th>Address</th>
                         <th>Contact Name </th>
                         <th>Contact Person </th>
                         <th>Established Date </th>
                         <th>Staff Number</th>
                    </tr>
                    </thead>

                    <tbody>
                     @foreach($ingos as $ingo)
                        <tr>
                            <td>{{$ingo->name}}</td>
                            <td>{{$ingo->country}}</td>
                            <td>{{$ingo->address}}</td>
                            <td>{{$ingo->contact_no}}</td>
                            <td>{{$ingo->contact_person}}</td>
                            <td>{{$ingo->estd_date}}</td>
                            <td>{{$ingo->staff_number}}</td>
                            </tr>
                        
                        @endforeach
                        
                    </tbody>

                   
                </table>
           
        </div>


            </div>

           {{--  <div class="x_content">
               
                <div class="table_in_project">
                <table id="com-index" class="table table-striped table-bordered display c-blue ">
                    <thead>
                    <tr>
                        <th>INGO <br> Name</th>
                        <th>Thematic Less</th>
                        <th>Budget </th>
                    </tr>
                    </thead>

                    <tbody>
                     
                    </tbody>

                   
                </table>
           
            </div>

            </div> --}}

           {{--  <div class="x_content">
               
                <div class="table_in_project">
                <table id="comm-med-index" class="table table-striped table-bordered display c-blue">
                    <thead>
                    <tr>
                        <th>INGO <br> Name</th>
                        <th>Thematic Full</th>
                        <th>Budget </th>
                    </tr>
                    </thead>

                    <tbody>
                     
                    </tbody>

                   
                </table>
           
        </div>


            </div> --}}

            {{-- <div class="x_content">
               
                <div class="table_in_project">
                <table class="table table-striped table-bordered display c-blue dataTableClass">
                    <thead>
                    <tr>
                        <th>INGO <br> Name</th>
                        <th>Thematic <br> Area </th>
                        <th>Activities </th>
                        <th>Province/District/M/RM </th>
                        <th>Budget </th>
                    </tr>
                    </thead>

                    <tbody>
                     
                    </tbody>

                   
                </table>
           
        </div>


            </div> --}}      

                  


        </div>




            



 </div>
 </div>  



@endsection



