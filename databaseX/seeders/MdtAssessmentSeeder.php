<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MdtAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the mdt_assessment table with initial data.
     */
    public function run()
    {
        DB::table('mdt_assessment')->insert([
            [
                'assessmentId' => 1,
                'patientUserId' => 33,
                'diagnosticProceedures' => 'hfhfh',
                'costAssociatedWithSurgery' => 9000,
                'servicesToBereceived' => 'dhdhdh',
                'medications' => 'hdhdh',
                'radiotherapyCost' => 8996,
                'status' => 5,
                'reviewerId' => 36,
                'created_at' => '2025-02-11 01:00:40',
                'updated_at' => '2025-02-11 01:00:40',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 2,
                'patientUserId' => 31,
                'diagnosticProceedures' => 'Clean',
                'costAssociatedWithSurgery' => 20000,
                'servicesToBereceived' => 'Surgery\nPhysitherapy',
                'medications' => 'None yet',
                'radiotherapyCost' => 29999,
                'status' => 5,
                'reviewerId' => 36,
                'created_at' => '2025-02-15 21:00:53',
                'updated_at' => '2025-02-15 21:00:53',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 4,
                'patientUserId' => 31,
                'diagnosticProceedures' => null,
                'costAssociatedWithSurgery' => null,
                'servicesToBereceived' => null,
                'medications' => null,
                'radiotherapyCost' => null,
                'status' => 5,
                'reviewerId' => 34,
                'created_at' => '2025-04-25 07:32:31',
                'updated_at' => '2025-04-25 07:32:31',
                'deleted_at' => null
            ]
        ]);
    }
}