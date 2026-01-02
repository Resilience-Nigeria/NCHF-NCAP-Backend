<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRejectedPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejected_patients', function (Blueprint $table) {
            $table->bigInteger('rejectionId')->unsigned()->nullable(false);
            $table->bigInteger('patientUserId')->unsigned()->nullable();
            $table->bigInteger('hospitalId')->unsigned()->nullable();
            $table->string('reason', 255)->nullable();
            $table->bigInteger('rejectedBy')->unsigned()->nullable();
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
        Schema::dropIfExists('rejected_patients');
    }
}