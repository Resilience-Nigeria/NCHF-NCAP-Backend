<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the products table with initial data.
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'productId' => 1,
                'productName' => 'Carboplatin 450MG',
                'productDescription' => 'x 1',
                'productType' => null,
                'productCategory' => null,
                'productQuantity' => null,
                'productCost' => 35000,
                'productPrice' => 35000,
                'productStatus' => null,
                'productImage' => null,
                'productManufacturer' => null,
                'uploadedBy' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'productId' => 2,
                'productName' => 'Filgastrim 10MG',
                'productDescription' => null,
                'productType' => null,
                'productCategory' => null,
                'productQuantity' => 20,
                'productCost' => 15000,
                'productPrice' => 15000,
                'productStatus' => null,
                'productImage' => null,
                'productManufacturer' => null,
                'uploadedBy' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'productId' => 3,
                'productName' => 'Xeloda',
                'productDescription' => null,
                'productType' => null,
                'productCategory' => null,
                'productQuantity' => null,
                'productCost' => 7500,
                'productPrice' => 7500,
                'productStatus' => null,
                'productImage' => null,
                'productManufacturer' => null,
                'uploadedBy' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'productId' => 4,
                'productName' => 'Oxaliplatin 15MG',
                'productDescription' => null,
                'productType' => null,
                'productCategory' => null,
                'productQuantity' => null,
                'productCost' => 13500,
                'productPrice' => 13500,
                'productStatus' => null,
                'productImage' => null,
                'productManufacturer' => null,
                'uploadedBy' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'productId' => 5,
                'productName' => 'Docetaxel',
                'productDescription' => null,
                'productType' => null,
                'productCategory' => null,
                'productQuantity' => null,
                'productCost' => 40300,
                'productPrice' => 40300,
                'productStatus' => null,
                'productImage' => null,
                'productManufacturer' => null,
                'uploadedBy' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'productId' => 6,
                'productName' => 'Rocephin',
                'productDescription' => null,
                'productType' => null,
                'productCategory' => null,
                'productQuantity' => null,
                'productCost' => 25000,
                'productPrice' => null,
                'productStatus' => 'active',
                'productImage' => null,
                'productManufacturer' => null,
                'uploadedBy' => 3,
                'created_at' => '2025-02-25 11:37:50',
                'updated_at' => '2025-02-25 11:37:50'
            ]
        ]);
    }
}