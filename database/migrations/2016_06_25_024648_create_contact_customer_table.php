<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_customer', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('contact_id')->unsigned();
            $table->integer('customer_id')->unsigned();

            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contact_customer');
    }
}
