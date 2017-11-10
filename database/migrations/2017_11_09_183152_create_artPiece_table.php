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
	    $table->string('name');
	    $table->string('technique')->nullable();
	    $table->string('currentLocation')->nullable();
	    $table->date('creationDate')->nullable();
	    $table->text('criticalAnalisis')->nullable();
	    $table->integer('quantityOfTraffic')->default(0);
	    $table->boolean('generatePublication');
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
