<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductTypeImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_type_images', function(Blueprint $table)
		{
			$table->foreign('image_id', 'product_type_image_image')->references('id')->on('images')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_type_id', 'product_type_image_product_type')->references('id')->on('product_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_type_images', function(Blueprint $table)
		{
			$table->dropForeign('product_type_image_image');
			$table->dropForeign('product_type_image_product_type');
		});
	}

}
