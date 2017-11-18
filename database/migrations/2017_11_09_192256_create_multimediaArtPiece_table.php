<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultimediaArtPieceTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('multimedia_art_piece', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('multimediaId')->unsigned()->nullable();
			$table->foreign('multimediaId')->references('id')->on('multimedia');
			$table->integer('artPieceId')->unsigned()->nullable();
			$table->foreign('artPieceId')->references('id')->on('art_piece');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('multimedia_art_piece');
    }
}
