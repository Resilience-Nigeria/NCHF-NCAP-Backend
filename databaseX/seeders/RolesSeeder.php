<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the roles table with initial data.
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'roleId' => 1,
                'roleName' => 'PATIENT',
                'created_at' => '2025-02-07 09:11:21',
                'updated_at' => '2025-02-07 09:11:21',
                'deleted_at' => null,
                'roleType' => null
            ],
            [
                'roleId' => 2,
                'roleName' => 'DOCTOR',
                'created_at' => '2025-02-07 09:11:29',
                'updated_at' => '2025-02-07 09:11:29',
                'deleted_at' => null,
                'roleType' => 'HOSPITAL'
            ],
            [
                'roleId' => 3,
                'roleName' => 'SOCIAL WELFARE',
                'created_at' => '2025-02-07 09:11:37',
                'updated_at' => '2025-02-07 09:11:37',
                'deleted_at' => null,
                'roleType' => 'HOSPITAL'
            ],
            [
                'roleId' => 4,
                'roleName' => 'MDT',
                'created_at' => '2025-02-07 09:13:57',
                'updated_at' => '2025-02-07 09:13:57',
                'deleted_at' => null,
                'roleType' => 'HOSPITAL'
            ],
            [
                'roleId' => 5,
                'roleName' => 'OTHER HOSPITAL STAFF',
                'created_at' => '2025-02-07 09:14:08',
                'updated_at' => '2025-02-07 09:14:08',
                'deleted_at' => null,
                'roleType' => null
            ],
            [
                'roleId' => 6,
                'roleName' => 'HOSPITAL ADMIN',
                'created_at' => '2025-02-07 09:14:33',
                'updated_at' => '2025-02-07 09:14:33',
                'deleted_at' => null,
                'roleType' => null
            ],
            [
                'roleId' => 7,
                'roleName' => 'CMD',
                'created_at' => '2025-02-07 09:14:54',
                'updated_at' => '2025-02-07 09:14:54',
                'deleted_at' => null,
                'roleType' => null
            ],
            [
                'roleId' => 8,
                'roleName' => 'NICRAT DESK',
                'created_at' => '2025-02-07 09:15:02',
                'updated_at' => '2025-02-07 09:15:02',
                'deleted_at' => null,
                'roleType' => 'NICRAT'
            ],
            [
                'roleId' => 9,
                'roleName' => 'NICRAT F&A',
                'created_at' => '2025-02-07 09:15:13',
                'updated_at' => '2025-02-07 09:15:13',
                'deleted_at' => null,
                'roleType' => 'NICRAT'
            ],
            [
                'roleId' => 10,
                'roleName' => 'NICRAT ICT',
                'created_at' => '2025-02-07 09:15:35',
                'updated_at' => '2025-02-07 09:15:35',
                'deleted_at' => null,
                'roleType' => 'NICRAT'
            ],
            [
                'roleId' => 11,
                'roleName' => 'NICRAT DG',
                'created_at' => '2025-02-07 09:15:39',
                'updated_at' => '2025-02-07 09:15:39',
                'deleted_at' => null,
                'roleType' => 'NICRAT'
            ],
            [
                'roleId' => 12,
                'roleName' => 'SUPER ADMIN',
                'created_at' => '2025-02-07 09:15:53',
                'updated_at' => '2025-02-07 09:15:53',
                'deleted_at' => null,
                'roleType' => null
            ],
            [
                'roleId' => 13,
                'roleName' => 'PHARMACIST',
                'created_at' => '2025-02-07 11:20:31',
                'updated_at' => '2025-02-07 11:20:31',
                'deleted_at' => null,
                'roleType' => 'HOSPITAL'
            ],
            [
                'roleId' => 14,
                'roleName' => 'NURSE',
                'created_at' => '2025-02-07 11:20:38',
                'updated_at' => '2025-02-07 11:20:38',
                'deleted_at' => null,
                'roleType' => 'HOSPITAL'
            ]
        ]);
    }
}