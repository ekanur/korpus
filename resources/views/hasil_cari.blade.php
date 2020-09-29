@extends("template.layout")

@section("header")
    @include("template.header")
@endsection
@section("content")
    <div class="row">
                <div class="col">
                    @include("template.filter")
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                        <h3 class="mb-0">Hasil Pencarian <em>"{{$keyword}}"</em>&nbsp; Pada Literatur {{strtoupper($judul_literatur)}}</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name" width="1%">No.</th>
                                        <th scope="col" class="sort" width="99%" data-sort="completion">Hasil Pencarian</th>
                                        <!-- <th scope="col"></th> -->
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($kata_ditemukan as $kata_ditemukan)
                                        <tr>
                                        <td class="budget">
                                            {{$loop->iteration}}
                                            {{-- {{$literatur->kategori->kategori}} - <small class="text-muted">{{$literatur->kategori->subKategori}}</small> --}}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <p class="text-wrap">{!!$kata_ditemukan[0]!!}</p>
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
