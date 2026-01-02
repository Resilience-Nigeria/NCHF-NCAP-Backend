<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubhubsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the subhubs table with initial data.
     */
    public function run()
    {
        DB::table('subhubs')->insert([
            [
                'subhubId' => 2,
                'hubId' => 1,
                'hospitalId' => 2,
                'subhubName' => null,
                'subhubType' => null,
                'subhubCode' => null,
                'status' => null,
                'stateId' => 10,
                'created_at' => '2025-02-12 15:38:29',
                'updated_at' => '2025-02-12 15:38:29',
                'deleted_at' => null
            ],
            [
                'subhubId' => 3,
                'hubId' => 4,
                'hospitalId' => 7,
                'subhubName' => null,
                'subhubType' => null,
                'subhubCode' => null,
                'status' => null,
                'stateId' => 2,
                'created_at' => '2025-02-17 00:41:45',
                'updated_at' => '2025-02-17 00:41:45',
                'deleted_at' => null
            ]
        ]);
    }
}