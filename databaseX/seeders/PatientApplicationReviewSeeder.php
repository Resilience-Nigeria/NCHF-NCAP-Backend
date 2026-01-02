<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientApplicationReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the patient_application_review table with initial data.
     */
    public function run()
    {
        DB::table('patient_application_review')->insert([
            [
                'reviewId' => 64,
                'patientUserId' => 31,
                'reviewerId' => 31,
                'reviewerRole' => 1,
                'statusId' => 1,
                'comments' => null,
                'created_at' => '2025-04-14 12:44:49',
                'updated_at' => '2025-04-14 12:44:49',
                'deleted_at' => null
            ],
            [
                'reviewId' => 75,
                'patientUserId' => 31,
                'reviewerId' => 31,
                'reviewerRole' => 1,
                'statusId' => 2,
                'comments' => null,
                'created_at' => '2025-04-14 12:44:49',
                'updated_at' => '2025-04-14 12:44:49',
                'deleted_at' => null
            ],
            [
                'reviewId' => 76,
                'patientUserId' => 31,
                'reviewerId' => 31,
                'reviewerRole' => 1,
                'statusId' => 3,
                'comments' => null,
                'created_at' => '2025-04-14 12:44:49',
                'updated_at' => '2025-04-14 12:44:49',
                'deleted_at' => null
            ],
            [
                'reviewId' => 77,
                'patientUserId' => 31,
                'reviewerId' => 31,
                'reviewerRole' => 1,
                'statusId' => 2,
                'comments' => null,
                'created_at' => '2025-04-24 16:38:09',
                'updated_at' => '2025-04-24 16:38:09',
                'deleted_at' => null
            ],
            [
                'reviewId' => 78,
                'patientUserId' => 31,
                'reviewerId' => 31,
                'reviewerRole' => 1,
                'statusId' => 2,
                'comments' => null,
                'created_at' => '2025-04-24 16:38:59',
                'updated_at' => '2025-04-24 16:38:59',
                'deleted_at' => null
            ],
            [
                'reviewId' => 79,
                'patientUserId' => 31,
                'reviewerId' => 7,
                'reviewerRole' => 2,
                'statusId' => 3,
                'comments' => null,
                'created_at' => '2025-04-24 16:50:59',
                'updated_at' => '2025-04-24 16:50:59',
                'deleted_at' => null
            ],
            [
                'reviewId' => 81,
                'patientUserId' => 31,
                'reviewerId' => 34,
                'reviewerRole' => 4,
                'statusId' => 5,
                'comments' => null,
                'created_at' => '2025-04-25 03:18:03',
                'updated_at' => '2025-04-25 03:18:03',
                'deleted_at' => null
            ],
            [
                'reviewId' => 82,
                'patientUserId' => 31,
                'reviewerId' => 34,
                'reviewerRole' => 4,
                'statusId' => 5,
                'comments' => null,
                'created_at' => '2025-04-25 07:32:31',
                'updated_at' => '2025-04-25 07:32:31',
                'deleted_at' => null
            ],
            [
                'reviewId' => 83,
                'patientUserId' => 31,
                'reviewerId' => 34,
                'reviewerRole' => 3,
                'statusId' => 4,
                'comments' => null,
                'created_at' => '2025-04-25 07:34:55',
                'updated_at' => '2025-04-25 07:34:55',
                'deleted_at' => null
            ],
            [
                'reviewId' => 84,
                'patientUserId' => 31,
                'reviewerId' => 34,
                'reviewerRole' => 3,
                'statusId' => 4,
                'comments' => null,
                'created_at' => '2025-04-25 08:04:50',
                'updated_at' => '2025-04-25 08:04:50',
                'deleted_at' => null
            ],
            [
                'reviewId' => 85,
                'patientUserId' => 31,
                'reviewerId' => 34,
                'reviewerRole' => 3,
                'statusId' => 4,
                'comments' => null,
                'created_at' => '2025-04-25 08:21:52',
                'updated_at' => '2025-04-25 08:21:52',
                'deleted_at' => null
            ],
            [
                'reviewId' => 99,
                'patientUserId' => 63,
                'reviewerId' => 63,
                'reviewerRole' => 1,
                'statusId' => 1,
                'comments' => null,
                'created_at' => '2025-12-14 03:08:17',
                'updated_at' => '2025-12-14 03:08:17',
                'deleted_at' => null
            ],
            [
                'reviewId' => 100,
                'patientUserId' => 64,
                'reviewerId' => 64,
                'reviewerRole' => 1,
                'statusId' => 1,
                'comments' => null,
                'created_at' => '2025-12-14 03:09:14',
                'updated_at' => '2025-12-14 03:09:14',
                'deleted_at' => null
            ],
            [
                'reviewId' => 101,
                'patientUserId' => 65,
                'reviewerId' => 65,
                'reviewerRole' => 1,
                'statusId' => 1,
                'comments' => null,
                'created_at' => '2025-12-14 03:13:00',
                'updated_at' => '2025-12-14 03:13:00',
                'deleted_at' => null
            ],
            [
                'reviewId' => 102,
                'patientUserId' => 66,
                'reviewerId' => 66,
                'reviewerRole' => 1,
                'statusId' => 1,
                'comments' => null,
                'created_at' => '2025-12-14 03:15:15',
                'updated_at' => '2025-12-14 03:15:15',
                'deleted_at' => null
            ],
            [
                'reviewId' => 103,
                'patientUserId' => 67,
                'reviewerId' => 67,
                'reviewerRole' => 1,
                'statusId' => 1,
                'comments' => null,
                'created_at' => '2025-12-14 03:20:53',
                'updated_at' => '2025-12-14 03:20:53',
                'deleted_at' => null
            ],
            [
                'reviewId' => 104,
                'patientUserId' => 68,
                'reviewerId' => 68,
                'reviewerRole' => 1,
                'statusId' => 1,
                'comments' => null,
                'created_at' => '2025-12-14 03:26:45',
                'updated_at' => '2025-12-14 03:26:45',
                'deleted_at' => null
            ],
            [
                'reviewId' => 124,
                'patientUserId' => 68,
                'reviewerId' => 68,
                'reviewerRole' => 1,
                'statusId' => 2,
                'comments' => null,
                'created_at' => '2025-12-14 17:37:19',
                'updated_at' => '2025-12-14 17:37:19',
                'deleted_at' => null
            ]
        ]);
    }
}