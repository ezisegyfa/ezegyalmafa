<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTypePropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_type_properties', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 191);
			$table->integer('product_type_id')->index('product_type_property_product_type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_type_properties');
	}

}
