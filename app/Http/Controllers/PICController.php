<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PICController extends Controller
{
    public function index()
    {
        return view("pic.index");
    }
}
