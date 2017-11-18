<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalEntityArtPiecePossessionTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('legal_entity_art_piece_possession', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->date('possessionDate');
			$table->integer('artPieceId')->unsigned();
			$table->foreign('artPieceId')->references('id')->on('art_piece');
			$table->integer('legalEntityId')->unsigned();
			$table->foreign('legalEntityId')->references('id')->on('legal_entity');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('legal_entity_art_piece_possession');
    }
}
