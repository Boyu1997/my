<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitorSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitor_sale', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('competitor_id')->unsigned();
            $table->integer('sale_id')->unsigned();
            $table->text('bid_model');
            $table->integer('bid_amount');
            $table->integer('bid_price');

            $table->foreign('competitor_id')->references('id')->on('competitors');
            $table->foreign('sale_id')->references('id')->on('sales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('competitor_sale');
    }
}
