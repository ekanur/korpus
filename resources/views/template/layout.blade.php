<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Korpus - Fakultas Sastra Universitas Negeri Malang</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset("assets/img/brand/logo.jpg")}}" type="image/jpeg">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset("assets/vendor/nucleo/css/nucleo.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/vendor/@fortawesome/fontawesome-free/css/all.min.css")}}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/argon.css?v=1.2.0")}}" type="text/css">
    <link rel="stylesheet" href="{{ asset("assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css") }}">
    @stack('style')
</head>

<body>
    <!-- Sidenav -->
    @yield("sidebar")


    <!-- Main content -->
    <div class="main-content mh-100" id="panel">
        <!-- Topnav -->

        @yield("header")



        <!-- Header -->
        <!-- Header -->
        <div class="header pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    {{-- <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                                @yield('breadcrumb')
                        </div>
                    </div> --}}
                    <!-- Card stats -->

                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            @yield("content")

            @yield("footer")
        </div>
    </div>
        <!-- Argon Scripts -->
        <!-- Core -->
    <script src="{{asset("assets/vendor/jquery/dist/jquery.min.js")}}"></script>
    <script src="{{asset("assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("assets/vendor/js-cookie/js.cookie.js")}}"></script>
    <script src="{{asset("assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js")}}"></script>
    <script src="{{asset("assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js")}}"></script>
    <!-- Optional JS -->
    <script src="{{ asset("assets/vendor/datatables.net/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-buttons/js/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-buttons/js/buttons.flash.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-buttons/js/buttons.print.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-select/js/dataTables.select.min.js") }}"></script>    <!-- Argon JS -os.creative-tim.com/argon-dashboard-pro/assets/-->
    <script src="{{asset("assets/js/argon.js?v=1.2.0")}}"></script>
    @yield('js')
</body>

</html>
