<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtStyleArtPieceTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('art_style_art_piece', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('artPieceId')->unsigned()->nullable();
			$table->foreign('artPieceId')->references('id')->on('art_piece');
			$table->integer('artStyleId')->unsigned()->nullable();
			$table->foreign('artStyleId')->references('id')->on('art_style');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('art_style_art_piece');
    }
}
