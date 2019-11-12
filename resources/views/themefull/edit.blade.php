@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Theme</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content"><div class="text-manage">
                                (The elements having the symbol * are mandatory. Please fill them before submitting the form)
                             </div>
                {{Form::model($posts, ['route'=>['themefull.update', $posts->id], 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left','method'=>'patch', 'data-parsley-validate'])}}
                 
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                        Theme name
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                        {!! Form::text('name', null,['class' => 'form-control'] ) !!}
                        </div>
                    </div>

                    
                        <div class="form-footer">
                            <div class="form-group">
                                <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('themefull.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                     
                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
