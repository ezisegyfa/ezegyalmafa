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
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email')->nullable()->unique();
			$table->string('phone_number', 15);
			$table->text('adress', 65535);
			$table->string('cnp', 10)->unique();
			$table->string('seria_nr', 10);
			$table->integer('city')->index('FK_buyer_city');
			$table->integer('seria')->index('FK_buyer_seria');
			$table->integer('identity_card_type')->index('FK_buyer_identity_card_type');
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
