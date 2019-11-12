@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Logical Framework</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <br />
                {{Form::open(['route'=>'logical.createNext', 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate', 'files'=>'true'])}}
                {{-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{!! route('trainings.store') !!} " method="post">
                    {{ csrf_field() }} --}}
                    
                    
                        <div class="form-group goal">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                               Project <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-7 col-xs-12">
                                {{ Form::select('goal',$goal ,null, ['class' => 'form-control sumoSelect','placeholder'=>'--Select--', 'required']) }}
                            </div>
                        </div>
                    
                    <div class="form-footer">
                         <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Next</button>
                                <a href="{{ route('logical.index') }}" class="btn btn-danger">Cancel</a>
                                
                         </div>
                    </div>
                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
