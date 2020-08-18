<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\User;
use App\Literatur;
use App\Token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $hasil_analisa = array("jumlah_kata"=>0, "token"=>0, "kata_dasar"=>0);
        //
        $literatur = Literatur::findOrFail($id);
        // dd($literatur);
        $token = Token::whereKorpusId($literatur->korpus_id)->select("token")->get()->toArray();
        $literatur_konten = strtolower($literatur->konten);
        $hasil = array_map(function($cari) use($literatur_konten){
            // dd($cari->token);
            return array("token"=>$cari['token'], "jumlah"=> substr_count($literatur_konten, $cari['token']));
        }, $token);

        $hasil_analisa = collect($hasil)->filter(function($value, $key){

            return !is_null($value['jumlah']);
        });

        $literatur->jumlah_kata = str_word_count($literatur->konten);
        $literatur->kata_dasar = (str_word_count($literatur->konten)-$hasil_analisa->count());
        $literatur->analyze_on = Carbon::now()->toDateString();
        $literatur->save();

        return redirect()->back()->with("msg_success", "Selesai menganalisa <strong>".strtoupper($literatur->judul)."</strong>.");
    }
}
