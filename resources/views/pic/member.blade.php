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
                @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
                @endif
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
                            <a href="{{url("pic/member/".$member->id)}}" class="btn btn-sm btn-default">Edit</a>
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

<div class="modal fade" id="baru" role="dialog" aria-labelledby="modal-form" aria-modal="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body p-0">
                <div class="card-body px-lg-5 py-lg-4">
                    <div class="text-center text-muted mb-4">
                       Tambah Member
                    </div>
                    <form action="{{url("pic/member")}}" method="post" enctype="">
                        <!--<h6 class="heading-small text-muted mb-4">User information</h6>-->
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-control-label" for="input-username">Nama Lengkap</label>
                              <input type="text" name="name" id="korpus" class="form-control" placeholder="member" value="">

                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Username</label>
                                    <input type="text" name="username" id="korpus" class="form-control" placeholder="Username" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Email</label>
                                <input type="text" name="email" id="korpus" class="form-control" placeholder="Email" value="">

                                  </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Password</label>
                                <input type="password" name="password" id="korpus" class="form-control" placeholder="...." value="">

                                  </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Ulangi Password</label>
                                <input type="password" name="ulangi_password" id="korpus" class="form-control" placeholder="...." value="">

                                  </div>
                            </div>

                        </div>
                          <div class="form-group">
                              <input type="submit" class="form-control btn btn-success" name="simpan" value="Simpan"/>
                          </div>
                      </form>
                </div>
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

