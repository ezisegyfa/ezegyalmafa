<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTypeImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_type_images', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('image_id')->index('product_type_image_image');
			$table->integer('product_type_id')->index('product_type_image_product_type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_type_images');
	}

}
