@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>View Import Approval Detail</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                
           {{--  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('import.update'),$importApproval->id }} " method="post" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }} --}}

                     {{Form::model($importApproval, ['route'=>['import.update', $importApproval->id], 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate', 'method'=>'patch','enctype'=>'multipart/form-data'])}}

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        Name
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" disabled="" name="organization_name" value="{{$importApproval->organization_name}}" class="form-control" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        Goods Details
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="goods_detail_name" disabled="" value=" {{$importApproval->goods_detail_name}} " class="form-control" required="">
                        </div>
                    </div>

                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {{-- <div class="browse input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    <i class="fa fa-folder-open"></i>
                                    Browse 
                                    <input type="file" name="document[]" multiple>
                                </span>
                            </label>
                            <input type="text" value="Multiple" class="form-control" disabled>
                        </div> --}}
                        <div class="multiple-files">
                                <ol class="uploaded-files">
                                     @foreach($importApproval->docs as $doc)
                                            
                                           @if($doc->document != ' ')
                                            <li>

                                                 <a class="link" href="{{ url('/files/project_document/'.$doc->document ) }}">
                                        {!! $doc->original_document !!}
                                    </a>


                                              <?php // <span>{{ $p->original_progress_doc }}</span> 
                                              ?>
                                                <div class="file-action">
                                                    
                                                    {{-- <a href="{{route('appdocs.single.delete', $doc->id) }}" class="submit">
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
                        <input type="number" name="bill_amount" disabled="" value="{{$importApproval->bill_amount}}" class="form-control has-feedback-left" >
                        <span class=" form-control-feedback left" aria-hidden="true">NPR</span>
                                    </div>
                                            </td>
                                            <td>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                         <select  name="new_bill_currency" disabled="" class="cost-feild form-control col-md-7 col-xs-12 sumoSelect" placeholder="Select Here">
                                           
                                           @foreach($currency as $curr)
                                                <option value="{{$curr['id']}}" @if($curr['id'] == $importApproval->new_bill_currency) selected @endif >{{$curr['title']}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-9 col-sm-3 col-xs-6">
                                        <input type="number" disabled="" value="{{$importApproval->new_bill_amount}}" name="new_bill_amount" 
                                        class="form-control number-feild col-md-7 col-xs-12">
                                    </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div> 

                   
                                
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time-bound"> Discount Approval
                                    </label>
                                        <div class="col-md-6 col-sm-7 col-xs-12">
                                        <div class="checkbox checkbox-primary">
                                        <input type="checkbox" id="custom_exemption" disabled  class="classforother" name="custom_exemption" @if(isset($importApproval->custom_exemption)) checked @endif >
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
                                        <input type="checkbox" id="vat_exemption" disabled  class="classforother" name="vat_exemption" @if(isset($importApproval->vat_exemption)) checked @endif>
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
                                        <input type="checkbox" id="import_approval_exemption" disabled class="classforother" name="import_approval_exemption" @if(isset($importApproval->import_approval_exemption)) checked @endif >
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
                                        <input type="checkbox" id="import_approval" disabled class="classforother" name="import_approval" @if(isset($importApproval->import_approval)) checked @endif>
                                            <label for="import_approval"> 
                                             Import Approval (आयम इजाजत)
                                            </label>
                                            </div>
                                    </div>
                                    
                                    </div>

                        



                                
                                

                                <div class="form-footer">
                       {{--  <div class="form-group">
                            <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('import.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div> --}}
                    </div>
            </form>
            </div>
        </div>
    @endsection                