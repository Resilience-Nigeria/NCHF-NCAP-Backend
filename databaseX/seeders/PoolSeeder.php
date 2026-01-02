<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the pool table with initial data.
     */
    public function run()
    {
        DB::table('pool')->insert([
            [
                'walletId' => 2,
                'balance' => 500000000,
                'comments' => null,
                'createdBy' => null,
                'lastUpdatedBy' => null,
                'created_at' => '2025-02-13 16:13:35',
                'updated_at' => '2025-02-18 12:20:15',
                'deleted_at' => null
            ]
        ]);
    }
}