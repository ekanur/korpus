<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\User;
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
        // $array_sub = explode(",", $request->sub_kategori);
        // dd($array_sub);
        $kategori = new Kategori;
        $kategori->korpus_id = Auth::user()->korpus->id;
        $kategori->kategori = $request->kategori;
        $kategori->parent_id = 0;
        $kategori->save();

        // if($request->sub_kategori != null){
        //     $sub_kategori = Kategori::find($kategori->id);
        //     $sub_kategori->korpus_id = Auth::user()->korpus->id;
        // }

        return redirect()->back()->with("msg_success", "Berhasil membuat kategori baru.");
    }


}
