<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_cars', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('driver')->index('driver_car_driver');
			$table->integer('car')->index('driver_car_car');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_cars');
	}

}
