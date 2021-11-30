    <nav id="menu-box" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <img class="assea-nav-logo" src="{{ asset('img/asea-logo.png') }}"  alt="">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul id="main-menu" class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item mt-2 mr-6">
                        <a href="https://african-exchanges.org/">Home</a>
                    </li>
                    <li class="nav-item mt-2 mr-6">
                        <a href="https://african-exchanges.org/who-we-are/">About us</a>
                    </li>
                    <li class="nav-item mt-2 mr-6">
                        <a href="https://african-exchanges.org/membership/">Membership</a>
                    </li>
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Member Login') }}</a>
                    </li>
                @endif

                    <li class="nav-item mt-2 mr-6">
                        <a href="https://african-exchanges.org/programs-partnerships/">Program</a>
                    </li>
                    <li class="nav-item mt-2 mr-6">
                        <a href="https://african-exchanges.org/media/"> Media </a>
                    </li>
                    <li class="nav-item mt-2 mr-6">
                        <a href="https://african-exchanges.org/get-in-touch/">
                          Contact us
                        </a>
                    </li>



                   @else
                    <li class="nav-item mt-2 mr-6">
                        <a href="{{ route('dashboard') }}">Dashboard</a> |
                    </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

