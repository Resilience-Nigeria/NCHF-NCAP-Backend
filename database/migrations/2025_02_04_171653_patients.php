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
            $table->string('NIN')->unique()->nullable();
            $table->string('patientId')->unique()->nullable();
            $table->string('chfId')->unique()->nullable();
            $table->string('hospitalFileNumber')->unique()->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('otherNames')->nullable();
            $table->string('email')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->text('address')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->enum('maritalStatus', ['Married', 'Single', 'Divorced', 'Widow', 'Widower'])->nullable();
            $table->string('bloodGroup')->nullable();
            $table->string('occupation')->nullable();
            $table->string('religion')->nullable();
            $table->string('nextOfKinName')->nullable();
            $table->string('nextOfKinPhoneNumber')->nullable();
            $table->string('nextOfKinEmail')->nullable();
            $table->string('nextOfKinRelationship')->nullable();
            $table->string('nextOfKinOccupation')->nullable();
            $table->string('nextOfKinGender')->nullable();
            $table->string('hmo')->nullable();
            $table->string('status')->nullable();
            $table->string('hospitalReceivingCare2')->nullable();
             $table->string('patientType')->nullable();
            
            
            
            $table->unsignedBigInteger('userId')->nullable();
            $table->unsignedBigInteger('hospitalId')->nullable();
            $table->unsignedBigInteger('stateOfOrigin')->nullable();
            $table->unsignedBigInteger('stateOfResidence')->nullable();
            $table->unsignedBigInteger('diseaseType')->nullable();
            $table->string('status')->default('active');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
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
