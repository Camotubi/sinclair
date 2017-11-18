<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalEntityExhibitionTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('legal_entity_exhibition', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('legalEntityId')->unsigned();
			$table->foreign('legalEntityId')->references('id')->on('legal_entity');
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
	    Schema::dropIfExists('legal_entity_exhibition');
    }
}
