@extends("template.layout")

@section("header")
    @include("template.dashboard_header")
@endsection

@section("content")
<div class="row">

    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit Korpus </h3>
                </div>

              </div>
            </div>
            <div class="card-body">
            <form action="{{url("admin/korpus")}}" method="post">
                <h6 class="heading-small text-muted mb-4">Korpus</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Korpus</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Penanggung Jawab</label>
                        <select name="user" id="" class="form-control">

                        </select>
                      </div>
                    </div>
                  </div>

                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Penanggung Jawab</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Nama</label>
                        <input id="input-address" name="nama" class="form-control" placeholder="Gelar & Nama Lengkap" value="" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Username</label>
                        <input type="text" name="username" id="input-city" class="form-control" placeholder="Username" value="">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Email</label>
                        <input type="email" name="email" id="" class="form-control" placeholder="email@host" value="">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Password</label>
                        <input type="password" name="password" id="input-postal-code" class="form-control" placeholder="Password">
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


</div>
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="{{url("")}}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{url("admin/")}}">Admin Panel</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pengelola Korpus</li>
    </ol>
</nav>
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
@endsection
