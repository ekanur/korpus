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
                        <a class="nav-link @if(\Request::is('pic/member/*')  or \Request::is('pic/member')) active @endif" href="{{url("pic/member")}}" target="">
                            <i class="ni ni-single-02"></i>
                            <span class="nav-link-text">Member</span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</nav>
