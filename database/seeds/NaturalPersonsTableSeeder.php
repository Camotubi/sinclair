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
          'name' => str_random(10),
          'lastname' => str_random(10),
    'identification' => str_random(10),
    'address' =>str_random(10),
    'phone'=>str_random(10),
    'email' =>str_random(50),
    'per_type' =>str_random(10),
      ]);
        //
    }
}
