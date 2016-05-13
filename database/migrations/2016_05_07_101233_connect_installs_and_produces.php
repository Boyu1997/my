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
        Schema::table('produces', function (Blueprint $table) {
            $table->integer('install_id')->unsigned()->nullable();
            $table->foreign('install_id')->references('id')->on('installs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produces', function (Blueprint $table) {
            $table->dropForeign('produces_install_id_foreign');
            $table->dropColumn('install_id');
        });
    }
}
