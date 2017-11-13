<?php

use Faker\Generator as Faker;

$factory->define(App\UserType::class, function (Faker $faker) {
	static $password;

	return [
		'name' => $faker->name,
		'description' => $faker->sentence,
	];
});
