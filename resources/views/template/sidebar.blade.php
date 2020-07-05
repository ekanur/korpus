<nav class="sidenav navbar navbar-vertical bg-primary fixed-left  navbar-expand-xs navbar-light" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" style="font-size: 1rem;color:rgba(255, 255, 255, .95);" href="{{url("/")}}">
                        ← Kembali
                    </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @if(\Request::is('dashboard/*')  or \Request::is('dashboard')) active @endif" href="{{url("dashboard")}}">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(\Request::is('kata/*') or \Request::is('kata')) active @endif" href="{{url("kata")}}">
                                <i class="ni ni-bullet-list-67 text-teal"></i>
                                <span class="nav-link-text">Frekuensi Kata</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(\Request::is('kolokasi/*') or \Request::is('kolokasi')) active @endif" href="{{url("kolokasi")}}">
                                <i class="ni ni-collection text-orange"></i>
                                <span class="nav-link-text">Frekuensi Kolokasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(\Request::is('literatur/*') or \Request::is('literatur')) active @endif" href="{{url("literatur")}}">
                                <i class="ni ni-single-copy-04 text-orange"></i>
                                <span class="nav-link-text">Literatur</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
