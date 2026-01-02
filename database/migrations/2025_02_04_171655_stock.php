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
      Schema::create('stock', function (Blueprint $table) {
            $table->id('stockId');
            $table->string('batchNumber')->nullable();
            $table->unsignedBigInteger('productId')->nullable();
            $table->string('quantityReceived')->nullable();
            $table->string('quantitySold')->nullable();
            $table->string('quantityTransferred')->nullable();
            $table->string('quantityDamaged')->nullable();
            $table->string('expiryDate')->nullable();
            $table->unsignedBigInteger('hospitalId')->nullable();
            $table->unsignedBigInteger('receivedBy')->nullable();
           
            $table->foreign('hospitalId')->references('hospitalId')->on('hospitals')->onDelete('cascade');
            $table->foreign('receivedBy')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('productId')->references('productId')->on('products')->onDelete('cascade');
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
