<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
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

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical bg-primary fixed-left  navbar-expand-xs navbar-light" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="index.html">
                        &larr; Kembali
                    </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " href="dashboard.html">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kata.html">
                                <i class="ni ni-bullet-list-67 text-teal"></i>
                                <span class="nav-link-text">Frekuensi Kata</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link  active" href="kolokasi.html ">
                                <i class="ni ni-collection text-orange "></i>
                                <span class="nav-link-text ">Frekuensi Kolokasi</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="literatur.html ">
                                <i class="ni ni-single-copy-04 text-orange "></i>
                                <span class="nav-link-text ">Literatur</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content mh-100 " id="panel ">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom ">
            <div class="container-fluid ">
                <div class="collapse navbar-collapse " id="navbarSupportedContent ">
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3 " style="width: 700%; " id="navbar-search-main ">
                        <div class="form-group mb-0 ">
                            <div class="input-group input-group-alternative input-group-merge ">
                                <!-- <div class="input-group-prepend ">
                                        <span class="input-group-text "><i class="fas fa-search "></i></span>
                                    </div> -->
                                <input class="form-control " placeholder="Pencarian Korpus ... " type="text ">
                                <div class="input-group-prepend ">
                                    <!-- <span class="input-group-text "><i class="fas fa-search "></i></span> -->
                                    <button class="btn btn-secondary my-2 my-sm-0 " type="submit " style="border-radius:0 2rem 2rem 0 "><i class="fas fa-search "></i></button>
                                </div>
                            </div>
                            <small class="form-text pl-3 ">   atau gunakan <a href=" ">Pencarian Lanjutan</a></small>

                        </div>
                        <button type="button " class="close " data-action="search-close " data-target="#navbar-search-main " aria-label="Close ">
                                <span aria-hidden="true ">×</span>
                            </button>
                    </form>

                    <!-- Navbar links -->

                </div>
        </nav>
        <!-- Header -->
        <!-- Header -->
        <div class="header pb-6 ">
            <div class="container-fluid ">
                <div class="header-body ">
                    <div class="row align-items-center py-4 ">
                        <div class="col-lg-6 col-7 ">

                            <nav aria-label="breadcrumb " class="d-none d-md-inline-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark ">
                                    <li class="breadcrumb-item "><a href="index.html "><i class="fas fa-home "></i></a></li>
                                    <li class="breadcrumb-item "><a href="dashboard.html ">Korpus Indonesia</a></li>
                                    <li class="breadcrumb-item active " aria-current="page ">Frekuensi Kolokasi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Card stats -->

                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6 ">
            <div class="row ">
                <div class="col ">
                    <div class="card ">
                        <!-- Card header -->
                        <div class="card-header border-0 shadow ">
                            <h3 class="mb-0 ">Frekuensi Kolokasi</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive ">
                            <table class="table align-items-center table-flush ">
                                <thead class="thead-light ">
                                    <tr>
                                        <th scope="col " class="sort " data-sort="no ">No</th>
                                        <th scope="col " class="sort " data-sort="kata ">Kata</th>
                                        <th scope="col " class="sort " data-sort="frekuensi ">Frekuensi</th>
                                        <th scope="col " class="sort " data-sort="status ">Persentase</th>
                                        <th scope="col " class="sort " data-sort="frekuensi ">Frekuensi Dokumen</th>
                                        <th scope="col " class="sort " data-sort="status ">Persentase</th>
                                    </tr>
                                </thead>
                                <tbody class="list ">
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Tulang Punggung
                                        </td>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ">
                                                <span class="completion mr-2 ">0,3%</span>
                                                <div>
                                                    <div class="progress ">
                                                        <div class="progress-bar bg-warning " role="progressbar " aria-valuenow="0.3 " aria-valuemin="0 " aria-valuemax="100 " style="width: 3%; "></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ">
                                                <span class="completion mr-2 ">0,5%</span>
                                                <div>
                                                    <div class="progress ">
                                                        <div class="progress-bar bg-warning " role="progressbar " aria-valuenow="0.5 " aria-valuemin="0 " aria-valuemax="100 " style="width: 5%; "></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            makan garam
                                        </td>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ">
                                                <span class="completion mr-2 ">0,5%</span>
                                                <div>
                                                    <div class="progress ">
                                                        <div class="progress-bar bg-warning " role="progressbar " aria-valuenow="0.5 " aria-valuemin="0 " aria-valuemax="100 " style="width: 5%; "></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ">
                                                <span class="completion mr-2 ">0,5%</span>
                                                <div>
                                                    <div class="progress ">
                                                        <div class="progress-bar bg-warning " role="progressbar " aria-valuenow="0.5 " aria-valuemin="0 " aria-valuemax="100 " style="width: 5%; "></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            banting setir
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ">
                                                <span class="completion mr-2 ">0,2%</span>
                                                <div>
                                                    <div class="progress ">
                                                        <div class="progress-bar bg-warning " role="progressbar " aria-valuenow="0.2 " aria-valuemin="0 " aria-valuemax="100 " style="width: 2%; "></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ">
                                                <span class="completion mr-2 ">0,5%</span>
                                                <div>
                                                    <div class="progress ">
                                                        <div class="progress-bar bg-warning " role="progressbar " aria-valuenow="0.5 " aria-valuemin="0 " aria-valuemax="100 " style="width: 5%; "></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            sahabat pena
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ">
                                                <span class="completion mr-2 ">0,1%</span>
                                                <div>
                                                    <div class="progress ">
                                                        <div class="progress-bar bg-warning " role="progressbar " aria-valuenow="0.1 " aria-valuemin="0 " aria-valuemax="100 " style="width: 1%; "></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ">
                                                <span class="completion mr-2 ">0,5%</span>
                                                <div>
                                                    <div class="progress ">
                                                        <div class="progress-bar bg-warning " role="progressbar " aria-valuenow="0.5 " aria-valuemin="0 " aria-valuemax="100 " style="width: 5%; "></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4 ">
                            <nav aria-label="... ">
                                <ul class="pagination justify-content-end mb-0 ">
                                    <li class="page-item disabled ">
                                        <a class="page-link " href="# " tabindex="-1 ">
                                            <i class="fas fa-angle-left "></i>
                                            <span class="sr-only ">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active ">
                                        <a class="page-link " href="# ">1</a>
                                    </li>
                                    <li class="page-item ">
                                        <a class="page-link " href="# ">2 <span class="sr-only ">(current)</span></a>
                                    </li>
                                    <li class="page-item "><a class="page-link " href="# ">3</a></li>
                                    <li class="page-item ">
                                        <a class="page-link " href="# ">
                                            <i class="fas fa-angle-right "></i>
                                            <span class="sr-only ">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="../assets/vendor/jquery/dist/jquery.min.js "></script>
        <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js "></script>
        <script src="../assets/vendor/js-cookie/js.cookie.js "></script>
        <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js "></script>
        <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js "></script>
        <!-- Optional JS -->
        <script src="../assets/vendor/chart.js/dist/Chart.min.js "></script>
        <script src="../assets/vendor/chart.js/dist/Chart.extension.js "></script>
        <!-- Argon JS -->
        <script src="../assets/js/argon.js?v=1.2.0 "></script>
</body>

</html>