<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialWelfareSesQualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the social_welfare_ses_qualification table with initial data.
     */
    public function run()
    {
        DB::table('social_welfare_ses_qualification')->insert([
            [
                'qualificationId' => 1,
                'qualificationName' => 'Postgraduate (Masters, PhD)',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'qualificationId' => 2,
                'qualificationName' => 'University Degree',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'qualificationId' => 3,
                'qualificationName' => 'Post-secondary (Diploma, Certificate)',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'qualificationId' => 4,
                'qualificationName' => 'Secondary Education',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'qualificationId' => 5,
                'qualificationName' => 'Primary Education',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'qualificationId' => 6,
                'qualificationName' => 'No Formal Education',
                'created_at' => null,
                'updated_at' => null
            ]
        ]);
    }
}