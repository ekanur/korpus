<?php

namespace App\Http\Controllers;

use App\Literatur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        return view("member.index")->with('literatur', Literatur::where('uploaded_by', Auth::user()->id)->get());
    }
}
