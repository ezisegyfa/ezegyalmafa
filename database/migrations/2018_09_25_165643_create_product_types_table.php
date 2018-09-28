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
			$table->string('image');
			$table->integer('material_type')->index('product_type_material_type');
			$table->integer('process_type')->index('product_type_process_type');
			$table->integer('average_price');
			$table->text('description', 65535)->nullable();
			$table->unique(['material_type','process_type'], 'product_type_unique');
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
