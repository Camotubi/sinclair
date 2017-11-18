<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtPieceExhibitionTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('art_piece_exhibition', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('artPieceId')->unsigned();
			$table->foreign('artPieceId')->references('id')->on('art_piece');
			$table->integer('exhibitionId')->unsigned();
			$table->foreign('exhibitionId')->references('id')->on('exhibition');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('art_piece_exhibition');
    }
}
