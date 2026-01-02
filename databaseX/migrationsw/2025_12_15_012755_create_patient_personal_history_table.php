<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientPersonalHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_personal_history', function (Blueprint $table) {
            $table->bigInteger('personalHistoryId')->unsigned()->nullable(false);
            $table->bigInteger('patientUserId')->unsigned()->nullable();
            $table->string('averageMonthlyIncome', 255)->nullable();
            $table->string('averageFeedingDaily', 255)->nullable();
            $table->string('whoProvidesFeeding', 255)->nullable();
            $table->string('accomodation', 255)->nullable();
            $table->string('typeOfAccomodation', 255)->nullable();
            $table->string('noOfGoodSetOfClothes', 255)->nullable();
            $table->string('howAreClothesGotten', 255)->nullable();
            $table->text('whyDidYouChooseHospital')->nullable();
            $table->bigInteger('hospitalReceivingCare')->unsigned()->nullable();
            $table->string('hospitalReceivingCare2', 255)->nullable();
            $table->string('levelOfSpousalSpupport', 255)->nullable();
            $table->string('otherSupport', 255)->nullable();
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
        Schema::dropIfExists('patient_personal_history');
    }
}