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
      Schema::create('drug_requests', function (Blueprint $table) {
            $table->id('requestId');
            $table->string('requestNumber')->unique();
            
            $table->unsignedBigInteger('hospitalId')->nullable();
            $table->foreign('hospitalId')->references('hospitalId')->on('hospitals')->onDelete('cascade');
            
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
