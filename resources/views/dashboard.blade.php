{{-- {{dd($kategori)}} --}}
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
                    <h5 class="card-title text-uppercase text-muted mb-0">Literatur</h5>
                    <span class="h2 font-weight-bold mb-0">{{ number_format($korpus->literatur_count) }}</span>
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
                    <h5 class="card-title text-uppercase text-muted mb-0">Kata</h5>
                    <span class="h2 font-weight-bold mb-0">{{ number_format($korpus->jumlah_kata) }}</span>
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
                    <h5 class="card-title text-uppercase text-muted mb-0">Kata Dasar</h5>
                    <span class="h2 font-weight-bold mb-0">{{ number_format($korpus->jumlah_kata_dasar) }}</span>
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
                    <h5 class="card-title text-uppercase text-muted mb-0">Token</h5>
                    <span class="h2 font-weight-bold mb-0">{{ number_format($korpus->jumlah_token) }}</span>
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

<div class="col">
    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <h3 class="mb-0">Literatur Korpus {{$korpus->jenis}}</h3>
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
                        <th scope="col" class="sort" width="10%" data-sort="completion">Kata Dasar</th>
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
                                    <span class="name mb-0 text-sm text-uppercase">
                                        @if(null != $literatur->analisaLiteratur)
                                        <a href="{{url("literatur/".$literatur->id)}}">{{$literatur->judul}}</a>
                                        @else
                                        {{$literatur->judul}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </th>
                        <td class="budget">

                            {{$literatur->kategori->kategori}}</small>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                {{$literatur->tahun_terbit}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                {{(null == $literatur->analisaLiteratur)? "": $literatur->analisaLiteratur->jumlah_kata_dasar}}
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
    @include("template.sidebar")
@endsection

@section("footer")
    @include("template.footer")
@endsection
