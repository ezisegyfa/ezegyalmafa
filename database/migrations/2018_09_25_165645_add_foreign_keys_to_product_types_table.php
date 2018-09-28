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
			$table->foreign('material_type', 'product_type_material_type')->references('id')->on('material_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('process_type', 'product_type_process_type')->references('id')->on('process_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
			$table->dropForeign('product_type_material_type');
			$table->dropForeign('product_type_process_type');
		});
	}

}
