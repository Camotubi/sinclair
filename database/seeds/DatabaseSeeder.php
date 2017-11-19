<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
/*		DB::table('artPieces')->insert([
			'name' => str_random(50),
	  'technique' => str_random(50),
    'style' => str_random(50),
    'currentLocation' =>str_random(50),
    'era'=>str_random(50),
    'criticalAnalisis' =>str_random(250),
      ]);

		DB::table('juridicalPersons')->insert([
			'name' => str_random(50),
	  'address' => str_random(100),
    'phone' => str_random(50),
    'email' =>str_random(191),
      ]);

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
 */
		if(is_null(DB::table('multimediaType')->where('name','Image')->first()))
			DB::table('multimediaType')->insert(['name' => 'Image']);
		if(is_null(DB::table('multimediaType')->where('name','Document')->first()))
			DB::table('multimediaType')->insert(['name' => 'Document']);
		if(is_null(DB::table('multimediaType')->where('name','Audio')->first()))
			DB::table('multimediaType')->insert(['name' => 'Audio']);
		if(is_null(DB::table('multimediaType')->where('name','Video')->first()))
			DB::table('multimediaType')->insert(['name' => 'Video']);
	}

}
