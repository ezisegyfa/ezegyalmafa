<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductTypeSpecialitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_type_specialities', function(Blueprint $table)
		{
			$table->foreign('product_speciality_id', 'product_type_speciality_product_speciality')->references('id')->on('product_specialities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_type_id', 'product_type_speciality_product_type')->references('id')->on('product_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_type_specialities', function(Blueprint $table)
		{
			$table->dropForeign('product_type_speciality_product_speciality');
			$table->dropForeign('product_type_speciality_product_type');
		});
	}

}
