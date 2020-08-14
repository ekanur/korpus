<?php

namespace App\Http\Controllers;

use App\Literatur;
use App\Korpus;
use App\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        return view("member.index")->with('literatur', Literatur::where('uploaded_by', Auth::user()->id)->get());
    }

    public function literatur()
    {
        $korpus = Korpus::all();
        return view("member.literatur")->with('korpus', $korpus);
    }

    public function simpanLiteratur(Request $request)
    {
        $path = $request->file('literatur')->store("public/literatur");
        // // $path = $request->file('literatur');
        // // $filename = basename($path);
        // // dd($filename);
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
            $literatur->konten = $this->handleFile($path);
            $literatur->uploaded_by = Auth::user()->id;
            $literatur->save();
        }

        return redirect()->back()->with("msg_success", "Literatur berhasil tersimpan");
    }

    public function handleFile($path){
        $fullpath = "../storage/app/".$path;
        $command = "unzip -p ".$fullpath." word/document.xml | sed -e 's/<[^>]\{1,\}>//g; s/[^[:print:]]\{1,\}//g'";
        // dd($command);
        $text = shell_exec($command);

        return $text;
    }

    public function editLiteratur($id)
    {
        $literatur = Literatur::whereUploadedBy(Auth::user()->id)->findOrFail($id);

        return view("member.edit_literatur")->with('literatur', $literatur)->with('korpus', Korpus::all());
    }

    public function updateLiteratur(Request $request)
    {
        $validatedRequest = $request->validate([
            'kategori' => 'required',
            'judul' => 'required',
            'literatur' => 'nullable | mimes:docx, doc, rtf | max: 10000'
        ]);
        if($validatedRequest){
            $literatur = Literatur::find($request->id);
            $literatur->korpus_id = $request->korpus;
            $literatur->kategori_id = $request->kategori;
            $literatur->judul = $request->judul;
            $literatur->tahun_terbit = $request->tahun_terbit;

            if($request->hasFile('literatur')){
                $path = $request->file('literatur')->store("public/literatur");
                $literatur->path = $path;
                $literatur->konten = $this->handleFile($path);
            }

            $literatur->save();
        }

        return redirect()->back()->with("msg_success", "Literatur berhasil tersimpan");
    }




}
