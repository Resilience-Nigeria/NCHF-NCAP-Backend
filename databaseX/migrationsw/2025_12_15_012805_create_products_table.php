<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('productId')->unsigned()->nullable(false);
            $table->string('productName', 255)->nullable();
            $table->string('productDescription', 255)->nullable();
            $table->string('productType', 255)->nullable();
            $table->string('productCategory', 255)->nullable();
            $table->string('productQuantity', 255)->nullable();
            $table->string('productCost', 255)->nullable();
            $table->string('productPrice', 255)->nullable();
            $table->string('productStatus', 255)->nullable();
            $table->string('productImage', 255)->nullable();
            $table->string('productManufacturer', 255)->nullable();
            $table->bigInteger('uploadedBy')->unsigned()->nullable();
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
        Schema::dropIfExists('products');
    }
}