<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuyerNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buyer_notifications', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('text', 65535);
			$table->integer('score');
			$table->integer('type')->index('FK_buyer_notification_type');
			$table->integer('buyer')->index('FK_buyer_notification_buyer');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('buyer_notifications');
	}

}
