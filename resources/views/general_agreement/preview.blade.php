@extends('layouts.master')
    @section('content')


        <div class="x_panel">
            <div class="x_title">
                <h2>View General Agreement Profile</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                   {{Form::model($generalagreement, ['route'=>['generalagreements.update', $generalagreement->id], 'id'=>'demo-form2', 'class'=>'form-horizontal', 'data-parsley-validate', 'method'=>'patch'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Name of INGO</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <select name="ingo_id" disabled="" class="form-control sumoSelect">
                                @foreach($ingos as $ingo)
                                <option value="{{$ingo->id}}" @if($generalagreement->ingo_id == $ingo->id) selected @endif> {{$ingo->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">General Agreement Code</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <input type="text" name="ga_code" disabled="" value="{{$generalagreement->ga_code}}" class="form-control">
                        </div>
                    </div>
                   

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Social Welfare Reccomendation Date</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('sw_recco_date', $generalagreement->sw_recco_date, ['class'=>'form-control has-feedback-left col-md-7 col-xs-12', 'id'=>'datepick-all','disabled'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                     <div class="form-group">
                                {!! Form::label('Thematic Area','Thematic Area',array('class'=>'control-label col-md-4 col-sm-3 col-xs-12')) !!}
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        
                                                
                                        {{-- <select name="thematic_area[]" class="form-control col-md-7 col-xs-12  sumoSelect" multiple>
                                            @foreach($thematic_area as $theme)
                                             <option value="{{$theme->id}}"@foreach($generalagreement->generaltheme as $generaltheme) @if($generaltheme->theme_id == $theme->id) selected @endif @endforeach> {{$theme->name}} </option>
                                            
                                            @endforeach
                                        </select> --}}

                                        @foreach($generalagreement->generaltheme as $generaltheme)
                                            {{$generaltheme->theme->name}} |

                                            @endforeach
                                        
                                       
                                    </div>
                                </div>

                     <div class="form-group">
                       <div class="row">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" >Time Bound</label>
                        <div class="form-group">
                            <div class="col-md-3 col-sm-7 col-xs-12">
                            <select name="year" disabled="" class="sumoSelect form-control col-md-7 col-xs-12">
                              @for($i = 1900; $i <= date('Y'); $i++)
                                <option value="{{$i}}" @if($generalagreement->time_bound_year == $i) selected @endif> {{$i}} </option>
                                @endfor
                            </select>
                        </div>{{$generalagreement->year}}
                         <div class="col-md-3 col-sm-7 col-xs-12">
                           <select class="sumoSelect form-control col-md-7 col-xs-12" disabled="" name="month" >
                               @foreach($months as $month)
                               <option value="{{$month->name}}" @if($generalagreement->time_bound_month == $month->name) selected @endif> {{$month->name}} </option>
                               @endforeach
                           </select>
                        </div>
                        </div>
                        <div class="new_date">
                            @foreach($generalagreement->generalRenew as $generalRenew)
                            
         
             <div class="form-group">
                <input type="hidden" name="project_id[]" value="{{$generalagreement->id}}">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" >Date of Renewal</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('date_of_renew[]', $generalRenew->date_of_renew, ['class'=>'form-control has-feedback-left col-md-7 col-xs-12', 'id'=>'datepick-all','disabled'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="form-group">
                       
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" >Time Bound</label>
                        <div class="col-md-3 col-sm-7 col-xs-12">
                            <select name="new_year[]" disabled="" class="sumoSelect">
                              @for($i = 1900; $i <= date('Y'); $i++)
                                <option value="{{$i}}" @if($generalRenew->year == $i) selected @endif > {{$i}} </option>
                                @endfor
                            </select>
                        </div>
                         <div class="col-md-3 col-sm-7 col-xs-12">
                           <select class="sumoSelect" disabled="" name="new_month[]" >
                               @foreach($months as $month)
                               <option value="{{$month->name}}" @if($generalRenew->month == $month->name) selected @endif > {{$month->name}} </option>
                               @endforeach
                           </select>
                        </div>
                        
                       
                       
                    </div>
                     
         
    @endforeach
                        </div>
                       </div>
                       {{-- <div class="col-md-6 col-sm-7 col-xs-12">
                                            <div class="form-group renew-btn">
                                                <a href="javascript:;">
                                            <span class="add_renew_time btn btn-primary fa fa-plus"> Renew Time</span>
                                        </a>
                                            </div>
                                        </div> --}}
                    </div>

                  <div class="form-group">
                                {!! Form::label('Country Director:','Country Director:',array('class'=>'control-label col-md-4 col-sm-3 col-xs-12')) !!}
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                    @foreach($generalagreement->countryDirector as $countrydirector)
                                        <div class="x_panel">
                                        <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('cd_name','Name',array('class'=>'control-label')) !!}
                                        <input type="text" name="cd_name[]" disabled="" value="{{$countrydirector->name}}"  class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                  {!! Form::label('duration_from','Duration From',array('class'=>'control-label')) !!}
                                        <div class="project_agt">
                                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('duration_from[]', $countrydirector->duration_from, ['class'=>'form-control has-feedback-left col-md-7 col-xs-12', 'id'=>'datepick-all','disabled'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                                        </div>
                                            </div>
                                        </div>
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                  {!! Form::label('duration_to','Duration To',array('class'=>'control-label')) !!}
                                        <div class="project_agt">
                                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        {{Form::text('duration_to[]', $countrydirector->duration_to, ['class'=>'form-control has-feedback-left col-md-7 col-xs-12', 'id'=>'datepick-all' ,'disabled'])}}
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </fieldset>
                                        </div>
                                            </div>
                                        </div>                                 
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                {!! Form::label('family_number','Family Members',array('class'=>'control-label')) !!}
                                        <input type="number" name="family_number[]" disabled="" value="{{$countrydirector->family_number}}"  class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    @endforeach

                                   <div class="more_cd"></div>
                                </div>  
                               
                               {{--  <div class="col-md-6 col-sm-7 col-xs-12">
                                            <div class="form-group addmore-btn">
                                                <a href="javascript:;">
                                            <span class="addmore_cd btn btn-primary fa fa-plus"> Add More</span>
                                        </a>
                                            </div>
                                        </div> --}}
                            </div>

                   

                   {{-- <div class="form-footer">
                        <div class="form-group">
                            <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                                <a href="{{ route('generalagreements.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div> --}}

                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
