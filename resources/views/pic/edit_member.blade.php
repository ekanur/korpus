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

        @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
                @endif
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0 shadow">
                <div class="row align-text-center">
                    <div class="col">
                        <h3 class="mb-0">Edit Member</h3>
                    </div>
                    <div class="col text-right">
                    <a href="#"  data-toggle="modal" data-target="#reset_password" data-id={{$member->id}} data-reset="{{$member->name}}" class="btn btn-sm btn-warning"> Reset Password</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{url("pic/update_member")}}" method="post" enctype="">
                    <!--<h6 class="heading-small text-muted mb-4">User information</h6>-->
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$member->id}}">
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">Nama Lengkap</label>
                          <input type="text" name="name" id="korpus" class="form-control" placeholder="member" value="{{$member->name}}">

                          </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">Username</label>
                                <input type="text" name="username" id="korpus" class="form-control" placeholder="Username" value="{{$member->username}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">Email</label>
                            <input type="text" name="email" id="korpus" class="form-control" placeholder="Email" value="{{$member->email}}">

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
<div class="modal fade" id="reset_password" role="dialog" aria-labelledby="modal-form" aria-modal="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body p-0">
                <div class="card-body px-lg-5 py-lg-4">
                    <div class="text-center mb-4">
                        <h3>Apakah anda akan mereset Password <strong id="reset"></strong> ?</h3>
                    </div>
                    <p>
                        Setelah di-reset password akan berubah menjadi <kbd>password</kbd>
                    </p>
                    <form action="{{url("pic/reset_password_member")}}" method="post" enctype="">
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
    @include("template.picsidebar")
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
