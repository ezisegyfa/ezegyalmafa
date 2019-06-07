<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvestmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('investments', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('owner_id')->index('fkIdx_512');
			$table->float('value', 10, 0);
			$table->string('description', 191);
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
		Schema::drop('investments');
	}

}
