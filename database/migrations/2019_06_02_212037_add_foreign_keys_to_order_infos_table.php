<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOrderInfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('order_infos', function(Blueprint $table)
		{
			$table->foreign('product_type_id', 'order_info_product_type')->references('id')->on('product_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('order_infos', function(Blueprint $table)
		{
			$table->dropForeign('order_info_product_type');
		});
	}

}
