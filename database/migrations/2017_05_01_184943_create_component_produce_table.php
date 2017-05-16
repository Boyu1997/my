<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentProduceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('component_produce', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             $table->integer('component_id')->unsigned();
             $table->integer('produce_id')->unsigned();

             $table->foreign('component_id')->references('id')->on('components');
             $table->foreign('produce_id')->references('id')->on('produces');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('component_produce');
     }
}
