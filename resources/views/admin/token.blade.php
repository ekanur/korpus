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
    <title>Korpus - Fakultas Sastra Universitas Negeri Malang</title>
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
                            <a class="nav-link" href="{{url("admin/")}}" target="">
                                <i class="ni ni-spaceship"></i>
                                <span class="nav-link-text">Pengelola Korpus</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("admin/kolokasi")}}" target="">
                                <i class="ni ni-palette"></i>
                                <span class="nav-link-text">Kolokasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("admin/kata_dasar")}}" target="">
                                <i class="ni ni-ui-04"></i>
                                <span class="nav-link-text">Kata Dasar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url("admin/token")}}" target="">
                                <i class="ni ni-ui-04"></i>
                                <span class="nav-link-text">Token</span>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content mh-100" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                          <!-- Sidenav toggler -->
                          <div class="pr-3 sidenav-toggler" data-action="sidenav-pin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                              <i class="sidenav-toggler-line"></i>
                              <i class="sidenav-toggler-line"></i>
                              <i class="sidenav-toggler-line"></i>
                            </div>
                          </div>
                        </li>

                      </ul>
                    <!-- Navbar links -->
                    @include('template.adminmenu')
                </div>
        </nav>
        <!-- Header -->
        <!-- Header -->
        <div class="header pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">

                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{url("")}}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{url("admin/")}}">Admin Panel</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Token</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Card stats -->
                    <div class="row">

                        <div class="col-xl-12 order-xl-1">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0 shadow">
                                    <div class="row align-text-center">
                                        <div class="col">
                                            <h3 class="mb-0">Token</h3>
                                        </div>
                                        <div class="col text-right">
                                            <a href="#"  data-toggle="modal" data-target="#baru" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"></i> Token Baru</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Light table -->
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="sort" data-sort="no">No</th>
                                                <th scope="col" class="sort" data-sort="kata">Token</th>
                                                <th scope="col" class="sort" data-sort="frekuensi">Korpus</th>
                                                <th scope="col" class="sort" data-sort="status"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($token as $token)
                                            <tr>
                                                <td>
                                                    {{$loop->iteration}}
                                                </td>
                                                <td>
                                                    <a href="#">{{$token->token}}</a>
                                                </td>
                                                <td>
                                                    {{$token->korpus->jenis}}
                                                </td>
                                                <td>

                                                </td>

                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- Card footer -->
                                <div class="card-footer py-4">

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6 ">
            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; 2020
                            <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                    <a href="#!" class="nav-link" target="">Tentang</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link" target="_blank">Anggota</a>
                </li>
                <li class="nav-item">
                    <a href="{{url("")}}" class="nav-link" target="">Lihat Token</a>
                </li>
            </ul>
                    </div>
                </div>
            </footer>
        </div>
        </div>
        <div class="modal fade" id="baru" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-modal="true" >
            <div class="modal-dialog modal- modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">
                        <div class="card-body px-lg-5 py-lg-4">
                            <div class="text-center text-muted mb-4">
                               Tambah Token Baru
                            </div>
                            <form action="{{url("admin/token")}}" method="post" enctype="">
                                <!--<h6 class="heading-small text-muted mb-4">User information</h6>-->
                                {{ csrf_field() }}
                                <div class="pl-lg-4">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-username">Korpus</label>
                                        <!--<input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">-->
                                        <select name="korpus" class="form-control">
                                            @foreach($korpus as $korpus_data)
                                            <option value="{{$korpus_data->id}}">{{$korpus_data->jenis}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Token</label>
                                        <input type="text" name="kolokasi" id="input-first-name" class="form-control" placeholder="Token" value="">
                                      </div>
                                    </div>
                                </div>
                                  <div class="form-group">
                                      <input type="submit" class="form-control btn btn-success" name="simpan" value="Simpan"/>
                                  </div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-modal="true" >
            <div class="modal-dialog modal- modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">
                        <div class="card-body px-lg-5 py-lg-4">
                            <div class="text-center text-muted mb-4">
                               Edit Kolokasi
                            </div>
                            <form action="{{url("admin/edit_token")}}" method="post" enctype="">
                                <!--<h6 class="heading-small text-muted mb-4">User information</h6>-->
                                {{ csrf_field() }}
                                <div class="pl-lg-4">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-username">Korpus</label>
                                        <!--<input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">-->
                                        <select name="korpus" class="form-control">
                                            @foreach($korpus as $korpus)
                                            <option value="{{$korpus->id}}">{{$korpus->jenis}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Kolokasi</label>
                                        <input type="text" name="kolokasi" id="input-first-name" class="form-control" placeholder="Kolokasi" value="">
                                      </div>
                                    </div>
                                </div>
                                  <div class="form-group">
                                      <input type="submit" class="form-control btn btn-success" name="simpan" value="Simpan"/>
                                  </div>
                              </form>
                        </div>
                    </div>
                </div>
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
        <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
        <!-- Argon JS -->
        <script src="../assets/js/argon.js?v=1.2.0"></script>
        <script>
            $(document).ready(function(){
                $("select[name='korpus']").change(function(){
                    var korpus_id = $(this).val();
                    $.get("{{url('api/korpus')}}/"+korpus_id+"/kategori", function(data){

                    })
                            .done(function(data){
                                var items = [];
                                $.each(data, function(index, value){
//                                console.log(value);

                                    items.push("<option value='"+value.id+"'>"+value.kategori+"</option>");
                                });
                                $("select[name='kategori']").empty();
                                $(items.join("")).appendTo("select[name='kategori']");
                            });
                });
            });
        </script>
</body>

</html>
