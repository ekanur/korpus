@extends("template.layout")

@section("header")
    @include("template.header")
@endsection
@section("content")
    <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Hasil Pencarian</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name" width="40%"></th>
                                        <th scope="col" class="sort" width="10%" data-sort="completion"></th>
                                        <!-- <th scope="col"></th> -->
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($literatur as $literatur)
                                        <tr>
                                        <td class="budget">
                                            {{-- {{$literatur->kategori->kategori}} - <small class="text-muted">{{$literatur->kategori->subKategori}}</small> --}}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{-- {{$literatur->jumlah_kata}} --}}
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
