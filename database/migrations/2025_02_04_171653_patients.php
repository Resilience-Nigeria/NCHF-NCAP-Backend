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
      Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patientId')->unique()->nullable();
            $table->string('hospitalFileNumber')->unique();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('otherNames')->nullable();
            $table->string('email')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->enum('maritalStatus', ['Married', 'Single', 'Divorced', 'Widow', 'Widower'])->nullable();
            $table->unsignedBigInteger('hospitalId')->nullable();
            $table->unsignedBigInteger('stateOfOrigin')->nullable();
            $table->unsignedBigInteger('stateOfResidence')->nullable();
            $table->unsignedBigInteger('diseaseType')->nullable();
            $table->string('status')->default('active');
            $table->foreign('hospitalId')->references('hospitalId')->on('hospitals')->onDelete('cascade');
            $table->foreign('stateOfOrigin')->references('stateId')->on('states')->onDelete('cascade');
            $table->foreign('stateOfResidence')->references('stateId')->on('states')->onDelete('cascade');
            $table->foreign('diseaseType')->references('cancerId')->on('cancers')->onDelete('cascade');
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
