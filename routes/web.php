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
    Route::post('/kolokasi', "AdminController@simpanKolokasi");
    Route::get("/kolokasi/{id}", "AdminController@editKolokasi");
    Route::post("/update_kolokasi", "AdminController@updateKolokasi");
    Route::post("/hapus_kolokasi", "AdminController@hapusKolokasi");
    Route::get('/user', "AdminController@user");
    Route::get('/user/{id}', "AdminController@editUser");
    Route::get('/korpus/{id}', "AdminController@korpus");
    Route::post('/korpus', "AdminController@editKorpus");
    Route::post('/edit_user', "AdminController@updateUser");
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix("member")->middleware("member")->group(function(){
    Route::get("", "MemberController@index")->name("member");
    Route::get("literatur", "MemberController@literatur");
    Route::post("literatur", "MemberController@simpanLiteratur");
});

Route::prefix("pic")->middleware("pic")->group(function(){
    Route::get("", "PICController@index")->name("pic");
});
