@extends("template.layout")

@section("header")
    @include("template.dashboard_header")
@endsection

@section("content")
<div class="row">

    <div class="col-xl-12 order-xl-1">
        @if (null != session('msg_success'))
            @component('template.notif')
                @slot('type')
                    success
                @endslot
                {{session('msg_success')}}
            @endcomponent
        @endif
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0 shadow">
                <div class="row align-text-center">
                    <div class="col">
                        <h3 class="mb-0">Edit Kategori</h3>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form action="{{url("pic/update_kategori")}}" method="post" enctype="">
                    <!--<h6 class="heading-small text-muted mb-4">User information</h6>-->
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$kategori->id}}">
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">Nama Kategori *</label>
                          <input type="text" name="kategori" id="korpus" class="form-control" placeholder="Kategori" value="{{$kategori->kategori}}" required>

                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">Sub Kategori</label>
                            <textarea name="sub_kategori" class="form-control" id="" cols="5" rows="4">@if (count($kategori->subKategori)>0){{$kategori->subKategori->implode("kategori", ',')}}@endif</textarea>
                            <small class="help-text">Gunakan koma (,) sebagai pemisah antara sub kategori</small>
                          </div>
                        </div>

                    </div>
                      <div class="form-group">
                          <input type="submit" class="form-control btn btn-success" name="simpan" value="Simpan"/>
                      </div>
                  </form>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">

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
