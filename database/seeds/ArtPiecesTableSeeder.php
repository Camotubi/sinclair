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
            'name' => str_random(10),
            'technique' => str_random(10),
	    'style' => str_random(10),
	    'currentLocation' =>str_random(10),
	    'era'=>str_random(10),
	    'criticalAnalisis' =>str_random(50),
        ]);
        //
    
    }
}
