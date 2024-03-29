

<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src">
            <img class="img-fluid"  src="{{ asset('public/img/logo.png') }}"  alt="">
        </div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
        </button>
        </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">

                                    @guest
                                        @if (Route::has('login'))
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        @endif

                                        @if (Route::has('register'))
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        @endif
                                    @else
                                        <a href="{{ route('members.edit',Auth::id() ) }}" type="button" tabindex="0" class="dropdown-item">Profile</a>
                                        {{-- <button type="button" tabindex="0" class="dropdown-item">Settings</button> --}}

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @endguest
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                {{ Auth::user()->name }}
                            </div>
                        </div>
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                            <img width="42" class="rounded-circle"  src="{{ asset('public/img/prof.jpg') }}"  alt="">
                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
