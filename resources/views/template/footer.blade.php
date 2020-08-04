<footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
                &copy; 2020

            </div>
        </div>
        <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                    <a href="#" type="button" data-toggle="modal" data-target="#tentang" class="nav-link" target="">Tentang</a>
                </li>
                <li class="nav-item">
                    <a href="#" type="button" data-toggle="modal" data-target="#anggota" class="nav-link" target="">Anggota</a>
                </li>
                @guest
                <li class="nav-item">
                    <a href="{{url("login")}}" class="nav-link" target="">Login</a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{route(Auth::user()->role)}}" class="nav-link" target="">Dashboard</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>

    <div class="modal fade" id="tentang" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
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
                                           Tentang Korpus Fakultas Sastra
                                        </div>
                                        Tujuan penyusunan korpus ini adalah sebagai big database yang dapat digunakan untuk analisis kebahasaan. Data yang diinputkan adalah skripsi, tesis, disertasi, artikel, makalah, dan buku.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    <div class="modal fade" id="anggota" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                            <div class="modal-content">
                                <!--<div class="modal-header">
                                    <h6 class="modal-title text-muted" id="modal-title-default">Pencarian</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>-->
                                <div class="modal-body p-0">
                                    <div class="card-body px-lg-5 py-lg-4">
                                        <div class="text-center mb-4">
                                           <h3>Tim Pengembang Korpus Fakultas Sastra</h3>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item text-center">
                                                <img class="img img-fluid rounded  mx-auto d-block img-thumbnail" width="98px" height="98px" src="{{asset("/tim/JSING Prof. Dra. Hj. Utami Widiati, M.A., Ph.D..jpg")}}"/><br/>
                                                <strong>Pelindung:</strong> Prof. Utami Widiati, M.A.,Ph.D (Dekan Fakultas Sastra)
                                            </li>
                                            <li class="list-group-item  text-center">
                                            <img class="img img-fluid rounded  mx-auto d-block img-thumbnail" width="98px" height="98px" src="{{asset("/tim/JSJ Dr. Primardiana Hermilia Wijayati, M.Pd.jpg")}}"/><br/>
                                            <strong>Penasehat:</strong> Dr. Primardiana H.W.,M.Pd (Wakil Dekan 1 Fakultas Sastra)</li>
                                            <li class="list-group-item  text-center">
                                            <img class="img img-fluid rounded  mx-auto d-block img-thumbnail" width="98px" height="98px" src="{{asset("/tim/JSA Mohammad Ahsanuddin, S.Pd, M.Pd.jpg")}}"/><br/>
                                                <strong>Ketua Tim:</strong> Dr. Mohammad Ahsanuddin, M.Pd (Jurusan Sastra Arab)</li>
                                            <li class="list-group-item"><strong>Anggota Tim:</strong> <br/>
                                                <ol class="list-unstyled">
                                                    <li><img class="img img-fluid rounded img-thumbnail mr-3 mt-3" width="54px" height="54px" src="{{asset("/tim/JSING Prof. Dr. Yazid Basthomi, M.A..jpg")}}"/> Prof. Dr. Yazid Basthomi , M.A. (Jurusan Sastra Inggris)</li>
                                                    <li><img class="img img-fluid rounded img-thumbnail mr-3 mt-3" width="54px" height="54px" src="{{asset("/tim/JSJ Dr. Herri Akhmad B., M.A., M.Hum.jpg")}}"/> Dr. Herri Akhmad Bukhori, M.A., M.Hum (Jurusan Sastra Jerman)</li>
                                                    <li><img class="img img-fluid rounded img-thumbnail mr-3 mt-3" width="54px" height="54px" src="{{asset("/tim/Yusuf Hanafi.png")}}"/> Dr. Yusuf Hanafi, M.Fil.I (Jurusan Sastra Arab)</li>
                                                    <li><img class="img img-fluid rounded img-thumbnail mr-3 mt-3" width="54px" height="54px" src="{{asset("/tim/Febri Taufiqurrahman_199002142019031007.jpg")}}"/> Febri Taufiqurrahman , S.Hum., M.Hum. (Jurusan Sastra Indonesia)</li>
                                                    <li><img class="img img-fluid rounded img-thumbnail mr-3 mt-3" width="54px" height="54px" src="{{asset("/tim/JSD Joko Samodra, S.Kom, M.T..jpg")}}"/> Joko Samudro, S.Kom., M.Kom (Jurusan Seni dan Desain)</li>
                                                </ol>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</footer>
