<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialWelfareSesOccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the social_welfare_ses_occupation table with initial data.
     */
    public function run()
    {
        DB::table('social_welfare_ses_occupation')->insert([
            [
                'occupationId' => 1,
                'occupationName' => 'Senior political/judicial/legislative officers, top military, heads of MDAs (CONTOPSAL)',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'occupationId' => 2,
                'occupationName' => 'Top entrepreneurs, media magnates, first-class monarchs, accomplished bloggers.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'occupationId' => 3,
                'occupationName' => 'Top civil servants (directorate), senior military, senior academics, senior politicians.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'occupationId' => 4,
                'occupationName' => 'Other professionals, managers, large-scale traders, established contractors.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'occupationId' => 5,
                'occupationName' => 'Senior civil servants (non-directorate), junior academics, senior teachers, junior military.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'occupationId' => 6,
                'occupationName' => 'Self-employed artisans, medium-scale traders, agricultural entrepreneurs.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'occupationId' => 7,
                'occupationName' => 'Intermediate civil servants, executive officers, junior teachers, local legislators.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'occupationId' => 8,
                'occupationName' => 'Technicians, employee artisans, petty contractors, non-subsistent farmers.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'occupationId' => 9,
                'occupationName' => 'Clerical officers, assistants, attendants.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'occupationId' => 10,
                'occupationName' => 'Petty traders, subsistent farmers, employee clergymen.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'occupationId' => 11,
                'occupationName' => 'Unemployed.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'occupationId' => 12,
                'occupationName' => 'Full-time housewives, students, artisan apprentices.',
                'created_at' => null,
                'updated_at' => null
            ]
        ]);
    }
}