<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersUserTypeTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_user_type', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('userId')->unsigned();
			$table->foreign('userId')->references('id')->on('users');
			$table->integer('userTypeId')->unsigned();
			$table->foreign('userTypeId')->references('id')->on('user_type');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('users_user_type');
    }
}
