<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultimediaTableForeignKeyConstraintMultimediaType extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('multimedia', function (Blueprint $table) {
			$table->integer('multimediaTypeId')->unsigned();
			$table->foreign('multimediaTypeId')->references('id')->on('multimedia_type');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

	    Schema::table('multimedia', function (Blueprint $table) {
		    $table->dropForeign('multimedia_multimediaTypeId_foreign');
		    $table->dropColumn('multimediaTypeId');
	});
    }
}
