<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
	    $table->date('effectiveDate');
	    $table->date('terminationDate');
	    $table->decimal('moneyQuantity')->nullable();
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
        Schema::dropIfExists('rent');
    }
}
