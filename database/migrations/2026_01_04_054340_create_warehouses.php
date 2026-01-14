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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id('warehouseId');
            $table->string('warehouseName')->nullable();
            $table->string('warehouseLocation')->nullable();
            $table->unsignedBigInteger('distributor')->nullable();
            $table->unsignedBigInteger('manufacturer')->nullable();
            $table->unsignedBigInteger('createdBy')->nullable();
            $table->unsignedBigInteger('updatedBy')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('distributor')->references('distributorId')->on('distributors')->onDelete('cascade');
            $table->foreign('manufacturer')->references('manufacturerId')->on('manufacturers')->onDelete('cascade');
            $table->foreign('createdBy')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('updatedBy')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
