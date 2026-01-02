<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->nullable(false);
            $table->bigInteger('prescriptionId')->unsigned()->nullable(false);
            $table->bigInteger('patientId')->unsigned()->nullable();
            $table->bigInteger('hospitalId')->unsigned()->nullable();
            $table->string('comments', 255)->nullable();
            $table->bigInteger('prescribedBy')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('status', 255)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
}