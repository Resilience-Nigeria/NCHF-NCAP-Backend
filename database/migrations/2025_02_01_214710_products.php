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
        Schema::create('products', function (Blueprint $table) {
            $table->id('productId');
            $table->string('productCode')->nullable();
            $table->string('productName')->nullable();
            $table->string('productDescription')->nullable();
            $table->unsignedBigInteger('productType')->nullable();
            $table->unsignedBigInteger('uploadedBy')->nullable();
            $table->timestamps();

            $table->foreign('uploadedBy')->references('id')->on('users');
            $table->foreign('productType')->references('typeId')->on('product_types');
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
