@extends('layouts.master')
    @section('content')
    	 <div class="x_panel">
        <div class="x_title">
            <h2>Currency Management</h2>
            <ul class="nav navbar-right panel_toolbox">

                <li >
                    @can('add_currencymgmts')
                     <span>
                           <a href="{{ route('currency.create')}}" class="btn btn-primary">
                                  Add New  Currency
                              </a>
                       </span>
                    @endcan  
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    
                    <th>Title</th>

                    <th>Symbol</th>
                                    
                    @can('edit_currencymgmts', 'delete_currencymgmts')                 
                    <th>Action</th>
                    @endcan
                    
                   
                </tr>
                </thead>

                <tbody>
                    <?php  $i=1; ?>
                @foreach($data as $datas)	
                <tr>
                    <td>{{ $i }}</td>
                    
                    <td>{{ $datas['title'] }}</td>

                    <td>{{ $datas['symbol'] }}</td>
                    @can('edit_currencymgmts')
                    <td>
                    
                    @if($datas['title'] != 'NPR')
                    <a href="{{ route('currency.edit', $datas->id)}}" class="action-btns">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                   
                        <a href="{{ route('currency.delete', $datas->id)}}" class="action-btns submit"><span class="glyphicon glyphicon-trash"></span></a>
                        @endif
                    
                  
                    </td>
                    @endcan
                </tr>
                <?php $i++; ?>
                @endforeach
               
                </tbody>
            </table>
        </div>
    </div>
    @endsection