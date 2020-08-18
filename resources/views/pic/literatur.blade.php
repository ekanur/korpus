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
                {!! session('msg_success') !!}
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
                        <h3>Literatur Pada Korpus {{ Auth::user()->korpus->jenis }}</h3>
                    </div>

                </div>

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
                            <th scope="col" class="sort" width="10%" data-sort="completion">Hasil Analisa</th>
                            <th scope="col">Analisa</th>
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
                                        <h4 class="name mb-0 text-md text-uppercase"><a href="{{url("pic/report_literatur/".$literatur->id)}}">{{$literatur->judul}}</a></h4>
                                    <small class="text-muted">Upload oleh <strong>{{$literatur->uploadedBy->name}}</strong></small>
                                    </div>
                                </div>
                            </th>
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
                                    Jumlah Kata : {{$literatur->jumlah_kata ?? 0}}<br/>
                                    Jumlah Kata Dasar : {{$literatur->kata_dasar ?? 0}}<br/>
                                    Jumlah Token : {{($literatur->jumlah_kata - $literatur->kata_dasar)}}<br/>
                                    Dianalisa Pada : {{$literatur->analyze_on->format("Y.m.d") ?? 'Belum Dianalisa'}}<br/>
                                </div>
                            </td>
                            <td>
                                {{-- @if (null != $literatur->analyze_on)
                                    Dianalisa pada {{$literatur->analyze_on}}
                                @else --}}
                                    <a href="{{url("pic/literatur/".$literatur->id)}}" class="btn btn-sm btn-primary">Analisa</a>
                                {{-- @endif --}}

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
    @include("template.picsidebar")
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

