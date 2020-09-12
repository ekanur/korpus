
@extends("template.layout")

@section("header")
    @include("template.header")
@endsection

@section("content")
    <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0 shadow">
                            <h3 class="mb-0">Frekuensi {{$judul}}</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <!--<th scope="col" class="sort" data-sort="no">No</th>-->
                                        <th scope="col" class="sort" data-sort="kata">{{$judul}}</th>
                                        <th scope="col" class="sort" data-sort="frekuensi">Frekuensi</th>
                                        <th scope="col" class="sort" data-sort="status">Persentase</th>
                                        <th scope="col" class="sort" data-sort="frekuensi">Frekuensi Dokumen</th>
                                        <th scope="col" class="sort" data-sort="status">Persentase</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                        @foreach($kata as $kata)
                                        <tr>
                                        <td>
                                            {{ $kata->kata_dasar ?? $kata->kolokasi}}
                                        </td>
                                        <td>
                                            {{ $kata->frekuensi_kata }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">{{ $kata->frekuensi_kata_persen }}%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$kata->frekuensi_kata_persen}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$kata->frekuens_kata_persen}}%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $kata->frekuensi_dokumen }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">{{ $kata->frekuensi_dokumen_persen }}%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{ $kata->frekuensi_dokumen_persen }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $kata->frekuensi_dokumen_persen }}%;"></div>
                                                    </div>
                                                </div>
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
