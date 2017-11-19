<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSinclairMemorabilityOnMultimediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{

		Schema::table('multimedia', function(Blueprint $table)
		{
			$table->boolean('sinclairMemorability')->default(false)->change();
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
    }
}
