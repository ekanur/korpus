<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Kolokasi;
use App\User;
use App\Literatur;
use App\Token;
use App\Korpus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\KataDasar;
use App\AnalisaLiteratur;
use Illuminate\Support\Facades\Hash;

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

    public function simpanMember(Request $request)
    {
        $validatedRequest = $request->validate([
            'name' => 'required|min:3',
            'username' => 'required|unique:users,username',
            'email' => 'required|email',
            'password' => 'required|min:3|same:ulangi_password',
            'ulangi_password' => 'required'
        ]);

        if($validatedRequest){
            $user = new User;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = "member";
            $user->issued_by = Auth::user()->id;

            if($user->save()){
                return redirect()->back()->with("msg_success", "Berhasil menambahkan Member Baru.");
            }

            return redirect()->back()->with("msg_error", "Gagal menambahkan member baru.");
        }
    }

    public function updateMember(Request $request)
    {
        $validatedRequest = $request->validate([
            'name' => 'required|min:3',
            'username' => 'required|unique:users,username,'.$request->id,
            'email' => 'required|email'
            ]);

        if($validatedRequest){
            $member = User::findOrFail($request->id);
            $member->name = $request->name;
            $member->username = $request->username;
            $member->email = $request->email;
            if(!$member->save()){
                return redirect()->back()->with("msg_error", "Gagal mengupdate member baru.");

            }

            return redirect()->back()->with("msg_success", "Berhasil mengupdate member");

        }

        return redirect()->back()->with("msg_error", "Gagal mengupdate member baru.");
    }

    public function resetMember(Request $request)
    {
        $member = User::findOrFail($request->id);
        $member->password = Hash::make("password");
        $member->save();

        return redirect()->back()->with("msg_success", "Berhasil mereset password");
    }

    public function editMember($id)
    {
        return view("pic.edit_member")->with("member", User::whereRole('member')->whereIssuedBy(Auth::user()->id)->whereId($id)->firstOrFail());
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
        $literatur->analisaKolokasi()->where("jumlah", "!=", "0")->get();
        $daftar_kata = collect(json_decode(strtolower($literatur->json_konten)))->map(function($value, $key){
            return collect($value)->put("posisi", $key);
        })->groupBy("kata")->sortKeys();

        // $literatur = collect($literatur)->except(['json_konten', 'path']);
        unset($literatur->json_konten);
        unset($literatur->path);
        // dd($daftar_kata['yang']);

        return view("pic.report_literatur")->with("literatur", $literatur)->with("daftar_kata", $daftar_kata);
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

        return view("pic.konkordansi")->with("konkordansi", $konkordansi)->with("kata", $kata)->with("literatur", $literatur);
    }

    public function kolokasi(){

        return view("pic.kolokasi")->with('kolokasi', Kolokasi::whereKorpusId(Auth::user()->korpus->id)->get());
    }

    public function simpanKolokasi(Request $request)
    {
        $kolokasi = new Kolokasi();
        $kolokasi->korpus_id = Auth::user()->korpus->id;
        $kolokasi->kolokasi = $request->kolokasi;
        $kolokasi->save();

        return redirect()->back()->with("msg_success", "Berhasil menyimpan Kolokasi Baru");
    }

    public function editKolokasi($id)
    {
        $kolokasi = Kolokasi::find($id);

        return view("pic.edit_kolokasi")->with("kolokasi", $kolokasi);
    }

    public function updateKolokasi(Request $request)
    {
        $kolokasi = Kolokasi::find($request->id);
        $kolokasi->korpus_id = Auth::user()->korpus->id;
        $kolokasi->kolokasi = $request->kolokasi;
        $kolokasi->save();

        return redirect()->back()->with("msg_success", "Berhasil mengubah Kolokasi");
    }

    public function hapusKolokasi(Request $request)
    {
        Kolokasi::destroy($request->id);

        return redirect()->back()->with("msg_success", "Berhasil menghapus Kolokasi");
    }

    public function kataDasar(){

        return view("pic.kata_dasar")->with('kata_dasar', KataDasar::whereKorpusId(Auth::user()->korpus->id)->get());
    }

    public function editKataDasar($id)
    {
        $kata_dasar = KataDasar::findOrFail($id);

        return view("pic.edit_kata_dasar")->with("kata_dasar", $kata_dasar)->with("korpus", Korpus::all());

    }

    public function updateKataDasar(Request $request)
    {
        $kata_dasar = KataDasar::find($request->id);
        $kata_dasar->kata_dasar = $request->kata_dasar;
        $kata_dasar->korpus_id = Auth::user()->korpus->id;
        $kata_dasar->save();

        return redirect()->back()->with("msg_success", "Berhasil mengubah Kata Dasar");
    }

    public function simpanKataDasar(Request $request)
    {
        $kata_dasar = new KataDasar();
        $kata_dasar->korpus_id = Auth::user()->korpus->id;
        $kata_dasar->kata_dasar = $request->kata_dasar;
        $kata_dasar->save();

        return redirect()->back()->with("msg_success", "Berhasil menyimpan Kata Dasar Baru");
    }

    public function hapusKataDasar(Request $request)
    {
        KataDasar::destroy($request->id);

        return redirect()->back()->with("msg_success", "Berhasil menghapus Kata Dasar");
    }

    public function token(){

        return view("pic.token")->with('token', Token::whereKorpusId(Auth::user()->korpus->id)->get());
    }

    public function editToken($id)
    {
        $token = Token::findOrFail($id);

        return view("pic.edit_token")->with('token', $token)->with("korpus", Korpus::all());
    }

    public function updateToken(Request $request)
    {
        $token = Token::find($request->id);
        $token->token = $request->token;
        $token->korpus_id = Auth::user()->korpus->id;
        $token->save();

        return redirect()->back()->with("msg_success", "Berhasil mengubah Token");
    }

    public function simpanToken(Request $request)
    {
        $token = new Token();
        $token->korpus_id = Auth::user()->korpus->id;
        $token->token = $request->token;
        $token->save();

        return redirect()->back()->with("msg_success", "Berhasil menyimpan Token Baru");
    }

    public function hapusToken(Request $request)
    {
        Token::destroy($request->id);

        return redirect()->back()->with("msg_success", "Berhasil menghapus Token");
    }

}
