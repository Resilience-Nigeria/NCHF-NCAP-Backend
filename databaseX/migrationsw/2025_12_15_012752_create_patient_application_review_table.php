<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientApplicationReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_application_review', function (Blueprint $table) {
            $table->bigInteger('reviewId')->unsigned()->nullable(false);
            $table->bigInteger('patientUserId')->unsigned()->nullable();
            $table->bigInteger('reviewerId')->unsigned()->nullable();
            $table->bigInteger('reviewerRole')->unsigned()->nullable();
            $table->bigInteger('statusId')->unsigned()->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('patient_application_review');
    }
}