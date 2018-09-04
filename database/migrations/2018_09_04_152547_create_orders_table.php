<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('quantity');
			$table->integer('buyer')->index('order_buyer');
			$table->timestamps();
			$table->integer('product_type')->index('order_product_type');
			$table->integer('uploader')->index('order_uploader');
			$table->integer('city')->index('order_settlement');
			$table->integer('price');
			$table->integer('car')->index('order_car');
			$table->integer('driver')->index('order_driver');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
