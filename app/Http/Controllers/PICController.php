<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

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
        return view("pic.index")->with('kategori', Kategori::with('subKategori')->whereParentId(0)->get());
    }
}
