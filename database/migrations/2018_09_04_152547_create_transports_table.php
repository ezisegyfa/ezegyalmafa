<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transports', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('quantity');
			$table->timestamps();
			$table->integer('order')->index('transport_order');
			$table->integer('uploader')->index('transport_uploader');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transports');
	}

}
