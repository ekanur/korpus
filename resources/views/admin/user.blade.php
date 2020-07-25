@extends("template.layout")

@section("header")
    @include("template.dashboard_header")
@endsection

@section("content")
<div class="row">

    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0 shadow">
                <h3 class="mb-0">Penanggung Jawab</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="no">No</th>
                            <th scope="col" class="sort" data-sort="frekuensi">Nama Lengkap</th>
                            <th scope="col" class="sort" data-sort="status">Email</th>
                            <th scope="col" class="sort" data-sort="status">PJ Korpus</th>
                            <th scope="col" class="sort" data-sort="status"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($pic as $pic)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                {{$pic->name}}
                            </td>
                            <td>
                                {{$pic->email}}
                            </td>
                            <td>
                                {{$pic->korpus->jenis}}
                            </td>
                            <td>
                            <a href="{{url("admin/user/".$pic->id)}}" class="btn btn-sm btn-primary">Edit</a>
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
    @include("template.adminsidebar")
@endsection

@section("footer")
    @include("template.footer")
@endsection

@section('js')
<script>

</script>
@endsection
