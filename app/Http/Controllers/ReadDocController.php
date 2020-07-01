<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use App\Literatur;
use NlpTools\Tokenizers\WhitespaceTokenizer;
use NlpTools\Similarity\CosineSimilarity;
use PhpOffice\PhpWord\IOFactory;

class ReadDocController extends Controller
{


    public function index()
    {
        $kategori = Kategori::where('korpus_id', session('korpus_id'))->get();
        return view("admin/tes")->with('kategori', $kategori);
    }

    public function upload(Request $request)
    {
        $path = $request->file('literatur')->store("public/literatur");
        // // $path = $request->file('literatur');
        // // $filename = basename($path);
        // // dd($filename);
        $fullpath = "../storage/app/".$path;
        $command = "unzip -p ".$fullpath." word/document.xml | sed -e 's/<[^>]\{1,\}>//g; s/[^[:print:]]\{1,\}//g'";
        // dd($command);
        $text = shell_exec($command);
        // dd($text);


        $literatur = new Literatur;
        $literatur->korpus_id = session('korpus_id',1);
        $literatur->kategori_id = $request->kategori_id;
        $literatur->path = $path;
        $literatur->judul = $request->judul;
        $literatur->tahun_terbit = $request->tahun_terbit;
        $literatur->konten = $text;
        $literatur->uploaded_by = session('user_id', 1);
        $literatur->save();
   }
}
