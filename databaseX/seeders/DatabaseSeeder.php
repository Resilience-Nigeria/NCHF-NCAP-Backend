<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            ApplicationStatusListSeeder::class,
            BillingsSeeder::class,
            CancersSeeder::class,
            CmdAssessmentSeeder::class,
            DoctorAssessmentSeeder::class,
            EWalletsSeeder::class,
            EWalletTransactionsSeeder::class,
            GeopoliticalZonesSeeder::class,
            HmosSeeder::class,
            HospitalsSeeder::class,
            HospitalStaffSeeder::class,
            HubsSeeder::class,
            InventorySeeder::class,
            JobsSeeder::class,
            LanguagesSeeder::class,
            MdtAssessmentSeeder::class,
            NicratAssessmentSeeder::class,
            PatientsSeeder::class,
            PatientApplicationReviewSeeder::class,
            PatientFamilyHistorySeeder::class,
            PatientPersonalHistorySeeder::class,
            PatientReferralSeeder::class,
            PatientReferralServicesSeeder::class,
            PatientSocialConditionSeeder::class,
            PatientTransferSeeder::class,
            PermissionsSeeder::class,
            PersonalAccessTokensSeeder::class,
            PoolSeeder::class,
            PrescriptionsSeeder::class,
            PrescriptionItemsSeeder::class,
            ProductsSeeder::class,
            RefreshTokensSeeder::class,
            RejectedPatientsSeeder::class,
            RolesSeeder::class,
            RolePermissionsSeeder::class,
            ServicesSeeder::class,
            SocialWelfareAssessmentSeeder::class,
            SocialWelfareSesOccupationSeeder::class,
            SocialWelfareSesQualificationSeeder::class,
            StatesSeeder::class,
            SubhubsSeeder::class,
            UsersSeeder::class
        ]);
    }
}