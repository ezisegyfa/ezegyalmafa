<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOrderInfosUploadedByAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('order_infos_uploaded_by_admin', function(Blueprint $table)
		{
			$table->foreign('uploader_id', 'FK_497')->references('id')->on('admins')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('order_info_id', 'FK_500')->references('id')->on('order_infos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('order_infos_uploaded_by_admin', function(Blueprint $table)
		{
			$table->dropForeign('FK_497');
			$table->dropForeign('FK_500');
		});
	}

}
