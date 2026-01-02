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
        Schema::create('manufacturers_suppliers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('distributor')->nullable();
            $table->unsignedBigInteger('distributorFor')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('distributor')->references('distributorId')->on('distributors')->onDelete('cascade');
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
