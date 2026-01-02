<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the doctor_assessment table with initial data.
     */
    public function run()
    {
        DB::table('doctor_assessment')->insert([
            [
                'assessmentId' => 4,
                'patientUserId' => 31,
                'carePlan' => 'DARAJU INDUS. LTD',
                'amountRecommended' => 19195999,
                'status' => 'approved',
                'reviewerId' => 7,
                'created_at' => '2025-02-09 14:49:57',
                'updated_at' => '2025-02-09 14:49:57',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 5,
                'patientUserId' => 31,
                'carePlan' => 'ueudududu',
                'amountRecommended' => 2900,
                'status' => 'approved',
                'reviewerId' => 7,
                'created_at' => '2025-02-10 08:52:03',
                'updated_at' => '2025-02-10 08:52:03',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 6,
                'patientUserId' => 33,
                'carePlan' => 'The patient needs chemotheraphy, and physiotherapy',
                'amountRecommended' => 100000,
                'status' => 'approved',
                'reviewerId' => 7,
                'created_at' => '2025-02-10 13:48:13',
                'updated_at' => '2025-02-10 13:48:13',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 7,
                'patientUserId' => 33,
                'carePlan' => 'ururu',
                'amountRecommended' => 100000,
                'status' => 3,
                'reviewerId' => 7,
                'created_at' => '2025-02-10 13:53:37',
                'updated_at' => '2025-02-10 13:53:37',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 8,
                'patientUserId' => 33,
                'carePlan' => 'Radiotherapy',
                'amountRecommended' => 100000,
                'status' => 3,
                'reviewerId' => 7,
                'created_at' => '2025-02-10 14:19:10',
                'updated_at' => '2025-02-10 14:19:10',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 9,
                'patientUserId' => 33,
                'carePlan' => null,
                'amountRecommended' => null,
                'status' => 4,
                'reviewerId' => 34,
                'created_at' => '2025-02-10 21:23:06',
                'updated_at' => '2025-02-10 21:23:06',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 10,
                'patientUserId' => 31,
                'carePlan' => 'Needs chemotherapy treatment',
                'amountRecommended' => 10000000,
                'status' => 3,
                'reviewerId' => 7,
                'created_at' => '2025-02-15 20:52:18',
                'updated_at' => '2025-02-15 20:52:18',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 11,
                'patientUserId' => 31,
                'carePlan' => 909,
                'amountRecommended' => 999,
                'status' => 3,
                'reviewerId' => 7,
                'created_at' => '2025-02-25 01:37:36',
                'updated_at' => '2025-02-25 01:37:36',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 12,
                'patientUserId' => 31,
                'carePlan' => 'The patient is good to go',
                'amountRecommended' => 10000,
                'status' => 3,
                'reviewerId' => 7,
                'created_at' => '2025-04-14 15:02:10',
                'updated_at' => '2025-04-14 15:02:10',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 13,
                'patientUserId' => 31,
                'carePlan' => 'The patient needs physiotherapy worth 1m naira',
                'amountRecommended' => 100000,
                'status' => 3,
                'reviewerId' => 7,
                'created_at' => '2025-04-15 04:21:42',
                'updated_at' => '2025-04-15 04:21:42',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 14,
                'patientUserId' => 31,
                'carePlan' => 'This child needs 10m for chemo',
                'amountRecommended' => 10000000,
                'status' => 3,
                'reviewerId' => 7,
                'created_at' => '2025-04-15 04:26:29',
                'updated_at' => '2025-04-15 04:26:29',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 15,
                'patientUserId' => 31,
                'carePlan' => 'Has carcinoma',
                'amountRecommended' => 10000,
                'status' => 3,
                'reviewerId' => 7,
                'created_at' => '2025-04-24 16:50:59',
                'updated_at' => '2025-04-24 16:50:59',
                'deleted_at' => null
            ]
        ]);
    }
}