@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Edit M&E forms and Format</h2>
                        <?php /*
                                    <div class="pull-right">
                                        <table id="mne_detail_datatable" class="table table-striped table-bordered display table_edit_data" style="display: none;">
                                         <thead >
                                            <tr>
                                                        <th> Title </th>
                                                        <th> Value </th>
                                                    </tr>
                                                  
                                            </thead>
                                            <tbody>
                                               
                                                     <tr>
                                                        <td> Type  </td>
                                                        <td>  @if($posts->mne_type != '') {{ $posts->mne_type}} @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Project Code  </td>
                                                        <td >   @if($posts->project_id != '')
                                                                    @foreach($project_code as $id => $val) 
                                                                        @if($id == $posts->project_id)
                                                                            {{ $val }} 
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td> Objective  </td>
                                                        <td >  @if($posts->obj != '')  {{ $posts->obj}}  @endif </td>
                                                    </tr>
                                                     <tr>
                                                        <td> Prepared date  </td>
                                                        <td > 
                                                             @if($posts->p_date != '') 
                                                                 @php
                                            
                                                                 $date = $posts->p_date;
                                                                 $p_date = strtotime($date);
                                                                
                                                                 @endphp  

                                                                {{ date(' F jS, Y',$p_date) }} 
                                                             @endif
                                                         </td>
                                                    </tr>
                                                     <tr>
                                                        <td> Uploaded date  </td>
                                                        <td >
                                                              @if($posts->u_date != '')
                                                                @php
                                            
                                                                 $date = $posts->u_date;
                                                                 $u_date = strtotime($date);
                                                                
                                                                 @endphp 

                                                                {{ date(' F jS, Y',$u_date) }}
                                                            @endif
                                                           </td>
                                                    </tr>
                                                     <tr>
                                                        <td> Document  </td>
                                                        <td >
                                                            @if($posts->original_document != '')
                                                              {{ isset($posts->original_document) ? $posts->original_document: ''}}
                                                            @endif  
                                                         </td>
                                                    </tr>
                                                     <tr>
                                                        <td> Keywords  </td>
                                                        <td > @if($posts->keywords != '') {{ $posts->keywords }}  @endif </td>
                                                    </tr>


                                                  
                                                </tbody>
                                            </table>
                                        </div> */ ?>


                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <br />
                {{Form::model($posts, ['route'=>['mne.update', $posts->id], 'id'=>'demo-form2', 'class'=>'form-grid','method'=>'patch', 'data-parsley-validate','files'=> 'true'])}}
                {{-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{!! route('trainings.store') !!} " method="post">
                    {{ csrf_field() }} --}}
                  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Type<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                        {{Form::select('mne_type',  ['Planning review'=>'Planning review','Follow up'=>'Follow up'], null, ['placeholder'=>'--Select--','class'=>'form-control sumoSelect col-md-7 col-xs-12', 'required'])}}
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12"> Project Code <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">

                             {!! Form::select('project_id', $project_code  ,  null, ['placeholder'=>'--Select--','class' => 'form-control sumoSelect','required']) !!}

                        </div>
                    </div>


                    <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">
                               Objective
                                <span class="required">*</span></label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                {!! Form::text('obj', null ,['class' => 'form-control'] ) !!}
                                </div>
                    </div> 
                    <div class="form-group">
                    
                                <label class="control-label col-md-4 col-sm-3 col-xs-12"> Prepared Date <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                    
                                                 {{ Form::text('p_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                    <div class="form-group">
                    
                                <label class="control-label col-md-4 col-sm-3 col-xs-12"> Uploaded Date <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                       
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                    
                                                 {{ Form::text('u_date', null, ['class' => 'form-control has-feedback-left', 'id'=>'datepick-all', 'aria-describedby'=>'inputSuccess2Status4','required']) }}
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>


                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Attach Documentation">Attach Document <br />(doc, docx or pdf)
                        <span class="required">*</span></label>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            @if($posts->original_document != '')
                                <ol class="uploaded-files">
                                    <li>
                                        <a class="link" href="{{ url('mne/downloadFile/'.$posts->document ) }}">
                                            {{isset($posts->original_document) ? $posts->original_document: ''}}
                                        </a>
                                    </li>
                                </ol>
                            @endif
                            <div class="browse input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        <i class="fa fa-folder-open"></i>
                                        Browse
                                         {{Form::file('document', ['class'=>'form-control'])}}
                                    </span>
                                </label>
                                <input type="text" class="form-control" value=" " disabled>
                            </div>
                            
                        </div>
                    </div>


                     <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="Keywords">
                               Keywords</label>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  {{Form::textarea('keywords', null, ['class'=>'form-control ','size' => '3x3'])}}
                                
                                </div>
                    </div> 

                    <div class="form-footer">
                        <div class="form-group">
                             <div class="submit-btn col-md-8 col-sm-7 col-xs-12 col-md-offset-4 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('mne.index') }}" class="btn btn-danger">Cancel</a>
                                    
                             </div>
                        </div>
                    </div>
                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
