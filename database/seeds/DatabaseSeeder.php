<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(User::class); //admin & pic
        // $this->call(korpus::class);
        factory(App\Korpus::class, 5)->create()->each(function($korpus){
            $korpus->kategori()->saveMany(factory(App\Kategori::class, 2)->make());
            $korpus->kataDasar()->saveMany(factory(App\KataDasar::class, 8)->make());
            $korpus->kolokasi()->saveMany(factory(App\Kolokasi::class, 8)->make());
            $korpus->token()->saveMany(factory(App\Token::class, 8)->make());
            $korpus->pencarian()->saveMany(factory(App\Pencarian::class, 25)->make());
        });



        factory(App\User::class, 10)->create(); //mahasiswa


    }
}
