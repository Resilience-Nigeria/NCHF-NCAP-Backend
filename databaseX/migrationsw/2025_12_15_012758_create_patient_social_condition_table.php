<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientSocialConditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_social_condition', function (Blueprint $table) {
            $table->bigInteger('socialConditionId')->unsigned()->nullable(false);
            $table->bigInteger('patientUserId')->unsigned()->nullable();
            $table->string('runningWater', 255)->nullable();
            $table->string('toiletType', 255)->nullable();
            $table->string('powerSupply', 255)->nullable();
            $table->string('meansOfTransport', 255)->nullable();
            $table->string('mobilePhone', 255)->nullable();
            $table->string('howPhoneIsRecharged', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->bigInteger('reviewerId')->unsigned()->nullable();
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
        Schema::dropIfExists('patient_social_condition');
    }
}