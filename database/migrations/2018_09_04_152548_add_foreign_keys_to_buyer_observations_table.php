<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBuyerObservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('buyer_observations', function(Blueprint $table)
		{
			$table->foreign('buyer', 'buyer_observation_buyer')->references('id')->on('buyers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('type', 'buyer_observation_type')->references('id')->on('observation_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('uploader', 'buyer_observation_uploader')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('buyer_observations', function(Blueprint $table)
		{
			$table->dropForeign('buyer_observation_buyer');
			$table->dropForeign('buyer_observation_type');
			$table->dropForeign('buyer_observation_uploader');
		});
	}

}
