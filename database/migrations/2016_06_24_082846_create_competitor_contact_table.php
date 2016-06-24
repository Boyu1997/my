<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitorContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitor_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('competitor_id')->unsigned();
            $table->integer('contact_id')->unsigned();

            $table->foreign('competitor_id')->references('id')->on('competitors');
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
        Schema::drop('competitor_contact');
    }
}
