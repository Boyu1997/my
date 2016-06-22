<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('agent_id')->unsigned();
            $table->integer('contact_id')->unsigned();

            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('contact_id')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agent_contact');
    }
}
