<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class korpus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $korpus = ["Indonesia", "Inggris", "Jerman", "Arab", "Seni Desain"];
        for($i=0; $i<=count($korpus); $i++){
            DB::table('korpus')->insert([
                'jenis' => $korpus[$i],
                'jumlah_literatur' => rand(200),
                'jumlah_kata' => rand(3000),
                'kata_dasar' => rand(2000),
                'token' => rand(1000),
                'user_id' => ($i+1)
            ]);
        }

    }
}
