  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">

    <div data-simplebar class="sidebar-menu-scroll">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="uil-home-alt"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-window-section"></i>
                        <span> Countries </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('countries.index') }}">
                                <i class="uil-home-alt"></i>
                                <span>{{ __('Countries') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('countries.create') }}">
                                <i class="uil-home-alt"></i>
                                <span>{{ __('Add Countries') }}</span>
                            </a>
                        </li>
                        <li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-window-section"></i>
                        <span> Matrix </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('matrix.index') }}">
                                <i class="uil-home-alt"></i>
                                <span>{{ __('Matrix') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('matrix.create') }}">
                                <i class="uil-home-alt"></i>
                                <span>{{ __('Add Matrix') }}</span>
                            </a>
                        </li>
                        <li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-window-section"></i>
                        <span>Manage Members </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('roles.index') }}">
                                <i class="uil-home-alt"></i>
                                <span>{{ __('Manage Roles') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('members.index') }}">
                                <i class="uil-home-alt"></i>
                                <span>{{ __('Members') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">
                                <i class="uil-home-alt"></i>
                                <span>{{ __('Add Members') }}</span>
                            </a>
                        </li>

                        <li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->

    </div>
</div>
<!-- Left Sidebar End -->
