<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->foreign('identity_card_serial_type_id', 'FK_486')->references('id')->on('identity_card_serial_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('location_id', 'buyer_location')->references('id')->on('settlements')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropForeign('FK_486');
			$table->dropForeign('buyer_location');
		});
	}

}
