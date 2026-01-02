<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the inventory table with initial data.
     */
    public function run()
    {
        DB::table('inventory')->insert([
            [
                'inventoryId' => 1,
                'productId' => 1,
                'hospitalId' => 1,
                'batchNumber' => 292929,
                'expiryDate' => null,
                'inventoryType' => null,
                'quantityReceived' => 100,
                'quantitySold' => 15,
                'inventoryStatus' => null,
                'inventoryQuantityDamaged' => null,
                'inventoryQuantityReturned' => null,
                'inventoryQuantityExpired' => null,
                'uploadedBy' => null,
                'created_at' => null,
                'updated_at' => '2025-02-18 17:13:36'
            ],
            [
                'inventoryId' => 2,
                'productId' => 5,
                'hospitalId' => 1,
                'batchNumber' => 373738,
                'expiryDate' => null,
                'inventoryType' => null,
                'quantityReceived' => 200,
                'quantitySold' => 14,
                'inventoryStatus' => null,
                'inventoryQuantityDamaged' => null,
                'inventoryQuantityReturned' => null,
                'inventoryQuantityExpired' => null,
                'uploadedBy' => null,
                'created_at' => null,
                'updated_at' => '2025-02-18 13:48:49'
            ]
        ]);
    }
}