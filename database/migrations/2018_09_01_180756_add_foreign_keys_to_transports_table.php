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
			$table->foreign('order', 'FK_transport_order')->references('id')->on('orders')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
			$table->dropForeign('FK_transport_order');
		});
	}

}
