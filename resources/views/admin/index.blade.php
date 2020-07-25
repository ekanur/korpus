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
                <h3 class="mb-0">Korpus</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="no">No</th>
                            <th scope="col" class="sort" data-sort="kata">Korpus</th>
                            <th scope="col" class="sort" data-sort="frekuensi">Dianalisa Pada</th>
                            <th scope="col" class="sort" data-sort="frekuensi"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($korpus as $korpus)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                {{$korpus->jenis}}
                            </td>
                            <td>
                                {{$korpus->updated_at}}
                            </td>
                            <td>
                                <a href="{{url("admin/analisa_korpus/".$korpus->id)}}" class="btn btn-sm btn-primary">Analisa</a>
                                <a href="{{url("admin/report_korpus/".$korpus->id)}}" class="btn btn-sm btn-default">Report</a>
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
    $(document).ready(function(){
        $("select[name='korpus']").change(function(){
            var korpus_id = $(this).val();
            $.get("{{url('api/korpus')}}/"+korpus_id+"/kategori", function(data){

            })
                    .done(function(data){
                        var items = [];
                        $.each(data, function(index, value){
//                                console.log(value);

                            items.push("<option value='"+value.id+"'>"+value.kategori+"</option>");
                        });
                        $("select[name='kategori']").empty();
                        $(items.join("")).appendTo("select[name='kategori']");
                    });
        });
    });
</script>
@endsection

