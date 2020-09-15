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
        @elseif(null != session('msg_error'))
            @component('template.notif')
            @slot('type')
                danger
            @endslot
            {{session('msg_error')}}
            @endcomponent
        @endif
        <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit Penanggung Jawab Korpus </h3>
                </div>
                <div class="col-4 text-right">
                    {{-- <a href="#" data-toggle="modal" data-target="#ubah_password" class="btn btn-sm btn-warning">Ubah Password</a> --}}
                <a href="#" data-toggle="modal" data-id={{$pic->id}} data-reset="{{$pic->name}}" data-target="#reset_password" class="btn btn-sm btn-warning">Reset Password</a></div>

              </div>
            </div>
            <div class="card-body">
            <form action="{{url("admin/edit_user")}}" method="post">
                {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$pic->id}}">
            <input type="hidden" name="korpus_lama" value="{{$pic->korpus->id ?? null}}">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Nama</label>
                        <input required id="input-address" name="name" class="form-control" placeholder="Gelar & Nama Lengkap" value="{{$pic->name}}" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Username</label>
                      <input required type="text" name="username" id="input-city" class="form-control" placeholder="Username" value="{{$pic->username}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Email</label>
                      <input required type="email" name="email" id="" class="form-control" placeholder="email@host" value="{{$pic->email}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">PJ Korpus</label>
                        <select name="korpus" id="" class="form-control">
                            @foreach ($korpus as $korpus)
                            <option @if(null != $pic->korpus) @if($korpus->id == $pic->korpus->id) selected @endif @endif value="{{$korpus->id}}">{{$korpus->jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                        <button class="mt-4 col-lg-3 btn btn-lg btn-success">Simpan</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
    </div>
<div class="modal fade" id="reset_password" role="dialog" aria-labelledby="modal-form" aria-modal="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body p-0">
                <div class="card-body px-lg-5 py-lg-4">
                    <div class="text-center mb-4">
                        <h3>Apakah anda akan mereset password <br/> <strong id="reset"></strong> ?</h3>
                    </div>
                    <p>
                        Setelah di-reset password akan berubah menjadi <kbd>password</kbd>
                    </p>
                    <form action="{{url("admin/reset_user")}}" method="post" enctype="">
                        <!--<h6 class="heading-small text-muted mb-4">User information</h6>-->
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <button data-dismiss="modal" class="form-control btn btn-primary">Tidak</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-success" name="simpan" value="Ya"/>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

@section("sidebar")
    @include("template.adminsidebar")
@endsection

@section("footer")
    @include("template.footer")
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#reset_password').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var reset = button.data('reset')

            var modal = $(this)
            modal.find("input[name='id']").val(id)
            modal.find('#reset').text(reset)
        });
    });
</script>
@endsection
