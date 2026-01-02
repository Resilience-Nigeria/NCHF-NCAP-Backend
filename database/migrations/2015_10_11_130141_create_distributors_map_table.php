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
       Schema::create('distributors_map', function (Blueprint $table) {
            $table->id('mapId');
            $table->unsignedBigInteger('distributorId');
            $table->unsignedBigInteger('distributorFor');
            $table->timestamps();

            $table->foreign('distributorId')->references('distributorId')->on('distributors')->onDelete('cascade');
            $table->foreign('distributorFor')->references('manufacturerId')->on('manufacturers')->onDelete('cascade');
           
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
