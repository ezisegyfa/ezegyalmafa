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
			$table->foreign('city', 'FK_buyer_city')->references('id')->on('cities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('identity_card_type', 'FK_buyer_identity_card_type')->references('id')->on('identity_card_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('seria', 'FK_buyer_seria')->references('id')->on('identity_card_series')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
			$table->dropForeign('FK_buyer_city');
			$table->dropForeign('FK_buyer_identity_card_type');
			$table->dropForeign('FK_buyer_seria');
		});
	}

}
