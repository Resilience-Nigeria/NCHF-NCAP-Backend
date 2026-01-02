<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientPersonalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the patient_personal_history table with initial data.
     */
    public function run()
    {
        DB::table('patient_personal_history')->insert([
            [
                'personalHistoryId' => 2,
                'patientUserId' => 31,
                'averageMonthlyIncome' => 30000,
                'averageFeedingDaily' => 20000,
                'whoProvidesFeeding' => 'Self',
                'accomodation' => 'Yes',
                'typeOfAccomodation' => 'Rented',
                'noOfGoodSetOfClothes' => 20,
                'howAreClothesGotten' => 'I buy',
                'whyDidYouChooseHospital' => 'Proximity',
                'hospitalReceivingCare' => 4,
                'hospitalReceivingCare2' => null,
                'levelOfSpousalSpupport' => 'None',
                'otherSupport' => 'Some',
                'reviewerId' => null,
                'status' => null,
                'created_at' => '2025-02-09 12:29:57',
                'updated_at' => '2025-02-09 12:29:57',
                'deleted_at' => null
            ],
            [
                'personalHistoryId' => 4,
                'patientUserId' => 61,
                'averageMonthlyIncome' => 90,
                'averageFeedingDaily' => 90,
                'whoProvidesFeeding' => 'Spouse',
                'accomodation' => 'Other',
                'typeOfAccomodation' => 'Self-contained',
                'noOfGoodSetOfClothes' => 82,
                'howAreClothesGotten' => 'ii',
                'whyDidYouChooseHospital' => 'i',
                'hospitalReceivingCare' => null,
                'hospitalReceivingCare2' => 'Ahamdu',
                'levelOfSpousalSpupport' => 'None',
                'otherSupport' => 'io',
                'reviewerId' => null,
                'status' => null,
                'created_at' => '2025-12-13 15:51:29',
                'updated_at' => '2025-12-13 15:51:29',
                'deleted_at' => null
            ],
            [
                'personalHistoryId' => 5,
                'patientUserId' => 68,
                'averageMonthlyIncome' => 1999,
                'averageFeedingDaily' => 90,
                'whoProvidesFeeding' => 'Self',
                'accomodation' => 'Owned',
                'typeOfAccomodation' => 'Self-contained',
                'noOfGoodSetOfClothes' => 90,
                'howAreClothesGotten' => 'ii',
                'whyDidYouChooseHospital' => 'uu',
                'hospitalReceivingCare' => null,
                'hospitalReceivingCare2' => 'pp',
                'levelOfSpousalSpupport' => 'Full Support',
                'otherSupport' => 'yy',
                'reviewerId' => null,
                'status' => null,
                'created_at' => '2025-12-14 04:14:05',
                'updated_at' => '2025-12-14 04:14:05',
                'deleted_at' => null
            ]
        ]);
    }
}