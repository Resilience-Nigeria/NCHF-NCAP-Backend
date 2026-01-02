<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->bigInteger('billingId')->unsigned()->nullable(false);
            $table->string('transactionId', 255)->nullable();
            $table->bigInteger('patientId')->unsigned()->nullable();
            $table->string('billingType', 255)->nullable();
            $table->string('categoryType', 255)->nullable();
            $table->bigInteger('inventoryId')->unsigned()->nullable();
            $table->bigInteger('productId')->unsigned()->nullable();
            $table->bigInteger('serviceId')->unsigned()->nullable();
            $table->string('cost', 255)->nullable();
            $table->string('quantity', 255)->nullable();
            $table->string('paymentMethod', 255)->nullable();
            $table->string('paymentStatus', 255)->nullable();
            $table->string('paymentReference', 255)->nullable();
            $table->string('paymentDate', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->text('comments')->nullable();
            $table->bigInteger('hospitalId')->unsigned()->nullable();
            $table->bigInteger('billedBy')->unsigned()->nullable();
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
        Schema::dropIfExists('billings');
    }
}