<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.min.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body class="authentication-bg">
    @yield('content')

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/simplebar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/waves.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.counterup.min.js') }}"></script>

    <!--  -->
    <script type="text/javascript" src="{{ asset('js/jquery.steps.min.js') }}"></script> <!-- jquery step -->
    <script type="text/javascript" src="{{ asset('js/form-wizard.init.js') }}"></script><!-- form wizard init -->

     <!-- apexcharts -->
    <script type="text/javascript" src="{{ asset('js/apexcharts.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dashboard.init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.min.js') }}"></script>
</body>
</html>
