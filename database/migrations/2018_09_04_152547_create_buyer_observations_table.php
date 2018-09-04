<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuyerObservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buyer_observations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('text', 65535);
			$table->integer('score');
			$table->integer('type')->index('buyer_observation_type');
			$table->integer('buyer')->index('buyer_observation_buyer');
			$table->integer('uploader')->index('buyer_observation_uploader');
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
		Schema::drop('buyer_observations');
	}

}
