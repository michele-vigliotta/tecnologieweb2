<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FAQ;
use Faker\Generator as Faker;

$factory->define(FAQ::class, function (Faker $faker) {
    return [
        'domanda' => $faker->text($maxNbChars = 50),
        'risposta' => $faker->text($maxNbChars = 100),
    ];
});
