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
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id('requisitionNumber');
            $table->string('requisitionId')->unique();
            $table->unsignedBigInteger('hospitalId');

            $table->decimal('totalCost', 10, 2)->nullable();
            $table->unsignedBigInteger('requestedBy')->nullable();
            

            $table->string('status')->default('PENDING');

            $table->text('remarks')->nullable();
            $table->foreign('requestedBy')->references('id')->on('users');
            $table->foreign('hospitalId')->references('hospitalId')->on('hospitals');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisition');
    }
};
