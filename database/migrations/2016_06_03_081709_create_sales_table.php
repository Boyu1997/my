<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('status');
            $table->text('classification');
            $table->text('specification');

            $table->text('expect_model');
            $table->integer('expect_amount');
            $table->integer('expect_price');
            $table->text('expect_sold_date');
            $table->text('bid_date');

            $table->text('result');
            $table->text('winning_company');
            $table->text('sold_model');
            $table->integer('sold_amount');
            $table->integer('sold_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales');
    }
}
