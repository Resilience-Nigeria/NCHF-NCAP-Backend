<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CancersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the cancers table with initial data.
     */
    public function run()
    {
        DB::table('cancers')->insert([
            [
                'cancerId' => 1,
                'cancerName' => 'Leukemia',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'cancerId' => 2,
                'cancerName' => 'Nephroblastoma',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'cancerId' => 3,
                'cancerName' => 'Rabdosarcoma',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'cancerId' => 4,
                'cancerName' => 'Neuroblatoma',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'cancerId' => 5,
                'cancerName' => 'Retinoblastoma',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'cancerId' => 6,
                'cancerName' => 'Nasopharyngeal Carcinoma',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ]
        ]);
    }
}