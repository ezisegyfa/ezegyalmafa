<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStockTransportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stock_transports', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('quantity');
			$table->integer('product_type')->index('fkIdx_241');
			$table->integer('average_price');
			$table->timestamps();
			$table->integer('uploader')->index('fkIdx_247');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stock_transports');
	}

}
