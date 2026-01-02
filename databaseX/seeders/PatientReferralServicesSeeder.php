<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientReferralServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the patient_referral_services table with initial data.
     */
    public function run()
    {
        DB::table('patient_referral_services')->insert([
            [
                'id' => 3,
                'patientUserId' => 31,
                'hospitalId' => 1,
                'serviceId' => 9,
                'referralId' => 2,
                'comment' => null,
                'status' => null,
                'created_at' => '2025-02-26 03:02:26',
                'updated_at' => '2025-02-26 03:02:26'
            ],
            [
                'id' => 4,
                'patientUserId' => 31,
                'hospitalId' => 1,
                'serviceId' => 10,
                'referralId' => 2,
                'comment' => null,
                'status' => null,
                'created_at' => '2025-02-26 03:02:26',
                'updated_at' => '2025-02-26 03:02:26'
            ],
            [
                'id' => 5,
                'patientUserId' => 31,
                'hospitalId' => 1,
                'serviceId' => 9,
                'referralId' => 3,
                'comment' => null,
                'status' => null,
                'created_at' => '2025-03-11 15:21:53',
                'updated_at' => '2025-03-11 15:21:53'
            ],
            [
                'id' => 6,
                'patientUserId' => 31,
                'hospitalId' => 1,
                'serviceId' => 10,
                'referralId' => 3,
                'comment' => null,
                'status' => null,
                'created_at' => '2025-03-11 15:21:53',
                'updated_at' => '2025-03-11 15:21:53'
            ],
            [
                'id' => 7,
                'patientUserId' => 31,
                'hospitalId' => 1,
                'serviceId' => 9,
                'referralId' => 4,
                'comment' => null,
                'status' => null,
                'created_at' => '2025-03-17 15:49:20',
                'updated_at' => '2025-03-17 15:49:20'
            ],
            [
                'id' => 8,
                'patientUserId' => 31,
                'hospitalId' => 1,
                'serviceId' => 9,
                'referralId' => 5,
                'comment' => null,
                'status' => null,
                'created_at' => '2025-03-17 15:57:18',
                'updated_at' => '2025-03-17 15:57:18'
            ],
            [
                'id' => 9,
                'patientUserId' => 31,
                'hospitalId' => 1,
                'serviceId' => 10,
                'referralId' => 6,
                'comment' => null,
                'status' => null,
                'created_at' => '2025-04-14 16:58:28',
                'updated_at' => '2025-04-14 16:58:28'
            ]
        ]);
    }
}