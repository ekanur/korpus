@extends("template.layout")

@section("header")
    @include("template.dashboard_header")
@endsection

@section("content")
<div class="row">

    <div class="col-xl-8 order-xl-1">
        @if (null != session('msg_success'))
            @component('template.notif')
                @slot('type')
                    success
                @endslot
                {{session('msg_success')}}
            @endcomponent
        @elseif(null != session('msg_error'))
            @component('template.notif')
            @slot('type')
                danger
            @endslot
            {{session('msg_error')}}
            @endcomponent
        @endif
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0 shadow">
                <div class="row align-text-center">
                    <div class="col">
                        <h3 class="mb-0">Kategori Korpus</h3>
                    </div>
                    <div class="col text-right">
                        <a href="#"  data-toggle="modal" data-target="#baru" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"></i> Kategori Baru</a>
                    </div>
                </div>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="no">No</th>
                            <th scope="col" class="sort" data-sort="kata">Kategori</th>
                            <th scope="col" class="sort" data-sort="frekuensi">Sub-Kategori</th>
                            <th scope="col" class="sort" data-sort="kata"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($kategori as $kategori)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#edit" class="h3">{{$kategori->kategori}}</a>
                            </td>
                            <td>
                                @foreach ($kategori->subKategori as $sub_kategori)
                                {{$sub_kategori->kategori}}@unless ($loop->last), @endunless
                                @endforeach
                            </td>
                            <td>
                                <a href="{{url("pic/kategori/".$kategori->id)}}" class="btn btn-default btn-sm">Edit</a>
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

<div class="modal fade" id="baru" role="dialog" aria-labelledby="modal-form" aria-modal="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body p-0">
                <div class="card-body px-lg-5 py-lg-4">
                    <div class="text-center text-muted mb-4">
                       Buat Kategori
                    </div>
                    <form action="{{url("pic/kategori")}}" method="post" enctype="">
                        <!--<h6 class="heading-small text-muted mb-4">User information</h6>-->
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="">
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-username">Nama Kategori *</label>
                                <input type="text" name="kategori" id="korpus" class="form-control" placeholder="Jenis Korpus" value="" required>

                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-username">Sub Kategori</label>
                                <textarea name="sub_kategori" class="form-control" id="" cols="5" rows="4"></textarea>
                                <small class="help-text">Gunakan koma (,) sebagai pemisah antara sub kategori</small>
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
@endsection

@section("sidebar")
    @include("template.picsidebar")
@endsection

@section("footer")
    @include("template.footer")
@endsection

@section('js')

@endsection

