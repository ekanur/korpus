<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'role' => "member",                    
        'issued_by' => $faker->numberBetween(2, 6)
    ];
});

$factory->define(App\Korpus::class, function(Faker $faker){
    return [
        'jenis' => $faker->unique()->randomElement($array = array("Indonesia", "Inggris", "Jerman", "Arab", "Seni Desain")),
        'jumlah_literatur' => $faker->numberBetween(5, 100),
        'jumlah_kata' => $faker->numberBetween(1, 3000),
        'kata_dasar' => $faker->numberBetween(1, 1800),
        'token' => $faker->numberBetween(1, 1200),
        'user_id' => $faker->unique()->numberBetween(2,6)
    ];
});

$factory->define(App\Kategori::class, function(Faker $faker){
    return [
        "kategori" => $faker->word,
        "parent_id" => $faker->numberBetween(0,3)
    ];
});

$factory->define(App\KataDasar::class, function(Faker $faker){
    return [
        "kata_dasar" => $faker->word,
        "frekuensi_kata" => $faker->numberBetween(5, 100),
        "frekuensi_kata_persen" => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10),
        "frekuensi_dokumen" => $faker->numberBetween(5, 100),
        "frekuensi_dokumen_persen" => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10),
    ];
});

$factory->define(App\Kolokasi::class, function(Faker $faker){
    return [
        "kolokasi" => $faker->word,
        "frekuensi_kata" => $faker->numberBetween(5, 100),
        "frekuensi_kata_persen" => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10),
        "frekuensi_dokumen" => $faker->numberBetween(5, 100),
        "frekuensi_dokumen_persen" => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10),
    ];
});

$factory->define(App\Token::class, function(Faker $faker){
    return [
        "token" => $faker->word,
        "frekuensi_token" => $faker->numberBetween(5, 100),
        "frekuensi_token_persen" => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10),
        "frekuensi_dokumen" => $faker->numberBetween(5, 100),
        "frekuensi_dokumen_persen" => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10),
    ];
});

$factory->define(App\Pencarian::class, function(Faker $faker){
    return [
        "keyword" => $faker->word,
        "total" => $faker->numberBetween(1, 100),
    ];
});


// $factory->define(Literatur::class, function(Faker $faker){
//     return [

//     ];
// });
