<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
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
            'username' => "admin",
            'email' => "admin@korpus.com",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => "admin",
            'issued_by' => 0
        ]);

        // $user = ["pic_indonesia", "pic_inggris", "pic_arab", "pic_jerman", "pic_senibudaya"];

        // for ($i=0; $i < count($user); $i++) {
            DB::table('users')->insert([
                [
                    'name' => "Febri Taufiqurrahman , S.Hum., M.Hum.",
                    'username' => "korpus_ind",
                    'email' => "korpus_ind@korpus.com",
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => Str::random(10),
                    'role' => "pic",
                    'issued_by' => 1
                ],
                [
                    'name' => " Prof. Dr. Yazid Basthomi , M.A.",
                    'username' => "korpus_ing",
                    'email' => "korpus_ing@korpus.com",
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => Str::random(10),
                    'role' => "pic",
                    'issued_by' => 1
                ],
                [
                    'name' => "Dr. Yusuf Hanafi, M.Fil.I",
                    'username' => "korpus_arab",
                    'email' => "korpus_arab@korpus.com",
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => Str::random(10),
                    'role' => "pic",
                    'issued_by' => 1
                ],
                [
                    'name' => "Dr. Herri Akhmad Bukhori, M.A., M.Hum",
                    'username' => "korpus_jerman",
                    'email' => "korpus_jerman@korpus.com",
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => Str::random(10),
                    'role' => "pic",
                    'issued_by' => 1
                ],
                [
                    'name' => "Joko Samudro, S.Kom., M.Kom",
                    'username' => "korpus_senibudaya",
                    'email' => "korpus_senibudaya@korpus.com",
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => Str::random(10),
                    'role' => "pic",
                    'issued_by' => 1
                ],
            ]);
        // }

    }
}
