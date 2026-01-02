<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->bigInteger('inventoryId')->unsigned()->nullable(false);
            $table->bigInteger('productId')->unsigned()->nullable();
            $table->bigInteger('hospitalId')->unsigned()->nullable();
            $table->string('batchNumber', 255)->nullable();
            $table->string('expiryDate', 255)->nullable();
            $table->string('inventoryType', 255)->nullable();
            $table->string('quantityReceived', 255)->nullable();
            $table->string('quantitySold', 255)->nullable();
            $table->string('inventoryStatus', 255)->nullable();
            $table->string('inventoryQuantityDamaged', 255)->nullable();
            $table->string('inventoryQuantityReturned', 255)->nullable();
            $table->string('inventoryQuantityExpired', 255)->nullable();
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
        Schema::dropIfExists('inventory');
    }
}