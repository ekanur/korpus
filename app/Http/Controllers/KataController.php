<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KataController extends Controller
{
    public function index()
    {
        $kata = Kategori::where()->get();
        return view()
    }
}
