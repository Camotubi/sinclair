<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultimediaTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('multimedia', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->boolean('sinclairMemorability');
			$table->date('creationDate');
			$table->text('description')->nullable();
			$table->text('fileLocation');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('multimedia');
    }
}
