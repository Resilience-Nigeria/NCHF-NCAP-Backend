<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialWelfareAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_welfare_assessment', function (Blueprint $table) {
            $table->bigInteger('assessmentId')->unsigned()->nullable(false);
            $table->bigInteger('patientUserId')->unsigned()->nullable();
            $table->string('appearance', 255)->nullable();
            $table->string('bmi', 255)->nullable();
            $table->text('commentOnHome')->nullable();
            $table->text('commentOnEnvironment')->nullable();
            $table->text('commentOnFamily')->nullable();
            $table->text('generalComment')->nullable();
            $table->bigInteger('parent1Education')->unsigned()->nullable();
            $table->bigInteger('parent1Occupation')->unsigned()->nullable();
            $table->bigInteger('parent2Education')->unsigned()->nullable();
            $table->bigInteger('parent2Occupation')->unsigned()->nullable();
            $table->tinyInteger('useSecondParent')->nullable();
            $table->string('sesResult', 255)->nullable();
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
        Schema::dropIfExists('social_welfare_assessment');
    }
}