<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the states table with initial data.
     */
    public function run()
    {
        DB::table('states')->insert([
            [
                'stateId' => 1,
                'zoneId' => 1,
                'stateName' => 'Benue',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 2,
                'zoneId' => 1,
                'stateName' => 'Kogi',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 3,
                'zoneId' => 1,
                'stateName' => 'Kwara',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 4,
                'zoneId' => 1,
                'stateName' => 'Nasarawa',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 5,
                'zoneId' => 1,
                'stateName' => 'Niger',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 6,
                'zoneId' => 1,
                'stateName' => 'Plateau',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 7,
                'zoneId' => 1,
                'stateName' => 'Federal Capital Territory',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 8,
                'zoneId' => 2,
                'stateName' => 'Jigawa',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 9,
                'zoneId' => 2,
                'stateName' => 'Kaduna',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 10,
                'zoneId' => 2,
                'stateName' => 'Kano',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 11,
                'zoneId' => 2,
                'stateName' => 'Katsina',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 12,
                'zoneId' => 2,
                'stateName' => 'Kebbi',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 13,
                'zoneId' => 2,
                'stateName' => 'Sokoto',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 14,
                'zoneId' => 2,
                'stateName' => 'Zamfara',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 15,
                'zoneId' => 3,
                'stateName' => 'Adamawa',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 16,
                'zoneId' => 3,
                'stateName' => 'Bauchi',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 17,
                'zoneId' => 3,
                'stateName' => 'Borno',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 18,
                'zoneId' => 3,
                'stateName' => 'Gombe',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 19,
                'zoneId' => 3,
                'stateName' => 'Taraba',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 20,
                'zoneId' => 3,
                'stateName' => 'Yobe',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 21,
                'zoneId' => 4,
                'stateName' => 'Akwa Ibom',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 22,
                'zoneId' => 4,
                'stateName' => 'Bayelsa',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 23,
                'zoneId' => 4,
                'stateName' => 'Cross River',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 24,
                'zoneId' => 4,
                'stateName' => 'Delta',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 25,
                'zoneId' => 4,
                'stateName' => 'Edo',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 26,
                'zoneId' => 4,
                'stateName' => 'Rivers',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 27,
                'zoneId' => 5,
                'stateName' => 'Ekiti',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 28,
                'zoneId' => 5,
                'stateName' => 'Lagos',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 29,
                'zoneId' => 5,
                'stateName' => 'Ogun',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 30,
                'zoneId' => 5,
                'stateName' => 'Ondo',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 31,
                'zoneId' => 5,
                'stateName' => 'Osun',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 32,
                'zoneId' => 5,
                'stateName' => 'Oyo',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 33,
                'zoneId' => 6,
                'stateName' => 'Abia',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 34,
                'zoneId' => 6,
                'stateName' => 'Anambra',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 35,
                'zoneId' => 6,
                'stateName' => 'Ebonyi',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 36,
                'zoneId' => 6,
                'stateName' => 'Enugu',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'stateId' => 37,
                'zoneId' => 6,
                'stateName' => 'Imo',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ]
        ]);
    }
}