<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('license_plate_number', 20)->unique('car_unique');
			$table->integer('type')->index('car_type');
			$table->integer('uploader')->index('car_uploader');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cars');
	}

}
