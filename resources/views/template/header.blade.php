{{-- {{dd($kategori)}} --}}
{{-- {{dd($kategori)}} --}}
<nav class="navbar navbar-top navbar-expand navbar-dark border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="">
                    <!-- Search form -->
                    <ul class="navbar-nav align-items-center">
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
                    @unless (\Request::is("cari") or \Request::is("cari/*"))
                    <form action="{{url("cari")}}" method="get" class="navbar-search navbar-search-light form-inline mr-sm-3" id="">
                        <div class="form-group mb-0">
                            <div class="col-12">
                            <div class="input-group input-group-alternative input-group-merge">
                                @if(\Request::is("literatur/*") or \Request::get('pencarian') == 'literatur')
                                <div class="input-group-prepend" style="max-width: 150px;margin-right:10px">
                                    <select name="pencarian" id="" class="form-control col-sm-12">
                                        <option value="literatur">Dalam Literatur</option>
                                        <option value="korpus">Dalam Korpus</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id" value="{{ \Request::get('id') ?? $literatur->id }}">
                                @endif
                                <input class="form-control" placeholder="Kata Kunci ..." type="text" name="keyword" value="{{\Request::get('keyword') ?? ''}}">
                                <div class="input-group-prepend">
                                    <!-- <span class="input-group-text"><i class="fas fa-search"></i></span> -->
                                    <button class="btn btn-success my-2 my-sm-0" type="submit" style="border-radius:0 2rem 2rem 0"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                            <p>
                                <small class="form-text pl-4">   atau gunakan <a href="" type="button" data-toggle="modal" data-target="#modal-form">Pencarian Lanjutan</a></small>

                            </p>
                        </div>
                        {{-- <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button> --}}
                    </form>
                    @endunless

                    @auth
                        @include("template.adminmenu")
                    @endauth

                </div>
        </nav>


<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <!--<div class="modal-header">
                                    <h6 class="modal-title text-muted" id="modal-title-default">Pencarian</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>-->
                                <div class="modal-body p-0">
                                    <div class="card-body px-lg-5 py-lg-4">
                                        <div class="text-center text-muted mb-4">
                                            <small>Pencarian Korpus {{$korpus->jenis}}</small>
                                        </div>
                                        <form role="form" method="get" action="{{url("cari")}}">
<!--                                            <div class="form-group">
                                                <label for="searchKorpus" class="form-control-label">Pilih Korpus</label>
                                                <select class="form-control" id="searchKorpus">
                                                    <option>Indonesia</option>
                                                    <option>Inggris</option>
                                                    <option>Arab</option>
                                                    <option>Jerman</option>
                                                    <option>Seni Budaya</option>
                                                </select>
                                            </div>-->
                                            <div class="form-group">
                                                <label for="searchKategori" class="form-control-label">Pilih Kategori</label>
                                                <select class="form-control" id="searchKorpus" name="kategori">
                                                    <option value="">Semua</option>
                                                    @foreach ($kategori_literatur as $kategori)
                                                    <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="searchSubkategori" class="form-control-label">Terbit Mulai</label>
                                                        <select name="tahun_terbit" id="" class="form-control">
                                                            <option value="">Semua</option>
                                                            @for ($i = date("Y"); $i >= date("Y")-80 ; $i--)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="searchSubkategori" class="form-control-label">Hingga</label>
                                                        <select name="hingga" id="" class="form-control">
                                                            <option value="">Semua</option>
                                                            @for ($i = date("Y"); $i >= date("Y")-80 ; $i--)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="searchKata" class="form-control-label">Kata Kunci</label>
                                                <input type="text" class="form-control" id="searchKata" name="keyword" placeholder="Kata Kunci">
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary my-2">Cari</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
