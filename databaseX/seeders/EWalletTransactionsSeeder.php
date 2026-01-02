<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EWalletTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the e_wallet_transactions table with initial data.
     */
    public function run()
    {
        DB::table('e_wallet_transactions')->insert([
            [
                'transactionId' => 1,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 99999996,
                'transactionType' => 'credit',
                'transactionReference' => null,
                'reason' => 'Ewallet top-up',
                'initiatorId' => 41,
                'created_at' => '2025-02-13 16:25:01',
                'updated_at' => '2025-02-13 16:25:01',
                'deleted_at' => null
            ],
            [
                'transactionId' => 2,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 4,
                'transactionType' => 'credit',
                'transactionReference' => null,
                'reason' => 'Ewallet top-up',
                'initiatorId' => 41,
                'created_at' => '2025-02-13 16:26:08',
                'updated_at' => '2025-02-13 16:26:08',
                'deleted_at' => null
            ],
            [
                'transactionId' => 3,
                'walletId' => 1,
                'hospitalId' => 5,
                'amount' => 100000000,
                'transactionType' => 'credit',
                'transactionReference' => null,
                'reason' => 'Ewallet top-up',
                'initiatorId' => 41,
                'created_at' => '2025-02-15 14:39:01',
                'updated_at' => '2025-02-15 14:39:01',
                'deleted_at' => null
            ],
            [
                'transactionId' => 8,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 50000,
                'transactionType' => 'debit',
                'transactionReference' => '0I5517053590',
                'reason' => 'Patient billing',
                'initiatorId' => 54,
                'created_at' => '2025-02-16 17:17:07',
                'updated_at' => '2025-02-16 17:17:07',
                'deleted_at' => null
            ],
            [
                'transactionId' => 9,
                'walletId' => 2,
                'hospitalId' => null,
                'amount' => 500000000,
                'transactionType' => 'credit',
                'transactionReference' => null,
                'reason' => 'Pool account top-up',
                'initiatorId' => 41,
                'created_at' => '2025-02-18 10:09:43',
                'updated_at' => '2025-02-18 10:09:43',
                'deleted_at' => null
            ],
            [
                'transactionId' => 10,
                'walletId' => 3,
                'hospitalId' => 6,
                'amount' => 99999995,
                'transactionType' => 'credit',
                'transactionReference' => null,
                'reason' => 'Ewallet top-up',
                'initiatorId' => 41,
                'created_at' => '2025-02-18 11:48:59',
                'updated_at' => '2025-02-18 11:48:59',
                'deleted_at' => null
            ],
            [
                'transactionId' => 11,
                'walletId' => 3,
                'hospitalId' => 6,
                'amount' => 1,
                'transactionType' => 'credit',
                'transactionReference' => null,
                'reason' => 'Ewallet top-up',
                'initiatorId' => 41,
                'created_at' => '2025-02-18 11:50:21',
                'updated_at' => '2025-02-18 11:50:21',
                'deleted_at' => null
            ],
            [
                'transactionId' => 12,
                'walletId' => 3,
                'hospitalId' => 6,
                'amount' => 4,
                'transactionType' => 'credit',
                'transactionReference' => null,
                'reason' => 'Ewallet top-up',
                'initiatorId' => 41,
                'created_at' => '2025-02-18 11:50:33',
                'updated_at' => '2025-02-18 11:50:33',
                'deleted_at' => null
            ],
            [
                'transactionId' => 13,
                'walletId' => 3,
                'hospitalId' => 6,
                'amount' => 10000,
                'transactionType' => 'credit',
                'transactionReference' => null,
                'reason' => 'Ewallet top-up',
                'initiatorId' => 41,
                'created_at' => '2025-02-18 12:17:11',
                'updated_at' => '2025-02-18 12:17:11',
                'deleted_at' => null
            ],
            [
                'transactionId' => 14,
                'walletId' => 2,
                'hospitalId' => null,
                'amount' => 10000,
                'transactionType' => 'credit',
                'transactionReference' => null,
                'reason' => 'Pool account top-up',
                'initiatorId' => 41,
                'created_at' => '2025-02-18 12:17:35',
                'updated_at' => '2025-02-18 12:17:35',
                'deleted_at' => null
            ],
            [
                'transactionId' => 15,
                'walletId' => 2,
                'hospitalId' => null,
                'amount' => 50000,
                'transactionType' => 'credit',
                'transactionReference' => null,
                'reason' => 'Pool account top-up',
                'initiatorId' => 41,
                'created_at' => '2025-02-18 12:19:59',
                'updated_at' => '2025-02-18 12:19:59',
                'deleted_at' => null
            ],
            [
                'transactionId' => 16,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 50000,
                'transactionType' => 'credit',
                'transactionReference' => null,
                'reason' => 'Ewallet top-up',
                'initiatorId' => 41,
                'created_at' => '2025-02-18 12:20:15',
                'updated_at' => '2025-02-18 12:20:15',
                'deleted_at' => null
            ],
            [
                'transactionId' => 17,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 100000,
                'transactionType' => 'debit',
                'transactionReference' => '7C2805694970',
                'reason' => 'Patient billing',
                'initiatorId' => 54,
                'created_at' => '2025-02-18 12:41:28',
                'updated_at' => '2025-02-18 12:41:28',
                'deleted_at' => null
            ],
            [
                'transactionId' => 18,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 100000,
                'transactionType' => 'debit',
                'transactionReference' => 'OI7121359583',
                'reason' => 'Patient billing',
                'initiatorId' => 54,
                'created_at' => '2025-02-18 12:41:48',
                'updated_at' => '2025-02-18 12:41:48',
                'deleted_at' => null
            ],
            [
                'transactionId' => 19,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 50000,
                'transactionType' => 'debit',
                'transactionReference' => 'DZ6358717132',
                'reason' => 'Patient billing',
                'initiatorId' => 54,
                'created_at' => '2025-02-18 12:44:30',
                'updated_at' => '2025-02-18 12:44:30',
                'deleted_at' => null
            ],
            [
                'transactionId' => 20,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 50000,
                'transactionType' => 'debit',
                'transactionReference' => 'TI7776142001',
                'reason' => 'Patient billing',
                'initiatorId' => 54,
                'created_at' => '2025-02-18 12:59:17',
                'updated_at' => '2025-02-18 12:59:17',
                'deleted_at' => null
            ],
            [
                'transactionId' => 21,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 50000,
                'transactionType' => 'debit',
                'transactionReference' => 'F03453475671',
                'reason' => 'Patient billing',
                'initiatorId' => 54,
                'created_at' => '2025-02-18 13:11:53',
                'updated_at' => '2025-02-18 13:11:53',
                'deleted_at' => null
            ],
            [
                'transactionId' => 22,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 50000,
                'transactionType' => 'debit',
                'transactionReference' => 'HE4264621964',
                'reason' => 'Patient billing',
                'initiatorId' => 54,
                'created_at' => '2025-02-18 13:25:24',
                'updated_at' => '2025-02-18 13:25:24',
                'deleted_at' => null
            ],
            [
                'transactionId' => 23,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 50000,
                'transactionType' => 'debit',
                'transactionReference' => 'X47287056509',
                'reason' => 'Patient billing',
                'initiatorId' => 54,
                'created_at' => '2025-02-18 13:36:53',
                'updated_at' => '2025-02-18 13:36:53',
                'deleted_at' => null
            ],
            [
                'transactionId' => 24,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 50000,
                'transactionType' => 'debit',
                'transactionReference' => 'BT5733923924',
                'reason' => 'Patient billing',
                'initiatorId' => 54,
                'created_at' => '2025-02-18 13:39:51',
                'updated_at' => '2025-02-18 13:39:51',
                'deleted_at' => null
            ],
            [
                'transactionId' => 25,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 50000,
                'transactionType' => 'debit',
                'transactionReference' => '4U5605671720',
                'reason' => 'Patient billing',
                'initiatorId' => 54,
                'created_at' => '2025-02-18 13:44:33',
                'updated_at' => '2025-02-18 13:44:33',
                'deleted_at' => null
            ],
            [
                'transactionId' => 26,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 50000,
                'transactionType' => 'debit',
                'transactionReference' => 'SD1496796839',
                'reason' => 'Patient billing',
                'initiatorId' => 54,
                'created_at' => '2025-02-18 13:45:03',
                'updated_at' => '2025-02-18 13:45:03',
                'deleted_at' => null
            ],
            [
                'transactionId' => 27,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 50000,
                'transactionType' => 'debit',
                'transactionReference' => 'HD2526139636',
                'reason' => 'Patient billing',
                'initiatorId' => 54,
                'created_at' => '2025-02-18 13:48:49',
                'updated_at' => '2025-02-18 13:48:49',
                'deleted_at' => null
            ],
            [
                'transactionId' => 28,
                'walletId' => 2,
                'hospitalId' => 1,
                'amount' => 35000,
                'transactionType' => 'debit',
                'transactionReference' => '4A6348339444',
                'reason' => 'Patient billing',
                'initiatorId' => 54,
                'created_at' => '2025-02-18 17:13:36',
                'updated_at' => '2025-02-18 17:13:36',
                'deleted_at' => null
            ]
        ]);
    }
}