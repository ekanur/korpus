<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kolokasi;
use App\KataDasar;
use App\Token;
use Illuminate\Http\Request;
use App\Korpus;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Literatur;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index")->with('korpus', Korpus::all()->sortBy('urutan'));
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

    public function resetUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->password = Hash::make("password");
        $user->save();

        return redirect()->back()->with("msg_success", "Berhasil mereset password.");
    }



    public function analisaKorpus($id)
    {
        $start = microtime(true);
        // $literatur = Literatur::with(["analisaLiteratur" => function($query){
        //     $query->sum("jumlah_kata");
        // }])->whereKorpusId($id)->get();
        // dd($literatur);
        $korpus = Korpus::with("literatur", "literatur.analisaLiteratur")->withCount("literatur")->findOrFail($id);
            // dd($korpus->literatur_count);
        // foreach($korpus as $korpus){
        //     echo $korpus->analisaLiteratur;
        // }
        $literatur = Literatur::with("analisaLiteratur")->has("analisaLiteratur")->whereKorpusId($id)->get();
            // dd($literatur);
        $array_jumlah = ["kata"=>0, "token"=>0, "kata_dasar"=>0];

        foreach($literatur as $literatur){
            $array_jumlah["kata"] = $literatur->analisaLiteratur->jumlah_kata;
            $array_jumlah["token"] = $literatur->analisaLiteratur->jumlah_token;
            $array_jumlah["kata_dasar"] = $literatur->analisaLiteratur->jumlah_kata_dasar;
        }
        // dd($array_jumlah);
        $korpus->jumlah_literatur = $korpus->literatur_count;
        $korpus->jumlah_kata = $array_jumlah["kata"];
        $korpus->kata_dasar = $array_jumlah["kata_dasar"];
        $korpus->token = $array_jumlah["token"];
        $korpus->save();

        $time_consume = microtime(true) - $start;


        return redirect()->back()->with("msg_success", "Selesai melakukan Analisa Korpus <strong>".$korpus->jenis."</strong> dalam <strong>".number_format($time_consume, 2)." detik</strong>.");
        // $korpus = Korpus::with("literatur.analisaLiteratur")->findOrFail($id);
        // $korpus->jumlah_literatur = $korpus->literatur->count();
        // $korpus->jumlah_kata = $korpus->literatur
        // dd($korpus->literatur->analisaLiteratur->count());
    }

    public function reportKorpus($id)
    {
        return view("admin.report_analisa_korpus")->with("korpus", Korpus::with(["literatur"=>function($query){
            $query->orderBy("created_at", "desc");
            $query->take(3);
        }])->withCount("literatur")->findOrFail($id));
    }

}
