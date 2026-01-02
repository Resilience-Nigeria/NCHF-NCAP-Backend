<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NicratAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the nicrat_assessment table with initial data.
     */
    public function run()
    {
        DB::table('nicrat_assessment')->insert([
            [
                'assessmentId' => 1,
                'patientUserId' => 33,
                'comments' => 'I approve',
                'status' => 7,
                'reviewerId' => 37,
                'created_at' => '2025-02-11 03:12:15',
                'updated_at' => '2025-02-11 03:12:15',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 2,
                'patientUserId' => 31,
                'comments' => 'Approved',
                'status' => 7,
                'reviewerId' => 37,
                'created_at' => '2025-02-15 21:07:43',
                'updated_at' => '2025-02-15 21:07:43',
                'deleted_at' => null
            ]
        ]);
    }
}