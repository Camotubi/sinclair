<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalEntityArtPieceRestorationTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('legalEntityArtPieceRestoration', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();

			$table->date('restorationDate');
			$table->text('description')->nullable();
			$table->integer('artPieceId')->unsigned();
			$table->foreign('artPieceId')->references('id')->on('artPiece');
			$table->integer('legalEntityId')->unsigned();
			$table->foreign('legalEntityId')->references('id')->on('legalEntity');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('legalEntityArtPieceRestoration');
    }
}
