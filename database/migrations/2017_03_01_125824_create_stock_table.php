<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->text('name');
            $table->text('category');
            $table->text('brand');
            $table->text('serial_number');
            $table->text('purchase_day');
            $table->integer('purchase_amount');
            $table->integer('remain_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stocks');
    }
}
