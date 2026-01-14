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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transactionId');
            $table->string('transactionNumber')->nullable();
            $table->string('transactionType')->nullable();
            $table->string('patientId')->nullable();
            $table->decimal('totalAmount', 15, 2)->nullable();
            $table->string('paymentMethod')->nullable();
            $table->string('status')->default('PENDING');
            $table->unsignedBigInteger('hospitalId')->nullable();
            $table->unsignedBigInteger('createdBy')->nullable();
            $table->unsignedBigInteger('approvedBy')->nullable();
            $table->dateTime('approvedAt')->nullable();
            $table->timestamps();

            $table->foreign('patientId')->references('patientId')->on('patients')->onDelete('set null');
            $table->foreign('hospitalId')->references('hospitalId')->on('hospitals')->onDelete('set null');
            $table->foreign('createdBy')->references('id')->on('users')->onDelete('set null');
            $table->foreign('approvedBy')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
