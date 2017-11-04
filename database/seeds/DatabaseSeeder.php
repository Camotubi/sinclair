<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
	      DB::table('artPieces')->insert([
            'name' => str_random(10),
            'technique' => str_random(10),
	    'style' => str_random(10),
	    'currentLocation' =>str_random(10),
	    'era'=>str_random(10),
	    'criticalAnalisis' =>str_random(50),
        ]);

        DB::table('juridicalPersons')->insert([
            'name' => str_random(10),
            'address' => str_random(10),
	    'phone' => str_random(10),
	    'email' =>str_random(10),
        ]);

        DB::table('naturalPersons')->insert([
            'name' => str_random(10),
            'lastname' => str_random(10),
	    'identification' => str_random(10),
	    'address' =>str_random(10),
	    'phone'=>str_random(10),
	    'email' =>str_random(50),
      'per_type' =>str_random(10),
        ]);
}

}
