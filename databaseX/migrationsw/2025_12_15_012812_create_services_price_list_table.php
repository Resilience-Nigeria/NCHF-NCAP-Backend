<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesPriceListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_price_list', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->nullable(false);
            $table->bigInteger('serviceId')->unsigned()->nullable();
            $table->string('price', 255)->nullable();
            $table->string('discount', 255)->nullable();
            $table->string('discountType', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->bigInteger('createdBy')->unsigned()->nullable();
            $table->bigInteger('updatedBy')->unsigned()->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_price_list');
    }
}