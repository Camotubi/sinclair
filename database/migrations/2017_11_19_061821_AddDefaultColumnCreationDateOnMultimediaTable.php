<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultColumnCreationDateOnMultimediaTable extends Migration
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
			$table->date('creationDate')->default(DB::raw('CURRENT_DATE'))->change();
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
