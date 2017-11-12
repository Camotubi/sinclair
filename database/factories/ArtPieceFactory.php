<?php

use Faker\Generator as Faker;

$factory->define(App\ArtPiece::class, function (Faker $faker) {
    return [
        'name' => $faker->name,

    ];
});
