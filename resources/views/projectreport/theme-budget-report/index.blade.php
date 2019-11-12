@extends('layouts.master')
@section('content')
   
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12"> 

         <div class="x_panel filter">
            <div class="x_title">
                <h2>Filter</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content bg-gray no-search">

                <form method="POST" action="javascript:;" class="form-grid-v2 filterReportForm" data-report="theme-budget-report" data-filter="filter">
                     {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Project Status</label>
                                <div class="">
                                    {{ Form::select('project_status', ['Ongoing'=>'Ongoing', 'New'=>'New'], null, ['class'=>'form-control sumoSelect', 'placeholder'=>'--Select Here--']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Year (From)</label>
                                <div class="">
                                    {{ Form::selectRange('from', 1900, date('Y'), null, ['class'=>'form-control sumoSelect', 'placeholder'=>'--Select Here--'])}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="" class="control-label">Year (To)</label>
                                <div class="">
                                    {{ Form::selectRange('to', 1900, date('Y'), null, ['class'=>'form-control sumoSelect', 'placeholder'=>'--Select Here--'])}}
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

        <div class="x_panel tableContent hide">
            <div class="x_title">
                <h2>Project Report</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="table_in_div">
                    
                </div>
            </div>
        </div>
     </div>
</div>  

@endsection



