<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_cars', function(Blueprint $table)
		{
			$table->foreign('car', 'driver_car_car')->references('id')->on('cars')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('driver', 'driver_car_driver')->references('id')->on('drivers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_cars', function(Blueprint $table)
		{
			$table->dropForeign('driver_car_car');
			$table->dropForeign('driver_car_driver');
		});
	}

}
