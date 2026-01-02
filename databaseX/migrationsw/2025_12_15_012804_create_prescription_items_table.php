<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_items', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->nullable(false);
            $table->bigInteger('prescriptionId')->unsigned()->nullable();
            $table->string('type', 255)->nullable();
            $table->bigInteger('productId')->unsigned()->nullable();
            $table->bigInteger('serviceId')->unsigned()->nullable();
            $table->string('quantity', 255)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('status', 255)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescription_items');
    }
}