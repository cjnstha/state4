@extends('layouts.master')
    @section('content')
<div class="hide new_donor_section">
    <div class="form-group new_donor">
      <div class="divider"></div>
                                    <table class=" table table-bordered table-small nospace">
                                   
                                    <tbody>
                                      <tr>
                                          <td> <input type="text" name="d_name[]" required="" class="form-control" placeholder="Name"> </td>
                                          <td> <input type="text" name="d_address[]" class="form-control" placeholder="Address"> </td>
                                          <td> 
                                            <select name="d_country[]" id="" required="" class="form-control currencyClass">
                                              <option >--Select Here--</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->name}}">
                                                    {{$country->name}}
                                                </option>
                                                @endforeach
                                            </select>    
                                          </td>
                                          <td> <input type="text" name="d_contact[]" required="" class="form-control" placeholder="Contact"> </td>
                                          <td> <input type="email" name="d_email[]" required="" class="form-control" placeholder="E-Mail"> </td>
                                          <td>
                                            <a href="javascript:;">
                                              <i class="del_donor fa fa-trash-o delete-icon" ></i>
                                            </a>
                                          </td>
                                      </tr>                        
                                     
                                    </tbody>
                                </table>
                              
                                </div> 

</div>

<div class="hide new_ngo_section">
    <div class="form-group new_ngo">
        
                                <div class="divider"></div>
                                    <table class=" table table-bordered table-small nospace">
                                    
                                    <tbody>
                                      <tr>
                                          <td> <input type="text" name="ngo_name[]" required class="form-control" id="ngo_name" placeholder="NGO Name" value=""> </td>
                                          <td> <input type="text" name="ngo_address[]" required class="form-control" id="ngo_address" placeholder="NGO Address"> </td>
                                          <td> 
                                            <select name="ngo_theme[][]" required multiple id="wor_area" class="form-control currencyClass" >
                                                @foreach($thematic_area as $theme)
                                                <option value="{{$theme->id}}">
                                                    {{$theme->name}}
                                                </option>
                                                @endforeach
                                            </select>    
                                          </td>
                                          <td> <select name="dist_working[][]" required multiple id="dist_working" class="form-control currencyClass">
                                            <option >--Select Here--</option>
                                            @foreach($districts as $dis)
                                            <option value="{{$dis->id}}"> {{$dis->district_name}} </option>
                                            @endforeach
                                          </select>
                                          <td> <input type="number" name="ngo_staff[]" required class="form-control" id="no_staff"> </td>
                                          <td>
                                          <a href="javascript:;">
                                            <i class="del_ngo fa fa-trash-o delete-icon" ></i>
                                          </a>
                                          </td>
                                      </tr>                        
                                     
                                    </tbody>
                                </table>
                                
                                
                                
                                

                           


    </div>
</div>

<div class="hide new_exp_section">
    <div class="form-group new_exp">
        <div class="divider"></div>
                                    <table class=" table table-bordered table-small nospace">
                                    
                                    <tbody>
                                      <tr>
                                          <td> <input type="text" name="exp_name[]" required="" class="form-control" > </td>
                                          <td> <input type="text" name="designation[]" required="" class="form-control" > </td>
                                          <td> 
                                           <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="from_year[]" class="from-control currencyClass">
                              <option >--Select Here--</option>
                              @for($i = 1900; $i <= date('Y'); $i++)
                                <option value="{{$i}}" > {{$i}} </option>
                                @endfor
                            </select>
                        </div>
                         <div class="col-md-6 col-sm-7 col-xs-12">
                           <select class="currencyClass" name="from_month[]" >
                            <option >--Select Here--</option>
                               @foreach($months as $month)
                               <option value="{{$month->name}}" > {{$month->name}} </option>
                               @endforeach
                           </select>
                        </div>
                                          </td>
                                          <td>
                                              <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="to_year[]" class="currencyClass">
                              <option >--Select Here--</option>
                              @for($i = 1900; $i <= date('Y'); $i++)
                                <option value="{{$i}}" > {{$i}} </option>
                                @endfor
                            </select>
                        </div>
                         <div class="col-md-6 col-sm-7 col-xs-12">
                           <select class="currencyClass" name="to_month[]" >
                            <option >--Select Here--</option>
                               @foreach($months as $month)
                               <option value="{{$month->name}}" > {{$month->name}} </option>
                               @endforeach
                           </select>
                        </div>
                                          </td>
                                           <td>
                                         <input type="number" name="dependant_no[]" class="form-control">
                                          </td>
                                          <td>
                                            <a href="javascript:;">
                                            <i class="del_exp delete-icon fa fa-trash-o"></i></a>
                                          </td>
                                      </tr>                        
                                     
                                    </tbody>
                                </table>
                              

                                 
    </div>
