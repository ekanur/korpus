<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "KorpusController@index");
Route::get('/korpus/{korpus_id}', "KorpusController@setKorpus");
Route::get('pilih_korpus', "KorpusController@pilihKorpus");

Route::get('dashboard', "KorpusController@dashboard");
Route::get('kata', "KorpusController@kata");
Route::get('kolokasi', "KorpusController@kolokasi");
Route::get('literatur', "KorpusController@literatur");

Route::get('cari/{keyword}', "KorpusController@cari");

Route::get("tes", "ReadDocController@index");
Route::post('upload', "ReadDocController@upload");

Route::prefix("admin")->middleware("admin")->group(function(){
    Route::get("/", "AdminController@index")->name("admin");
    Route::get("/kolokasi", "AdminController@kolokasi");
    Route::get("/kata_dasar", "AdminController@kata_dasar");
    Route::post("/kata_dasar", "AdminController@kata_dasar_save");
    Route::get("/token", "AdminController@token");
});

Route::get("login", function(){
    return view("login");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix("member")->middleware("member")->group(function(){
    Route::get("", "MemberController@index")->name("member");
    Route::get("literatur", "LiteraturController@index");
    Route::post("literatur", "LiteraturController@save");
});

Route::prefix("pic")->middleware("pic")->group(function(){
    Route::get("", "PICController@index")->name("pic");
});
