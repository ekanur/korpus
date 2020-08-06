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
        @endif
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0 shadow">
                <div class="row align-text-center">
                    <div class="col">
                        <h3 class="mb-0">Edit Token</h3>
                    </div>

                </div>
            </div>
            <form action="{{url("admin/update_token")}}" method="post" enctype="">
                <!--<h6 class="heading-small text-muted mb-4">User information</h6>-->
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$token->id}}">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">Korpus</label>
                            <!--<input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">-->
                            <select name="korpus" class="form-control">
                                @foreach($korpus as $korpus_data)
                                    <option @if ($korpus_data->id === $token->korpus_id) selected @endif value="{{$korpus_data->id}}">{{$korpus_data->jenis}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-first-name">token</label>
                          <input required type="text" name="token" id="input-first-name" class="form-control" placeholder="token" value="{{ $token->token }}">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                                <label class="form-control-label" for="input-first-name">&nbsp;</label>
                                <input type="submit" class="form-control btn btn-success" name="simpan" value="Simpan"/>
                            </div>
                        </div>

                    </div>
                </div>


              </form>
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

@endsection
