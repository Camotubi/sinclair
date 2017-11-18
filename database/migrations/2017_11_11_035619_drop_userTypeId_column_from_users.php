<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropUserTypeIdColumnFromUsers extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::table('users', function(Blueprint $table)
		{
			$table->dropForeign('users_userTypeId_foreign');
			$table->dropColumn('userTypeId');

	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    //
	    Schema::table('users', function (Blueprint $table) {
		    $table->integer('userTypeId')->unsigned();
		    $table->foreign('userTypeId')->references('id')->on('user_type');
	});
    }
}
