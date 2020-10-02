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
                <div class="row">
                    <div class="col">
                        <h3>Literatur Milik Saya</h3>
                    </div>
                    <div class="col text-right">
                    <a href="{{url("member/literatur")}}" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"></i> Buat Baru</a>
                    </div>
                </div>

            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name" width="40%">Judul</th>
                            <th scope="col" class="sort" data-sort="name" width="">Korpus</th>
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
                                        <span class="name mb-0 text-md text-uppercase"><a href="{{url("member/literatur/".$literatur->id)}}">{{$literatur->judul}}</a></span>
                                    </div>
                                </div>
                            </th>
                            <td>
                                <h3>{{$literatur->korpus->jenis}}</h3>
                            </td>
                            <td class="budget">
                                {{$literatur->kategori->kategori}} - <small class="text-muted"></small>
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

