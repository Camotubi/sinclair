<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtPieceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artPiece', function (Blueprint $table) {
            $table->increments('id');
	    $table->timestamps();
	    $table->text('name');
	    $table->text('currentLocation');
	    $table->text('style');
	    $table->text('era');
	    $table->text('technique');
	    $table->text('criticalAnalisis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artPiece');
    }
}
