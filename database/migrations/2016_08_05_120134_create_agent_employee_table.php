<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_employee', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('agent_id')->unsigned();
            $table->integer('employee_id')->unsigned();

            $table->foreign('agent_id')->references('id')->on('agents');
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
        Schema::drop('agent_employee');
    }
}
