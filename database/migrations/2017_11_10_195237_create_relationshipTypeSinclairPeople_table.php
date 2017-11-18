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
		Schema::create('relationship_type_sinclair_person', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('sinclairPersonId')->unsigned();
			$table->foreign('sinclairPersonId')->references('id')->on('sinclair_person');
			$table->integer('relationshipTypeId')->unsigned();
			$table->foreign('relationshipTypeId')->references('id')->on('relationship_type');


	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('relationship_type_sinclair_person');
    }
}
