<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrescriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the prescriptions table with initial data.
     */
    public function run()
    {
        DB::table('prescriptions')->insert([
            [
                'id' => 3,
                'prescriptionId' => 13870916,
                'patientId' => 5,
                'hospitalId' => 1,
                'comments' => null,
                'prescribedBy' => 7,
                'created_at' => '2025-02-16 14:42:53',
                'updated_at' => '2025-02-18 13:48:49',
                'status' => 'pending'
            ],
            [
                'id' => 5,
                'prescriptionId' => 44392034,
                'patientId' => 5,
                'hospitalId' => 1,
                'comments' => 'None',
                'prescribedBy' => 7,
                'created_at' => '2025-02-18 17:12:23',
                'updated_at' => '2025-02-18 17:13:36',
                'status' => 'fulfilled'
            ]
        ]);
    }
}