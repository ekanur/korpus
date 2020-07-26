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
            <!-- Card header -->
            <div class="card-header border-0 shadow">
                <h3 class="mb-0">Literatur Milik Saya</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name" width="40%">Judul</th>
                            <th scope="col" class="sort" data-sort="budget" width="20%">Kategori</th>
                            <!-- <th scope="col" class="sort" data-sort="status">Sub Kategori</th> -->
                            <th scope="col" width="10%">Tahun Terbit</th>
                            <th scope="col" class="sort" width="10%" data-sort="completion">Jumlah Kata</th>
                            <!-- <th scope="col"></th> -->
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($literatur as $literatur)
                            <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <!-- <a href="#" class="avatar rounded-circle mr-3">
                                        <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                                    </a> -->
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm"><a href="{{url("literatur/".$literatur->id)}}">{{$literatur->judul}}</a></span>
                                    </div>
                                </div>
                            </th>
                            <td class="budget">
                                {{$literatur->kategori->kategori}} - <small class="text-muted">{{$literatur->kategori->subKategori}}</small>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{$literatur->tahun_terbit}}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{$literatur->jumlah_kata}}
                                </div>
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

<div class="modal fade" id="edit" role="dialog" aria-labelledby="modal-form" aria-modal="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body p-0">
                <div class="card-body px-lg-5 py-lg-4">
                    <div class="text-center text-muted mb-4">
                       Edit Korpus
                    </div>
                    <form action="{{url("admin/korpus")}}" method="post" enctype="">
                        <!--<h6 class="heading-small text-muted mb-4">User information</h6>-->
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="">
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-username">Korpus</label>
                                <input type="text" name="korpus" id="korpus" class="form-control" placeholder="Jenis Korpus" value="">

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
    @include("template.membersidebar")
@endsection

@section("footer")
    @include("template.footer")
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#edit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var jenis = button.data('jenis')

            var modal = $(this)
            modal.find("input[name='id']").val(id)
            modal.find('#korpus').val(jenis)
        });
    });
</script>
@endsection

