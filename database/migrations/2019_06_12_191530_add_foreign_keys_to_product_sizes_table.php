<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductSizesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_sizes', function(Blueprint $table)
		{
			$table->foreign('order_id', 'product_size_order_info')->references('id')->on('order_infos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_sizes', function(Blueprint $table)
		{
			$table->dropForeign('product_size_order_info');
		});
	}

}
