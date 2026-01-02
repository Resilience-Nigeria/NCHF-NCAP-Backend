<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientReferralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_referral', function (Blueprint $table) {
            $table->bigInteger('referralId')->unsigned()->nullable(false);
            $table->bigInteger('patientUserId')->unsigned()->nullable();
            $table->bigInteger('referringHospital')->unsigned()->nullable();
            $table->bigInteger('referredHospital')->unsigned()->nullable();
            $table->bigInteger('referringDoctor')->unsigned()->nullable();
            $table->bigInteger('referredDoctor')->unsigned()->nullable();
            $table->bigInteger('referringCMD')->unsigned()->nullable();
            $table->bigInteger('referredCMD')->unsigned()->nullable();
            $table->string('appointmentDate', 255)->nullable();
            $table->text('referringDoctorComment')->nullable();
            $table->text('referredDoctorComment')->nullable();
            $table->string('status', 255)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_referral');
    }
}