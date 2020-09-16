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
// Route::get('literatur', "KorpusController@literatur");
Route::get('literatur/{id}', "KorpusController@viewLiteratur");
Route::get('literatur/{id}/{kata}', "KorpusController@konkordansi");

Route::get('cari', "KorpusController@cari");

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
    Route::post('/reset_user', "AdminController@resetUser");


    Route::get("/kata_dasar", "AdminController@kataDasar");
    Route::get("/kata_dasar/{id}", "AdminController@editKataDasar");
    Route::post("/update_kata_dasar", "AdminController@updateKataDasar");
    Route::post("/kata_dasar", "AdminController@simpanKataDasar");
    Route::post("/hapus_kataDasar", "AdminController@hapusKataDasar");

    Route::get("/token", "AdminController@token");
    Route::get("/token/{id}", "AdminController@editToken");
    Route::post("/token", "AdminController@simpanToken");
    Route::post("/update_token", "AdminController@updateToken");
    Route::post("/hapus_token", "AdminController@hapusToken");

    Route::get('/analisa_korpus/{id}', "AdminController@analisaKorpus");
    Route::get('/report_korpus/{id}', "AdminController@reportKorpus");

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix("member")->middleware("member")->group(function(){
    Route::get("", "MemberController@index")->name("member");
    Route::get("literatur", "MemberController@literatur");
    Route::post("literatur", "MemberController@simpanLiteratur");
    Route::get("literatur/{id}", "MemberController@editLiteratur");
    Route::post('update_literatur', "MemberController@updateLiteratur");
    Route::get("analisa_literatur/{id}", "MemberController@analisaLiteratur");
});

Route::prefix("pic")->middleware("pic")->group(function(){
    Route::get("", "PICController@index")->name("pic");
    Route::get("member", "PICController@member");
    Route::post('member', "PICController@simpanMember");
    Route::post('update_member', "PICController@updateMember");
    Route::post('reset_password_member', "PICController@resetMember");
    Route::get("member/{id}", "PICController@editMember");
    Route::post('kategori', "PICController@simpanKategori");
    Route::get("kategori/{id}", "PICController@editKategori");
    Route::get("literatur", "PICController@literatur");
    Route::get("literatur/{id}", "PICController@analisaLiteratur");
    Route::get("report_literatur/{id}", "PICController@reportLiteratur");
    Route::get("report_literatur/{id}/{kata}", "PICController@konkordansi");
});
