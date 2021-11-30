<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'african-exchanges') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" rel="stylesheet">


    <!-- Styles -->
      <!-- Styles -->
      <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('css/main.min.css') }}"  rel="stylesheet" type="text/css" />
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body data-sidebar="colored">
    <div id="layout-wrapper">
        @include('layouts.navigation')
        @include('layouts.sidebar')
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/simplebar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/waves.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.counterup.min.js') }}"></script>

     <!-- apexcharts -->
    <script type="text/javascript" src="{{ asset('js/apexcharts.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dashboard.init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.min.js') }}"></script>

    @stack('custom')
</body>
</html>
