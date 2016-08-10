<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplementEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complement_employee', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('complement_id')->unsigned();
            $table->integer('employee_id')->unsigned();

            $table->foreign('complement_id')->references('id')->on('complements');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('complement_employee');
    }
}
