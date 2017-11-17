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
		Schema::create('legalEntityExhibition', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('legalEntityId')->unsigned();
			$table->foreign('legalEntityId')->references('id')->on('legalEntity');
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
	    Schema::dropIfExists('legalEntityExhibition');
    }
}
