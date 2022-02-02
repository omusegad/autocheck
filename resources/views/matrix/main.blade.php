<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script  type="text/javascript" src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">



    <!-- Styles -->
      <!-- Styles -->
      <link href="{{ asset('public/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('public/css/main.min.css') }}"  rel="stylesheet" type="text/css" />
      <link href="{{ asset('public/css/app.css') }}" rel="stylesheet"  type="text/css">

      <link href="{{ asset('public/css/main.css') }}" rel="stylesheet"  type="text/css">
      <link href="{{ asset('public/css/style.css') }}" rel="stylesheet"  type="text/css">

</head>
<body>
    <div class="pre-loader">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
            <div class="rect6"></div>
        </div>
    </div>

    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

        @include('layouts.navigation')
        <div class="app-main">

            @include('layouts.sidebar')
            <div class="app-main__outer">
                @yield('content')
            </div>
    </div>

    <script type="text/javascript" src="{{ asset('/public/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/public/js/popper.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/public/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/public/js/particles.js') }}"></script>


    <script type="text/javascript" src="{{ asset('/public/js/boostrap.min.js') }}"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="{{ asset('/public/js/filter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/public/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/public/js/main.js') }}"></script>


    @stack('custom')
</body>
</html>