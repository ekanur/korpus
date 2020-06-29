<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Literatur;
use NlpTools\Tokenizers\WhitespaceTokenizer;
use NlpTools\Similarity\CosineSimilarity;
use PhpOffice\PhpWord\IOFactory;

class ReadDocController extends Controller
{
    //

    public function index()
    {
        return view("admin/tes");
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
        // $text = shell_exec($command);
        dd(shell_exec($command));
        // $name = basename(__FILE__, '.php');
        // $source = __DIR__ . "/resources/{$name}.docx";
        // dd(storage_path($path));

        // $phpWord = \PhpOffice\PhpWord\IOFactory::load($path);

        // $literatur = new Literatur;
        // $literatur->korpus_id = 2;
        // $literatur->kategori_id = 10;
        // $literatur->uploaded_by = 9;
        // $literatur->path = $path;
        // $literatur->save();
   }
}
