<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTransportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('transports', function(Blueprint $table)
		{
			$table->foreign('stock', 'FK_250')->references('id')->on('stock_transports')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('car', 'transport_car')->references('id')->on('cars')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('driver', 'transport_driver')->references('id')->on('drivers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('order', 'transport_order')->references('id')->on('orders')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('uploader', 'transport_uploader')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('transports', function(Blueprint $table)
		{
			$table->dropForeign('FK_250');
			$table->dropForeign('transport_car');
			$table->dropForeign('transport_driver');
			$table->dropForeign('transport_order');
			$table->dropForeign('transport_uploader');
		});
	}

}
