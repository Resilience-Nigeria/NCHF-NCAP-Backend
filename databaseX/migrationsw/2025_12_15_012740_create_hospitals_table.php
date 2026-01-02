<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->bigInteger('hospitalId')->unsigned()->nullable(false);
            $table->string('hospitalName', 255)->nullable();
            $table->string('hospitalShortName', 255)->nullable();
            $table->text('address')->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->bigInteger('stateId')->unsigned()->nullable();
            $table->string('hospitalCode', 255)->nullable();
            $table->string('hospitalType', 255)->nullable();
            $table->bigInteger('hospitalAdmin')->unsigned()->nullable();
            $table->bigInteger('hospitalCMD')->unsigned()->nullable();
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
        Schema::dropIfExists('hospitals');
    }
}