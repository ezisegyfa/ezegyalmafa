<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInputOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('input_orders', function(Blueprint $table)
		{
			$table->foreign('order_info_id', 'input_order_order_info')->references('id')->on('order_infos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('input_orders', function(Blueprint $table)
		{
			$table->dropForeign('input_order_order_info');
		});
	}

}
