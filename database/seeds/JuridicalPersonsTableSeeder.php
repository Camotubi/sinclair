<?php

use Illuminate\Database\Seeder;

class JuridicalPersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('juridicalPersons')->insert([
          'name' => str_random(10),
          'address' => str_random(10),
    'phone' => str_random(10),
    'email' =>str_random(10),
      ]);
        //
    }
}
