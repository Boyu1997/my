<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectInstallsAndProduces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('installs', function (Blueprint $table) {
            $table->integer('produce_id')->unsigned();
            $table->foreign('produce_id')->references('id')->on('produces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('installs', function (Blueprint $table) {
            $table->dropForeign('installs_produce_id_foreign');
            $table->dropColumn('produce_id');
        });
    }
}
