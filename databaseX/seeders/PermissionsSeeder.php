<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the permissions table with initial data.
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'permissionId' => 1,
                'permissionName' => 'Patient Application',
                'permissionSlug' => 'patient_apply',
                'created_at' => '2025-02-07 09:31:07',
                'updated_at' => '2025-02-07 09:31:07',
                'deleted_at' => null
            ],
            [
                'permissionId' => 2,
                'permissionName' => 'Track Application Status',
                'permissionSlug' => 'track_status',
                'created_at' => '2025-02-07 09:31:27',
                'updated_at' => '2025-02-07 09:31:27',
                'deleted_at' => null
            ],
            [
                'permissionId' => 3,
                'permissionName' => 'Patient Billing History',
                'permissionSlug' => 'patient_billing_history',
                'created_at' => '2025-02-07 09:31:51',
                'updated_at' => '2025-02-07 09:31:51',
                'deleted_at' => null
            ],
            [
                'permissionId' => 4,
                'permissionName' => 'Doctor Manage Patients',
                'permissionSlug' => 'doctor_manage_patients',
                'created_at' => '2025-02-07 09:34:17',
                'updated_at' => '2025-02-07 09:34:17',
                'deleted_at' => null
            ],
            [
                'permissionId' => 5,
                'permissionName' => 'Doctor Bill Patient',
                'permissionSlug' => 'doctor_bill_patient',
                'created_at' => '2025-02-07 09:34:45',
                'updated_at' => '2025-02-07 09:34:45',
                'deleted_at' => null
            ],
            [
                'permissionId' => 6,
                'permissionName' => 'Hospital Admin Manage Staff',
                'permissionSlug' => 'manage_hospital_staff',
                'created_at' => '2025-02-07 09:36:02',
                'updated_at' => '2025-02-07 09:36:02',
                'deleted_at' => null
            ],
            [
                'permissionId' => 7,
                'permissionName' => 'Hospital Admin View Billings',
                'permissionSlug' => 'hospital_admin_view_patients_billings',
                'created_at' => '2025-02-07 09:36:25',
                'updated_at' => '2025-02-07 09:36:25',
                'deleted_at' => null
            ],
            [
                'permissionId' => 8,
                'permissionName' => 'Hospital Admin Manage Patients',
                'permissionSlug' => 'hospital_admin_manage_hospital_patients',
                'created_at' => '2025-02-07 09:36:55',
                'updated_at' => '2025-02-07 09:36:55',
                'deleted_at' => null
            ],
            [
                'permissionId' => 9,
                'permissionName' => 'NICRAT ICT Manage Hospital Admins',
                'permissionSlug' => 'manage_hospital_admins',
                'created_at' => '2025-02-07 09:38:51',
                'updated_at' => '2025-02-07 09:38:51',
                'deleted_at' => null
            ],
            [
                'permissionId' => 10,
                'permissionName' => 'NICRAT ICT Manage Hospitals',
                'permissionSlug' => 'view_all_hospitals',
                'created_at' => '2025-02-07 09:39:16',
                'updated_at' => '2025-02-07 09:39:16',
                'deleted_at' => null
            ],
            [
                'permissionId' => 11,
                'permissionName' => 'NICRAT ICT Manage Patients',
                'permissionSlug' => 'view_patients',
                'created_at' => '2025-02-07 09:39:34',
                'updated_at' => '2025-02-07 09:39:34',
                'deleted_at' => null
            ],
            [
                'permissionId' => 12,
                'permissionName' => 'Doctor Manage Billings',
                'permissionSlug' => 'doctor_manage_billings',
                'created_at' => '2025-02-09 00:02:08',
                'updated_at' => '2025-02-09 00:02:08',
                'deleted_at' => null
            ],
            [
                'permissionId' => 13,
                'permissionName' => 'Doctor Manage Prescriptions',
                'permissionSlug' => 'doctor_manage_prescriptions',
                'created_at' => '2025-02-09 00:05:19',
                'updated_at' => '2025-02-09 00:05:19',
                'deleted_at' => null
            ],
            [
                'permissionId' => 14,
                'permissionName' => 'Doctor Manage Transfers',
                'permissionSlug' => 'doctor_manage_transfers',
                'created_at' => '2025-02-09 00:05:39',
                'updated_at' => '2025-02-09 00:05:39',
                'deleted_at' => null
            ],
            [
                'permissionId' => 15,
                'permissionName' => 'Social Welfare Manage Patients',
                'permissionSlug' => 'social_welfare_manage_patients',
                'created_at' => '2025-02-10 15:19:06',
                'updated_at' => '2025-02-10 15:19:06',
                'deleted_at' => null
            ],
            [
                'permissionId' => 16,
                'permissionName' => 'MDT Manage Patients',
                'permissionSlug' => 'mdt_manage_patients',
                'created_at' => '2025-02-10 23:44:05',
                'updated_at' => '2025-02-10 23:44:05',
                'deleted_at' => null
            ],
            [
                'permissionId' => 17,
                'permissionName' => 'CMD Manage Patients',
                'permissionSlug' => 'cmd_manage_patients',
                'created_at' => '2025-02-11 01:07:46',
                'updated_at' => '2025-02-11 01:07:46',
                'deleted_at' => null
            ],
            [
                'permissionId' => 18,
                'permissionName' => 'CMD Manage Billings',
                'permissionSlug' => 'cmd_manage_billings',
                'created_at' => '2025-02-11 01:08:07',
                'updated_at' => '2025-02-11 01:08:07',
                'deleted_at' => null
            ],
            [
                'permissionId' => 19,
                'permissionName' => 'NICRAT Manage Patients',
                'permissionSlug' => 'nicrat_manage_patients',
                'created_at' => '2025-02-11 01:09:01',
                'updated_at' => '2025-02-11 01:09:01',
                'deleted_at' => null
            ],
            [
                'permissionId' => 20,
                'permissionName' => 'NICRAT Manage Billings',
                'permissionSlug' => 'nicrat_manage_billings',
                'created_at' => '2025-02-11 01:09:15',
                'updated_at' => '2025-02-11 01:09:15',
                'deleted_at' => null
            ],
            [
                'permissionId' => 21,
                'permissionName' => 'DG Manage Billings',
                'permissionSlug' => 'dg_manage_billings',
                'created_at' => '2025-02-11 02:38:49',
                'updated_at' => '2025-02-11 02:38:49',
                'deleted_at' => null
            ],
            [
                'permissionId' => 22,
                'permissionName' => 'DG Manage Patients',
                'permissionSlug' => 'dg_manage_patients',
                'created_at' => '2025-02-11 02:38:59',
                'updated_at' => '2025-02-11 02:38:59',
                'deleted_at' => null
            ],
            [
                'permissionId' => 23,
                'permissionName' => 'DG Manage Billings',
                'permissionSlug' => 'dg_manage_invoices',
                'created_at' => '2025-02-11 02:39:09',
                'updated_at' => '2025-02-11 02:39:09',
                'deleted_at' => null
            ],
            [
                'permissionId' => 24,
                'permissionName' => 'DG Manage E-wallets',
                'permissionSlug' => 'dg_manage_ewallets',
                'created_at' => '2025-02-11 02:39:24',
                'updated_at' => '2025-02-11 02:39:24',
                'deleted_at' => null
            ],
            [
                'permissionId' => 25,
                'permissionName' => 'DG View Analytics',
                'permissionSlug' => 'dg_manage_analytics',
                'created_at' => '2025-02-11 02:40:12',
                'updated_at' => '2025-02-11 02:40:12',
                'deleted_at' => null
            ],
            [
                'permissionId' => 26,
                'permissionName' => 'FANDA TOP UP EWALLET',
                'permissionSlug' => 'fanda_topup_ewallet',
                'created_at' => '2025-02-13 12:14:50',
                'updated_at' => '2025-02-13 12:14:50',
                'deleted_at' => null
            ],
            [
                'permissionId' => 27,
                'permissionName' => 'FANDA VIEW HOSPITALS',
                'permissionSlug' => 'fanda_view_hospitals',
                'created_at' => '2025-02-13 12:15:32',
                'updated_at' => '2025-02-13 12:15:32',
                'deleted_at' => null
            ],
            [
                'permissionId' => 28,
                'permissionName' => 'FANDA VIEW BILLINGS',
                'permissionSlug' => 'fanda_view_billings',
                'created_at' => '2025-02-13 12:15:45',
                'updated_at' => '2025-02-13 12:15:45',
                'deleted_at' => null
            ],
            [
                'permissionId' => 29,
                'permissionName' => 'PHARMACIST VIEW BILLINGS',
                'permissionSlug' => 'pharmacist_view_billings',
                'created_at' => '2025-02-16 08:36:22',
                'updated_at' => '2025-02-16 08:36:22',
                'deleted_at' => null
            ],
            [
                'permissionId' => 30,
                'permissionName' => 'PHARMACIST VIEW PATIENTS',
                'permissionSlug' => 'pharmacist_view_patients',
                'created_at' => '2025-02-16 08:36:50',
                'updated_at' => '2025-02-16 08:36:50',
                'deleted_at' => null
            ],
            [
                'permissionId' => 31,
                'permissionName' => 'PHARMACIST BILL PATIENT',
                'permissionSlug' => 'pharmacist_bill_patient',
                'created_at' => '2025-02-16 08:37:21',
                'updated_at' => '2025-02-16 08:37:21',
                'deleted_at' => null
            ],
            [
                'permissionId' => 32,
                'permissionName' => 'PHARMACIST MANAGE PRESCRIPTION',
                'permissionSlug' => 'pharmacist_manage_prescription',
                'created_at' => '2025-02-16 09:14:39',
                'updated_at' => '2025-02-16 09:14:39',
                'deleted_at' => null
            ],
            [
                'permissionId' => 33,
                'permissionName' => 'MDT Manage Transfers',
                'permissionSlug' => 'mdt_manage_transfers',
                'created_at' => '2025-02-09 00:05:39',
                'updated_at' => '2025-02-09 00:05:39',
                'deleted_at' => null
            ]
        ]);
    }
}