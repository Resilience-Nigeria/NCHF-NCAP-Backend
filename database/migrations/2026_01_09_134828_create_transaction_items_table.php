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
        Schema::create('transaction_items', function (Blueprint $table) {
            $table->id('itemId');
            $table->unsignedBigInteger('transactionId')->nullable();
            $table->unsignedBigInteger('productId')->nullable();
            $table->unsignedBigInteger('stockId')->nullable();
            $table->integer('quantity')->nullable();
             $table->decimal('landedCost', 10, 2)->nullable();
            $table->decimal('hospitalMarkup', 10, 2)->nullable();
            $table->decimal('distributorMarkup', 10, 2)->nullable();
            $table->decimal('resilienceMarkup', 10, 2)->nullable();
            $table->decimal('bankCharges', 10, 2)->nullable();
            $table->decimal('priceToPatient', 10, 2)->nullable();
            
            $table->decimal('subTotal', 15, 2)->nullable();
            $table->timestamps();

            $table->foreign('transactionId')->references('transactionId')->on('transactions')->onDelete('cascade');
            // $table->foreign('productId')->references('productId')->on('products')->onDelete('set null');
            $table->foreign('productId')->references('productId')->on('hospital_stocks')->onDelete('set null');
            $table->foreign('stockId')->references('stockId')->on('hospital_stocks')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_items');
    }
};
