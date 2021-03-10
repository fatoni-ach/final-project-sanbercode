<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profil;
use Faker\Generator as Faker;

$factory->define(Profil::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'tgl_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'), // '1979-06-09'
        // 'foto'  => $faker->text($maxNbChars = 20),
        'user_id'   => 1,
    ];
});
