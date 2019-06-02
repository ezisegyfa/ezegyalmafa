<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTypeBrandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_type_brands', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('product_type_id')->index('product_type_brand_product_type');
			$table->integer('brand_id')->index('product_type_brand_brand');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_type_brands');
	}

}
