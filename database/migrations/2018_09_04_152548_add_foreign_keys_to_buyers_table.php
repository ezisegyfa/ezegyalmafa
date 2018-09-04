<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBuyersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('buyers', function(Blueprint $table)
		{
			$table->foreign('identity_card_type', 'buyer_identity_card_type')->references('id')->on('identity_card_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('notification_type', 'buyer_notification_type')->references('id')->on('notification_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('identity_seria_type', 'buyer_seria')->references('id')->on('identity_card_series')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('settlement', 'buyer_settlement')->references('id')->on('settlements')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('uploader', 'buyer_uploader')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('buyers', function(Blueprint $table)
		{
			$table->dropForeign('buyer_identity_card_type');
			$table->dropForeign('buyer_notification_type');
			$table->dropForeign('buyer_seria');
			$table->dropForeign('buyer_settlement');
			$table->dropForeign('buyer_uploader');
		});
	}

}
