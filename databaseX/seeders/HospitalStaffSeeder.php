<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the hospital_staff table with initial data.
     */
    public function run()
    {
        DB::table('hospital_staff')->insert([
            [
                'hospitalStaffId' => 9,
                'userId' => 7,
                'hospitalId' => 1,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'hospitalStaffId' => 10,
                'userId' => 35,
                'hospitalId' => 1,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'hospitalStaffId' => 11,
                'userId' => 5,
                'hospitalId' => 1,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'hospitalStaffId' => 12,
                'userId' => 34,
                'hospitalId' => 1,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'hospitalStaffId' => 13,
                'userId' => 36,
                'hospitalId' => 1,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'hospitalStaffId' => 14,
                'userId' => 4,
                'hospitalId' => 1,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'hospitalStaffId' => 15,
                'userId' => 54,
                'hospitalId' => 1,
                'created_at' => '2025-02-16 08:26:02',
                'updated_at' => '2025-02-16 08:26:02',
                'deleted_at' => null
            ]
        ]);
    }
}