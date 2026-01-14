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
        Schema::create('product_price_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productId')->nullable();
            
            
            $table->unsignedBigInteger('manufacturer')->nullable();
            $table->unsignedBigInteger('distributor')->nullable();
            $table->decimal('landedCost', 10, 2)->nullable();
            $table->decimal('hospitalMarkup', 10, 2)->nullable();
            $table->decimal('distributorMarkup', 10, 2)->nullable();
            $table->decimal('resilienceMarkup', 10, 2)->nullable();
            $table->decimal('bankCharges', 10, 2)->nullable();
            $table->decimal('priceToPatient', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->string('discountType')->nullable();

            $table->unsignedBigInteger('createdBy')->nullable();
            $table->unsignedBigInteger('updatedBy')->nullable();
            $table->string('status')->nullable();

            $table->foreign('productId')->references('productId')->on('products');
            $table->foreign('createdBy')->references('id')->on('users');
            $table->foreign('updatedBy')->references('id')->on('users');

            $table->foreign('manufacturer')->references('manufacturerId')->on('manufacturers');
            $table->foreign('distributor')->references('distributorId')->on('distributors');

            $table->softDeletes();
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
