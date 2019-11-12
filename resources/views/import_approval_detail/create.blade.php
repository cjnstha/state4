@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Import Approval Detail</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <div class="text-manage">
                                (The elements having the symbol * are mandatory. Please fill them before submitting the form)
                             </div>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('import.store')}} " method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        Organization Name
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="organization_name" class="form-control" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        Goods Details
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="goods_detail_name" class="form-control" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse 
                                    <input type="file" name="document[]" multiple>
                                </span>
                            </label>
                            <input type="text" value="Multiple" class="form-control" disabled>
                        </div>
                        </div>
                        </div>
                        <div class="form-group align-table">
                                    <table class="table table-bordered table-small">
                                    <thead>
                                        <tr>
                                         
                                          
                                          <th> Bill Amount (NPR)</th>
                                          <th> Bill Amount (Other)</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr> 
                                            <td>
                                                <div class="project_agt">
                                         <input type="hidden" name="bill_currency" value="{{$nepali_currency['id']}}">   
                        <input type="number" name="bill_amount" class="form-control has-feedback-left" >
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div>
                                            </td>
                                            <td>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select  name="new_bill_currency" class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" placeholder="Select Here">
                                           
                                           @foreach($currency as $curr)
                                                <option value="{{$curr['id']}}">{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" name="new_bill_amount" 
                                        class="form-control number-feild col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        Pre-Approval Date
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <fieldset>
                             <div class="control-group">
                              <div class="controls">                     
                               <input type="text" required name="pre_approval_date" class="form-control has-feedback-left" id="datepick-all" aria-describedby="inputSuccess2Status4">
                               <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                               <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                             </div>
                           </fieldset>
                        </div>
                    </div>  
                    

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        Approval from Ministry
                        <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-7 col-xs-12">
                            <select name="ministry_id" class="form-control sumoSelect">
                                <option>--Select--</option>
                                @foreach($ministry as $m)
                                <option value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse 
                                    <input type="file" name="ministry_approval[]" multiple>
                                </span>
                            </label>
                            <input type="text" value="Multiple" class="form-control" disabled>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            Assurance Letter
                        </label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse 
                                    <input type="file" name="assurance_letter[]" multiple>
                                </span>
                            </label>
                            <input type="text" value="Multiple" class="form-control" disabled>
                        </div>
                        </div>
                        </div>


                        <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time-bound"> Discount Approval
                                    </label>
                                        <div class="col-md-6 col-sm-7 col-xs-12">
                                        <div class="checkbox checkbox-primary">
                                        <input type="checkbox" id="custom_exemption"  class="classforother" name="custom_exemption">
                                            <label for="custom_exemption"> 
                                             Custom Exemption (भन्सार छूट)
                                            </label>
                                            </div>
                                    </div>

                                    </div>

                                     <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time-bound">
                                    </label>
                                        <div class="col-md-6 col-sm-7 col-xs-12">
                                        <div class="checkbox checkbox-primary">
                                        <input type="checkbox" id="vat_exemption"  class="classforother" name="vat_exemption">
                                            <label for="vat_exemption"> 
                                             VAT Exemption (भू.अ.क. छूट)
                                            </label>
                                            </div>
                                    </div>
                                    
                                    </div>

                                     <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time-bound">
                                    </label>
                                        <div class="col-md-6 col-sm-7 col-xs-12">
                                        <div class="checkbox checkbox-primary">
                                        <input type="checkbox" id="import_approval_exemption" class="classforother" name="import_approval_exemption">
                                            <label for="import_approval_exemption"> 
                                             Import Approval Exemption (आयम इजाजत छूट)
                                            </label>
                                            </div>
                                    </div>
                                    
                                    </div>

                                     <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time-bound"> 
                                    </label>
                                        <div class="col-md-6 col-sm-7 col-xs-12">
                                        <div class="checkbox checkbox-primary">
                                        <input type="checkbox" id="import_approval" class="classforother" name="import_approval">
                                            <label for="import_approval"> 
                                             Import Approval (आयम इजाजत)
                                            </label>
                                            </div>
                                    </div>
                                    
                                    </div>

                                
                                

                                <div class="form-footer">
                        <div class="form-group">
                            <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('import.index') }}" class="cancel-button">Cancel</a>
                            </div>
                        </div>
                    </div>
            </form>
            </div>
        </div>
    @endsection                