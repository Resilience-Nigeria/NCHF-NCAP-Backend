<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeopoliticalZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the geopolitical_zones table with initial data.
     */
    public function run()
    {
        DB::table('geopolitical_zones')->insert([
            [
                'zoneId' => 1,
                'zoneName' => 'NORTH CENTRAL',
                'created_at' => '2025-02-07 09:19:35',
                'updated_at' => '2025-02-07 09:19:35',
                'deleted_at' => null
            ],
            [
                'zoneId' => 2,
                'zoneName' => 'NORTH WEST',
                'created_at' => '2025-02-07 09:19:42',
                'updated_at' => '2025-02-07 09:19:42',
                'deleted_at' => null
            ],
            [
                'zoneId' => 3,
                'zoneName' => 'NORTH EAST',
                'created_at' => '2025-02-07 09:19:47',
                'updated_at' => '2025-02-07 09:19:47',
                'deleted_at' => null
            ],
            [
                'zoneId' => 4,
                'zoneName' => 'SOUTH SOUTH',
                'created_at' => '2025-02-07 09:19:58',
                'updated_at' => '2025-02-07 09:19:58',
                'deleted_at' => null
            ],
            [
                'zoneId' => 5,
                'zoneName' => 'SOUTH WEST',
                'created_at' => '2025-02-07 09:20:05',
                'updated_at' => '2025-02-07 09:20:05',
                'deleted_at' => null
            ],
            [
                'zoneId' => 6,
                'zoneName' => 'SOUTH EAST',
                'created_at' => '2025-02-07 09:20:10',
                'updated_at' => '2025-02-07 09:20:10',
                'deleted_at' => null
            ]
        ]);
    }
}