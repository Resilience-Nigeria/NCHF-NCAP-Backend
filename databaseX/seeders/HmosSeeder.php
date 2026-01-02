<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HmosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the hmos table with initial data.
     */
    public function run()
    {
        DB::table('hmos')->insert([
            [
                'hmoId' => 1,
                'hmoName' => 'Hygeia HMO Limited',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 2,
                'hmoName' => 'Total Health Trust Limited',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 3,
                'hmoName' => 'Clearline International Limited',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 4,
                'hmoName' => 'Healthcare International Limited',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 5,
                'hmoName' => 'Medi Plan Health Care Limited',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 6,
                'hmoName' => 'Multi Shield Nigeria Limited',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 7,
                'hmoName' => 'United Healthcare International Limited',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 8,
                'hmoName' => 'Premier Medicaid Ltd.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 9,
                'hmoName' => 'Ronsberger Nigeria Limited',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 10,
                'hmoName' => 'International Health Management Services Limited',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 11,
                'hmoName' => 'Expatcare Health International Ltd.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 12,
                'hmoName' => 'Songhai Health Trust Ltd.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 13,
                'hmoName' => 'Integrated Healthcare Ltd.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 14,
                'hmoName' => 'Managed Healthcare Services Ltd.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 15,
                'hmoName' => 'Princeton Health Group',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 16,
                'hmoName' => 'Maayoit Healthcare Ltd.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 17,
                'hmoName' => 'Wise Health Services Ltd.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 18,
                'hmoName' => 'Wetlands Health Services Ltd.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 19,
                'hmoName' => 'Zenith Medicare Ltd.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 20,
                'hmoName' => 'Defence Health Maintenance Ltd.',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'hmoId' => 21,
                'hmoName' => 'Markfema Nigeria Ltd.',
                'created_at' => null,
                'updated_at' => null
            ]
        ]);
    }
}