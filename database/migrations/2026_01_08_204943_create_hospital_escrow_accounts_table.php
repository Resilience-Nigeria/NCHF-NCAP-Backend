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
        Schema::create('hospital_escrow_accounts', function (Blueprint $table) {
            $table->id('escrowId');
            $table->unsignedBigInteger('hospitalId');
            $table->string('accountNumber', 20)->unique();
            $table->string('bankName', 100);
            $table->string('accountName', 150);
            $table->timestamps();

            $table->foreign('hospitalId')->references('hospitalId')->on('hospitals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_escrow_accounts');
    }
};
