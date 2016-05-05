<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('monthly_base');
            $table->integer('attendance_stander');
            $table->integer('attendance_deduction');
            $table->integer('cellphone_grant');
            $table->integer('meal_grant');
            $table->integer('person_hour_standard');
            $table->integer('trip_allowance_standard');
            $table->integer('piece_rate_stander');
            $table->integer('piece_rate_award_stander');
            $table->integer('piece_rate_award_requirement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('wages');
    }
}
