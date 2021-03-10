<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post_film;
use Faker\Generator as Faker;

$factory->define(Post_film::class, function (Faker $faker) {
    return [
        'judul'     => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'sinopsis'  => $faker->text($maxNbChars = 100)  ,
        'foto'      => $faker->text($maxNbChars = 40),
        'tahun'    => $faker->year($max = 'now'),
        'profil_id' => 1,
    ];
});
