<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientTransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the patient_transfer table with initial data.
     */
    public function run()
    {
        DB::table('patient_transfer')->insert([
            [
                'transferId' => 2,
                'patientUserId' => 31,
                'transferringHospital' => 1,
                'transferredHospital' => 5,
                'transferringDoctor' => 7,
                'transferredDoctor' => null,
                'transferringCMD' => null,
                'transferredCMD' => null,
                'appointmentDate' => null,
                'transferringDoctorComment' => 'No new comment',
                'transferredDoctorComment' => null,
                'status' => 'pending_mdt_approval',
                'created_at' => '2025-04-15 04:03:29',
                'updated_at' => '2025-04-15 04:03:29'
            ]
        ]);
    }
}