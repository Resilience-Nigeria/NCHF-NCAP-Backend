<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the role_permissions table with initial data.
     */
    public function run()
    {
        DB::table('role_permissions')->insert([
            [
                'rolePermissionId' => 1,
                'roleId' => 1,
                'permissionId' => 1,
                'created_at' => '2025-02-07 09:32:15',
                'updated_at' => '2025-02-07 09:32:15',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 2,
                'roleId' => 1,
                'permissionId' => 2,
                'created_at' => '2025-02-07 09:32:21',
                'updated_at' => '2025-02-07 09:32:21',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 3,
                'roleId' => 1,
                'permissionId' => 3,
                'created_at' => '2025-02-07 09:32:25',
                'updated_at' => '2025-02-07 09:32:25',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 4,
                'roleId' => 2,
                'permissionId' => 4,
                'created_at' => '2025-02-07 09:35:02',
                'updated_at' => '2025-02-07 09:35:02',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 5,
                'roleId' => 2,
                'permissionId' => 5,
                'created_at' => '2025-02-07 09:35:07',
                'updated_at' => '2025-02-07 09:35:07',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 6,
                'roleId' => 6,
                'permissionId' => 6,
                'created_at' => '2025-02-07 09:37:32',
                'updated_at' => '2025-02-07 09:37:32',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 7,
                'roleId' => 6,
                'permissionId' => 7,
                'created_at' => '2025-02-07 09:37:37',
                'updated_at' => '2025-02-07 09:37:37',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 8,
                'roleId' => 6,
                'permissionId' => 8,
                'created_at' => '2025-02-07 09:37:41',
                'updated_at' => '2025-02-07 09:37:41',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 9,
                'roleId' => 10,
                'permissionId' => 9,
                'created_at' => '2025-02-07 09:40:13',
                'updated_at' => '2025-02-07 09:40:13',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 10,
                'roleId' => 10,
                'permissionId' => 10,
                'created_at' => '2025-02-07 09:40:18',
                'updated_at' => '2025-02-07 09:40:18',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 11,
                'roleId' => 10,
                'permissionId' => 11,
                'created_at' => '2025-02-07 09:40:23',
                'updated_at' => '2025-02-07 09:40:23',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 12,
                'roleId' => 12,
                'permissionId' => 1,
                'created_at' => '2025-02-07 09:40:48',
                'updated_at' => '2025-02-07 09:40:48',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 13,
                'roleId' => 12,
                'permissionId' => 2,
                'created_at' => '2025-02-07 09:40:52',
                'updated_at' => '2025-02-07 09:40:52',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 14,
                'roleId' => 12,
                'permissionId' => 3,
                'created_at' => '2025-02-07 09:41:00',
                'updated_at' => '2025-02-07 09:41:00',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 15,
                'roleId' => 12,
                'permissionId' => 4,
                'created_at' => '2025-02-07 09:41:04',
                'updated_at' => '2025-02-07 09:41:04',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 16,
                'roleId' => 12,
                'permissionId' => 5,
                'created_at' => '2025-02-07 09:41:08',
                'updated_at' => '2025-02-07 09:41:08',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 17,
                'roleId' => 12,
                'permissionId' => 6,
                'created_at' => '2025-02-07 09:41:13',
                'updated_at' => '2025-02-07 09:41:13',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 18,
                'roleId' => 12,
                'permissionId' => 7,
                'created_at' => '2025-02-07 09:41:19',
                'updated_at' => '2025-02-07 09:41:19',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 19,
                'roleId' => 12,
                'permissionId' => 8,
                'created_at' => '2025-02-07 09:41:23',
                'updated_at' => '2025-02-07 09:41:23',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 20,
                'roleId' => 12,
                'permissionId' => 9,
                'created_at' => '2025-02-07 09:41:28',
                'updated_at' => '2025-02-07 09:41:28',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 21,
                'roleId' => 12,
                'permissionId' => 10,
                'created_at' => '2025-02-07 09:41:32',
                'updated_at' => '2025-02-07 09:41:32',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 22,
                'roleId' => 12,
                'permissionId' => 11,
                'created_at' => '2025-02-07 09:42:01',
                'updated_at' => '2025-02-07 09:42:01',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 23,
                'roleId' => 2,
                'permissionId' => 12,
                'created_at' => '2025-02-09 00:06:12',
                'updated_at' => '2025-02-09 00:06:12',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 24,
                'roleId' => 2,
                'permissionId' => 13,
                'created_at' => '2025-02-09 00:06:18',
                'updated_at' => '2025-02-09 00:06:18',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 25,
                'roleId' => 2,
                'permissionId' => 14,
                'created_at' => '2025-02-09 00:06:24',
                'updated_at' => '2025-02-09 00:06:24',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 26,
                'roleId' => 3,
                'permissionId' => 15,
                'created_at' => '2025-02-10 15:34:28',
                'updated_at' => '2025-02-10 15:34:28',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 27,
                'roleId' => 4,
                'permissionId' => 16,
                'created_at' => '2025-02-10 23:44:47',
                'updated_at' => '2025-02-10 23:44:47',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 28,
                'roleId' => 7,
                'permissionId' => 17,
                'created_at' => '2025-02-11 01:09:28',
                'updated_at' => '2025-02-11 01:09:28',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 29,
                'roleId' => 7,
                'permissionId' => 18,
                'created_at' => '2025-02-11 01:09:33',
                'updated_at' => '2025-02-11 01:09:33',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 30,
                'roleId' => 11,
                'permissionId' => 21,
                'created_at' => '2025-02-11 02:40:59',
                'updated_at' => '2025-02-11 02:40:59',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 31,
                'roleId' => 11,
                'permissionId' => 22,
                'created_at' => '2025-02-11 02:41:04',
                'updated_at' => '2025-02-11 02:41:04',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 32,
                'roleId' => 11,
                'permissionId' => 23,
                'created_at' => '2025-02-11 02:41:08',
                'updated_at' => '2025-02-11 02:41:08',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 33,
                'roleId' => 11,
                'permissionId' => 24,
                'created_at' => '2025-02-11 02:41:13',
                'updated_at' => '2025-02-11 02:41:13',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 34,
                'roleId' => 11,
                'permissionId' => 25,
                'created_at' => '2025-02-11 02:41:18',
                'updated_at' => '2025-02-11 02:41:18',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 35,
                'roleId' => 9,
                'permissionId' => 26,
                'created_at' => '2025-02-13 12:16:43',
                'updated_at' => '2025-02-13 12:16:43',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 36,
                'roleId' => 9,
                'permissionId' => 27,
                'created_at' => '2025-02-13 12:16:47',
                'updated_at' => '2025-02-13 12:16:47',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 37,
                'roleId' => 9,
                'permissionId' => 28,
                'created_at' => '2025-02-13 12:16:55',
                'updated_at' => '2025-02-13 12:16:55',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 38,
                'roleId' => 13,
                'permissionId' => 29,
                'created_at' => '2025-02-16 08:38:36',
                'updated_at' => '2025-02-16 08:38:36',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 39,
                'roleId' => 13,
                'permissionId' => 30,
                'created_at' => '2025-02-16 08:38:42',
                'updated_at' => '2025-02-16 08:38:42',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 40,
                'roleId' => 13,
                'permissionId' => 31,
                'created_at' => '2025-02-16 08:38:46',
                'updated_at' => '2025-02-16 08:38:46',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 41,
                'roleId' => 13,
                'permissionId' => 32,
                'created_at' => '2025-02-16 09:14:50',
                'updated_at' => '2025-02-16 09:14:50',
                'deleted_at' => null
            ],
            [
                'rolePermissionId' => 42,
                'roleId' => 4,
                'permissionId' => 33,
                'created_at' => '2025-02-09 00:06:24',
                'updated_at' => '2025-02-09 00:06:24',
                'deleted_at' => null
            ]
        ]);
    }
}