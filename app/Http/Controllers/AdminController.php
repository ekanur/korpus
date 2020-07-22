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
}
