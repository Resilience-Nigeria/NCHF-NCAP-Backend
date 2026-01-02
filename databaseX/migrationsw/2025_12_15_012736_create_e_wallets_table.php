<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_wallets', function (Blueprint $table) {
            $table->bigInteger('walletId')->unsigned()->nullable(false);
            $table->bigInteger('hospitalId')->unsigned()->nullable();
            $table->double('balance')->nullable();
            $table->string('comments', 255)->nullable();
            $table->bigInteger('createdBy')->unsigned()->nullable();
            $table->bigInteger('lastUpdatedBy')->unsigned()->nullable();
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
        Schema::dropIfExists('e_wallets');
    }
}