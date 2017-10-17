<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestorationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restorations', function (Blueprint $table) {
            $table->increments('id');
	    $table->timestamps();
	    $table->date('restored_at');
	    $table->text('description');
	    $table->integer('restorer');
	    $table->integer('artPieceId')->unsigned();
	    $table->foreign('artPieceId')->references('id')->on('artPiece');	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restorations');
    }
}
