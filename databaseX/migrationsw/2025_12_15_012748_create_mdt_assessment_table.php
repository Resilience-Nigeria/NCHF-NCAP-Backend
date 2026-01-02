<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMdtAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mdt_assessment', function (Blueprint $table) {
            $table->bigInteger('assessmentId')->unsigned()->nullable(false);
            $table->bigInteger('patientUserId')->unsigned()->nullable();
            $table->text('diagnosticProceedures')->nullable();
            $table->string('costAssociatedWithSurgery', 255)->nullable();
            $table->string('servicesToBereceived', 255)->nullable();
            $table->string('medications', 255)->nullable();
            $table->string('radiotherapyCost', 255)->nullable();
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
        Schema::dropIfExists('mdt_assessment');
    }
}