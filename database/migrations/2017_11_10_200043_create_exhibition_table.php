<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExhibitionTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exhibition', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name')->nullable();
			$table->string('location')->nullable();
			$table->date('date')->nullable();
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('exhibition');
    }
}
