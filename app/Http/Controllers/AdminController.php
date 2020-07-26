<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kolokasi;
use Illuminate\Http\Request;
use App\Korpus;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index")->with('korpus', Korpus::all()->sortBy('urutan'));
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

    public function korpus($id)
    {
        return view("admin.korpus")->with('korpus', Korpus::find($id));
    }

    public function editKorpus(Request $request)
    {
        $korpus = Korpus::find($request->id);
        $korpus->jenis = $request->korpus;
        $korpus->save();

        return redirect()->back()->with("msg_success", "Berhasil memperbarui Korpus");
    }

    public function user()
    {
        return view("admin.user")->with('pic', User::whereRole("pic")->get());
    }

    public function editUser($id)
    {
        return view("admin.edit_user")->with('pic', User::whereRole('pic')->findOrFail($id))->with('korpus', Korpus::all());
    }

    public function updateUser(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if(!$user->save()){
            return redirect()->back()->with('msg_error', "Kesalahan saat menyimpan PIC");
        }
        if(null != $request->korpus_lama){
            $korpus = Korpus::find($request->korpus_lama);
            $korpus->user_id = 1;

            if(!$korpus->save()){
                return redirect()->back()->with('msg_error', "Kesalahan saat mengubah PJ");
            }
        }


        $korpus = Korpus::find($request->korpus);
        $korpus->user_id = $request->id;
        if(!$korpus->save()){
            return redirect()->back()->with('msg_error', "Kesalahan saat memperbarui PJ");
        }

        return redirect()->back()->with('msg_success', "Berhasil memperbarui PIC");
    }
}
