<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Korpus;
use App\KataDasar;
use App\Kolokasi;
use App\Literatur;

class KorpusController extends Controller
{
    public function index()
    {
        $korpus = Korpus::withCount("literatur")->get()->sortBy('urutan');

        return view("index")->with("korpus", $korpus);
    }

    public function setKorpus($korpus_id){
        $korpus = Korpus::findOrFail($korpus_id);
        session()->forget("korpus_id");
        session(['korpus_id' => $korpus_id]);
        return redirect("dashboard");
    }

    public function pilihKorpus(){
        session()->forget("korpus_id");
        return redirect("/");
    }

    public function dashboard()
    {
        $korpus = Korpus::with("literatur.analisaLiteratur")->withCount("literatur")->findOrFail(session('korpus_id'));
        $jumlah_kata = 0;
        $jumlah_kata_dasar = 0;
        $jumlah_token = 0;
        foreach($korpus->literatur as $literatur){
            if(null != $literatur->analisaLiteratur){
                $jumlah_kata += $literatur->analisaLiteratur->jumlah_kata;
                $jumlah_kata_dasar += $literatur->analisaLiteratur->jumlah_kata_dasar;
                $jumlah_token += $literatur->analisaLiteratur->jumlah_token;
            }
        }

        $korpus->jumlah_kata = $jumlah_kata;
        $korpus->jumlah_kata_dasar = $jumlah_kata_dasar;
        $korpus->jumlah_token = $jumlah_token;

        // dd($korpus);
        return view("dashboard")->with(["korpus" => $korpus, "literatur" => Literatur::where("korpus_id", session("korpus_id"))->get()]);
    }

    function kata() {
        $korpus = Korpus::findOrFail(session("korpus_id"));
        $kata = KataDasar::where("korpus_id", session("korpus_id"))->get();

        return view("kata")->with(["kata" => $kata, "korpus"=>$korpus, "judul"=>"Kata"]);
    }

    function kolokasi() {
        $korpus = Korpus::findOrFail(session("korpus_id"));
        $kata = Kolokasi::where("korpus_id", session("korpus_id"))->get();

        return view("kata")->with(["kata" => $kata, "korpus"=>$korpus, "judul"=>"Kolokasi"]);
    }

    function literatur() {
        $korpus = Korpus::findOrFail(session("korpus_id"));
        $literatur = Literatur::where("korpus_id", session("korpus_id"))->get();

        return view("literatur")->with(["literatur" => $literatur, "korpus"=>$korpus]);
    }

    public function viewLiteratur($id)
    {
        $literatur = Literatur::whereId($id)->whereKorpusId(session("korpus_id"))->firstOrFail();
        $literatur->analisaKolokasi()->where("jumlah", "!=", "0")->get();
        $daftar_kata = collect(json_decode(strtolower($literatur->json_konten)))->map(function($value, $key){
            return collect($value)->put("posisi", $key);
        })->groupBy("kata")->sortKeys();

        // $literatur = collect($literatur)->except(['json_konten', 'path']);
        unset($literatur->json_konten);
        unset($literatur->path);
        return view("detail_literatur")->with("literatur", $literatur)->with("korpus", Korpus::find(session("korpus_id")))->with("daftar_kata", $daftar_kata);
    }

    public function konkordansi($id, $kata)
    {
        $literatur = Literatur::whereId($id)->whereJsonContains("json_konten", ['kata' => $kata])->firstOrFail();
        $kata_ditemukan = collect(json_decode($literatur->json_konten))->where("kata", $kata);
        // dd($kata_ditemukan);
        $konkordansi = $kata_ditemukan->map(function($item, $key) use($literatur){
            return "...".collect(json_decode($literatur->json_konten))->slice($key-20, 40)->implode("kata", " ")."...";
        });

        // dd($konkordansi);

        $konkordansi = $konkordansi->map(function($item, $key) use($kata){
            // dd($kata);
            return str_replace($kata, "<u><strong>".$kata."</strong></u>", $item);
        });

        return view("konkordansi")->with("konkordansi", $konkordansi)->with("kata", $kata)->with("literatur", $literatur)->with("korpus", Korpus::find(session("korpus_id")));
    }

    public function cari(Request $request){
        $keyword = ($request->keyword == trim($request->keyword) && strpos($request->keyword, ' ') !== false)? explode(" ", $request->keyword):array($request->keyword);
        $literatur = Literatur::whereKorpusId(session("korpus_id"));
        if (sizeof($keyword) > 1) {
            // echo 'has spaces, but not at beginning or end';
            // $keyword = explode(" ", strtolower($request->keyword));
            $literatur = $literatur->whereRaw("JSON_SEARCH(LOWER(json_konten), 'all',  '".$keyword[0]."', NULL, '$[*].kata') is not null");
            // unset($keyword[0]);
            foreach($keyword as $cari){
                $literatur = $literatur->orWhereRaw("JSON_SEARCH(LOWER(json_konten), 'all',  '".$cari."', NULL, '$[*].kata') is not null");
            }
        }else{
            $literatur = $literatur->whereRaw("JSON_SEARCH(LOWER(json_konten), 'all',  '".$keyword[0]."', NULL, '$[*].kata') is not null");
        }
        // dd($keyword);


        $literatur = $literatur->paginate(20);
        $literatur->getCollection()->transform(function($value) use($keyword){
            $hasil = collect(json_decode($value->json_konten))->whereIn("kata", $keyword);
            // dd($hasil);
            return $hasil;
        });

        dd($literatur);

        return view("hasil_cari")->with(["literatur" => $literatur , "korpus" => Korpus::find(session("korpus_id"))]);

    }
}
