<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinclairPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinclairPerson', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
	    $table->string('firstName');
	    $table->string('lastName');
	    $table->string('nin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinclairPerson');
    }
}
