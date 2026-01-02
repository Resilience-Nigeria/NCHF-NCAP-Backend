<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientFamilyHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_family_history', function (Blueprint $table) {
            $table->bigInteger('familyHistoryId')->unsigned()->nullable(false);
            $table->bigInteger('patientUserId')->unsigned()->nullable();
            $table->string('familySetupSize', 255)->nullable();
            $table->string('birthOrder', 255)->nullable();
            $table->string('fathersEducationalLevel', 255)->nullable();
            $table->string('mothersEducationalLevel', 255)->nullable();
            $table->string('fathersOccupation', 255)->nullable();
            $table->string('mothersOccupation', 255)->nullable();
            $table->string('levelOfFamilyCare', 255)->nullable();
            $table->string('familyMonthlyIncome', 255)->nullable();
            $table->bigInteger('reviewerId')->unsigned()->nullable();
            $table->string('status', 255)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_family_history');
    }
}