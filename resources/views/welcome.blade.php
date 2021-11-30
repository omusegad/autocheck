<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ASEA</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/main.min.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
        <div class="main-site">
            {{-- @include('layouts.topmenu') --}}
            {{-- @include('layouts.guest_navigation') --}}
           <div class="container-fluid">
            <div class="row justify-items-center">
                <div class="col-lg-12">
                    <h5>welcome</h5>
                </div>
            </div>
           </div>
           <div class="clearfix"></div>
           {{-- @include('layouts.footer') --}}

        </div>

      <!-- JAVASCRIPT -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/apexcharts.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/apexcharts.init.js') }}"></script>
</body>
</html>
