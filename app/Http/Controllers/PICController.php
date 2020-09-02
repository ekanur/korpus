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
use App\AnalisaLiteratur;

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
        // dd($kategori);
        return view("pic.edit_kategori")->with("kategori", $kategori);
    }

    public function literatur(){
        return view("pic.literatur")->with('literatur', Literatur::whereKorpusId(Auth::user()->korpus->id)->get());
    }

    public function analisaLiteratur($id)
    {
        // $ = Literatur::select("json_konten")->whereId($id)->whereKorpusId(Auth::user()->korpus->id)->firstOrFail();
        $literatur = Literatur::firstOrNew(
            ['id' => $id, "korpus_id" => Auth::user()->korpus->id]
        );
        $kata_dasar = KataDasar::select("kata_dasar")->whereKorpusId(Auth::user()->korpus->id)->get();
        $token = Token::select("token")->whereKorpusId(Auth::user()->korpus->id)->get();
        // dd(collect($token));
        $array_konten = json_decode($literatur->json_konten);
        $array_konten = collect($array_konten)->map(function($value, $key) use($token, $kata_dasar){

            $tipe = "";
            if($token->where("token", $value->kata)->count() != 0){
                $tipe="t";
            }
            elseif($kata_dasar->where("kata_dasar", $value->kata)->count() != 0){
                $tipe = "k";
            }
            return array("kata"=>$value->kata, "tipe"=> $tipe);
        });

        $literatur->json_konten = json_encode($array_konten);
        if(!$literatur->save()){
            return redirect()->back()->with("msg_danger", "Terjadi kesalahan mengupdate literatur.");
        }

        $jumlah_kata = $array_konten->count();
        $jumlah_kata_dasar = $array_konten->where("tipe", "k")->count();
        $jumlah_token = $array_konten->where("tipe", 't')->count();
        // dd(["jumlah_kata"=>$jumlah_kata, "jumlah_kata_dasar"=>$jumlah_kata_dasar, "jumlah_token"=>$jumlah_token, "analyze_on"=>Carbon::now()]);
        $analisa_literatur = AnalisaLiteratur::updateOrCreate(
            ["literatur_id"=>$id],
            ["jumlah_kata"=>$jumlah_kata, "jumlah_kata_dasar"=>$jumlah_kata_dasar, "jumlah_token"=>$jumlah_token, "analyze_on"=>Carbon::now()]
        );

        if($analisa_literatur){
            $msg=array("tipe"=>"success", "pesan"=>"Selesai menganalisa <strong>".strtoupper($literatur->judul)."</strong>.");
        }else{
            $msg=array("tipe"=>"danger", "pesan"=>"Terjadi kesalahan.");
        }

        return redirect()->back()->with("msg_".$msg['tipe'], $msg['pesan']);
    }

    public function reportLiteratur($id)
    {
        $literatur = Literatur::whereId($id)->whereKorpusId(Auth::user()->korpus->id)->firstOrFail();
        $daftar_kata = collect(json_decode(strtolower($literatur->json_konten)))->map(function($value, $key){
            return collect($value)->put("posisi", $key);
        })->groupBy("kata")->sortKeys();

        // $literatur = collect($literatur)->except(['json_konten', 'path']);
        unset($literatur->json_konten);
        unset($literatur->path);
        // dd($daftar_kata['yang']);

        return view("pic.report_literatur")->with("literatur", $literatur)->with("daftar_kata", $daftar_kata
    );
    }

}
