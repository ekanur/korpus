<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kolokasi;
use App\KataDasar;
use App\Token;
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
    
    public function kata_dasar(){

        return view("admin.kata_dasar")->with('kata_dasar', KataDasar::all())->with('korpus', Korpus::all());
    }
    
    public function token(){

        return view("admin.token")->with('token', Token::all())->with('korpus', Korpus::all());
    }
}
