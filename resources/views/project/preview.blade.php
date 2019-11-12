@extends('layouts.master')
    @section('content')
      
   
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add New Project Agreement</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                              (The Elements having the symbol * are mandatory. Please fill them before submitting)
            
                            {{Form::model($project, ['route'=>['project.update', $project->id], 'id'=>'demo-form2', 'class'=>'form-horizontal', 'data-parsley-validate', 'method'=>'patch','enctype'=>'multipart/form-data'])}}
                         <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">General Agreement Code *
                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <select name="ga_code" disabled class="sumoSelect">
                                            @foreach($ga_code as $g_code)
                                            <option value="{{$g_code->id}}"
                                              @if($project->ga_code == $g_code->id) selected @endif>
                                                {{$g_code->ga_code}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Project Name *

                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <input type="text" name="project_name" value="{{$project->project_name}}" disabled placeholder="Project Name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Project Code *

                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <input type="text" name="project_code" value="{{$project->project_code}}" disabled placeholder="Project Code" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Social Welfare Reccomendation Date  *

                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                     
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                  
                                                        <input type="text" name="sw_date" disabled value=" {{$project->sw_date}} " class="form-control has-feedback-left " id="datepick-all" aria-describedby="inputSuccess2Status4">
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
                                       <select name="project_from_year" disabled id="" class="sumoSelect form-control">
                                        @for($i = 1900; $i <= date('Y'); $i++)
                                        <option value="{{$i}}" @if($project->duration_from_year == $i) selected @endif > {{$i}} </option>
                                        @endfor
                                       </select>
                                    </div>
                                    <div class="col-md-3 col-sm-7 col-xs-12">
                                        <select class="sumoSelect form-control" disabled name="project_from_month" >
                                    @foreach($months as $month)
                                    <option value="{{$month->name}}" @if($project->duration_from_month == $month->name) selected @endif > {{$month->name}} </option>
                                    @endforeach
                                </select>
                                    </div>
                                </div>

                               

                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Project Duration To *

                                    </label>
                                    <div class="col-md-3 col-sm-7 col-xs-12">
                                       <select name="project_to_year" disabled id="" class="sumoSelect form-control">
                                        @for($i = 1900; $i <= date('Y'); $i++)
                                        <option value="{{$i}}" @if($project->duration_to_year == $i) selected @endif > {{$i}} </option>
                                        @endfor
                                       </select>
                                    </div>
                                    <div class="col-md-3 col-sm-7 col-xs-12">
                                        <select class="sumoSelect form-control" disabled name="project_to_month" >
                                    @foreach($months as $month)
                                    <option value="{{$month->name}}" @if($project->duration_to_month == $month->name) selected @endif > {{$month->name}} </option>
                                    @endforeach
                                </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Project Status *

                                    </label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                         <select name="project_status" disabled required class="form-control sumoSelect">
                                     @foreach($project_status as $pro_stat)
                                      <option value="{{$pro_stat}}" @if($project->project_status == $pro_stat) selected @endif>{{$pro_stat}}</option>
                                      @endforeach
                                   </select>
                                    </div>
                                </div>
                                <div class="form-group align-table">
                                    <table class="table table-bordered table-small">
                                    <thead>
                                        <tr>
                                         
                                          <th> Kind of Grant </th>
                                          <th> Cost(NPR)</th>
                                          <th> Cost(Other)</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                     
                                        <tr>
                                            <td>Technical Grant *</td>
                                            <td> 
                                                <div class="project_agt">
                                         <input type="hidden" name="technical_grant_currency" value="{{$nepali_currency['id']}}">   
                        <input type="number" name="technical_grant_amount" disabled id="technicalGrant" value="{{$project->technical_grant_amount}}" class="form-control has-feedback-left"  placeholder="Technical Grant">
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div>
                                </td>
                                            <td>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select  name="new_technical_grant_currency" disabled class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" placeholder="Select Here">
                                           
                                           @foreach($currency as $curr)
                                                <option value="{{$curr['id']}}" @if($project->new_technical_grant_currency == $curr['id']) selected @endif >{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" disabled name="new_technical_grant_amount" id="newTechnicalGrant" value="{{$project->new_technical_grant_amount}}" class="form-control number-feild col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                            
                                        </tr>


                                        <tr>
                                            <td>Commodity Grant *</td>
                                            <td> 
                                                <div class="project_agt">
                                         <input type="hidden" name="commodity_grant_currency" value="{{$nepali_currency['id']}}">   
                         <input type="number" name="commodity_grant_amount" disabled id="commodityGrant" value="{{$project->commodity_grant_amount}}" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Commodity Grant">
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div>
                                </td>
                                            <td>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select  name="new_commodity_grant_currency" disabled class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" placeholder="Select Here">
                                           
                                           @foreach($currency as $curr)
                                                <option value="{{$curr['id']}}" @if($project->new_commodity_grant_currency == $curr['id']) selected @endif >{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" name="new_commodity_grant_amount" disabled value="{{$project->new_commodity_grant_amount}}" id="newCommodityGrant"  class="form-control number-feild col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                            
                                        </tr>


                                        <tr>
                                            <td>Financial Grant *</td>
                                            <td>
                                                <div class="project_agt">
                                         <input type="hidden" name="finance_grant_currency" value="{{$nepali_currency['id']}}">
                        <input type="number" name="finance_grant_amount" disabled id="financeGrant" value="{{$project->finance_grant_amount}}" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Finance Grant">
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div>
                                            </td>
                                            <td>
                                               <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select  name="new_finance_grant_currency" disabled class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" placeholder="Select Here">
                                           
                                           @foreach($currency as $curr)
                                                <option value="{{$curr['id']}}" @if($curr['id'] == $project->new_finance_grant_currency) selected @endif >{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" disabled id="newFinanceGrant" name="new_finance_grant_amount" value="{{$project->new_finance_grant_amount}}"  class="form-control number-feild col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                            
                                        </tr>


                                        <tr>
                                            <td>Total Grant *</td>
                                            <td>
                                                <div class="project_agt">
                                         <input type="hidden" name="total_budget_currency" value="{{$nepali_currency['id']}}">
                        <input type="number" name="total_budget_amount" disabled id="totalBudget" value="{{$project->total_budget_amount}}" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Finance Grant">
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div>
                                            </td>
                                            <td>
                                               <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select  name="new_total_budget_currency" disabled class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" placeholder="Select Here">
                                           
                                           @foreach($currency as $curr)
                                                <option value="{{$curr['id']}}" @if($curr['id'] == $project->new_total_budget_currency) selected @endif >{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" id="newTotalBudget" disabled name="new_total_budget_amount" value="{{$project->new_total_budget_amount}}"  class="form-control number-feild col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                            
                                        </tr>
                                     
                                    </tbody>
                                </table>
                                </div> 

                                 
                               

                               

                               {{-- End --}}
                                <div class="form-group align-table">
                                    <table class="table table-bordered table-small">
                                    <thead>
                                        <tr>
                                         
                                          <th> Budget Summary </th>
                                          <th> Cost(NPR)</th>
                                          <th> Cost(Other)</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                     
                                        <tr>
                                            <td>Adminstrative Cost *</td>
                                            <td> 
                                                <div class="project_agt">
                                         <input type="hidden" name="administrative_cost_currency" value="{{$nepali_currency['id']}}">   
                        <input type="number" name="administrative_cost_amount" disabled value="{{$project->administrative_cost_amount}}" class="form-control has-feedback-left"  placeholder="Administrative Cost">
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div>
                                </td>
                                            <td>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select id="new_administrative_cost_currency" disabled name="new_administrative_cost_currency" class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" placeholder="Select Here">
                                           
                                           @foreach($currency as $curr)
                                                <option value="{{$curr['id']}}" @if($curr['id'] == $project->new_administrative_cost_currency) selected @endif >{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" disabled name="new_administrative_cost_amount" 
                                        value="{{$project->new_administrative_cost_amount}}"  class="form-control number-feild col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                            
                                        </tr>


                                        <tr>
                                            <td>Programme Cost *</td>
                                            <td> <div class="project_agt">
                                         <input type="hidden" name="programme_cost_currency" value="{{$nepali_currency['id']}}">   
                        <input type="number" name="programme_cost_amount" disabled value="{{$project->programme_cost_amount}}" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Programme Cost">
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div></td>
                                            <td>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select id="new_budget_currency" disabled name="new_programme_cost_currency" class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" placeholder="Select Here">
                                           
                                           @foreach($currency as $curr)
                                                <option value="{{$curr['id']}}" @if($curr['id'] == $project->new_budget_currency) selected @endif >{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" disabled name="new_programme_cost_amount" value="{{$project->new_programme_cost_amount}}" class="form-control number-feild  col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                            
                                        </tr>


                                        <tr>
                                            <td>Hardware (%) *</td>
                                            <td><input name="hardware_percentage" value="{{$project->hardware_percentage}}" disabled type="number" class="form-control col-md-7 col-xs-12" max="100" placeholder="Enter Percentage"></td>
                                            <td></td>
                                            
                                        </tr>


                                        <tr>
                                            <td>Software (%) *</td>
                                            <td><input name="software_percentage" value="{{$project->software_percentage}}" disabled type="number" class="form-control col-md-7 col-xs-12" max="100" placeholder="Enter Percentage"></td>
                                            <td></td>
                                            
                                        </tr>
                                     
                                    </tbody>
                                </table>
                                </div>  


                               
                               <h4>Donor Name</h4>
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
                                     @foreach($project->donor as $donor) 
                                    <tbody>
                                      <tr>
                                          <td> <input type="text" disabled  name="d_name[]" value="{{$donor->name}}" class="form-control" placeholder="Name"> </td>
                                          <td> <input type="text" disabled  name="d_address[]" 
                                            value="{{$donor->address}} " class="form-control" 
                                            placeholder="Address"> </td>
                                          <td> 
                                            <select name="d_country[]" disabled  id="" class="form-control sumoSelect">
                                                @foreach($countries as $country)
                                                <option value="{{$country->name}}" @if($country->name == $donor->country) selected @endif >
                                                    {{$country->name}}
                                                </option>
                                                @endforeach
                                            </select>    
                                          </td>
                                          <td> <input type="number" disabled  name="d_contact[]" 
                                            value="{{$donor->contact}}" class="form-control" placeholder="Contact"> </td>
                                          <td> <input type="email"  disabled name="d_email[]" value=" {{$donor->email}} " class="form-control" placeholder="E-Mail"> </td><td>
                                            <i class="delete-icon-disabled fa fa-trash-o"></i>
                                          </td>
                                      </tr>                        
                                     
                                    </tbody>
                                     @endforeach
                                </table>
                                
                                    </div>
                                </div>

                               
                               {{--  <div class="add_new_donor"></div>       
                                <div class="button-wrap">
                                      <a href="javascript:;" class="add_donor">
                                            <span class="ngo-submit  btn-primary fa fa-plus"> Add Donor</span>
                                        </a>
                                 </div> --}}
                               </div>
                                {{-- Start of NGO Section --}}
                                
                               
                               <h4>NGO Detail</h4>
                                    <div class="table-wrapper">
                                      <div class=" form-group " id="newNGO">
                                     
                                    <div class="form-group this_ngo">
                                        <div class="">
                                         
                                          <table class="table table-bordered table-small nospace">
                                    <thead>
                                        <tr>
                                         
                                          <th>  Name * </th>
                                          <th>  Address * </th>
                                          <th> Working Area * </th>
                                          <th> District * </th>
                                          <th> Number of Staff * </th>
                                          
                                        </tr>
                                    </thead>
                                     @php $countngo = 0; @endphp 
                                    @foreach($project->ngo as $ngo)
                                    <tbody>
                                      <tr>
                                          <td> <input type="text" disabled name="ngo_name[{{$countngo}}]"
                                           value=" {{$ngo->ngo_name}} " class="form-control" id="ngo_name" > </td>
                                          <td> <input type="text" disabled name="ngo_address[{{$countngo}}]" 
                                            value=" {{$ngo->ngo_address}} " class="form-control" id="ngo_address" placeholder="NGO Address"> </td>
                                          <td> 
                                            <select name="ngo_theme[{{$countngo}}][]" disabled  id="wor_area" class="form-control " >
                                              @php $this_theme = explode("|||", $ngo->ngo_theme); @endphp
                                                @foreach($thematic_area as $theme)
                                                <option value="{{$theme->id}}" @foreach($this_theme as $tt) @if($tt == $theme->id) selected @endif @endforeach>
                                                    {{$theme->name}}
                                                </option>
                                                @endforeach
                                            </select>    
                                          </td>
                                          <td> <select name="dist_working[{{$countngo}}][]" disabled multiple id="dist_working" class="form-control ">
                                            @php $this_dis = explode("|||",$ngo->dist_working); @endphp
                                            @foreach($districts as $dis)
                                            <option value="{{$dis->id}}" @foreach($this_dis as $td) @if($dis->id == $td) selected @endif @endforeach >
                                              {{$dis->name}}
                                            </option>
                                            @endforeach
                                          </select>
                                          <td> 
                                            <input type="number" disabled  name="ngo_staff[{{$countngo}}]" class="form-control" value="{{$ngo->ngo_staff}}" id="no_staff">
                                          </td><td>
                                            <i class="delete-icon-disabled fa fa-trash-o"></i>
                                          </td>
                                      </tr>                        
                                     
                                    </tbody>
                                    @php $countngo++ @endphp
                                    @endforeach
                                </table>
                                
                                        </div>
                                    </div> 
                                    
                                </div>
                                <div class="add_new_ngo"></div>
                                {{-- <div class="button-wrap">
                                  <div class="clearfix">
                                      <a href="javascript:;" >
                                            <span class="append_ngo ngo-submit btn-success fa fa-plus"> Submit</span>
                                        </a>
                                 </div>
                           <div class="clearfix">
                                      <a href="javascript:;" >
                                            <span class="add_ngo_new ngo-submit btn-primary fa fa-plus" id="data-ngo" data-count="{{$countngo}}"> Add NGO</span>
                                        </a>
                                 </div> 
                                </div> --}}
                                    </div> 

                                 
        
                                 <h4>Expatriate Details</h4>
                                <div class="table-wrapper">
                                  <div class="form-group">
                                    <div class="">
                                     
                                      <table class="table table-bordered table-small nospace">
                                    <thead>
                                        <tr>
                                         
                                          <th>  Name * </th>
                                          <th> Designation * </th>
                                          <th> Duration From  </th>
                                          <th> Duration To  </th>
                                          
                                        </tr>
                                    </thead> @foreach($project->expatriate as $expatriate)
                                    <tbody>
                                      <tr>
                                          <td> <input type="text" disabled name="exp_name[]" value="{{$expatriate->name}}" class="form-control" > </td>
                                          <td> <input type="text" disabled name="designation[]" value="{{$expatriate->designation}}" class="form-control" > </td>
                                          <td> 
                                           <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="from_year[]" disabled class="sumoSelect">
                              @for($i = 1900; $i <= date('Y'); $i++)
                                <option value="{{$i}}" @if($expatriate->from_year == $i) selected @endif > {{$i}} </option>
                                @endfor
                            </select>
                        </div>
                         <div class="col-md-6 col-sm-7 col-xs-12">
                           <select class="sumoSelect" disabled name="from_month[]" >
                               @foreach($months as $month)
                               <option value="{{$month->name}}" @if($expatriate->from_month == $month->name) selected @endif > {{$month->name}} </option>
                               @endforeach
                           </select>
                        </div>
                                          </td>
                                          <td>
                                              <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="to_year[]" disabled class="sumoSelect">
                              @for($i = 1900; $i <= date('Y'); $i++)
                                <option value="{{$i}}" @if($expatriate->to_year == $i) selected @endif> {{$i}} </option>
                                @endfor
                            </select>
                        </div>
                         <div class="col-md-6 col-sm-7 col-xs-12">
                           <select class="sumoSelect" disabled name="to_month[]" >
                               @foreach($months as $month)
                               <option value="{{$month->name}}"  @if($expatriate->to_month == $month->name) selected @endif > {{$month->name}} </option>
                               @endforeach
                           </select>
                        </div>
                                          </td>
                                          <td>
                                            <i class="delete-icon-disabled fa fa-trash-o"></i>
                                          </td>
                                      </tr>                        
                                     
                                    </tbody>
                                
                                  @endforeach</table>
                                    </div>
                                </div>
                              
                                <div class="add_new_exp"></div>
                                {{-- <div class="button-wrap">
                                  <a href="javascript:;" class="add_exp">
                                  <span class=" ngo-submit btn-primary fa fa-plus"> 
                                      Add Expartiate
                                  </span>
                                  </a>
                                </div> --}}
                                </div>  
        
                           
                              
                                {{-- End of NGO Section --}}
                               <h4>Program Details</h4>
                                <div class="table-wrapper">
                                  <div class="form-group">
                                    <div class="new_work table-responsive">
                                       <?php $countwork = 0; ?>
                                @foreach($project->work_detail as $workdetail )
                                      <table class="table table-bordered table-small nospace">
                                    <thead>
                                        <tr>
                                         
                                          <th> NGO Name * </th>
                                          <th> State * </th>
                                          <th> District * </th>
                                          <th> M/RM * </th>
                                          <th> Ward * </th>
                                          <th> Activity </th>
                                         
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                          <td>
                                            <select name="ngoname[{{$countwork}}]" disabled id="ngoname" class="form-control col-md-12">
                                              @foreach($project->ngo as $ngo)
                                              <option value="{{$ngo->ngo_name}}" @if($workdetail->ngo == $ngo->ngo_name) selected @endif>{{$ngo->ngo_name}}</option>
                                              @endforeach
                                            </select>
                                          </td>
                                          
                                          <td>
                                           

                                           <select name="province_id[{{$countwork}}]" disabled id="province_id" class="form-control sumoSelect">
                                             @foreach($provinces as $prov)
                                             <option value="{{$prov->id}}" @if($prov->id == $workdetail->province_id) selected @endif> {{$prov->name}} </option>
                                             @endforeach
                                           </select>
                                          </td>
                                          <td>
                                            <select name="district_id[{{$countwork}}]" disabled id="district_id" class="form-control sumoSelect">
                                              @foreach($districts as $district)
                                              <option value="{{$district->id}}" @if($district->id == $workdetail->district_id) selected @endif> {{$district->name}} </option>
                                              @endforeach
                                            </select>
                                          </td>
                                          <td>
                                            <select name="municiplaity[{{$countwork}}]" disabled id="municiplaity" class="form-control sumoSelect">
                                              @foreach($municipality as $mun)
                                              <option value="{{$mun}}" @if($mun == $workdetail->municiplaity) selected @endif > {{$mun}} </option>
                                              @endforeach
                                            </select>
                                          </td>
                                          <td>
                                            <select name="ward[{{$countwork}}]" disabled id="ward" class="form-control sumoSelect">
                                              @foreach($wards as $ward)
                                              <option value="{{$ward->number}}" @if($ward->number == $workdetail->ward) selected @endif>{{$ward->number}}</option>
                                              @endforeach
                                            </select>
                                          </td>
                                          <td>
                                            <input type="text" name="activity[{{$countwork}}]" disabled value="{{$workdetail->activity}}" id="activity" class="form-control">
                                          </td>
                                         
                                      </tr> 
                                      <tr>
                                         <th> Thematic Area </th>
                                          <th> Unit * </th>
                                          <th> Unit Cost * </th>
                                          <th> Total Cost * </th>
                                      </tr>                       
                                     <tr>
                                        <td>
                                            <select name="w_detail[{{$countwork}}][]" disabled id="w_detail" multiple class="form-control " >
                                              @php $w_theme = explode("|||", $workdetail->w_detail) @endphp
                                                @foreach($thematic_area as $theme)
                                                <option value="{{$theme->id}}" @foreach($w_theme as $wt)
                                                  @if($theme->id == $wt) selected @endif @endforeach>
                                                    {{$theme->name}}
                                                </option>
                                                @endforeach
                                            </select> 
                                          </td>
                                          <td>
                                            <input type="number" name="unit[{{$countwork}}]" disabled value="{{$workdetail->unit}}" id="unit" class="form-control">
                                          </td>
                                          <td>
                                            <input type="number" name="unit_cost[{{$countwork}}]" disabled value="{{$workdetail->unit_cost}}" id="unit_cost" class="form-control">
                                          </td>
                                          <td>
                                            <input type="number" name="total_cost[{{$countwork}}]" disabled value="{{$workdetail->total_cost}}" id="total_cost" class="form-control">
                                          </td>
                                          <td>
                                            <i class="delete-icon-disabled fa fa-trash-o"></i>
                                          </td>
                                          
                                     </tr>
                                    </tbody>
                                </table>
                                <?php $countwork++ ?>
                                @endforeach
                                    </div>
                                </div>
                                
                                <div class="add_new_wor"></div> 
                                {{-- <div class="button-wrap">
                                  <a href="javascript:;">
                                  <span class="add_wor_new ngo-submit btn-primary fa fa-plus" data-count="{{$countwork}}"> 
                                      Add Working Details
                                  </span>
                                  </a>
                                </div> --}}
                                </div>                                

                              

                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Pre-Approval Letter's Date<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                  
                                                        <input type="text" name="pre_app_letter_date" disabled class="form-control has-feedback-left " value="{{$project->pre_app_letter_date}}" id="datepick-all" aria-describedby="inputSuccess2Status4">
                                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                   
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Contact Documentation">Upload Documents <br />(doc, pdf, zip, rar, jpg, jpeg, png)
                        <span class="required">*</span></label>
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
                        <div class="multiple-files">
                                <ol class="uploaded-files">
                                     @foreach($project->documents as $doc)
                                            
                                           @if($doc->document != ' ')
                                            <li>

                                                 <a class="link" href="{{ url('/files/project_document/'.$doc->document ) }}">
                                        {!! $doc->orignal_document !!}
                                    </a>


                                              <?php // <span>{{ $p->original_progress_doc }}</span> 
                                              ?>
                                                <div class="file-action">
                                                    
                                                   {{--  <a href="{{route('projectdocs.single.delete', $doc->id) }}" class="submit">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </a> --}}
                                                </div>
                                            </li>
                                            @endif
                                    @endforeach
                                    </ol>
                            </div>                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Contact Documentation">Other Ministries/Sectors’ MOU <br />
                        <span class="required">*</span></label>
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
                         <div class="multiple-files">
                                <ol class="uploaded-files">
                                     @foreach($project->ministryDocuments as $min_doc)
                                            
                                            @if($min_doc->ministry_documents != '')
                                                <li>

                                                 <a class="link" href="{{ url('/files/ministry_document/'.$min_doc->ministry_documents ) }}">
                                        {!! $min_doc->orignal_ministry_documents !!}
                                    </a>


                                              <?php // <span>{{ $p->original_progress_doc }}</span> 
                                              ?>
                                                <div class="file-action">
                                                    
                                                    {{-- <a href="{{route('minprodocs.single.delete', $min_doc->id) }}" class="submit">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </a> --}}
                                                </div>
                                            </li>
                                            @endif
                                    @endforeach
                                    </ol>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Contact Documentation">Evaluation Report <br />(doc, docx or pdf)
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse <input type="file" name="evaluation_report[]" multiple class="form-control">
                                </span>
                            </label>
                            <input type="text" value="Multiple Files" class="form-control" disabled>
                        </div>
                        <div class="multiple-files">
                                <ol class="uploaded-files">
                                     @foreach($project->evaluationReport as $eva_rep)
                                            
                                            @if($eva_rep->document != '')
                                                <li>

                                                 <a class="link" href="{{ url('/files/ministry_document/'.$eva_rep->document ) }}">
                                        {!! $eva_rep->orignal_document !!}
                                    </a>


                                              <?php // <span>{{ $p->original_progress_doc }}</span> 
                                              ?>
                                                <div class="file-action">
                                                    
                                                   {{--  <a href="{{route('evarep.single.delete', $eva_rep->id) }}" class="submit">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </a> --}}
                                                </div>
                                            </li>
                                            @endif
                                    @endforeach
                                    </ol>
                            </div>
                        </div>
                    </div>

                                
                             
                                   

                                
                                
                                <div class="form-group">
                                    {!! Form::label('document_checklist', 'Documents Checklist',array('class'=>'control-label col-md-4 col-sm-3 col-xs-12')) !!}

                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        
                                            
                                            @foreach($checklist as $chklist)
                                               
                                                <div class="checkbox checkbox-primary">
                                        <input id ="document_checklist{{ $chklist['id'] }}" value="{{ $chklist['id'] }}" name="document_checklist[]" 
                                        type="checkbox" @foreach($chk_exp_id as $cie) @if($cie == $chklist->id) checked @endif @endforeach class="classforother" disabled >
                                
                                            <label for="document_checklist{{ $chklist['id'] }}"> 
                                             
                                             {{ $chklist['title'] }}
                                            </label>
                                            </div>
                                            @endforeach
                                        
                                    </div>
                                </div>
                                </div>
                                
                                
                                
                                
                                
                               
                                 

                                
                               </div>

                              
                    
                                <div class="form-footer">
                                       {{--  <div class="col-md-6 col-sm-7 col-xs-12 col-md-offset-2 col-sm-offset-3">
                                      
                                            <button type="submit"  class="btn btn-success">Submit</button>
                                            <a href="{{ url('/project') }}" class="btn btn-danger">Cancel</a>
                                           
                                        </div> --}}
                                </div>


                            {{ Form::close() }}
                        </div>
                    </div>
    
           
    @endsection



