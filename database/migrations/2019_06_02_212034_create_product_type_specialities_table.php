<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTypeSpecialitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_type_specialities', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('product_type_id')->index('product_type_speciality_product_type');
			$table->integer('product_speciality_id')->index('product_type_speciality_product_speciality');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_type_specialities');
	}

}
