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
        $korpus = Korpus::all()->sortBy('urutan');
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
        $korpus = Korpus::findOrFail(session('korpus_id'));
//        dd($korpus);
        return view("dashboard")->with("korpus", $korpus);
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

    public function cari($keyword){

    }
}
