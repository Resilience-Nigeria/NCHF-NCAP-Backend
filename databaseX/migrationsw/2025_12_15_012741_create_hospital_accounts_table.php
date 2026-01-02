<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_accounts', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->nullable(false);
            $table->bigInteger('hospitalId')->unsigned()->nullable(false);
            $table->string('accountName', 255)->nullable();
            $table->string('accountNumber', 255)->nullable();
            $table->string('bankName', 255)->nullable();
            $table->string('sortCode', 255)->nullable();
            $table->bigInteger('addedBy')->unsigned()->nullable();
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
        Schema::dropIfExists('hospital_accounts');
    }
}