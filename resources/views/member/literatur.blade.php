<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Korpus Indonesia - Fakultas Sastra Universitas Negeri Malang</title>
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
                            <a class="nav-link active" href="{{url("admin/literatur")}}" target="">
                                <i class="ni ni-spaceship"></i>
                                <span class="nav-link-text">Literatur</span>
                            </a>
                        </li>
<!--                        <li class="nav-item">
                            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="">
                                <i class="ni ni-palette"></i>
                                <span class="nav-link-text">Sumber Kata</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="">
                                <i class="ni ni-ui-04"></i>
                                <span class="nav-link-text">Setting</span>
                            </a>
                        </li>-->

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
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto">
                        <li class="nav-item dropdown">
                            <!-- <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">Administrator</span>
                                    </div>
                                </div>
                            </a> -->
                            <button type="button" class="btn-icon-clipboard" data-toggle="dropdown" data-clipboard-text="single-02" title="" style="padding:.5rem">
                                <div>
                                  <i class="ni ni-single-02"></i>
                                  <span>Administrator</span>
                                </div>
                              </button>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0"></h6>
                                </div>
                                <a href="admin_dashboard.html" class="dropdown-item">
                                    <i class="ni ni-app"></i>
                                    <span>Admin Panel</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Profile</span>
                                </a>
                                <!-- <a href="#!" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Settings</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-calendar-grid-58"></i>
                                    <span>Activity</span>
                                </a> -->
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>Support</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
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
                                    <li class="breadcrumb-item"><a href="{{url("admin/literatur")}}">Admin Panel</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Upload Literatur</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Card stats -->
                    <div class="row">

                        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Upload Literatur</h3>
                </div>
<!--                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>-->
              </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                @if (session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                @endif
                    <form action="{{url("admin/literatur")}}" method="post" enctype="multipart/form-data">
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
                        <label class="form-control-label" for="input-email">Kategori</label>
                        <!--<input type="email" id="input-email" class="form-control" placeholder="jesse@example.com">-->
                        <select class="form-control" name="kategori">

                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">judul</label>
                        <input type="text" name="judul" id="input-first-name" class="form-control" placeholder="Judul literatur" value="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Tahun Terbit</label>
                        <!--<input type="text" id="input-last-name" class="form-control" placeholder="Last name" value="Jesse">-->
                        <select name="tahun_terbit" id="" class="form-control">
    @for ($i = date("Y"); $i >= date("Y")-80 ; $i--)
        <option value="{{$i}}">{{$i}}</option>
    @endfor
</select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">File Literatur</label>
                        <input name="literatur" class="form-control" placeholder="File ..." value="" type="file">
                      </div>
                    </div>
                  </div>

                </div>
                <div class="pl-lg-4">
                  <div class="form-group">
                      <input type="submit" class="form-control btn btn-success" name="simpan" value="Simpan"/>
                  </div>
                </div>
              </form>
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
                    <a href="{{url("")}}" class="nav-link" target="">Lihat Korpus</a>
                </li>
            </ul>
                    </div>
                </div>
            </footer>
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
