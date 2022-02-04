<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script  type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">



    <!-- Styles -->
      <!-- Styles -->
      <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('css/main.min.css') }}"  rel="stylesheet" type="text/css" />
      <link href="{{ asset('css/app.css') }}" rel="stylesheet"  type="text/css">

      <link href="{{ asset('css/main.css') }}" rel="stylesheet"  type="text/css">
      <link href="{{ asset('css/style.css') }}" rel="stylesheet"  type="text/css">

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

    <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/particles/particles.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.j') }}"></script>


    <script type="text/javascript" src="{{ asset('js/bootstrap.min.j') }}"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/maps.js') }}"></script>


    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>


    <script>
        //fiters
        jQuery(function($) {
            dataTable = $("#matrix").DataTable({
                "columnDefs": [{
                    "targets": [0],
                    "visible": false
                }],

                "order": [[ 0, "desc" ]]
            });

            $('.filter-checkbox').on('change', function(e) {
                var searchTerms = []
                $.each($('.filter-checkbox'), function(i, elem) {
                    if ($(elem).prop('checked')) {
                        searchTerms.push("^" + $(this).val() + "$")
                    }
                })
                dataTable.column(5).search(searchTerms.join('|'), true, false, true).draw();
            });

            $('.filter-checkbox-c').on('change', function(e) {
                var searchTerms = []
                $.each($('.filter-checkbox-c'), function(i, elem) {
                    if ($(elem).prop('checked')) {
                        searchTerms.push("^" + $(this).val() + "$")
                    }
                })
                dataTable.column(4).search(searchTerms.join('|'), true, false, true).draw();
            });

            $('.pillar-dropdown').on('change', function(e) {
                var pillar = $(this).val();
                $('.pillar-dropdown').val(pillar)
                console.log(pillar)
                    //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
                dataTable.column(1).search(pillar).draw();
            });

            $('.country-dropdown').on('change', function(e) {
                var country = $(this).val();
                $('.country-dropdown').val(country)
                console.log(country)
                    //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
                dataTable.column(3).search(country).draw();
            })


        });


        jQuery(function($) {
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 160,
                    "density": {
                        "enable": false
                    }
                },
                "color": {
                    "value": ["#ed4433", '#bfbfbf']
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "speed": 4,
                        "size_min": 0.3
                    }
                },
                // "shape": {
                //     "type": ["circle", "polygon", "triangle", "hexagon"]
                // },
                "line_linked": {
                    "enable": false
                },
                "move": {
                    "random": true,
                    "speed": 1,
                    "direction": "top",
                    "out_mode": "out"
                }
            },
            "interactivity": {
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "bubble"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "repulse"
                    }
                },
                "modes": {
                    "bubble": {
                        "distance": 250,
                        "duration": 2,
                        "size": 0,
                        "opacity": 0
                    },
                    "repulse": {
                        "distance": 400,
                        "duration": 4
                    }
                }
            }
        });
    });

    window.addEventListener('load', function() {
        document.querySelector('.pre-loader').classList.add('is-loaded');
    });

    </script>

    @stack('custom')
</body>
</html>
