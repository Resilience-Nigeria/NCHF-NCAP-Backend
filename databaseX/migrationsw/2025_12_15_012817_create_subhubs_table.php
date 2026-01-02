<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubhubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subhubs', function (Blueprint $table) {
            $table->bigInteger('subhubId')->unsigned()->nullable(false);
            $table->bigInteger('hubId')->unsigned()->nullable();
            $table->bigInteger('hospitalId')->unsigned()->nullable();
            $table->string('subhubName', 255)->nullable();
            $table->string('subhubType', 255)->nullable();
            $table->string('subhubCode', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->bigInteger('stateId')->unsigned()->nullable();
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
        Schema::dropIfExists('subhubs');
    }
}