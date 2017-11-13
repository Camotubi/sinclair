<?php

use Illuminate\Database\Seeder;

class ArtPiecesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	public function run()
	{
		DB::table('artPieces')->insert([
			'name' => str_random(50),
	    'technique' => str_random(50),
	    'style' => str_random(50),
	    'currentLocation' =>str_random(50),
	    'era'=>str_random(50),
	    'criticalAnalisis' =>str_random(250),
	]);
		//

    }
}
