<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSettlementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('settlements', function(Blueprint $table)
		{
			$table->foreign('region', 'settlement_region')->references('id')->on('regions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('settlements', function(Blueprint $table)
		{
			$table->dropForeign('settlement_region');
		});
	}

}
