<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\place;
use Faker\Generator as Faker;

$factory->define(place::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->text,
        'url' => $faker->word,
        'celular' => $faker->word,
        'longitud' => $faker->word,
        'latitud' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
