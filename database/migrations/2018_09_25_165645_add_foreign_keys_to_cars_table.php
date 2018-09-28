<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cars', function(Blueprint $table)
		{
			$table->foreign('type', 'car_type')->references('id')->on('car_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('uploader', 'car_uploader')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cars', function(Blueprint $table)
		{
			$table->dropForeign('car_type');
			$table->dropForeign('car_uploader');
		});
	}

}
