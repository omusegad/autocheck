
<div class="app-sidebar sidebar-shadow">
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
                    <span class="hamburger-bcox">
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
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="men-item d-none">
                    <a class="{{ request()->routeIs('dashboard') ? 'mm-active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt icon"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>

                <li class="men-item">
                    <a href="#">
                        <i class="fas fa-database icon"></i>Matrix
                        <i class="fas fa-chevron-down down"></i>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ request()->routeIs('matrix.index') ? 'mm-active' : '' }}" href="{{ route('matrix.index') }}">
                                <i class="metismenu-icon"></i> Matrix
                            </a>
                        </li>
                        <li>
                            <a class="{{ request()->routeIs('matrix.create') ? 'mm-active' : '' }}" href="{{ route('matrix.create') }}">
                                <i class="metismenu-icon">
                                </i>Add Matrix
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="men-item">
                    <a href="#">
                        <i class="fas fa-flag icon"></i>Map
                        <i class="fas fa-chevron-down down"></i>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ request()->routeIs('map-data.index') ? 'mm-active' : '' }}"  href="{{ route('map-data.index') }}">
                                <i class="fas fa-flag icon"></i>
                                <span>{{ __('Countries') }}</span>
                            </a>
                        </li>

                        <li>
                            <a class="{{ request()->routeIs('map-data.create') ? 'mm-active' : '' }}"  href="{{ route('map-data.create') }}">
                                <i class="metismenu-icon">
                                </i>Add Data
                            </a>
                        </li>
                    </ul>
                </li>
                @if(Auth::user()->role == "superAdmin")
                <li class="men-item">
                    <a href="#">
                        <i class="fas fa-users icon"></i> NFPs
                        <i class="fas fa-chevron-down down"></i>
                    </a>
                    <ul>

                        <li>
                            <a class="{{ request()->routeIs('member.index') ? 'mm-active' : '' }}" href="{{ route('members.index') }}">
                                <i class="metismenu-icon"></i> NFPs
                            </a>
                        </li>
                        <li>
                            <a class="{{ request()->routeIs('register') ? 'mm-active' : '' }}" href="{{ route('register') }}">
                                <i class="metismenu-icon">
                                </i>Add NFPs
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="men-item">
                    <a href="#">
                        <i class="far fa-handshake icon"></i> Partners
                        <i class="fas fa-chevron-down down"></i>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ request()->routeIs('our-partners.index') ? 'mm-active' : '' }}" href="{{ route('our-partners.index') }}">
                                <i class="metismenu-icon"></i> Our Partners
                            </a>
                        </li>
                        <li>
                            <a class="{{ request()->routeIs('partners.index') ? 'mm-active' : '' }}" href="{{ route('partners.index') }}">
                                <i class="metismenu-icon"></i>  Contacts
                            </a>
                        </li>
        
                    </ul>
                </li>


                <li class="men-item">
                    <a href="#">
                        <i class="fas fa-file-contract icon"></i> Resources
                        <i class="fas fa-chevron-down down"></i>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ request()->routeIs('all-resources.index') ? 'mm-active' : '' }}" href="{{ route('all-resources.index') }}">
                                <i class="metismenu-icon"></i> Resources
                            </a>
                        </li>
                        <li>
                            <a class="{{ request()->routeIs('all-resources.create') ? 'mm-active' : '' }}" href="{{ route('all-resources.create') }}">
                                <i class="metismenu-icon">
                                </i>Add Resources
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
