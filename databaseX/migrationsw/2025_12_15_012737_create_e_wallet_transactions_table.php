<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEWalletTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_wallet_transactions', function (Blueprint $table) {
            $table->bigInteger('transactionId')->unsigned()->nullable(false);
            $table->bigInteger('walletId')->unsigned()->nullable();
            $table->bigInteger('hospitalId')->unsigned()->nullable();
            $table->double('amount')->nullable();
            $table->enum('transactionType', [])->nullable();
            $table->string('transactionReference', 255)->nullable();
            $table->string('reason', 255)->nullable();
            $table->bigInteger('initiatorId')->unsigned()->nullable();
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
        Schema::dropIfExists('e_wallet_transactions');
    }
}