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
            $table->boolean('stock');
            $table->boolean('produce');
            $table->boolean('install');
            $table->boolean('maintenance');
            $table->boolean('sale');
            $table->boolean('contract');
            $table->boolean('trip');
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
