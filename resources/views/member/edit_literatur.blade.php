@extends("template.layout")

@section("header")
    @include("template.dashboard_header")
@endsection

@section("content")
<div class="row">
    <div class="col-xl-10 order-xl-1">
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
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Upload Literatur</h3>
                    </div>

                </div>
            </div>
            <div class="card-body">
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
@if (session('status'))
<div class="alert alert-info">
    {{ session('status') }}
</div>
@endif
<form action="{{url("member/update_literatur")}}" method="post" enctype="multipart/form-data">
<!--<h6 class="heading-small text-muted mb-4">User information</h6>-->
{{ csrf_field() }}
<input type="hidden" name="id" value="{{$literatur->id}}">
<input type="hidden" name="kategori_id" value="{{$literatur->kategori_id}}">
<div class="pl-lg-4">
<div class="row">
<div class="col-lg-6">
  <div class="form-group">
    <label class="form-control-label" for="input-username">Korpus</label>
    <!--<input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">-->
    <select name="korpus" class="form-control">
        @foreach($korpus as $korpus)
        <option @if ($literatur->korpus_id == $korpus->id)
            selected
        @endif value="{{$korpus->id}}">{{$korpus->jenis}}</option>
        @endforeach
    </select>
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label class="form-control-label" for="input-email">Kategori</label>
    <!--<input type="email" id="input-email" class="form-control" placeholder="jesse@example.com">-->
    <select class="form-control" name="kategori">

    </select>
  </div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
  <div class="form-group">
    <label class="form-control-label" for="input-first-name">Judul Literatur</label>
  <input type="text" name="judul" id="input-first-name" class="form-control" placeholder="Judul literatur" value="{{$literatur->judul}}">
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label class="form-control-label" for="input-last-name">Tahun Terbit</label>
    <!--<input type="text" id="input-last-name" class="form-control" placeholder="Last name" value="Jesse">-->
    <select name="tahun_terbit" id="" class="form-control">
@for ($i = date("Y"); $i >= date("Y")-80 ; $i--)
<option @if($literatur->tahun_terbit == $i) selected @endif value="{{$i}}">{{$i}}</option>
@endfor
</select>
  </div>
</div>
</div>
</div>

<div class="pl-lg-4">
<div class="row">
<div class="col-md-12">
  <div class="form-group">
    <label class="form-control-label" for="input-address">File Literatur</label>
    <input name="literatur" class="form-control" placeholder="File ..." value="" type="file">
  </div>
</div>
</div>

</div>
<div class="pl-lg-4">
    <div class="row">
<div class="col-md-4">
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" name="simpan" value="Simpan"/>
    </div>
</div>
</div>
</div>
</form>
<div class="row">
    <div class="col-md-12">
        <span class="h3">Preview Isi Literatur</span>
        <p>
            <em class="text-muted">{{substr($literatur->konten,0, 200)}} ...</em>
        </p>
    </div>
</div>
</div>
</div>
</div>


</div>


@endsection

@section("sidebar")
    @include("template.membersidebar")
@endsection

@section("footer")
    @include("template.footer")
@endsection

@section('js')
<script>
    $(document).ready(function(){
        var korpus_id = $("select[name='korpus']").val();
        var kategori_id = $("input[name='kategori_id']").val();
            $.get("{{url('api/korpus')}}/"+korpus_id+"/kategori", function(data){

            })
                    .done(function(data){
                        var items = [];
                        var isSelected="";
                        $.each(data, function(index, value){

                            if(value.id == kategori_id){
                                isSelected = "selected";
                            }else{
                                isSelected = NaN;
                            }

                            items.push("<option "+ isSelected +" value='"+value.id+"'>"+value.kategori+"</option>");
                        });
                        // $("select[name='kategori']").empty();
                        $(items.join("")).appendTo("select[name='kategori']");
                    });

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
