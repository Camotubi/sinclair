<?php

use Faker\Generator as Faker;

$factory->define(App\ArtPiece::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
		'technique' => $faker->word,
		'currentLocation' =>$faker->address,
		'creationDate' => $faker->date,
		'criticalAnalisis' => $faker->paragraph,


	];
});
