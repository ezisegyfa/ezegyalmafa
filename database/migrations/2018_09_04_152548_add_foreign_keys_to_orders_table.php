<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			$table->foreign('buyer', 'order_buyer')->references('id')->on('buyers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('car', 'order_car')->references('id')->on('cars')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('driver', 'order_driver')->references('id')->on('drivers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_type', 'order_product_type')->references('id')->on('product_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('city', 'order_settlement')->references('id')->on('settlements')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('uploader', 'order_uploader')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			$table->dropForeign('order_buyer');
			$table->dropForeign('order_car');
			$table->dropForeign('order_driver');
			$table->dropForeign('order_product_type');
			$table->dropForeign('order_settlement');
			$table->dropForeign('order_uploader');
		});
	}

}
