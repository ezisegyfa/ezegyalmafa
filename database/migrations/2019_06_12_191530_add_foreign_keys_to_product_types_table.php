<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_types', function(Blueprint $table)
		{
			$table->foreign('category_id', 'product_type_product_category')->references('id')->on('product_categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_types', function(Blueprint $table)
		{
			$table->dropForeign('product_type_product_category');
		});
	}

}
