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
		Schema::create('artPieceExhibition', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('artPieceId')->unsigned();
			$table->foreign('artPieceId')->references('id')->on('artPiece');
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
	    Schema::dropIfExists('artPieceExhibition');
    }
}
