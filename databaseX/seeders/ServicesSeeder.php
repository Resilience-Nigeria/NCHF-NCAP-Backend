<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the services table with initial data.
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'serviceId' => 9,
                'serviceName' => 'Consultation',
                'serviceDescription' => null,
                'serviceType' => null,
                'serviceCategory' => null,
                'serviceCost' => 10000,
                'servicePrice' => null,
                'serviceStatus' => 'available',
                'hospitalId' => 1,
                'uploadedBy' => 3,
                'created_at' => '2025-02-25 11:19:37',
                'updated_at' => '2025-02-25 11:33:50'
            ],
            [
                'serviceId' => 10,
                'serviceName' => 'Radiotherapy',
                'serviceDescription' => null,
                'serviceType' => null,
                'serviceCategory' => null,
                'serviceCost' => 20000,
                'servicePrice' => null,
                'serviceStatus' => 'available',
                'hospitalId' => 1,
                'uploadedBy' => 3,
                'created_at' => '2025-02-25 11:34:28',
                'updated_at' => '2025-02-25 11:34:28'
            ]
        ]);
    }
}