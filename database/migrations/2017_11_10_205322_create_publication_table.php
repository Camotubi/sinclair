<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publication', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('body');
			$table->text('title');
			$table->integer('userId')->unsigned();
			$table->foreign('userId')->references('id')->on('users');


	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('publication');
    }
}
