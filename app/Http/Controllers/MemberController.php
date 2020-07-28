<?php

namespace App\Http\Controllers;

use App\Literatur;
use App\Korpus;
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
}
