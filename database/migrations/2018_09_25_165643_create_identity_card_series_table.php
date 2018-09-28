<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIdentityCardSeriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('identity_card_series', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 10)->unique('identity_card_serie_unique');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('identity_card_series');
	}

}
