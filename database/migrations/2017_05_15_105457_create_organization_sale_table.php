<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_sale', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('organization_id')->unsigned();
            $table->integer('sale_id')->unsigned();

            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('sale_id')->references('id')->on('sales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('organization_sale');
    }
}
