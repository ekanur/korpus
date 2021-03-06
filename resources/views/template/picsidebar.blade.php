<nav class="sidenav navbar navbar-vertical bg-white fixed-left  navbar-expand-xs navbar-light" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a href="{{url("/pilih_korpus")}}" class="btn-lihat-korpus text-blue" style="background: #FFF; ">
                <div>
                    <img src="{{asset("assets/img/brand/logo.jpg")}}" alt="" srcset="" class="img img-fluid d-inline-block align-top" width="30">
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
                        <a class="nav-link @if(\Request::is('pic/kategori/*')  or \Request::is('pic')) active @endif" href="{{url("pic/")}}" target="">
                            <i class="ni ni-tag"></i>
                            <span class="nav-link-text">Kategori</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('pic/kolokasi/*')  or \Request::is('pic/kolokasi')) active @endif" href="{{url("pic/kolokasi")}}" target="">
                            <i class="ni ni-palette"></i>
                            <span class="nav-link-text">Kolokasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('pic/kata_dasar/*')  or \Request::is('pic/kata_dasar')) active @endif" href="{{url("pic/kata_dasar")}}" target="">
                            <i class="ni ni-bullet-list-67"></i>
                            <span class="nav-link-text">Kata Dasar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('pic/token/*')  or \Request::is('pic/token')) active @endif" href="{{url("pic/token")}}" target="">
                            <i class="ni ni-caps-small"></i>
                            <span class="nav-link-text">Token</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('pic/member/*')  or \Request::is('pic/member')) active @endif" href="{{url("pic/member")}}" target="">
                            <i class="ni ni-single-02"></i>
                            <span class="nav-link-text">Member</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('pic/literatur/*')  or \Request::is('pic/literatur') or \Request::is('pic/report_literatur/*')) active @endif" href="{{url("pic/literatur")}}" target="">
                            <i class="ni ni-building"></i>
                            <span class="nav-link-text">Analisa Literatur</span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</nav>

@push('style')
<style type="text/css">
    .navbar-vertical.navbar-expand-xs .navbar-nav>.nav-item>.nav-link.active {
        background: #7283b5;
        color: white;
        font-weight: bold !important;
    }
</style>
@endpush
