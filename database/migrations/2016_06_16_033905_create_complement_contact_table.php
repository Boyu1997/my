<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplementContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complement_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('complement_id')->unsigned();
            $table->integer('contact_id')->unsigned();

            $table->foreign('complement_id')->references('id')->on('complements');
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
        Schema::drop('complement_contact');
    }
}
