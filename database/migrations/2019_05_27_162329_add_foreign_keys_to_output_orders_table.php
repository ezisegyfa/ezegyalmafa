<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOutputOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('output_orders', function(Blueprint $table)
		{
			$table->foreign('buyer_id', 'output_order_buyer')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('location_id', 'output_order_location')->references('id')->on('settlements')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('order_info_id', 'output_order_order_info')->references('id')->on('order_infos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('output_orders', function(Blueprint $table)
		{
			$table->dropForeign('output_order_buyer');
			$table->dropForeign('output_order_location');
			$table->dropForeign('output_order_order_info');
		});
	}

}
