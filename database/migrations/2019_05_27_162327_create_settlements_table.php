<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettlementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settlements', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 191);
			$table->integer('region_id')->index('settlement_region');
			$table->integer('post_code');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settlements');
	}

}
