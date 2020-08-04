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
        // $kategori = Kategori::with('subKategori')->whereParentId(0)->get();
        // echo "<pre>";
        // foreach($kategori as $kategori){
        //     echo json_encode($kategori->subKategori);
        // }
        // exit;
        return view("pic.index")->with('kategori', Kategori::with('subKategori')->whereParentId(0)->whereKorpusId(Auth::user()->korpus->id)->get());
    }

    public function member()
    {
        return view("pic.member")->with("member", User::whereRole('member')->whereIssuedBy(Auth::user()->id)->get());
    }
}
