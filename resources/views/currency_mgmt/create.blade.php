@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Currency</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('currency.store')}}" method="post">
                    {{ csrf_field() }} 
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">
                        Title
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="title" class="form-control" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="symbol">
                        Symbol
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="symbol" class="form-control" required="">
                        </div>
                    </div>
                    
                    <div class="form-footer">
                        <div class="form-group">
                            <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('currency.index') }}" class="cancel-button">Cancel</a>
                            </div>
                        </div>
                    </div>


                </form>
            
            </div>
        </div>

    @endsection
