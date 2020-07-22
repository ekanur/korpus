<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Korpus;
use App\Literatur;

class LiteraturController extends Controller
{
    function index() {
//        $kategori = Kategori::where('korpus_id', session('korpus_id'))->get();
        $korpus = Korpus::all();
        return view("admin.literatur")->with('korpus', $korpus);
    }
    
    function save(Request $request) {
        $path = $request->file('literatur')->store("public/literatur");
        // // $path = $request->file('literatur');
        // // $filename = basename($path);
        // // dd($filename);
        $fullpath = "../storage/app/".$path;
        $command = "unzip -p ".$fullpath." word/document.xml | sed -e 's/<[^>]\{1,\}>//g; s/[^[:print:]]\{1,\}//g'";
        // dd($command);
        $text = shell_exec($command);
        // dd($text);
        
        $validatedRequest = $request->validate([
            'kategori' => 'required',
            'judul' => 'required',
            'literatur' => 'required | mimes:docx, doc, rtf | max: 10000'
        ]);
        
        if($validatedRequest){
           $literatur = new Literatur;
            $literatur->korpus_id = $request->korpus;
            $literatur->kategori_id = $request->kategori;
            $literatur->path = $path;
            $literatur->judul = $request->judul;
            $literatur->tahun_terbit = $request->tahun_terbit;
            $literatur->konten = $text;
            $literatur->uploaded_by = session('user_id', 1);
            $literatur->save(); 
        }

        return redirect()->back()->with("status", "Literatur berhasil tersimpan");
    }
}
