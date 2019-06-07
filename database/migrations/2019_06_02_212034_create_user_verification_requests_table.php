<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserVerificationRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_verification_requests', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('verification_request_id')->index('user_verification_verification');
			$table->integer('user_id')->index('user_verification_user');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_verification_requests');
	}

}
