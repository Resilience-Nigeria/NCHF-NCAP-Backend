<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requisition_items', function (Blueprint $table) {
            $table->id('itemId');
            $table->string('requisitionId');
            $table->unsignedBigInteger('hospitalId');
            $table->unsignedBigInteger('productId');
            $table->unsignedBigInteger('warehouseId');
            $table->unsignedBigInteger('manufacturerId')->nullable();
            $table->unsignedBigInteger('distributorId')->nullable();
            $table->unsignedBigInteger('priceListId')->nullable();
            $table->string('batchNumber')->nullable();
            $table->date('expiryDate')->nullable();
            $table->integer('quantityRequested');
            $table->integer('quantityDispatched')->nullable();
            $table->integer('quantityReceived')->nullable();
            $table->unsignedBigInteger('requestedBy')->nullable();
            $table->unsignedBigInteger('dispatchedBy')->nullable();
            $table->unsignedBigInteger('receivedBy')->nullable();
            $table->dateTime('requestDate')->nullable();
            $table->dateTime('dispatchDate')->nullable();
            $table->dateTime('receivedDate')->nullable();
            $table->unsignedBigInteger('warehouseStockId')->nullable();
            $table->string('status')->default('PENDING');

            $table->decimal('landedCost', 10, 2)->nullable();
            $table->decimal('hospitalMarkup', 10, 2)->nullable();
            $table->decimal('distributorMarkup', 10, 2)->nullable();
            $table->decimal('resilienceMarkup', 10, 2)->nullable();
            $table->decimal('bankCharges', 10, 2)->nullable();
            $table->decimal('priceToPatient', 10, 2)->nullable();
            
            $table->text('remarks')->nullable();
            $table->foreign('requestedBy')->references('id')->on('users');
            $table->foreign('dispatchedBy')->references('id')->on('users');
            $table->foreign('receivedBy')->references('id')->on('users');
            $table->foreign('hospitalId')->references('hospitalId')->on('hospitals');
            $table->foreign('priceListId')->references('id')->on('product_price_list');
            $table->foreign('productId')->references('product')->on('warehouse_stocks')->onDelete('cascade');
            $table->foreign('warehouseId')->references('warehouseId')->on('warehouses');
            $table->foreign('manufacturerId')->references('manufacturerId')->on('manufacturers');
            $table->foreign('distributorId')->references('distributorId')->on('distributors');
            $table->foreign('requisitionId')->references('requisitionId')->on('requisitions');
            $table->foreign('warehouseStockId')->references('warehouseStockId')->on('warehouse_stocks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisition');
    }
};
