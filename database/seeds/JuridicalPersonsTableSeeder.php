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
          'name' => str_random(50),
          'address' => str_random(100),
    'phone' => str_random(50),
    'email' =>str_random(191),
      ]);
        //
    }
}
