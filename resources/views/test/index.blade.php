@extends('layouts.master')

@section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>Test</h2>
           
            <div class="clearfix"></div>
        </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"> Select Test
            <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::select('question_set_id', $question_set,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect', 'id'=>'test']) !!}
          
            </div>
        </div>

        <div class="x_content" id="myModal" style="display: none;">
            modal will be here

        </div>

       

       
    </div>

@endsection

