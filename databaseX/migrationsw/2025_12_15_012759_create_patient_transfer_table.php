<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_transfer', function (Blueprint $table) {
            $table->bigInteger('transferId')->unsigned()->nullable(false);
            $table->bigInteger('patientUserId')->unsigned()->nullable();
            $table->bigInteger('transferringHospital')->unsigned()->nullable();
            $table->bigInteger('transferredHospital')->unsigned()->nullable();
            $table->bigInteger('transferringDoctor')->unsigned()->nullable();
            $table->bigInteger('transferredDoctor')->unsigned()->nullable();
            $table->bigInteger('transferringCMD')->unsigned()->nullable();
            $table->bigInteger('transferredCMD')->unsigned()->nullable();
            $table->string('appointmentDate', 255)->nullable();
            $table->text('transferringDoctorComment')->nullable();
            $table->text('transferredDoctorComment')->nullable();
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
        Schema::dropIfExists('patient_transfer');
    }
}