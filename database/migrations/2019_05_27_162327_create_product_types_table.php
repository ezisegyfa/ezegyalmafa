<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_types', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 191);
			$table->integer('code')->nullable();
			$table->float('price', 10, 0)->nullable();
			$table->integer('category_id')->index('product_type_product_category');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_types');
	}

}
