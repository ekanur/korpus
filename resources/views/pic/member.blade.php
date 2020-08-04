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
                {{session('msg_success')}}
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
                <div class="row align-text-center">
                    <div class="col">
                        <h3 class="mb-0">Manajemen Member</h3>
                    </div>
                    <div class="col text-right">
                        <a href="#"  data-toggle="modal" data-target="#baru" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"></i> Member Baru</a>
                    </div>
                </div>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="no">No</th>
                            <th scope="col" class="sort" data-sort="kata">Nama</th>
                            <th scope="col" class="sort" data-sort="frekuensi">Username</th>
                            <th scope="col" class="sort" data-sort="kata">Email</th>
                            <th scope="col" class="sort" data-sort="kata"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($member as $member)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <span class="h3">{{$member->name}}</span>
                            </td>
                            <td>
                                {{$member->username}}
                            </td>
                            <td>
                                {{$member->email}}
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-default">Edit</a>
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
    @include("template.picsidebar")
@endsection

@section("footer")
    @include("template.footer")
@endsection

@section('js')

@endsection

