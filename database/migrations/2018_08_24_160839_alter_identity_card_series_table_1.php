<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterIdentityCardSeriesTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('identity_card_series', function(Blueprint $table)
        {
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
        Schema::table('identity_card_series', function(Blueprint $table)
        {
            $table->dropColumn(['created_at','updated_at']);

        });
    }
}
