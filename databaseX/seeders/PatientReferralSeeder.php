<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientReferralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the patient_referral table with initial data.
     */
    public function run()
    {
        DB::table('patient_referral')->insert([
            [
                'referralId' => 2,
                'patientUserId' => 31,
                'referringHospital' => 1,
                'referredHospital' => 1,
                'referringDoctor' => 7,
                'referredDoctor' => null,
                'referringCMD' => null,
                'referredCMD' => null,
                'appointmentDate' => null,
                'referringDoctorComment' => 'No comments bro',
                'referredDoctorComment' => null,
                'status' => 'pending_cmd_approval',
                'created_at' => '2025-02-26 03:02:26',
                'updated_at' => '2025-02-26 03:02:26'
            ],
            [
                'referralId' => 3,
                'patientUserId' => 31,
                'referringHospital' => 1,
                'referredHospital' => 1,
                'referringDoctor' => 7,
                'referredDoctor' => null,
                'referringCMD' => null,
                'referredCMD' => null,
                'appointmentDate' => null,
                'referringDoctorComment' => null,
                'referredDoctorComment' => null,
                'status' => 'pending_cmd_approval',
                'created_at' => '2025-03-11 15:21:53',
                'updated_at' => '2025-03-11 15:21:53'
            ],
            [
                'referralId' => 4,
                'patientUserId' => 31,
                'referringHospital' => 1,
                'referredHospital' => 1,
                'referringDoctor' => 7,
                'referredDoctor' => null,
                'referringCMD' => null,
                'referredCMD' => null,
                'appointmentDate' => null,
                'referringDoctorComment' => 'none',
                'referredDoctorComment' => null,
                'status' => 'pending_cmd_approval',
                'created_at' => '2025-03-17 15:49:20',
                'updated_at' => '2025-03-17 15:49:20'
            ],
            [
                'referralId' => 5,
                'patientUserId' => 31,
                'referringHospital' => 1,
                'referredHospital' => 1,
                'referringDoctor' => 7,
                'referredDoctor' => null,
                'referringCMD' => null,
                'referredCMD' => null,
                'appointmentDate' => null,
                'referringDoctorComment' => null,
                'referredDoctorComment' => null,
                'status' => 'pending_cmd_approval',
                'created_at' => '2025-03-17 15:57:18',
                'updated_at' => '2025-03-17 15:57:18'
            ],
            [
                'referralId' => 6,
                'patientUserId' => 31,
                'referringHospital' => 1,
                'referredHospital' => 1,
                'referringDoctor' => 7,
                'referredDoctor' => null,
                'referringCMD' => null,
                'referredCMD' => null,
                'appointmentDate' => null,
                'referringDoctorComment' => 'lk',
                'referredDoctorComment' => null,
                'status' => 'pending_mdt_approval',
                'created_at' => '2025-04-14 16:58:28',
                'updated_at' => '2025-04-14 16:58:28'
            ]
        ]);
    }
}