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
                        <h3 class="mb-0">Hasil Pencarian <em>"{{$keyword}}"</em> &nbsp; Dalam Korpus {{$korpus->jenis}}</h3>
                        </div>

                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        {{-- <th scope="col" class="sort" data-sort="name" width="5%">No.</th> --}}
                                        <th scope="col" class="sort" width="95%" data-sort="completion">Hasil Pencarian</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($kata_ditemukan as $kata_ditemukan)

                                                @foreach ($kata_ditemukan["hasil_pencarian"] as $hasil_pencarian)
                                                <tr>
                                                    <td>
                                                    <p class="text-wrap">...{!!str_replace($keyword, "&nbsp;<strong><u>".$keyword."</u></strong>&nbsp;", $hasil_pencarian)!!}...</p>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{url("/literatur/".$kata_ditemukan["id"])}}" class="btn btn-sm btn-info align-middle">Lihat Literatur &raquo;</a>
                                                </td>
                                                </tr>
                                                @endforeach

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
