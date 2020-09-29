<div class="card">
    <div class="card-header">
        <form action="{{url("cari")}}" method="get">
            <div class="form-row">
                <div class="col-md-1">
                    <div class="pt-4" style="padding-top:50px">
                        <i class="fa fa-filter  align-middle" aria-hidden="true"></i> Filter
                    </div>
                </div>
                <div class="col">

                    <small class="help-text">
                        Kategori
                    </small>
                    <select name="kategori" id="" class="form-control">
                        <option value="">Semua</option>
                        @foreach ($kategori_literatur as $kategori)
                        <option @if (\Request::get("kategori") == $kategori->id)
                            selected
                        @endif value="{{$kategori->id}}">{{$kategori->kategori}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <small class="help-text">
                        Terbit Mulai
                    </small>
                    <select name="tahun_terbit" id="" class="form-control">
                        <option value="">Semua</option>
                        @for ($i = date("Y"); $i >= date("Y")-80 ; $i--)
                            <option value="{{$i}}" @if (\Request::get("tahun_terbit") == $i)
                                selected
                            @endif>{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col">
                    <small class="help-text">
                        Hingga
                    </small>
                    <select name="hingga" id="" class="form-control">
                        <option value="">Semua</option>
                        @for ($i = date("Y"); $i >= date("Y")-80 ; $i--)
                        <option value="{{$i}}" @if (\Request::get("hingga") == $i)
                            selected
                        @endif>{{$i}}</option>
                        @endfor
                    </select>
                </div>
              </div>
        </form>
    </div>
</div>
