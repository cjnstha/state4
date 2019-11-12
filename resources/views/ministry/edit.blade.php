@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Ministry</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content"><div class="text-manage">
                                (The elements having the symbol * are mandatory. Please fill them before submitting the form)
                             </div>
                {{Form::model($ministry, ['route'=>['ministry.update', $ministry->id], 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left','method'=>'patch', 'data-parsley-validate'])}}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                        Ministry Name
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {!! Form::text('name', $ministry->name ,['class' => 'form-control'] ) !!}
                        </div>
                    </div>

                    
                    
                    <div class="form-footer">
                        <div class="form-group">
                            <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Update</button>
                                <a href="{{ route('ministry.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>


                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
