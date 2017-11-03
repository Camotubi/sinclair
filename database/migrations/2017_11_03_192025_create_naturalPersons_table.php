<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNaturalPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naturalPerson', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('name');
      	    $table->text('lastname');
      	    $table->text('identification');
      	    $table->date('birthDate');
      	    $table->text('address');
      	    $table->text('phone');
      	    $table->string('email');
            $table->string('per_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('naturalPerson');
    }
}