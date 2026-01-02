<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrescriptionItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the prescription_items table with initial data.
     */
    public function run()
    {
        DB::table('prescription_items')->insert([
            [
                'id' => 5,
                'prescriptionId' => 13870916,
                'type' => 'product',
                'productId' => 1,
                'serviceId' => null,
                'quantity' => 1,
                'created_at' => '2025-02-16 14:42:53',
                'updated_at' => '2025-02-16 14:42:53',
                'status' => 'pending'
            ],
            [
                'id' => 6,
                'prescriptionId' => 13870916,
                'type' => 'product',
                'productId' => 2,
                'serviceId' => null,
                'quantity' => 1,
                'created_at' => '2025-02-16 14:42:53',
                'updated_at' => '2025-02-16 14:42:53',
                'status' => 'pending'
            ],
            [
                'id' => 10,
                'prescriptionId' => 44392034,
                'type' => 'product',
                'productId' => 1,
                'serviceId' => null,
                'quantity' => 1,
                'created_at' => '2025-02-18 17:12:23',
                'updated_at' => '2025-02-18 17:12:23',
                'status' => 'pending'
            ]
        ]);
    }
}