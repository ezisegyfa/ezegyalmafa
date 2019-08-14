<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductTypeBrandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_type_brands', function(Blueprint $table)
		{
			$table->foreign('brand_id', 'product_type_brand_brand')->references('id')->on('brands')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_type_id', 'product_type_brand_product_type')->references('id')->on('product_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_type_brands', function(Blueprint $table)
		{
			$table->dropForeign('product_type_brand_brand');
			$table->dropForeign('product_type_brand_product_type');
		});
	}

}
