<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Korpus Fakultas Sastra - Universitas Negeri Malang</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="">
    <!-- Sidenav -->

    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->



                    <!-- Navbar links -->
                    @if (Auth::check())
                        @include("template.adminmenu")
                    @endif
                </div>
        </nav>
        <!-- Header -->
        <!-- Header -->
        <div class="header pb-6">
            <div class="container-fluid">
                <div class="header-body" style="margin-bottom: 5.5em;">

                    <!-- Card stats -->
                    <div class="row align-items-center py-4">
                        <div class="col-lg-12 col-12">
                            <h6 class="h2 mb-0 text-center">Korpus Fakultas Sastra - Universitas Negeri Malang</h6>
                        </div>

                    </div>

                </div>
                <div class="row">
                    @foreach ($korpus as $korpus)
                    <div class="@if(strlen($korpus->jenis)>7) col-xl-3 @else col-xl-2 @endif col-md-6">
                        <a href="{{url('/korpus'.'/'.$korpus->id)}}">
                        <div class="card card-stats bg-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase mb-0  text-muted">{{$korpus->jumlah_literatur}} Literatur</h5>
                                        <span class="h2 font-weight-bold mb-0" style="color:#10375c">{{$korpus->jenis}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <!-- <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="ni ni-active-40"></i>
                                            </div> -->
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-md">
                                    Detail &raquo;
                                </p>
                            </div>
                        </div></a>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6" style="padding-top: 12em;">


            <!-- Footer -->
                    @include("template.footer")
        </div>

        </div>
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
        <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <!-- Optional JS -->
        <!-- Argon JS -->
        <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
