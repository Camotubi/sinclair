<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDonatorToFurnitureArtPieceTables extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('furniture', function (Blueprint $table) {
			$table->integer('donatorId')->unsigned()->nullable();
			$table->foreign('donatorId')->references('id')->on('legalEntity');
	    });
	    Schema::table('artPiece', function (Blueprint $table) {
		    $table->integer('donatorId')->unsigned()->nullable();
		    $table->foreign('donatorId')->references('id')->on('legalEntity');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('furniture', function (Blueprint $table) {

		    $table->dropForeign('furniture_donatorId_foreign');
		    $table->dropColumn('donatorId');
	    });
	    Schema::table('artPiece', function (Blueprint $table) {
		    $table->dropForeign('artPiece_donatorId_foreign');
		    $table->dropColumn('donatorId');
	    });
    }
}
