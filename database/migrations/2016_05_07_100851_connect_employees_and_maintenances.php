<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectEmployeesAndMaintenances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maintenances', function (Blueprint $table) {
            $table->integer('employee_id')->unsigned();
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
        Schema::table('maintenances', function (Blueprint $table) {
            $table->dropForeign('maintenances_employee_id_foreign');
            $table->dropColumn('employee_id');
        });
    }
}
