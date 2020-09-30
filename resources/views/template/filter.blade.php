<div class="card">
    <div class="card-header">
        <form action="{{url("cari")}}" method="get">
            <div class="form-row">
                    <div class="col-12">
                        <div class="form-group mb-0">
                            <input class="form-control" placeholder="Kata Kunci ..." type="text" name="keyword" value="{{\Request::get('keyword') ?? ''}}">
                        </div>
                    </div>
            </div>
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
                    <select name="kategori" id="" class="form-control form-control-sm">
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
                    <select name="tahun_terbit" id="" class="form-control form-control-sm">
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
                    <select name="hingga" id="" class="form-control form-control-sm">
                        <option value="">Semua</option>
                        @for ($i = date("Y"); $i >= date("Y")-80 ; $i--)
                        <option value="{{$i}}" @if (\Request::get("hingga") == $i)
                            selected
                        @endif>{{$i}}</option>
                        @endfor
                    </select>
                </div>
                @if(\Request::is("literatur/*") or \Request::get('pencarian') == 'literatur')
                <div class="col">
                    <small class="help-text">&nbsp;</small>
                    <select name="pencarian" id="" class="form-control form-control-sm">
                        <option value="literatur">Dalam Literatur</option>
                        <option value="korpus">Dalam Korpus</option>
                    </select>
                    <input type="hidden" name="id" value="{{ \Request::get('id') ?? $literatur->id }}">
                </div>
                @endif
                <div class="col-md-1">
                    {{-- <small>&nbsp;</small> --}}
                    <button class="mt-3 btn btn-success">Cari</button>
                </div>
              </div>
        </form>
    </div>
</div>
