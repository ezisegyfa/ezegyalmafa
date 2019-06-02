<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderInfosUploadedByAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_infos_uploaded_by_admin', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('uploader_id')->index('fkIdx_497');
			$table->integer('order_info_id')->index('fkIdx_500');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_infos_uploaded_by_admin');
	}

}