</div>


<div class="hide new_wor_section">
  <div class="form-group new_wor">
    <div class="form-group">
                                <div class="divider"></div>
                                    <div class="new_work">
                                      <table class=" table table-bordered table-small nospace">
                                    <thead>
                                        <tr> 
                                          <th> NGO Name * </th>
                                          <th> State * </th>
                                          <th> District * </th>
                                          <th> LGU * </th>
                                          <th> Ward * </th>
                                          <th>Activity Main</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>

                                           <td>
                                            <select name="ngoname[]" required="" id="ngoname" class="form-control">
                                              <option>--Select--</option>
                                            </select>
                                          </td>
                                          
                                          <td>
                                           

                                           <select name="province_id[]" required="" id="province_id" class="form-control currencyClass">
                                            <option >--Select Here--</option>
                                             @foreach($provinces as $prov)
                                             <option value=" {{$prov->id}} "> {{$prov->name}} </option>
                                             @endforeach
                                           </select>
                                          </td>
                                          <td>
                                            <select name="district_id[]" required="" id="district_id" class="form-control currencyClass">
                                              <option >--Select Here--</option>
                                              @foreach($districts as $district)
                                              <option value="{{$district->id}}"> {{$district->district_name}} </option>
                                              @endforeach
                                            </select>
                                          </td>
                                          <td>
                                            <select name="lgu_id[]" required="" id="lgu_id" class="form-control currencyClass">
                                              <option >--Select Here--</option>
                                              @foreach($lgus as $lgu)
                                              <option value="{{$lgu->id}}"> {{$lgu->name}} </option>
                                              @endforeach
                                            </select>
                                          </td>
                                          <td>
                                            <select name="ward[]" required="" id="ward" class="form-control currencyClass">
                                              <option >--Select Here--</option>
                                              @foreach($wards as $ward)
                                              <option value="{{$ward->number}}">{{$ward->number}}</option>
                                              @endforeach
                                            </select>
                                          </td>
                                          <td>
                                            <select name="activity_main[]" id="activity_main" class="currencyClass form-control">
                                              @foreach($activities as $activity)
                                              <option value="{{$activity->id}}">{{$activity->name}}</option>
                                              @endforeach
                                            </select>
                                          </td>
                                          
                                          
                                      </tr>   
                                      <tr>
                                        <th>Activity</th>
                                        <th> Thematic Area </th>
                                           <th> Unit * </th>
                                          <th> Unit Cost * </th>
                                          <th> Total Cost * </th>
                                      </tr>  
                                      <tr>
                                        <td>
                                            <input type="text" name="activity[]" id="activity" class="form-control">
                                          </td>
                                        <td>
                                            <select name="w_detail[][]" required="" id="w_detail" multiple class="form-control currencyClass" >
                                              <option >--Select Here--</option>
                                                @foreach($thematic_area as $theme)
                                                <option value="{{$theme->id}}">
                                                    {{$theme->name}}
                                                </option>
                                                @endforeach
                                            </select> 
                                          </td>
                                          <td>
                                            <input type="number" name="unit[]" required="" id="unit" class="form-control">
                                          </td>
                                          <td>
                                            <input type="number" name="unit_cost[]" required="" id="unit_cost" class="form-control">
                                          </td>
                                          <td>
                                            <input type="number" name="total_cost[]" required="" id="total_cost" class="form-control">
                                          </td>
                                          <td>
                                            <a href="javascript:;"><i class="del_wor delete-icon fa fa-trash-o"></i></a>
                                          </td>
                                      </tr>                   
                                     
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                                
  </div>
