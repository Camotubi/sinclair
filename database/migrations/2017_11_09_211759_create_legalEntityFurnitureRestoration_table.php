<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalEntityFurnitureRestorationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legalEntityFurnitureRestoration', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
	    $table->date('restorationDate');
	    $table->text('description')->nullable();
	    $table->integer('furnitureId')->unsigned();
	    $table->foreign('furnitureId')->references('id')->on('furniture');
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
        Schema::dropIfExists('legalEntityFurnitureRestoration');
    }
}
