@extends('layouts.master')
    @section('content')
    <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content bg-gray no-search">

                <form method="POST" action="javascript:;" id="filter-search-imp" class="form-grid-v2" >
                     {{ csrf_field() }}
                    <div class="row">
                        
                        <div class="col-md-6 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Organization Name</label>
                                <div class="">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Organization Name">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Discount Approval</label>
                                <div class="">
                                    <select class="sumoSelect form-control" name="discount">
                                    <option value="">-- Select --</option>
                              
                                    <option value="import_approval">Import Approval (आयम इजाजत)</option>
                                    <option value="import_approval_exemption">Import Approval Exemption (आयम इजाजत छूट)</option>
                                    <option value="vat_exemption">VAT Exemption (भू.अ.क. छूट)</option>
                                    <option value="custom_exemption">Custom Exemption (भन्सार छूट)</option>
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
            <h2>Import Approval Detail</h2>
            <ul class="nav navbar-right panel_toolbox">

                <li >
                    @can('add_importapprovals')
                     <span>
                           <a href="{{ route('import.create')}}" class="btn btn-primary">
                                  Add New Import Approval Detail
                              </a>
                       </span>
                    @endcan  
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="table_in_div">
            <table id="datatable" class="table table-striped table-bordered tbl_new">
                <thead>
                <tr>
                    <th>ID</th>
                    
                    <th>Name</th>
                    <th>Good Detail Name</th>

                                    
                    @can('edit_importapprovals', 'delete_importapprovals')                 
                    <th>Action</th>
                    @endcan
                    
                   
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($datas as $data)
                <tr>
                    <td>{{ $i }}</td>
                    
                    <td>{{ $data['organization_name']}}</td>
                    <td>{{ $data['goods_detail_name']}}</td>

                    
                   
                    <td>
                    @can('edit_importapprovals')
                    
                    <a href="{{ route('import.edit', $data->id)}}" class="action-btns">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    @endcan
                    @can('delete_importapprovals')
                   
                        @if($user->hasRole('Admin'))
                        <a href="{{ route('import.delete', $data->id)}}" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span></a>
                        @endif
                  @endcan
                     <a target="_blank" href="{{route('import.preview',$data->id)}}" class="action-btns">
                         <span class="glyphicon glyphicon-eye-open"></span>
                     </a>
                    </td>
                    
                </tr>
                <?php $i++; ?>
                @endforeach
               
                </tbody>
            </table>
        </div>
    </div>
    @endsection