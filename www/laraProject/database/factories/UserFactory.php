<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->text($maxNbChars = 15),
        'password' => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
        'nome'     => $faker->firstName,
        'cognome'  => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'data_nascita' => $faker->date($format = 'y-m-d', $max = 'now'),
        'c_fiscale' => "codice",
        'numero' => "1234567890",
        'prefisso' => "39",
        'tipo' => $faker->randomElement(['locatore','locatario']),
        'remember_token' => Str::random(10),
    ];
});
