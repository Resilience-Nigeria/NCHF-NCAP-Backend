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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id('hospitalId');
            $table->string('acronym')->nullable();
            $table->string('hospitalName')->nullable();
            $table->unsignedBigInteger('contactPerson')->nullable();
            $table->unsignedBigInteger('location')->nullable();
            $table->string('status')->default('active')->nullable();
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('location')->references('stateId')->on('states');
            $table->foreign('contactPerson')->references('id')->on('users');
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
