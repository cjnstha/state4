<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <?php
        $generalSetting = DB::table('general_settings')->first();
    ?>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('images/logo/favicon/'.$generalSetting->favicon)}}" />

    <title>{{ $generalSetting->title }} | {{ $generalSetting->tagline }}</title>

    <!-- Styles -->
    @include('partials.stylesheet.home')
    @yield('stylesheet')
   {!! Html::style('css/style.css') !!}
   {!! Html::style('css/parsley.css') !!}
   <script type="text/javascript">
       var base_url = "{{url('/')}}";
   </script>

</head>
<body class="@yield('class-body', 'nav-md' )" >
    <div class="container body">
        <div class="main_container">
            @include('partials.sidebar')
            @include('partials.header')
            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 main-title">
                        @include('partials.messages')
                        @yield('content')
                    </div>
                </div>
            </div>

            @include('partials.footer')
        </div>
    </div>

    @include('partials.scripts.home')
    <script type="text/javascript">
        /** ==== Generic anchor tag to submit form ==== **/
        $(document).on('click', 'a.submit', function(){
            if (confirm("{{trans('pages.labels.sure_want_to_delete')}}")) {
              $(this).closest('form').submit();
            }
        });
    </script>
    @yield('script')
    {{ Html::script('js/jquery.sumoselect.js') }}
    {{ Html::script('js/bootstrap-datepicker.min.js') }}

<script src="{!! asset('/js/progress/jquery.ui.widget.js') !!}"></script>
<script src="{!! asset('/js/progress/jquery.iframe-transport.js') !!}"></script> 
<script src="{!! asset('/js/progress/jquery.fileupload.js') !!}"></script> 

    
    {{ Html::script('js/custom.js') }}
    {{ Html::script('js/filter.js') }}
    {{ Html::script('js/goal.js') }}
    {{ Html::script('js/parsley.min.js') }}
    <!-- Custom Theme Scripts -->
<script type="text/javascript" src="{!! asset('/build/js/custom.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/js/datatable_custom.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/js/function.js') !!}"></script>
{{-- <script type="text/javascript" src="{!! asset('/js/echarts.js') !!}"></script> --}}



</body>
</html>
