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
        @endif
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0 shadow">
                <div class="row align-text-center">
                    <div class="col">
                        <h3 class="mb-0">Kolokasi</h3>
                    </div>
                    <div class="col text-right">
                        <a href="#"  data-toggle="modal" data-target="#baru" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"></i> Kolokasi Baru</a>
                    </div>
                </div>
            </div>
            <!-- Light table -->
            <div class="table-responsive">

                <table class="table align-items-center table-flush" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="no">No</th>
                            <th scope="col" class="sort" data-sort="kata">Kolokasi</th>
                            <th scope="col" class="sort" data-sort="frekuensi">Korpus</th>
                            <th scope="col" class="sort" data-sort="status"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($kolokasi as $kolokasi)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                            <a href="{{url("/admin/kolokasi/".$kolokasi->id)}}">{{$kolokasi->kolokasi}}</a>
                            </td>
                            <td>
                                {{$kolokasi->korpus->jenis}}
                            </td>
                            <td>
                            <a href="#" data-toggle="modal" data-target="#hapus" data-id={{$kolokasi->id}} data-kolokasi="{{$kolokasi->kolokasi}}" class="btn btn-danger btn-sm">Hapus</a>
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
                       Tambah Kolokasi Baru
                    </div>
                    <form action="{{url("admin/kolokasi")}}" method="post" enctype="">
                        <!--<h6 class="heading-small text-muted mb-4">User information</h6>-->
                        {{ csrf_field() }}
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

<div class="modal fade" id="hapus" role="dialog" aria-labelledby="modal-form" aria-modal="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body p-0">
                <div class="card-body px-lg-5 py-lg-4">
                    <div class="text-center mb-4">
                        <h3>Apakah anda akan menghapus Kolokasi <strong id="kolokasi"></strong> ?</h3>
                    </div>

                    <form action="{{url("admin/hapus_kolokasi")}}" method="post" enctype="">
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

        $('#hapus').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var kolokasi = button.data('kolokasi')

            var modal = $(this)
            modal.find("input[name='id']").val(id)
            modal.find('#kolokasi').text(kolokasi)
        });

        var DatatableBasic=function(){
            var e=$("#table");
            e.length&&e.on("init.dt",function(){
            $("div.dataTables_length select")
            .removeClass("custom-select custom-select-sm")})
            .DataTable({keys:!0,select:{style:"multi"},language:{paginate:{previous:"<i class='fas fa-angle-left'>",next:"<i class='fas fa-angle-right'>"}}})
            }(),
            DatatableButtons=function(){
                var e,a=$("#datatable-buttons");
                a.length&&(e={lengthChange:!1,dom:"Bfrtip",buttons:["copy","print"],language:{paginate:{previous:"<i class='fas fa-angle-left'>",next:"<i class='fas fa-angle-right'>"
                }}},
                a.on("init.dt",function(){$(".dt-buttons .btn").removeClass("btn-secondary").addClass("btn-sm btn-default")}).DataTable(e))}()
            });
</script>
@endsection