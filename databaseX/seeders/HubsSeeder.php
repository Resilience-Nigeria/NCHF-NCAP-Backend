<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HubsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the hubs table with initial data.
     */
    public function run()
    {
        DB::table('hubs')->insert([
            [
                'hubId' => 1,
                'hospitalId' => 1,
                'hubName' => 'ABUTH',
                'hubCode' => null,
                'hubType' => null,
                'status' => 'active',
                'stateId' => 9,
                'created_at' => '2025-02-12 15:37:16',
                'updated_at' => '2025-02-12 15:37:16',
                'deleted_at' => null
            ],
            [
                'hubId' => 4,
                'hospitalId' => 5,
                'hubName' => 'NHA',
                'hubCode' => null,
                'hubType' => null,
                'status' => null,
                'stateId' => 7,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'hubId' => 5,
                'hospitalId' => 6,
                'hubName' => 'UCH',
                'hubCode' => null,
                'hubType' => null,
                'status' => 'active',
                'stateId' => 32,
                'created_at' => '2025-02-17 00:35:36',
                'updated_at' => '2025-02-17 00:35:36',
                'deleted_at' => null
            ]
        ]);
    }
}