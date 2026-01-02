<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSocialConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the patient_social_condition table with initial data.
     */
    public function run()
    {
        DB::table('patient_social_condition')->insert([
            [
                'socialConditionId' => 2,
                'patientUserId' => 31,
                'runningWater' => 'yes',
                'toiletType' => 'flush',
                'powerSupply' => 'intermittent',
                'meansOfTransport' => 'public',
                'mobilePhone' => 'yes',
                'howPhoneIsRecharged' => null,
                'status' => null,
                'reviewerId' => null,
                'created_at' => '2025-02-09 12:29:57',
                'updated_at' => '2025-02-09 12:29:57',
                'deleted_at' => null
            ],
            [
                'socialConditionId' => 3,
                'patientUserId' => 33,
                'runningWater' => 'yes',
                'toiletType' => 'flush',
                'powerSupply' => 'constant',
                'meansOfTransport' => 'public',
                'mobilePhone' => 'yes',
                'howPhoneIsRecharged' => 2,
                'status' => null,
                'reviewerId' => null,
                'created_at' => '2025-02-10 12:58:59',
                'updated_at' => '2025-02-10 12:58:59',
                'deleted_at' => null
            ],
            [
                'socialConditionId' => 4,
                'patientUserId' => 61,
                'runningWater' => 'Yes',
                'toiletType' => 'Open Defecation',
                'powerSupply' => 'Constant',
                'meansOfTransport' => 'Private Transport',
                'mobilePhone' => 'Yes',
                'howPhoneIsRecharged' => 'Recharged by others',
                'status' => null,
                'reviewerId' => null,
                'created_at' => '2025-12-13 15:52:24',
                'updated_at' => '2025-12-13 15:52:24',
                'deleted_at' => null
            ],
            [
                'socialConditionId' => 5,
                'patientUserId' => 68,
                'runningWater' => 'Yes',
                'toiletType' => 'Flush Toilet',
                'powerSupply' => 'Intermittent',
                'meansOfTransport' => 'Public Transport',
                'mobilePhone' => 'Yes',
                'howPhoneIsRecharged' => 'Self',
                'status' => null,
                'reviewerId' => null,
                'created_at' => '2025-12-14 04:14:05',
                'updated_at' => '2025-12-14 04:14:05',
                'deleted_at' => null
            ]
        ]);
    }
}