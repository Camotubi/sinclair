<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagPublicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagPublication', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
	    $table->integer('publicationId')->unsigned();
	    $table->foreign('publicationId')->references('id')->on('publication');
	    $table->integer('tagId')->unsigned();
	    $table->foreign('tagId')->references('id')->on('tag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagPublication');
    }
}
