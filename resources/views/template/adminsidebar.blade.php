<nav class="sidenav navbar navbar-vertical bg-white fixed-left  navbar-expand-xs navbar-light" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a href="{{url("/")}}" class="btn-lihat-korpus text-blue" style="background: #F8F9FE; ">
                <div>
                    <i class="ni ni-books text-blue"></i>
                    <span>Lihat Korpus</span>
                </div>
            </a>
        </div>
        <div class="navbar-inner">

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('admin/korpus/*')  or \Request::is('admin')) active @endif" href="{{url("admin/")}}" target="">
                            <i class="ni ni-spaceship"></i>
                            <span class="nav-link-text">Korpus</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('admin/kolokasi/*')  or \Request::is('admin/kolokasi')) active @endif" href="{{url("admin/kolokasi")}}" target="">
                            <i class="ni ni-palette"></i>
                            <span class="nav-link-text">Kolokasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('admin/kata_dasar/*')  or \Request::is('admin/kata_dasar')) active @endif" href="{{url("admin/kata_dasar")}}" target="">
                            <i class="ni ni-bullet-list-67"></i>
                            <span class="nav-link-text">Kata Dasar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('admin/token/*')  or \Request::is('admin/token')) active @endif" href="{{url("admin/token")}}" target="">
                            <i class="ni ni-caps-small"></i>
                            <span class="nav-link-text">Token</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('admin/user/*')  or \Request::is('admin/user')) active @endif" href="{{url("admin/user")}}" target="">
                            <i class="ni ni-single-02"></i>
                            <span class="nav-link-text">Penanggun Jawab</span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</nav>
