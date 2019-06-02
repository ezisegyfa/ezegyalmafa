<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInvestmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('investments', function(Blueprint $table)
		{
			$table->foreign('owner_id', 'FK_512')->references('id')->on('admins')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('investments', function(Blueprint $table)
		{
			$table->dropForeign('FK_512');
		});
	}

}
