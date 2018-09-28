<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStockTransportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('stock_transports', function(Blueprint $table)
		{
			$table->foreign('product_type', 'FK_241')->references('id')->on('product_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('uploader', 'FK_247')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('stock_transports', function(Blueprint $table)
		{
			$table->dropForeign('FK_241');
			$table->dropForeign('FK_247');
		});
	}

}
