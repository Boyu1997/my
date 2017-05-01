<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comonents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->text('name');
            $table->text('category');
            $table->text('brand');
            $table->text('arriving_data');
            $table->text('origin_serial_number');
            $table->text('factory_serial_number');
            $table->integer('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
