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
      Schema::create('drug_request_items', function (Blueprint $table) {
            $table->id('itemId');
            $table->string('requestNumber')->nullable();
            $table->unsignedBigInteger('productPriceId')->nullable();
            $table->string('quantityRequested')->nullable();
            $table->string('quantityApproved')->nullable();
            $table->string('quantityReceived')->nullable();
            $table->string('quantityDamaged')->nullable();
            $table->string('expiryDate')->nullable();
            $table->unsignedBigInteger('hospitalId')->nullable();
            $table->unsignedBigInteger('requestedBy')->nullable();
            $table->unsignedBigInteger('approvedBy')->nullable();
            $table->unsignedBigInteger('receivedBy')->nullable();
           
            $table->enum('status', ['pending', 'rejected', 'dispatched', 'received'])->nullable();

            $table->foreign('requestNumber')->references('requestNumber')->on('drug_requests')->onDelete('cascade');
            $table->foreign('hospitalId')->references('hospitalId')->on('hospitals')->onDelete('cascade');
            $table->foreign('requestedBy')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approvedBy')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receivedBy')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('productPriceId')->references('id')->on('product_price_list')->onDelete('cascade');
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
