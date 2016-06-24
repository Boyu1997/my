<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->boolean('master_admin');
            $table->boolean('check_trip');
            $table->boolean('create_produce');
            $table->boolean('create_install');
            $table->boolean('create_maintenance');
            $table->boolean('create_sale');
            $table->boolean('create_contract');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('privileges');
    }
}
