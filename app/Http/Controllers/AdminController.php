<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kolokasi;
use App\KataDasar;
use App\Token;
use Illuminate\Http\Request;
use App\Korpus;
use App\Literatur;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index")->with('korpus', Korpus::all()->sortBy('urutan'));
    }

    public function kolokasi(){

        return view("admin.kolokasi")->with('kolokasi', Kolokasi::all())->with('korpus', Korpus::all());
    }

    public function simpanKolokasi(Request $request)
    {
        $kolokasi = new Kolokasi();
        $kolokasi->korpus_id = $request->korpus;
        $kolokasi->kolokasi = $request->kolokasi;
        $kolokasi->save();

        return redirect()->back()->with("msg_success", "Berhasil menyimpan Kolokasi Baru");
    }

    public function editKolokasi($id)
    {
        $kolokasi = Kolokasi::find($id);

        return view("admin.edit_kolokasi")->with("kolokasi", $kolokasi)->with('korpus', Korpus::all());
    }

    public function updateKolokasi(Request $request)
    {
        $kolokasi = Kolokasi::find($request->id);
        $kolokasi->korpus_id = $request->korpus;
        $kolokasi->kolokasi = $request->kolokasi;
        $kolokasi->save();

        return redirect()->back()->with("msg_success", "Berhasil mengubah Kolokasi");
    }

    public function hapusKolokasi(Request $request)
    {
        Kolokasi::destroy($request->id);

        return redirect()->back()->with("msg_success", "Berhasil menghapus Kolokasi");
    }

    public function korpus($id)
    {
        return view("admin.korpus")->with('korpus', Korpus::find($id));
    }

    public function editKorpus(Request $request)
    {
        $korpus = Korpus::find($request->id);
        $korpus->jenis = $request->korpus;
        $korpus->save();

        return redirect()->back()->with("msg_success", "Berhasil memperbarui Korpus");
    }

    public function user()
    {
        return view("admin.user")->with('pic', User::whereRole("pic")->get());
    }

    public function editUser($id)
    {
        return view("admin.edit_user")->with('pic', User::whereRole('pic')->findOrFail($id))->with('korpus', Korpus::all());
    }

    public function updateUser(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if(!$user->save()){
            return redirect()->back()->with('msg_error', "Kesalahan saat menyimpan PIC");
        }
        if(null != $request->korpus_lama){
            $korpus = Korpus::find($request->korpus_lama);
            $korpus->user_id = 1;

            if(!$korpus->save()){
                return redirect()->back()->with('msg_error', "Kesalahan saat mengubah PJ");
            }
        }

        $korpus = Korpus::find($request->korpus);
        $korpus->user_id = $request->id;
        if(!$korpus->save()){
            return redirect()->back()->with('msg_error', "Kesalahan saat memperbarui PJ");
        }

        return redirect()->back()->with('msg_success', "Berhasil memperbarui PIC");
    }

    public function kataDasar(){

        return view("admin.kata_dasar")->with('kata_dasar', KataDasar::all())->with('korpus', Korpus::all());
    }

    public function editKataDasar($id)
    {
        $kata_dasar = KataDasar::findOrFail($id);

        return view("admin.edit_kata_dasar")->with("kata_dasar", $kata_dasar)->with("korpus", Korpus::all());

    }

    public function updateKataDasar(Request $request)
    {
        $kata_dasar = KataDasar::find($request->id);
        $kata_dasar->kata_dasar = $request->kata_dasar;
        $kata_dasar->korpus_id = $request->korpus;
        $kata_dasar->save();

        return redirect()->back()->with("msg_success", "Berhasil mengubah Kata Dasar");
    }

    public function simpanKataDasar(Request $request)
    {
        $kata_dasar = new KataDasar();
        $kata_dasar->korpus_id = $request->korpus;
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

        return view("admin.token")->with('token', Token::all())->with('korpus', Korpus::all());
    }

    public function editToken($id)
    {
        $token = Token::findOrFail($id);

        return view("admin.edit_token")->with('token', $token)->with("korpus", Korpus::all());
    }

    public function updateToken(Request $request)
    {
        $token = Token::find($request->id);
        $token->token = $request->token;
        $token->korpus_id = $request->korpus;
        $token->save();

        return redirect()->back()->with("msg_success", "Berhasil mengubah Token");
    }

     public function simpanToken(Request $request)
    {
        $token = new Token();
        $token->korpus_id = $request->korpus;
        $token->token = $request->token;
        $token->save();

        return redirect()->back()->with("msg_success", "Berhasil menyimpan Token Baru");
    }

    public function hapusToken(Request $request)
    {
        Token::destroy($request->id);

        return redirect()->back()->with("msg_success", "Berhasil menghapus Token");
    }

    public function analisaKorpus($id)
    {
        // $literatur = Literatur::with(["analisaLiteratur" => function($query){
        //     $query->sum("jumlah_kata");
        // }])->whereKorpusId($id)->get();
        // dd($literatur);
        $korpus = Korpus::withCount("literatur")->findOrFail($id);
        foreach($korpus as $korpus){
            echo $korpus->analisaLiteratur;
        }
        // $korpus = Korpus::with("literatur.analisaLiteratur")->findOrFail($id);
        // $korpus->jumlah_literatur = $korpus->literatur->count();
        // $korpus->jumlah_kata = $korpus->literatur
        // dd($korpus->literatur->analisaLiteratur->count());
    }

}
