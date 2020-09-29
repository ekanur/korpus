<?php

namespace App\Providers;

use App\Kategori;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(["template.header", "template.filter"], function($view){
            $view->with('kategori_literatur', Kategori::whereKorpusId(Session::get("korpus_id"))->get());
        });

    }
}
