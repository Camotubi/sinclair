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
        Schema::create('legalEntityArtPiecePossession', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
	    $table->date('possessionDate');
	    $table->integer('artPieceId')->unsigned();
	    $table->foreign('artPieceId')->reference('id')->on('artPiece');
	    $table->integer('legalEntityId')->unsigned();
	    $table->foreign('legalEntityId')->reference('id')->on('legalEntity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legalEntityArtPiecePossession');
    }
}
