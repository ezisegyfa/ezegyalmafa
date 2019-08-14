<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutputOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('output_orders', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('order_info_id')->unique('output_order_order_info_unique');
			$table->integer('buyer_id')->index('output_order_buyer');
			$table->integer('location_id')->index('output_order_location');
			$table->string('address', 191);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('output_orders');
	}

}
