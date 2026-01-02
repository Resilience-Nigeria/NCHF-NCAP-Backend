<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientFamilyHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the patient_family_history table with initial data.
     */
    public function run()
    {
        DB::table('patient_family_history')->insert([
            [
                'familyHistoryId' => 2,
                'patientUserId' => 31,
                'familySetupSize' => 4,
                'birthOrder' => 1,
                'fathersEducationalLevel' => 'NCE',
                'mothersEducationalLevel' => 'Diploma',
                'fathersOccupation' => 'Teacher',
                'mothersOccupation' => 'Fisher',
                'levelOfFamilyCare' => 'None',
                'familyMonthlyIncome' => 40000,
                'reviewerId' => null,
                'status' => null,
                'created_at' => '2025-02-09 12:29:57',
                'updated_at' => '2025-02-09 12:29:57',
                'deleted_at' => null
            ],
            [
                'familyHistoryId' => 3,
                'patientUserId' => 33,
                'familySetupSize' => 10,
                'birthOrder' => 1,
                'fathersEducationalLevel' => 'NCE',
                'mothersEducationalLevel' => 'HND',
                'fathersOccupation' => 'Teaching',
                'mothersOccupation' => 'Fishing',
                'levelOfFamilyCare' => 'None',
                'familyMonthlyIncome' => 20000,
                'reviewerId' => null,
                'status' => null,
                'created_at' => '2025-02-10 12:58:59',
                'updated_at' => '2025-02-10 12:58:59',
                'deleted_at' => null
            ],
            [
                'familyHistoryId' => 4,
                'patientUserId' => 61,
                'familySetupSize' => 84,
                'birthOrder' => 2,
                'fathersEducationalLevel' => 'None',
                'mothersEducationalLevel' => 'None',
                'fathersOccupation' => 'Accountant',
                'mothersOccupation' => 'Economist',
                'levelOfFamilyCare' => 'None',
                'familyMonthlyIncome' => 86,
                'reviewerId' => null,
                'status' => null,
                'created_at' => '2025-12-13 15:51:29',
                'updated_at' => '2025-12-13 15:51:29',
                'deleted_at' => null
            ],
            [
                'familyHistoryId' => 5,
                'patientUserId' => 68,
                'familySetupSize' => 89,
                'birthOrder' => 77,
                'fathersEducationalLevel' => 'PhD',
                'mothersEducationalLevel' => 'Masters Degree',
                'fathersOccupation' => 'Dentist',
                'mothersOccupation' => 'Economist',
                'levelOfFamilyCare' => 'None',
                'familyMonthlyIncome' => 88,
                'reviewerId' => null,
                'status' => null,
                'created_at' => '2025-12-14 04:14:05',
                'updated_at' => '2025-12-14 04:14:05',
                'deleted_at' => null
            ]
        ]);
    }
}