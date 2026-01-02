<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RejectedPatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the rejected_patients table with initial data.
     */
    public function run()
    {
        DB::table('rejected_patients')->insert([
            [
                'rejectionId' => 2,
                'patientUserId' => 31,
                'hospitalId' => 1,
                'reason' => 'hdhdh',
                'rejectedBy' => 7,
                'created_at' => '2025-04-14 16:40:25',
                'updated_at' => '2025-04-14 16:40:25'
            ]
        ]);
    }
}