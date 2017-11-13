<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipTypeSinclairPeopleTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relationshipTypeSinclairPerson', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('sinclairPersonId')->unsigned();
			$table->foreign('sinclairPersonId')->references('id')->on('sinclairPerson');
			$table->integer('relationshipTypeId')->unsigned();
			$table->foreign('relationshipTypeId')->references('id')->on('relationshipType');


	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('relationshipTypeSinclairPerson');
    }
}
