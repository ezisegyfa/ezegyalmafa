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
			$table->foreign('buyer', 'FK_order_buyer')->references('id')->on('buyers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_type', 'FK_order_product_type')->references('id')->on('product_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
			$table->dropForeign('FK_order_buyer');
			$table->dropForeign('FK_order_product_type');
		});
	}

}
