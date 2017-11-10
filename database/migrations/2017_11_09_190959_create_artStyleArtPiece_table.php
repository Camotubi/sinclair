<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtStyleArtPieceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artStyleArtPiece', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
	    $table->integer('artPieceId')->unsigned()->nullable();
	    $table->foreign('artPieceId')->reference('id')->on('artPiece');
	    $table->integer('artStyleId')->unsigned()->nullable();
	    $table->foreign('artStyleId')->reference('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artStyleArtPiece');
    }
}
