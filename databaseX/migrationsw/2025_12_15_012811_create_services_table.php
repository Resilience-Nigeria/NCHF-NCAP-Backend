<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigInteger('serviceId')->unsigned()->nullable(false);
            $table->string('serviceName', 255)->nullable();
            $table->string('serviceDescription', 255)->nullable();
            $table->string('serviceType', 255)->nullable();
            $table->string('serviceCategory', 255)->nullable();
            $table->string('serviceCost', 255)->nullable();
            $table->string('servicePrice', 255)->nullable();
            $table->string('serviceStatus', 255)->nullable();
            $table->bigInteger('hospitalId')->unsigned()->nullable();
            $table->bigInteger('uploadedBy')->unsigned()->nullable();
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
        Schema::dropIfExists('services');
    }
}