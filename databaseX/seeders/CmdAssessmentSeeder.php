<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CmdAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the cmd_assessment table with initial data.
     */
    public function run()
    {
        DB::table('cmd_assessment')->insert([
            [
                'assessmentId' => 1,
                'patientUserId' => 33,
                'comments' => 'jdjdjd',
                'status' => 6,
                'reviewerId' => 5,
                'created_at' => '2025-02-11 01:52:42',
                'updated_at' => '2025-02-11 01:52:42',
                'deleted_at' => null
            ],
            [
                'assessmentId' => 2,
                'patientUserId' => 31,
                'comments' => 'This is approved',
                'status' => 6,
                'reviewerId' => 5,
                'created_at' => '2025-02-15 21:01:55',
                'updated_at' => '2025-02-15 21:01:55',
                'deleted_at' => null
            ]
        ]);
    }
}