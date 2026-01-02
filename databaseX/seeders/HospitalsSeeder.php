<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the hospitals table with initial data.
     */
    public function run()
    {
        DB::table('hospitals')->insert([
            [
                'hospitalId' => 1,
                'hospitalName' => 'Ahmadu Bello University Teaching Hospital',
                'hospitalShortName' => 'ABUTH',
                'address' => 'Zaria',
                'phone' => null,
                'email' => null,
                'website' => null,
                'stateId' => 9,
                'hospitalCode' => null,
                'hospitalType' => 'hub',
                'hospitalAdmin' => null,
                'hospitalCMD' => null,
                'status' => null,
                'created_at' => '2025-02-12 15:37:16',
                'updated_at' => '2025-02-12 15:37:16',
                'deleted_at' => null
            ],
            [
                'hospitalId' => 2,
                'hospitalName' => 'Aminu Kano Teacing Hospital',
                'hospitalShortName' => 'AKTH',
                'address' => 'Kano',
                'phone' => null,
                'email' => null,
                'website' => null,
                'stateId' => 10,
                'hospitalCode' => null,
                'hospitalType' => 'subhub',
                'hospitalAdmin' => null,
                'hospitalCMD' => null,
                'status' => null,
                'created_at' => '2025-02-12 15:38:29',
                'updated_at' => '2025-02-12 15:38:29',
                'deleted_at' => null
            ],
            [
                'hospitalId' => 3,
                'hospitalName' => 'Kano State University Teaching Hospital',
                'hospitalShortName' => 'KSUTH',
                'address' => 'Kano',
                'phone' => null,
                'email' => null,
                'website' => null,
                'stateId' => 10,
                'hospitalCode' => null,
                'hospitalType' => 'cluster',
                'hospitalAdmin' => null,
                'hospitalCMD' => null,
                'status' => null,
                'created_at' => '2025-02-12 15:39:42',
                'updated_at' => '2025-02-12 15:39:42',
                'deleted_at' => null
            ],
            [
                'hospitalId' => 5,
                'hospitalName' => 'National Hospital Abuja',
                'hospitalShortName' => 'NHA',
                'address' => 'Abuja',
                'phone' => null,
                'email' => null,
                'website' => null,
                'stateId' => 7,
                'hospitalCode' => null,
                'hospitalType' => 'hub',
                'hospitalAdmin' => null,
                'hospitalCMD' => null,
                'status' => null,
                'created_at' => '2025-02-13 14:33:26',
                'updated_at' => '2025-02-13 14:33:26',
                'deleted_at' => null
            ],
            [
                'hospitalId' => 6,
                'hospitalName' => 'University College Hospital',
                'hospitalShortName' => 'UCH',
                'address' => 'Ibadan',
                'phone' => null,
                'email' => null,
                'website' => null,
                'stateId' => 32,
                'hospitalCode' => null,
                'hospitalType' => 'hub',
                'hospitalAdmin' => null,
                'hospitalCMD' => null,
                'status' => null,
                'created_at' => '2025-02-17 00:35:36',
                'updated_at' => '2025-02-17 00:35:36',
                'deleted_at' => null
            ],
            [
                'hospitalId' => 7,
                'hospitalName' => 'Federal Medical Center Lokoja',
                'hospitalShortName' => 'FMCLOK',
                'address' => 'Lokoja',
                'phone' => null,
                'email' => null,
                'website' => null,
                'stateId' => 2,
                'hospitalCode' => null,
                'hospitalType' => 'subhub',
                'hospitalAdmin' => null,
                'hospitalCMD' => null,
                'status' => null,
                'created_at' => '2025-02-17 00:41:45',
                'updated_at' => '2025-02-17 00:41:45',
                'deleted_at' => null
            ]
        ]);
    }
}