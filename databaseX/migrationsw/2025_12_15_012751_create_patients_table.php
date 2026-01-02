<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigInteger('patientId')->unsigned()->nullable(false);
            $table->string('nin', 255)->nullable();
            $table->bigInteger('userId')->unsigned()->nullable();
            $table->string('chfId', 255)->nullable();
            $table->string('hospitalFileNumber', 255)->nullable();
            $table->bigInteger('hospital')->unsigned()->nullable();
            $table->bigInteger('stateOfOrigin')->unsigned()->nullable();
            $table->bigInteger('stateOfResidence')->unsigned()->nullable();
            $table->string('religion', 255)->nullable();
            $table->string('gender', 255)->nullable();
            $table->string('bloodGroup', 255)->nullable();
            $table->string('occupation', 255)->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('nextOfKinName', 255)->nullable();
            $table->string('nextOfKinAddress', 255)->nullable();
            $table->string('nextOfKinPhoneNumber', 255)->nullable();
            $table->string('nextOfKinEmail', 255)->nullable();
            $table->string('nextOfKinRelationship', 255)->nullable();
            $table->string('nextOfKinOccupation', 255)->nullable();
            $table->string('nextOfKinGender', 255)->nullable();
            $table->bigInteger('hmo')->unsigned()->nullable();
            $table->string('hmoNumber', 255)->nullable();
            $table->bigInteger('cancer')->unsigned()->nullable();
            $table->string('cancerStage', 255)->nullable();
            $table->bigInteger('doctor')->unsigned()->nullable();
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
        Schema::dropIfExists('patients');
    }
}