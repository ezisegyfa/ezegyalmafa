<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserVerificationRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_verification_requests', function(Blueprint $table)
		{
			$table->foreign('user_id', 'user_verification_user')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('verification_request_id', 'user_verification_verification')->references('id')->on('verification_requests')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_verification_requests', function(Blueprint $table)
		{
			$table->dropForeign('user_verification_user');
			$table->dropForeign('user_verification_verification');
		});
	}

}
