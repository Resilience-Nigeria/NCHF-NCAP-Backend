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
        Schema::create('distributor_staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('distributorId');
            $table->unsignedBigInteger('staffId');
            $table->timestamps();
            $table->foreign('distributorId')->references('distributorId')->on('distributors')->onDelete('cascade');
            $table->foreign('staffId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manufacturer_staff');
    }
};
