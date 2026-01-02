<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationStatusListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the application_status_list table with initial data.
     */
    public function run()
    {
        DB::table('application_status_list')->insert([
            [
                'statusId' => 1,
                'label' => 'Applying',
                'description' => 'You are currently filling your form and are yet to submit',
                'status' => null,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'statusId' => 2,
                'label' => 'Application Submitted',
                'description' => 'You have submitted your application. It is currently pending review.',
                'status' => null,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'statusId' => 3,
                'label' => 'Doctor Review',
                'description' => 'Your primary physician at your selected hospital will review your application.',
                'status' => null,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'statusId' => 4,
                'label' => 'Social Welfare Review',
                'description' => 'A social welfare staff will review your application to determine if you are indigent.',
                'status' => null,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'statusId' => 5,
                'label' => 'MDT Review',
                'description' => 'A group of professionals called a Multi-disciplinary Tumour Board will review your application.',
                'status' => null,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'statusId' => 6,
                'label' => 'CMD Review',
                'description' => 'The Chief Medical Director of the hospital will review your application.',
                'status' => null,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'statusId' => 7,
                'label' => 'Approved!',
                'description' => 'Your application has now been approved, and you can begin receiving care.',
                'status' => null,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'statusId' => 8,
                'label' => 'Rejected',
                'description' => 'We\'re sorry to notify you that your application was rejected. ',
                'status' => null,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ]
        ]);
    }
}