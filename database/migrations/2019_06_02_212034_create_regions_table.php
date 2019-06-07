<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('regions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 191)->unique('region_name_unique');
			$table->string('code', 5)->unique('region_code_unique');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('regions');
	}

}
