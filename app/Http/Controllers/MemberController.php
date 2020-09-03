<?php

namespace App\Http\Controllers;

use App\Kolokasi;
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
            $konten = $this->getContent($path);

            $literatur = new Literatur;
            $literatur->korpus_id = $request->korpus;
            $literatur->kategori_id = $request->kategori;
            $literatur->path = $path;
            $literatur->judul = $request->judul;
            $literatur->tahun_terbit = $request->tahun_terbit;
            $literatur->json_konten = $this->parseJson($konten);
            $literatur->uploaded_by = Auth::user()->id;

            if($literatur->save()){
                $analisa_kolokasi = $this->analisaKolokasi($request->korpus, $konten);
                if(0 != sizeof($analisa_kolokasi)){
                    $literatur = Literatur::find($literatur->id);
                    $literatur->analisaKolokasi()->createMany($analisa_kolokasi);
                }
            }
        }

        return redirect()->back()->with("msg_success", "Literatur berhasil tersimpan");
    }

    public function getContent($path){
        $fullpath = "../storage/app/".$path;
        $command = "unzip -p ".$fullpath." word/document.xml | sed -e 's/<[^>]\{1,\}>//g; s/[^[:print:]]\{1,\}//g'";
        // dd($command);
        $text = shell_exec($command);

        return $text;
    }

    public function parseJson($konten)
    {
        $json_konten = array_map(function($value){
            return array("kata"=>$value, "tipe"=>'');
        }, explode(" ", $konten));

        return json_encode($json_konten);
    }

    public function analisaKolokasi(int $korpus_id, String $konten)
    {
        $kolokasi = Kolokasi::select("kolokasi", "id")->whereKorpusId($korpus_id)->get()->toArray();
        $konten = strtolower($konten);
        // dd($kolokasi);
        $analisa_kolokasi = collect($kolokasi)->map(function($value, $key) use($konten){
            // dd(preg_match_all('~/\b(\w*'.strtolower("memberikan seseorang duduk").'\w*)\b/~', $konten));
            // return array("kolokasi_id"=>$value["id"], "jumlah"=>preg_match_all('/\b('.$value["kolokasi"].')\b/', $konten));
            return array("kolokasi_id"=>$value["id"], "jumlah"=>preg_match_all('(/\b\w*'.strtolower($value["kolokasi"]).'\w*\b/)', $konten));
        })->filter(function($value, $key){
            return $value['jumlah'] != 0;
        });

        return $analisa_kolokasi;
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
                $konten = $this->getContent($path);
                $literatur->path = $path;
                $literatur->json_konten = $this->parseJson($konten);
                $analisa_kolokasi = $this->analisaKolokasi($request->korpus,$konten);

            }

            $literatur->save();
        }

        return redirect()->back()->with("msg_success", "Literatur berhasil tersimpan");
    }




}
