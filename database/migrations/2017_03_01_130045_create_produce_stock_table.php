<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduceStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produce_stock', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('produce_id')->unsigned();
            $table->integer('stock_id')->unsigned();
            $table->integer('use_amount');

            $table->foreign('produce_id')->references('id')->on('produces');
            $table->foreign('stock_id')->references('id')->on('stocks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produce_stock');
    }
}
