<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the billings table with initial data.
     */
    public function run()
    {
        DB::table('billings')->insert([
            [
                'billingId' => 38,
                'transactionId' => 'HD2526139636',
                'patientId' => 5,
                'billingType' => 'Product',
                'categoryType' => 'Prescription',
                'inventoryId' => 1,
                'productId' => 1,
                'serviceId' => null,
                'cost' => 35000,
                'quantity' => 1,
                'paymentMethod' => null,
                'paymentStatus' => 'paid',
                'paymentReference' => null,
                'paymentDate' => null,
                'status' => 'fulfilled',
                'comments' => null,
                'hospitalId' => 1,
                'billedBy' => 54,
                'created_at' => '2025-02-18 13:48:49',
                'updated_at' => '2025-02-18 13:48:49'
            ],
            [
                'billingId' => 39,
                'transactionId' => 'HD2526139636',
                'patientId' => 5,
                'billingType' => 'Product',
                'categoryType' => 'Prescription',
                'inventoryId' => 2,
                'productId' => 2,
                'serviceId' => null,
                'cost' => 15000,
                'quantity' => 1,
                'paymentMethod' => null,
                'paymentStatus' => 'paid',
                'paymentReference' => null,
                'paymentDate' => null,
                'status' => 'fulfilled',
                'comments' => null,
                'hospitalId' => 1,
                'billedBy' => 54,
                'created_at' => '2025-02-18 13:48:49',
                'updated_at' => '2025-02-18 13:48:49'
            ],
            [
                'billingId' => 40,
                'transactionId' => '4A6348339444',
                'patientId' => 5,
                'billingType' => 'Product',
                'categoryType' => 'Prescription',
                'inventoryId' => 1,
                'productId' => 1,
                'serviceId' => null,
                'cost' => 35000,
                'quantity' => 1,
                'paymentMethod' => null,
                'paymentStatus' => 'paid',
                'paymentReference' => null,
                'paymentDate' => null,
                'status' => 'fulfilled',
                'comments' => null,
                'hospitalId' => 1,
                'billedBy' => 54,
                'created_at' => '2025-02-18 17:13:36',
                'updated_at' => '2025-02-18 17:13:36'
            ]
        ]);
    }
}