</div>
      
   
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add New Project Agreement</h2>
                           
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div class="text-manage">
                              The elements having the symbol * are mandatory. Please fill them before submitting the form
                            </div>
                            <div class="clearfix"></div>
            
                            <form id="demo-form2" data-parsley-validate  action="{!! route('project.store') !!} " class="form-horizontal" method="post" enctype="multipart/form-data"  >
                                {{ csrf_field() }}
                                
                                
                                

                               
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">General Agreement Code *
                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <select name="ga_code" required class="sumoSelect ComGrant">
                                          <option >--Select Here--</option>
                                            @foreach($ga_code as $g_code)
                                            <option value="{{$g_code->id}}">{{$g_code->ga_code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Project Name *
                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <input type="text" name="project_name" required="" placeholder="Project Name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">INGO Name *
                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <select name="ingo_name" class="form-control sumoSelect">
                                          <option>--Select--</option>
                                          @foreach($ingos as $ingo)
                                          <option value="{{$ingo->id}}">{{$ingo->name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Project Code *
                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <input type="text" name="project_code" required="" placeholder="Project Code" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Social Welfare Reccomendation Date *
                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                     
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                  
                                                        <input type="text" name="sw_date" required class="form-control has-feedback-left " id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                   
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Project Duration From *
                                    </label>
                                    <div class="col-md-3 col-sm-7 col-xs-12">
                                       <select name="project_from_year" required id="" class="sumoSelect form-control">
                                        <option >--Select Here--</option>
                                        @for($i = 1900; $i <= date('Y'); $i++)
                                        <option value="{{$i}}" > {{$i}} </option>
                                        @endfor
                                       </select>
                                    </div>
                                    <div class="col-md-3 col-sm-7 col-xs-12">
                                        <select class="sumoSelect form-control" required name="project_from_month" >
                                          <option >--Select Here--</option>
                                    @foreach($months as $month)
                                    <option value="{{$month->name}}" > {{$month->name}} </option>
                                    @endforeach
                                </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Project Duration To *
                                    </label>
                                    <div class="col-md-3 col-sm-7 col-xs-12">
                                       <select name="project_to_year" required id="" class="sumoSelect form-control">
                                        <option >--Select Here--</option>
                                        @for($i = 1900; $i <= date('Y'); $i++)
                                        <option value="{{$i}}" > {{$i}} </option>
                                        @endfor
                                       </select>
                                    </div>
                                    <div class="col-md-3 col-sm-7 col-xs-12">
                                        <select class="sumoSelect form-control" required name="project_to_month" >
                                          <option >--Select Here--</option>
                                    @foreach($months as $month)
                                    <option value="{{$month->name}}" > {{$month->name}} </option>
                                    @endforeach
                                </select>
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Project Status *
                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                         <select name="project_status" required class="form-control sumoSelect">
                                          <option >--Select Here--</option>
                                     @foreach($project_status as $pro_stat)
                                      <option value="{{$pro_stat}}">{{$pro_stat}}</option>
                                      @endforeach
                                   </select>
                                    </div>
                                </div>
    

                                <div class="form-group align-table">
                                    <table class="table table-bordered table-small">
                                    <thead>
                                        <tr>
                                         
                                          <th> Kind of Grant </th>
                                          <th> Cost (NPR)</th>
                                          <th> Cost (Other)</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                     
                                        <tr>
                                            <td>Technical Grant *</td>
                                            <td> 
                                                <div class="project_agt">
                                         <input type="hidden" name="technical_grant_currency" value="{{$nepali_currency['id']}}">   
                        <input type="number" name="technical_grant_amount" id="technicalGrant" class="form-control has-feedback-left" required=""  placeholder="Technical Grant">
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div>
                                </td>
                                            <td>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select  name="new_technical_grant_currency" class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" placeholder="Select Here">
                                         <option >--Select Here--</option>
                                          @foreach($currency as $curr)
                                               <option value="{{$curr['id']}}">{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" name="new_technical_grant_amount" 
                                        id="newTechnicalGrant" 
                                        class="form-control number-feild col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                            
                                        </tr>


                                        <tr>
                                            <td>Commodity Grant *</td>
                                            <td> 
                                                <div class="project_agt">
                                         <input type="hidden" name="commodity_grant_currency" value="{{$nepali_currency['id']}}">   
                         <input type="number" name="commodity_grant_amount" required id="commodityGrant" class="form-control has-feedback-left" placeholder="Commodity Grant">
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div>
                                </td>
                                            <td>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select  name="new_commodity_grant_currency" class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" id="commodity_curency" placeholder="Select Here">
                                           <option >--Select Here--</option>
                                           @foreach($currency as $curr)
                                                <option value="{{$curr['id']}}">{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" name="new_commodity_grant_amount"
                                         id="newCommodityGrant"  
                                         class="form-control number-feild col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                            
                                        </tr>


                                        <tr>
                                            <td>Financial Grant *</td>
                                            <td>
                                                <div class="project_agt">
                                         <input type="hidden" name="finance_grant_currency" value="{{$nepali_currency['id']}}">
                        <input type="number" name="finance_grant_amount" required="" id="financeGrant" class="form-control has-feedback-left"  placeholder="Finance Grant">
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div>
                                            </td>
                                            <td>
                                               <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select  name="new_finance_grant_currency" class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" placeholder="Select Here">
                                           <option >--Select Here--</option>
                                           @foreach($currency as $curr)
                                                <option value="{{$curr['id']}}">{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" name="new_finance_grant_amount" 
                                        id="newFinanceGrant"  class="form-control number-feild col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                            
                                        </tr>


                                        <tr>
                                            <td>Total Grant *</td>
                                            <td>
                                                <div class="project_agt">
                                         <input type="hidden" name="total_budget_currency" value="{{$nepali_currency['id']}}">
                        <input type="number" name="total_budget_amount" required="" id="totalBudget" class="form-control has-feedback-left"  placeholder="Total Grant">
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div>
                                            </td>
                                            <td>
                                               <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select  name="new_total_budget_currency" class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" placeholder="Select Here">
                                           <option >--Select Here--</option>
                                           @foreach($currency as $curr)
                                                <option value="{{$curr['id']}}">{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" name="new_total_budget_amount" 
                                        id="newTotalBudget" 
                                        class="form-control number-feild col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                            
                                        </tr>
                                     
                                    </tbody>
                                </table>
                                </div> 

                                 
                               <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Amendment Date & Amount *
                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">            
                                                        <input type="text" required="" name="amendment_date" class="form-control has-feedback-left " id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>                      
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">
                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <input type="number" name="amendment_amount" placeholder="Amendment Amount" class="form-control">
                                    </div>
                                </div>

                               

                               {{-- End --}}
                                <div class="form-group align-table">
                                    <table class="table table-bordered table-small">
                                    <thead>
                                        <tr>
                                         
                                          <th> Budget Summary </th>
                                          <th> Cost (NPR)</th>
                                          <th> Cost (Other)</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                     
                                        <tr>
                                            <td>Adminstrative Cost *</td>
                                            <td> 
                                                <div class="project_agt">
                                         <input type="hidden" name="administrative_cost_currency" value="{{$nepali_currency['id']}}">   
                        <input type="number" name="administrative_cost_amount" required="" class="form-control has-feedback-left"  placeholder="Administrative Cost">
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div>
                                </td>
                                            <td>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select id="new_administrative_cost_currency" name="new_administrative_cost_currency" class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" placeholder="Select Here">
                                           <option >--Select Here--</option>
                                           @foreach($currency as $curr)
                                                <option value="{{$curr['id']}}">{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" name="new_administrative_cost_amount"  class="form-control number-feild col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                            
                                        </tr>


                                        <tr>
                                            <td>Programme Cost *</td>
                                            <td> <div class="project_agt">
                                         <input type="hidden" name="programme_cost_currency" value="{{$nepali_currency['id']}}">   
                        <input type="number" name="programme_cost_amount" required="" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Programme Cost">
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div></td>
                                            <td>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select id="new_budget_currency" name="new_programme_cost_currency" class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" placeholder="Select Here">
                                           <option >--Select Here--</option>
                                           @foreach($currency as $curr)
                                                <option value="{{$curr['id']}}">{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" name="new_programme_cost_amount"  class="form-control number-feild  col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                            
                                        </tr>


                                        <tr>
                                            <td>Hardware (%) *</td>
                                            <td><input name="hardware_percentage" required="" id="perHard" type="number" class="form-control col-md-7 col-xs-12" max="100" placeholder="Enter Percentage"></td>
                                            <td></td>
                                            
                                        </tr>


                                        <tr>
                                            <td>Software (%) *</td>
                                            <td><input name="software_percentage" required="" id="perSoft" type="number" class="form-control col-md-7 col-xs-12" max="100" placeholder="Enter Percentage"></td>
                                            <td></td>
                                            
                                        </tr>
                                     
                                    </tbody>
                                </table>
                                </div>  


                               <h4>Donor Detail</h4>
                                <div class="table-wrapper">
                                  <div class="form-group">
                                   
                                    <div class="">
                                      <table class="table table-bordered table-small nospace">
                                    <thead>
                                        <tr>
                                         
                                          <th> Name * </th>
                                          <th> Address * </th>
                                          <th> Country * </th>
                                          <th> Contact </th>
                                          <th> Email * </th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                          <td> <input type="text" required name="d_name[]" class="form-control" placeholder="Name"> </td>
                                          <td> <input type="text" required name="d_address[]" class="form-control" placeholder="Address"> </td>
                                          <td> 
                                            <select name="d_country[]" required id="" class="form-control sumoSelect">
                                              <option >--Select Here--</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->name}}">
                                                    {{$country->name}}
                                                </option>
                                                @endforeach
                                            </select>    
                                          </td>
                                          <td> <input type="text" name="d_contact[]" class="form-control" placeholder="Contact"> </td>
                                          <td> <input type="email" required name="d_email[]" class="form-control" placeholder="E-Mail"> </td>
                                          <td>
                                            <i class="delete-icon-disabled fa fa-trash-o"></i>
                                          </td>
                                      </tr>                        
                                     
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                                <div class="add_new_donor"></div>       
                                <div class="button-wrap">
                                      <a href="javascript:;" class="add_donor">
                                          <span class="fa fa-plus  btn-primary ngo-submit"> Add Donor</span>
                                        </a>
                                 </div>
                                </div>
                                {{-- Start of NGO Section --}}
                                
                               
                                <h4>
                                    NGO Detail
                                    </h4>
                                    <div class="table-wrapper">
                                      <div class=" form-group " id="newNGO">
                                      
                                    <div class="form-group this_ngo">
                                     
                                        <div class="">
                                          <table class="table table-bordered table-small nospace">
                                    <thead>
                                        <tr>
                                         
                                          <th> NGO Name * </th>
                                          <th> NGO Address * </th>
                                          <th> Working Area * </th>
                                          <th> District * </th>
                                          <th> Number of Staff * </th>
                                          <th></th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                          <td> <input type="text" required name="ngo_name[0]" class="form-control" id="ngo_name" placeholder="NGO Name" value=""> </td>
                                          <td> <input type="text" required name="ngo_address[0]" class="form-control" id="ngo_address" placeholder="NGO Address"> </td>
                                          <td> 
                                            <select name="ngo_theme[0][]" required multiple id="wor_area" class="form-control sumoSelect" >
                                              <option >--Select Here--</option>
                                                @foreach($thematic_area as $theme)
                                                <option value="{{$theme->id}}">
                                                    {{$theme->name}}
                                                </option>
                                                @endforeach
                                            </select>    
                                          </td>
                                          <td> <select name="dist_working[0][]" required multiple id="dist_working" class="form-control sumoSelect">
                                            <option >--Select Here--</option>
                                            @foreach($districts as $dis)
                                            <option value="{{$dis->id}}"> {{$dis->district_name}} </option>
                                            @endforeach
                                          </select>
                                          <td> <input type="number" required name="ngo_staff[0]" class="form-control" id="no_staff"> </td>
                                          <td>
                                            <i class="delete-icon-disabled fa fa-trash-o"></i>
                                          </td>
                                      </tr>                        
                                     
                                    </tbody>
                                </table>
                                        </div>
                                    </div> 
                                </div>
                                <div class="add_new_ngo"></div>
                                <div class="button-wrap">
                                  <div class="clearfix">
                                      <a href="javascript:;">
                                            <span class="append_ngo  btn-success fa fa-plus ngo-submit"> Save</span>
                                        </a>
                                 </div>
                           <div class="clearfix">
                                      <a href="javascript:;">
                                            <span class="add_ngo  btn-primary fa fa-plus ngo-submit "> Add NGO</span>
                                        </a>
                                 </div>  
                                </div>
                                    </div>

                                 

                                 <h4>Expartiate Details</h4>
                               <div class="table-wrapper">
                                  <div class="form-group">
                                  
                                    <div class="">
                                      <table class="table table-bordered table-small nospace">
                                    <thead>
                                        <tr>
                                         
                                          <th>  Name * </th>
                                          <th> Designation * </th>
                                          <th> Duration From </th>
                                          <th> Duration To </th>
                                          <th> Dependant No </th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                          <td> <input type="text" name="exp_name[]" required class="form-control" > </td>
                                          <td> <input type="text" name="designation[]" required class="form-control" > </td>
                                          <td> 
                                           <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="from_year[]" class="sumoSelect">
                              <option >--Select Here--</option>
                              @for($i = 1900; $i <= date('Y'); $i++)
                                <option value="{{$i}}" > {{$i}} </option>
                                @endfor
                            </select>
                        </div>
                         <div class="col-md-6 col-sm-7 col-xs-12">
                           <select class="sumoSelect" name="from_month[]" >
                            <option >--Select Here--</option>
                               @foreach($months as $month)
                               <option value="{{$month->name}}" > {{$month->name}} </option>
                               @endforeach
                           </select>
                        </div>
                                          </td>
                                          <td>
                                              <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="to_year[]" class="sumoSelect">
                              <option >--Select Here--</option>
                              @for($i = 1900; $i <= date('Y'); $i++)
                                <option value="{{$i}}" > {{$i}} </option>
                                @endfor
                            </select>
                        </div>
                         <div class="col-md-6 col-sm-7 col-xs-12">
                           <select class="sumoSelect" name="to_month[]" >
                            <option >--Select Here--</option>
                               @foreach($months as $month)
                               <option value="{{$month->name}}" > {{$month->name}} </option>
                               @endforeach
                           </select>
                        </div>
                                          </td>
                                          <td>
                                            <input type="number" name="dependant_no[]" class="form-control">
                                          </td>
                                          <td>
                                            <i class="delete-icon-disabled fa fa-trash-o"></i>
                                          </td>
                                      </tr>                        
                                     
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                                <div class="add_new_exp"></div>
                                <div class="button-wrap">
                                  <a href="javascript:;">
                                  <span class="add_exp  btn-primary fa fa-plus ngo-submit"> 
                                      Add Expartiate
                                  </span>
                                  </a>
                                </div>  
                               </div>
        
                           
                              
                                {{-- End of NGO Section --}}
                                <h4>Program Details</h4>
                              <div class="table-wrapper">
                                  <div class="form-group">
                                    <div class="new_work">
                                      <table class="table table-bordered table-small nospace ">
                                    <thead>
                                        <tr>
                                          <th> NGO Name * </th>
                                          <th> State * </th>
                                          <th> District * </th>
                                          <th> LGU * </th>
                                          <th> Ward * </th>
                                          <th>Activity Main</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>

                                          <td>
                                            <select name="ngoname[0]" required id="ngoname" class="form-control">
                                              <option>--Select--</option>
                                            </select>
                                          </td>
                                          <td>
                                           <select name="province_id[0]" required id="province_id" class="form-control sumoSelect">
                                            <option >--Select Here--</option>
                                             @foreach($provinces as $prov)
                                             <option value=" {{$prov->id}} "> {{$prov->name}} </option>
                                             @endforeach
                                           </select>
                                          </td>
                                          <td>
                                            <select name="district_id[0]" required id="district_id" class="form-control sumoSelect">
                                              <option >--Select Here--</option>
                                              @foreach($districts as $district)
                                              <option value="{{$district->id}}"> {{$district->district_name}} </option>
                                              @endforeach
                                            </select>
                                          </td>
                                          <td>
                                            <select name="lgu_id[0]" required id="lgu_id" class="form-control sumoSelect">
                                              <option >--Select Here--</option>
                                              @foreach($lgus as $lgu)
                                              <option value="{{$lgu->id}}"> {{$lgu->name}} </option>
                                              @endforeach
                                            </select>
                                          </td>
                                          <td>
                                            <select name="ward[0]" required id="ward" class="form-control sumoSelect">
                                              <option >--Select Here--</option>
                                              @foreach($wards as $ward)
                                              <option value="{{$ward->number}}">{{$ward->number}}</option>
                                              @endforeach
                                            </select>
                                          </td>
                                          <td>
                                        <select name="activity_main[]" id="activity_main" class="sumoSelect form-control">
                                          @foreach($activities as $activity)
                                          <option value="{{$activity->id}}">{{$activity->name}}</option>
                                          @endforeach
                                        </select>
                                      </td>
                                      </tr>                        
                                     <tr>
                                      <th>Activity</th>
                                       <th> Thematic Area </th>
                                           <th> Unit * </th>
                                          <th> Unit Cost * </th>
                                          <th> Total Cost * </th>
                                     </tr>
                                     <tr>

                                      <td>
                                            <input type="text" name="activity[0]" id="activity" class="form-control">
                                          </td>
                                       <td>
                                            <select name="w_detail[0][]" id="w_detail" multiple class="form-control sumoSelect" >
                                              <option >--Select Here--</option>
                                                @foreach($thematic_area as $theme)
                                                <option value="{{$theme->id}}">
                                                    {{$theme->name}}
                                                </option>
                                                @endforeach
                                            </select> 
                                          </td>
                                           <td>
                                            <input type="number" required name="unit[0]" id="unit" class="form-control">
                                          </td>
                                          <td>
                                            <input type="number" required name="unit_cost[0]" id="unit_cost" class="form-control">
                                          </td>
                                          <td>
                                            <input type="number" required name="total_cost[0]" id="total_cost" class="form-control">
                                          </td>
                                          <td>
                                            <i class="delete-icon-disabled fa fa-trash-o" disabled ></i>
                                          </td>
                                     </tr>
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                                <div class="add_new_wor"></div> 
                                <div class="button-wrap">
                                  <a href="javascript:;">
                                  <span class="add_wor  btn-primary fa fa-plus ngo-submit"> 
                                      Add Program Details
                                  </span>
                                  </a>
                                </div>         
                              </div>                       

                              

                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Pre-Approval Letter's Date </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                  
                                                        <input type="text" required="" name="pre_app_letter_date" class="form-control has-feedback-left " id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                   
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Rewards *
                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <textarea name="rewards" class="form-control" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Contact Documentation">Upload Documents <br />(doc, pdf, zip, rar, jpg, jpeg, png)
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse 
                                    <input type="file" name="document[]" multiple>
                                </span>
                            </label>
                            <input type="text" value="Multiple Files" class="form-control" disabled>
                        </div>
                        <!-- {{Form::file('document',null, ['class'=>'form-control'])}} -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Contact Documentation">Other Ministries/Sectors’ MOU 
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse 
                                    <input type="file" name="ministry_documents[]" multiple>
                                </span>
                            </label>
                            <input type="text" value="Multiple Files" class="form-control" disabled>
                        </div>
                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Contact Documentation">Evaluation Report <br />(doc, docx or pdf)
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse <input type="file" name="evaluation_report[]" multiple class="form-control">
                                </span>
                            </label>
                            <input type="text" value="Multiple" class="form-control" disabled>
                        </div>
                        <!-- {{Form::file('evaluation_report',null, ['class'=>'form-control'])}} -->
                        </div>
                    </div>

                                
                             
                                   

                                
                                
                                <div class="form-group">
                                    {!! Form::label('document_checklist', 'Documents Checklist',array('class'=>'control-label col-md-4 col-sm-3 col-xs-12')) !!}

                                    <div class="col-md-6 col-sm-7 col-xs-12 check-manage">
                                        
                                            
                                            @foreach($checklist as $chklist)
                                                {{-- <option value="{{ $chklist['id'] }}"> {{ $chklist['title'] }}</option> --}}
                                                <div class="checkbox checkbox-primary">
                                        <input id ="document_checklist{{ $chklist['id'] }}" value="{{ $chklist['id'] }}" name="document_checklist[]" type="checkbox"  class="classforother" >
                                
                                            <label for="document_checklist{{ $chklist['id'] }}"> 
                                             
                                             {{ $chklist['title'] }}
                                            </label>
                                            </div>
                                            @endforeach
                                        
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                               
                                 

                                
                               </div>

                              
                    
                                <div class="form-footer">
                                        <div class="col-md-6 col-sm-7 col-xs-12 col-md-offset-2 col-sm-offset-3 submit-btn">
                                      
                                            <button type="submit"  class="btn btn-success">Submit</button>
                                            <a href="{{ url('/project') }}" class="cancel-button">Cancel</a>
                                           
                                        </div>
                                </div>


                            </form>
                        </div>
                    </div>
    
           
    @endsection



