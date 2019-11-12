<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('images/logo/favicon/'.$generalSetting->favicon)}}" />

    <title>{{ $generalSetting->title }} | {{ $generalSetting->tagline }}</title>

    <!-- Styles -->

    @yield('stylesheet')
   {!! Html::style('css/style.css') !!}
   <script type="text/javascript">
       var base_url = "{{url('/')}}";
   </script>
 
</head>
<body class="@yield('class-body')" >
    <div class="container body">
        <div class="main_container">


        @yield('content')
  


        </div>
    </div>
    @yield('script')


<script type="text/javascript" src="{!! asset('/build/js/custom.min.js') !!}"></script> 

</body>
</html>
