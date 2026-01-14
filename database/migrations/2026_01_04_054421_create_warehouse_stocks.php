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
        Schema::create('warehouse_stocks', function (Blueprint $table) {
            $table->id('warehouseStockId');
            $table->unsignedBigInteger('warehouse')->nullable();
            $table->unsignedBigInteger('product')->nullable();
            $table->unsignedBigInteger('distributor')->nullable();
            $table->unsignedBigInteger('manufacturer')->nullable();
            $table->integer('initialQuantity')->default(0);
            $table->integer('quantityAvailable')->default(0);
            $table->integer('quantityReserved')->default(0);
            $table->string('batchNumber')->nullable();
            $table->decimal('landedCost', 10, 2)->nullable();
            $table->date('expiryDate')->nullable();
            $table->unsignedBigInteger('createdBy')->nullable();
            $table->unsignedBigInteger('updatedBy')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();


            $table->foreign('warehouse')->references('warehouseId')->on('warehouses')->onDelete('cascade');
            $table->foreign('product')->references('id')->on('product_price_list')->onDelete('cascade');
            // $table->foreign('priceListId')->references('id')->on('product_price_list')->onDelete('cascade');
            $table->foreign('distributor')->references('distributorId')->on('distributors')->onDelete('cascade');
            $table->foreign('manufacturer')->references('manufacturerId')->on('manufacturers')->onDelete('cascade');
            $table->foreign('createdBy')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updatedBy')->references('id')->on('users')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_stocks');
    }
};
