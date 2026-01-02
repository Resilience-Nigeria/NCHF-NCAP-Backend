<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClustersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clusters', function (Blueprint $table) {
            $table->bigInteger('clusterId')->unsigned()->nullable(false);
            $table->bigInteger('subhubId')->unsigned()->nullable(false);
            $table->bigInteger('hospitalId')->unsigned()->nullable(false);
            $table->string('clusterName', 255)->nullable();
            $table->string('clusterCode', 255)->nullable();
            $table->string('clusterType', 255)->nullable();
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
        Schema::dropIfExists('clusters');
    }
}