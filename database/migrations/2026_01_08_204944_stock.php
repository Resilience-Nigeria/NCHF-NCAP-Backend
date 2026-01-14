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
      Schema::create('hospital_stocks', function (Blueprint $table) {
            $table->id('stockId');
            $table->string('batchNumber')->nullable();
            $table->unsignedBigInteger('productId')->nullable();
            $table->string('quantityReceived')->nullable();
            $table->string('quantitySold')->nullable();
            $table->string('quantityTransferred')->nullable();
            $table->string('quantityDamaged')->nullable();
            $table->string('expiryDate')->nullable();

            $table->decimal('landedCost', 10, 2)->nullable();
            $table->decimal('hospitalMarkup', 10, 2)->nullable();
            $table->decimal('distributorMarkup', 10, 2)->nullable();
            $table->decimal('resilienceMarkup', 10, 2)->nullable();
            $table->decimal('bankCharges', 10, 2)->nullable();
            $table->decimal('priceToPatient', 10, 2)->nullable();

            // $table->unsignedBigInteger('priceListId')->nullable();
            $table->unsignedBigInteger('hospitalId')->nullable();
            $table->unsignedBigInteger('receivedBy')->nullable();
           
            $table->foreign('hospitalId')->references('hospitalId')->on('hospitals')->onDelete('cascade');
            // $table->foreign('priceListId')->references('id')->on('product_price_list')->onDelete('cascade');
            $table->foreign('receivedBy')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('productId')->references('productId')->on('requisition_items')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
