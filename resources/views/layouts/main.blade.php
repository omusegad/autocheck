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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.4.25/jodit.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

      <!-- Styles -->
      <link href="{{ asset('public/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('public/css/main.min.css') }}"  rel="stylesheet" type="text/css" />
      <link href="{{ asset('public/css/app.css') }}" rel="stylesheet"  type="text/css">

      <link href="{{ asset('public/css/main.css') }}" rel="stylesheet"  type="text/css">
      <link href="{{ asset('public/css/style.css') }}" rel="stylesheet"  type="text/css">

</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('layouts.navigation')
        <div class="app-main">

            @include('layouts.sidebar')
            <div class="app-main__outer">
                @yield('content')
            </div>
    </div>

    <script type="text/javascript" src="{{ asset('public/js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/particles/particles.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/bootstrap.bundle.min.j') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/bootstrap.min.j') }}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('public/js/maps.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/script.js') }}"></script>


    <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.4.25/jodit.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>



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

            $('.country-dropdown-nfp').on('change', function(e) {
                var country = $(this).val();
                $('.country-dropdown').val(country)
                console.log(country)
                    //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
                dataTable.column(1).search(country).draw();
            })

            $('.country-dropdown-partners').on('change', function(e) {
                var country = $(this).val();
                $('.country-dropdown').val(country)
                console.log(country)
                    //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
                dataTable.column(2).search(country).draw();
            })

            $('.category-dropdown').on('change', function(e) {
                var country = $(this).val();
                $('.country-dropdown').val(country)
                console.log(country)
                    //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
                dataTable.column(2).search(country).draw();
            })

            $('.country-map-dropdown').on('change', function(e) {
                var country = $(this).val();
                $('.country-map-dropdown').val(country)
                console.log(country)
                    //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
                dataTable.column(2).search(country).draw();
            })


        /// Editor
            var editor = new Jodit('#editor');
        //  var nextEditor = new Jodit('#nextEditor');

        // Toast js notifications
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('message'))
            toastr.success('{{ Session::get('message') }}');
        @endif


        // Tables Search Functionality
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {

		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;

		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }

		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		});
	});

    window.addEventListener('load', function() {
        document.querySelector('.pre-loader').classList.add('is-loaded');
    });

    </script>

    @stack('custom')
</body>
</html>
