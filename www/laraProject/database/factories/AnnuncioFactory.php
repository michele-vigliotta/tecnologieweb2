<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\annuncio;
use App\User;
use Faker\Generator as Faker;

$factory->define(annuncio::class, function (Faker $faker) {
    return [
        "descrizione"=>$faker->text,
        "id_locatore"=> User::all()->random()->id,
        "stato"=>$faker->country,
        "citta"=>$faker->city,
        "CAP"=>$faker->postcode,
        "indirizzo"=>$faker->text($maxNbChars = 30),
        "inizio_locazione"=>$faker->date($format = 'y-m-d', $min = 'now'),
        "fine_locazione"=>$faker->date($format = 'y-m-d', $min = 'now'),
        "genere_locatario"=>$faker->randomElement(['maschio', 'femmina']),
        "canone_affitto"=>$faker->randomNumber,
        "servizi_offerti"=>json_encode([
          '1'=>$faker->randomDigit,
          '2'=>$faker->randomDigit,
          '3'=>$faker->randomDigit
        ]),
        "tipo"=>$faker->randomElement(['camera','appartamento']),
        "numero_camere"=>$faker->randomDigit,
        "posti_letto_totali"=>$faker->randomDigit,
    ];
});
