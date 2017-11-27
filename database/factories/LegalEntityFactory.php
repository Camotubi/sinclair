<?php

use Faker\Generator as Faker;

$factory->define(App\LegalEntity::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
		'email' => $faker->email,
		'phone' =>$faker->phoneNumber,
		'address' => $faker->address,
		'ruc' => $faker->randomNumber,
		'identificationNumber' => $faker->randomNumber,


	];
});
