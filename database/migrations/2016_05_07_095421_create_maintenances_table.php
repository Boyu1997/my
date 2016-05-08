<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('maintenances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->text('type');
            $table->text('specification');
            $table->text('start_at');
            $table->text('end_at');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('maintenances');
     }
}
