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
                        <a class="nav-link @if(\Request::is('member/literatur/*')  or \Request::is('member') or \Request::is('member/literatur'))) active @endif" href="{{url("member/")}}" target="">
                            <i class="ni ni-single-copy-04"></i>
                            <span class="nav-link-text">Literatur</span>
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