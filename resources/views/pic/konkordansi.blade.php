@extends("template.layout")

@section("header")
    @include("template.dashboard_header")
@endsection

@section("content")
<div class="row">
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
                    <h3>Hasil Pencarian <em>"{{$kata}}"</em> pada  "{{ strtoupper($literatur->judul) }}"</h3>
                    </div>

                </div>

            </div>
            <!-- Light table -->
            <div class="table-responsive">

                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            {{-- <th scope="col" class="sort" data-sort="name" width="1%">No</th> --}}
                            <th scope="col" class="sort" data-sort="budget" width="99%">Konkordansi</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($konkordansi as $konkordansi)
                            <tr>
                            {{-- <td scope="row">
                                {{$loop->index+1}}
                            </td> --}}
                            <td class="budget">
                                <p class="text-wrap">{!!$konkordansi!!}</p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>


@endsection

@section("sidebar")
    @include("template.picsidebar")
@endsection

@section("footer")
    @include("template.footer")
@endsection

@section('js')
<script>

</script>
@endsection

