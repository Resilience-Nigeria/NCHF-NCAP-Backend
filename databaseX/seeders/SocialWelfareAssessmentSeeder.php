<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialWelfareAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the social_welfare_assessment table with initial data.
     */
    public function run()
    {
        DB::table('social_welfare_assessment')->insert([
            [
                'assessmentId' => 3,
                'patientUserId' => 31,
                'appearance' => 'good',
                'bmi' => 2,
                'commentOnHome' => 'good to',
                'commentOnEnvironment' => 'Not bad',
                'commentOnFamily' => 'None',
                'generalComment' => 'Weldone',
                'parent1Education' => 4,
                'parent1Occupation' => 12,
                'parent2Education' => null,
                'parent2Occupation' => null,
                'useSecondParent' => 0,
                'sesResult' => 'SES Classification: Lower (High) - Score: 5',
                'status' => 4,
                'reviewerId' => 34,
                'created_at' => '2025-04-25 08:21:52',
                'updated_at' => '2025-04-25 08:21:52',
                'deleted_at' => null
            ]
        ]);
    }
}