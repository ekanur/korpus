@extends("template.layout")

@section("header")
    @include("template.header")
@endsection
@section("content")
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Kata</h5>
                        <span class="h2 font-weight-bold mb-0">{{ count($daftar_kata) }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-pink text-white rounded-circle shadow">
                            <i class="ni ni-single-copy-04"></i>
                        </div>
                    </div>
                </div>
                <!-- <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p> -->
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Kata Dasar</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $literatur->analisaLiteratur->jumlah_kata_dasar }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                            <i class="ni ni-align-left-2"></i>
                        </div>
                    </div>
                </div>
                <!-- <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p> -->
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Token</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $literatur->analisaLiteratur->jumlah_token }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                            <i class="ni ni-caps-small"></i>
                        </div>
                    </div>
                </div>
                <!-- <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p> -->
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Kategori</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $literatur->kategori->kategori }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                            <i class="ni ni-sound-wave"></i>
                        </div>
                    </div>
                </div>
                <!-- <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p> -->
            </div>
        </div>
    </div>

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
                        <h3>{{ strtoupper($literatur->judul) }}</h3>
                    </div>

                </div>

            </div>
            <!-- Light table -->
            <div class="table-responsive">

                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name" width="15%">Kata</th>
                            <th scope="col" class="sort" data-sort="budget" width="25%">Tipe</th>
                            <!-- <th scope="col" class="sort" data-sort="status">Sub Kategori</th> -->
                            <th scope="col" width="10%">Frekuensi</th>
                            <th scope="col" class="sort" width="10%" data-sort="completion">% Frekuensi</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @if($literatur->analisaLiteratur()->exists())
                        @foreach($daftar_kata as $key => $value)
                            <tr>
                            <td scope="row">
                            <a href="{{url("cari?pencarian=literatur&id=".$literatur->id."&keyword=".$key)}}" class="h5">{{ $key }}</a>
                            </td>
                            <td class="budget">
                                @if ($value[0]->tipe == 't')
                                    <p class="badge badge-warning">Token</p>
                                @elseif($value[0]->tipe == 'k')
                                    <p class="badge badge-success">Kata Dasar</p>
                                @else
                                    <em class="text-muted">Belum tersedia di database</em>
                                @endif
                            </td>
                            <td>
                                {{ count($value) }}
                            </td>
                            <td>
                                {{ round(count($value)/$literatur->analisaLiteratur->jumlah_kata, 3) }}
                            </td>

                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4">Belum dianalisa</td>
                        </tr>
                        @endif



                    </tbody>
                </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">

            </div>
        </div>

        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0 shadow">
                <div class="row">
                    <div class="col">
                        <h3>Analisa Kolokasi </h3>
                    </div>

                </div>

            </div>
            <!-- Light table -->
            <div class="table-responsive">

                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name" width="15%">Kolokasi</th>
                            <!-- <th scope="col" class="sort" data-sort="status">Sub Kategori</th> -->
                            <th scope="col" width="10%">Frekuensi</th>
                            <th scope="col" class="sort" width="10%" data-sort="completion">% Frekuensi</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($literatur->analisaKolokasi as $analisa_kolokasi)
                            <tr>
                            <td scope="row">
                                {{$analisa_kolokasi->kolokasi->kolokasi}}
                            </td>
                            <td class="budget">
                               {{$analisa_kolokasi->jumlah}}
                            </td>
                            <td>
                                {{ round($analisa_kolokasi->jumlah/$literatur->analisaLiteratur->jumlah_kata, 3) }}
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
    @include("template.sidebar")
@endsection

@section("footer")
    @include("template.footer")
@endsection
