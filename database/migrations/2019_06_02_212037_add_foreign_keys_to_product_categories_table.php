<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_categories', function(Blueprint $table)
		{
			$table->foreign('image_id', 'product_category_image')->references('id')->on('images')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_categories', function(Blueprint $table)
		{
			$table->dropForeign('product_category_image');
		});
	}

}
