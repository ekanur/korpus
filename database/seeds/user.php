<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin@korpus.com",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'issued_by' => 0
        ]);

        // $user = ["pic_indonesia", "pic_inggris", "pic_arab", "pic_jerman", "pic_senibudaya"];

        // for ($i=0; $i < count($user); $i++) {
            DB::table('users')->insert([
                [
                    'name' => "korpus_ind",
                    'email' => "korpus_ind@korpus.com",
                    'email_verified_at' => now(),
                    'password' => Hash::make('pass_ind'),
                    'remember_token' => Str::random(10),
                    'issued_by' => 1
                ],
                [
                    'name' => "korpus_ing",
                    'email' => "korpus_ing@korpus.com",
                    'email_verified_at' => now(),
                    'password' => Hash::make('pass_ing'),
                    'remember_token' => Str::random(10),
                    'issued_by' => 1
                ],
                [
                    'name' => "korpus_arab",
                    'email' => "korpus_arab@korpus.com",
                    'email_verified_at' => now(),
                    'password' => Hash::make('pass_arab'),
                    'remember_token' => Str::random(10),
                    'issued_by' => 1
                ],
                [
                    'name' => "korpus_jerman",
                    'email' => "korpus_jerman@korpus.com",
                    'email_verified_at' => now(),
                    'password' => Hash::make('pass_arab'),
                    'remember_token' => Str::random(10),
                    'issued_by' => 1
                ],
                [
                    'name' => "korpus_senibudaya",
                    'email' => "korpus_senibudaya@korpus.com",
                    'email_verified_at' => now(),
                    'password' => Hash::make('pass_senibudaya'),
                    'remember_token' => Str::random(10),
                    'issued_by' => 1
                ],
            ]);
        // }

    }
}
