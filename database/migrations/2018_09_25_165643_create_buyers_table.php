<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuyersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buyers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('email')->nullable()->unique('buyer_email_unique');
			$table->string('phone_number', 10)->nullable();
			$table->text('adress', 65535)->nullable();
			$table->string('cnp', 13)->nullable()->unique('buyer_cnp_unique');
			$table->string('identity_seria_nr', 6)->nullable();
			$table->integer('settlement')->nullable()->index('buyer_settlement');
			$table->integer('identity_seria_type')->nullable()->index('buyer_seria');
			$table->integer('identity_card_type')->nullable()->index('buyer_identity_card_type');
			$table->integer('uploader')->nullable()->index('buyer_uploader');
			$table->integer('notification_type')->nullable()->index('buyer_notification_type');
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
		Schema::drop('buyers');
	}

}
