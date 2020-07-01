<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Korpus;

class KorpusController extends Controller
{
    public function index()
    {
        $korpus = Korpus::all();
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
        // dd(session("korpus_id"));
        return view("dashboard");
    }

    public function cari($keyword){

    }
}
