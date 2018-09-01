<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBuyerNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('buyer_notifications', function(Blueprint $table)
		{
			$table->foreign('buyer', 'FK_buyer_notification_buyer')->references('id')->on('buyers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('type', 'FK_buyer_notification_type')->references('id')->on('notification_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('buyer_notifications', function(Blueprint $table)
		{
			$table->dropForeign('FK_buyer_notification_buyer');
			$table->dropForeign('FK_buyer_notification_type');
		});
	}

}
