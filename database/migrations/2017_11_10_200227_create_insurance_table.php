<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
	    $table->string('name');
	    $table->date('effectiveDate');
	    $table->date('terminationDate');
	    $table->decimal('cost',8,2);
	    $table->text('description')->nullable();
	    $table->integer('artPieceId')->unsigned();
	    $table->foreign('artPieceId')->references('id')->on('artPiece');
	    $table->integer('insuranceCarrierId')->unsigned();
	    $table->foreign('insuranceCarrierId')->references('id')->on('insuranceCarrier');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance');
    }
}
