<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" rel="stylesheet" media="all">


    <!-- Styles -->

    <link href="{{ asset('public/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/owl.carousel.min.css') }}" rel="stylesheet">

    <link href="{{ asset('public/css/main.min.css') }}"  rel="stylesheet" type="text/css" />


    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">

</head>
<body class="animsition">

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
    @yield('content')

    <script type="text/javascript" src="{{ asset('public/js/jquery-3.1.1.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/bootstrap.bundle.min.js') }}"></script>

    <script defer  type="text/javascript" src="{{ asset('public/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/particles/particles.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/js/metisMenu.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/simplebar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/waves.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/jquery.waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/jquery.counterup.min.js') }}"></script>



    <!--  -->
    <script type="text/javascript" src="{{ asset('public/js/jquery.steps.min.js') }}"></script> <!-- jquery step -->
    <script type="text/javascript" src="{{ asset('public/js/form-wizard.init.js') }}"></script><!-- form wizard init -->

     <!-- apexcharts -->
    <script type="text/javascript" src="{{ asset('public/js/apexcharts.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/dashboard.init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/main.min.js') }}"></script>


    <script>
        /*
        Adds class 'is-loaded' to the preloader once the page load to hide the preloader
        is-loaded class hides the preloader. Classes styled in css file
        */

        $(document).ready(function() {
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


            /// OWL SLIDER
            var owl = $('.landing-banner-slider');
                owl.owlCarousel({
                    loop: true,
                    margin: 5,
                    autoplayTimeout: 8000,
                    nav: false,
                    touchDrag: false,
                    mouseDrag: false,
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn',
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 1
                        },
                        1000: {
                            items: 1
                        }
                    }
                })
        });


            window.addEventListener('load', function() {
                document.querySelector('.pre-loader').classList.add('is-loaded');
            });
    </script>


</body>
</html>
