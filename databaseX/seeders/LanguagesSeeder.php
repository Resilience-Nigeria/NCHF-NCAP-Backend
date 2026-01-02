<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the languages table with initial data.
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
                'languageId' => 1,
                'languageName' => 'English',
                'salutation' => 'Hello',
                'welcomeMessage' => 'thanks for registering on Cancer Health Fund! Your temporary password is:',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'languageId' => 2,
                'languageName' => 'Yoruba',
                'salutation' => 'Salaamu ale',
                'welcomeMessage' => 'ope wa fun iforukosile re lori Cancer Health Fund! Oro asina igba die re ni:',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'languageId' => 3,
                'languageName' => 'Hausa',
                'salutation' => 'Salam',
                'welcomeMessage' => 'godiya muke da yin rijista a Cancer Health Fund! Kalmar sirri ta wucin gadi ita ce:',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ],
            [
                'languageId' => 4,
                'languageName' => 'Igbo',
                'salutation' => 'Ndewo',
                'welcomeMessage' => 'daalu maka ndebanye aha gi na Cancer Health Fund! Okwuntughe nwa oge gi bu:',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null
            ]
        ]);
    }
}