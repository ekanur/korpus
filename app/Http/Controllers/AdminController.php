<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kolokasi;
use Illuminate\Http\Request;
use App\Korpus;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index")->with('korpus', Korpus::all());
    }

    public function kolokasi(){

        return view("admin.kolokasi")->with('kolokasi', Kolokasi::all())->with('korpus', Korpus::all());
    }

    public function simpanKolokasi(Request $request)
    {
        $kolokasi = new Kolokasi();
        $kolokasi->korpus_id = $request->korpus;
        $kolokasi->kolokasi = $request->kolokasi;
        $kolokasi->save();

        return redirect()->back()->with("msg_success", "Berhasil menyimpan Kolokasi Baru");
    }

    public function editKolokasi($id)
    {
        $kolokasi = Kolokasi::find($id);

        return view("admin.edit_kolokasi")->with("kolokasi", $kolokasi)->with('korpus', Korpus::all());
    }

    public function updateKolokasi(Request $request)
    {
        $kolokasi = Kolokasi::find($request->id);
        $kolokasi->korpus_id = $request->korpus;
        $kolokasi->kolokasi = $request->kolokasi;
        $kolokasi->save();

        return redirect()->back()->with("msg_success", "Berhasil mengubah Kolokasi");
    }

    public function hapusKolokasi(Request $request)
    {
        Kolokasi::destroy($request->id);

        return redirect()->back()->with("msg_success", "Berhasil menghapus Kolokasi");
    }
}
