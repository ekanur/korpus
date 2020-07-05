
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
                                        <th scope="col" width="10%">Jumlah Kata</th>
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
                                                    <span class="name mb-0 text-sm"><a href="{{url("literatur/".$literatur->id)}}">{{$literatur->judul}}</a></span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{$literatur->kategori->kategori}} - <small class="text-muted">{{$literatur->kategori->subKategori}}</small>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{$literatur->jumlah_kata}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{$literatur->kata_dasar}}
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
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