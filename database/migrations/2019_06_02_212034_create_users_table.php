<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('first_name', 191);
			$table->string('last_name', 191);
			$table->string('email', 191)->unique('buyer_email_unique');
			$table->boolean('verified')->default(false)->nullable();
			$table->string('password', 191);
			$table->string('phone_number', 10)->nullable();
			$table->text('address', 65535)->nullable();
			$table->integer('location_id')->nullable()->index('buyer_location');
			$table->integer('identity_card_serial_type_id')->nullable()->index('fkIdx_486');
			$table->string('identity_card_serial_number', 6)->nullable();
			$table->boolean('accepted_gdpr')->nullable();
			$table->boolean('isAnonymized')->default(0);
			$table->string('remember_token', 100)->nullable();
			$table->dateTime('last_activity')->nullable();
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
		Schema::drop('users');
	}

}
