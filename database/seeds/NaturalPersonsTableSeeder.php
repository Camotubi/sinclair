<?php

use Illuminate\Database\Seeder;

class NaturalPersonsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('naturalPersons')->insert([
			'name' => str_random(50),
	  'lastname' => str_random(50),
    'identification' => str_random(50),
    'birthDate' => '2009-01-01',
    'address' =>str_random(100),
    'phone'=>str_random(50),
    'email' =>str_random(191),
    'per_type' =>str_random(191),
      ]);
		//
    }
}
