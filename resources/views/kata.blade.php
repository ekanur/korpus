
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
                            <h3 class="mb-0">Daftar Kata</h3>
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
                                        {{-- <th scope="col" class="sort" data-sort="frekuensi">Frekuensi Dokumen</th>
                                        <th scope="col" class="sort" data-sort="status">Persentase</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="list">
                                        @foreach($kata as $key => $value)
                                        <tr>
                                        <td>
                                            {{ $key }}
                                        </td>
                                        <td>
                                            {{ count($value) }}
                                        </td>
                                        <td>
                                            {{ round(count($value)/count($kata), 3) }}
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
