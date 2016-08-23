<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('type');
            $table->text('temperature_1');
            $table->text('humidity_1');
            $table->text('temperature_2');
            $table->text('humidity_2');
            $table->text('critical_error');
            $table->text('compressor_1');
            $table->text('compressor_2');
            $table->text('exchanger_1');
            $table->text('exchanger_2');
            $table->text('fan_1');
            $table->text('fan_2');
            $table->text('heater_1');
            $table->text('heater_2');
            $table->text('humidifier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tests');
    }
}
