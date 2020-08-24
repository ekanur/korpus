<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Kolokasi;
use App\User;
use App\Literatur;
use App\Token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\KataDasar;

class PICController extends Controller
{
    public function index()
    {
        // $kategori = Kategori::with('subKategori')->whereParentId(0)->whereKorpusId(Auth::user()->korpus->id)->get();
        // echo Auth::user()->korpus->jenis;
        // echo "<pre>";

        // foreach($kategori as $kategori){
        //     dd($kategori) ;
        // }
        // exit;
        return view("pic.index")->with('kategori', Kategori::with('subKategori')->whereParentId(0)->whereKorpusId(Auth::user()->korpus->id)->get());
    }

    public function member()
    {
        return view("pic.member")->with("member", User::whereRole('member')->whereIssuedBy(Auth::user()->id)->get());
    }

    public function simpanKategori(Request $request)
    {
        $kategori = new Kategori;
        $kategori->korpus_id = Auth::user()->korpus->id;
        $kategori->kategori = $request->kategori;
        $kategori->parent_id = 0;
        $kategori->save();

        if($request->sub_kategori != null){
            $korpus_id = Auth::user()->korpus->id;
            $parent_id = $kategori->id;
            $array_sub = explode(",", $request->sub_kategori);
            $sub_kategori = array_map(fn($sub) => trim($sub), $array_sub);
            $sub_kategori = array_map(function($sub) use($korpus_id, $parent_id){

                return array("korpus_id" => $korpus_id, "kategori" => $sub, "parent_id" => $parent_id, "created_at" => Carbon::now()->toDateTimeString());
            }, $sub_kategori);
            $simpan_sub_kategori = Kategori::insert($sub_kategori);
        }

        return redirect()->back()->with("msg_success", "Berhasil membuat kategori baru.");
    }

    public function editKategori($id)
    {
        $kategori = Kategori::with('subKategori')->whereId($id)->whereKorpusId(Auth::user()->korpus->id)->get();
        dd($kategori);
        return view("pic.edi_kategori")->with("kategori", $kategori);
    }

    public function literatur(){
        return view("pic.literatur")->with('literatur', Literatur::whereKorpusId(Auth::user()->korpus->id)->get());
    }

    public function analisaLiteratur($id)
    {
        $literatur = Literatur::findOrFail($id);
        // dd($literatur);
        $token = Token::whereKorpusId($literatur->korpus_id)->select("id","token")->get()->toArray();
        $kata_dasar = KataDasar::whereKorpusId($literatur->korpus_id)->select("id","kata_dasar")->get()->toArray();
        $kolokasi = Kolokasi::whereKorpusId($literatur->korpus_id)->select("id","kolokasi")->get()->toArray();

        $this->analisaKataDasar($kata_dasar, $literatur->konten);
        $this->analisaKolokasi($kolokasi, $literatur->konten);

        $literatur->jumlah_kata = str_word_count($literatur->konten);
        $literatur->kata_dasar = (str_word_count($literatur->konten)-$this->analisaToken($token, $literatur->konten));
        $literatur->analyze_on = Carbon::now()->toDateString();
        $literatur->save();

        return redirect()->back()->with("msg_success", "Selesai menganalisa <strong>".strtoupper($literatur->judul)."</strong>.");
    }


    public function analisaToken(array $token, String $literatur){
        $literatur = strtolower($literatur);
        $hasil = array_map(function($cari) use($literatur){
            // dd($cari->token);
            return array("id"=>$cari["id"], "token"=>$cari['token'], "jumlah"=> preg_match_all("/\b".$cari['token']."\b/ims", $literatur));
        }, $token);
        // dd($hasil);
        $hasil_analisa = collect($hasil)->filter(function($value, $key){

            return 0 != $value['jumlah'];
        });
        $jumlah_semua = $hasil_analisa->sum("jumlah");


        foreach($hasil_analisa as $analisa_token){
            $token = Token::find($analisa_token['id']);
            $token->frekuensi_token = $token->frekuensi_token + $analisa_token['jumlah'];
            $token->frekuensi_token_persen = $token->frekuensi_token_persen + ($analisa_token['jumlah']/$jumlah_semua);
            $token->save();
        }

        return $hasil_analisa->count();
    }

    public function analisaKataDasar(array $kata_dasar, String $literatur){
        $literatur = strtolower($literatur);
        $hasil = array_map(function($cari) use($literatur){
            // dd($cari->token);
            return array("id"=>$cari["id"], "kata_dasar"=>$cari['kata_dasar'], "jumlah"=> preg_match_all("/\b".$cari['kata_dasar']."\b/ims", $literatur));
        }, $kata_dasar);
        // dd($hasil);
        $hasil_analisa = collect($hasil)->filter(function($value, $key){

            return 0 != $value['jumlah'];
        });
        $jumlah_semua = $hasil_analisa->sum("jumlah");


        foreach($hasil_analisa as $analisa_kata_dasar){
            $kata_dasar = KataDasar::find($analisa_kata_dasar['id']);
            $kata_dasar->frekuensi_kata = $kata_dasar->frekuensi_kat + $analisa_kata_dasar['jumlah'];
            $kata_dasar->frekuensi_kata_persen = $kata_dasar->frekuensi_kata_persen + ($analisa_kata_dasar['jumlah']/$jumlah_semua);
            $kata_dasar->save();
        }

        return true;
    }

    public function analisaKolokasi(array $kolokasi, String $literatur){
        $literatur = strtolower($literatur);
        $hasil = array_map(function($cari) use($literatur){
            // dd($cari->token);
            return array("id"=>$cari["id"], "kolokasi"=>$cari['kolokasi'], "jumlah"=> preg_match_all("/\b".$cari['kolokasi']."\b/ims", $literatur));
        }, $kolokasi);
        // dd($hasil);
        $hasil_analisa = collect($hasil)->filter(function($value, $key){

            return 0 != $value['jumlah'];
        });
        $jumlah_semua = $hasil_analisa->sum("jumlah");


        foreach($hasil_analisa as $analisa_kolokasi){
            $kolokasi = Kolokasi::find($analisa_kolokasi['id']);
            $kolokasi->frekuensi_kolokasi = $kolokasi->frekuensi_kolokasi + $analisa_kolokasi['jumlah'];
            $kolokasi->frekuensi_kolokasi_persen = $kolokasi->frekuensi_kolokasi_persen + ($analisa_kolokasi['jumlah']/$jumlah_semua);
            $kolokasi->save();
        }

        return true;
    }
}
