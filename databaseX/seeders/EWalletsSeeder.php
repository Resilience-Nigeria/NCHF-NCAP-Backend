<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EWalletsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the e_wallets table with initial data.
     */
    public function run()
    {
        DB::table('e_wallets')->insert([
            [
                'walletId' => 1,
                'hospitalId' => 5,
                'balance' => 100000000,
                'comments' => 'NHA funding',
                'createdBy' => null,
                'lastUpdatedBy' => 41,
                'created_at' => '2025-02-13 14:33:26',
                'updated_at' => '2025-02-15 14:39:01',
                'deleted_at' => null
            ],
            [
                'walletId' => 2,
                'hospitalId' => 1,
                'balance' => 99315000,
                'comments' => null,
                'createdBy' => null,
                'lastUpdatedBy' => 41,
                'created_at' => '2025-02-13 14:33:26',
                'updated_at' => '2025-02-18 17:13:36',
                'deleted_at' => null
            ],
            [
                'walletId' => 3,
                'hospitalId' => 6,
                'balance' => 100010000,
                'comments' => null,
                'createdBy' => 3,
                'lastUpdatedBy' => 41,
                'created_at' => '2025-02-17 00:35:36',
                'updated_at' => '2025-02-18 12:17:11',
                'deleted_at' => null
            ]
        ]);
    }
}