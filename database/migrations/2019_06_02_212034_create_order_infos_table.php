<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderInfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_infos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('quantity');
			$table->text('description', 65535)->nullable();
			$table->float('sell_price', 10, 0);
			$table->integer('product_type_id')->index('order_info_product_type');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_infos');
	}

}
