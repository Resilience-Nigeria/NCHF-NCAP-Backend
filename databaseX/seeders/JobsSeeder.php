<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the jobs table with initial data.
     */
    public function run()
    {
        DB::table('jobs')->insert([
            [
                'id' => 7,
                'queue' => 'default',
                'payload' => '{"uuid":"71e2a451-ba91-421b-8419-636e6990bcf9","displayName":"App\\\\Mail\\\\WelcomeEmail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"Illuminate\\\\Mail\\\\SendQueuedMailable","command":"O:34:\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\":15:{s:8:\\"mailable\\";O:21:\\"App\\\\Mail\\\\WelcomeEmail\\":6:{s:5:\\"email\\";s:19:\\"vctroseji@gmail.com\\";s:9:\\"firstName\\";s:6:\\"Victor\\";s:8:\\"lastName\\";s:5:\\"Oseji\\";s:15:\\"defaultPassword\\";s:8:\\"BPOEU1UD\\";s:2:\\"to\\";a:1:{i:0;a:2:{s:4:\\"name\\";N;s:7:\\"address\\";s:19:\\"vctroseji@gmail.com\\";}}s:6:\\"mailer\\";s:4:\\"smtp\\";}s:5:\\"tries\\";N;s:7:\\"timeout\\";N;s:13:\\"maxExceptions\\";N;s:17:\\"shouldBeEncrypted\\";b:0;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:3:\\"job\\";N;}"},"createdAt":1765634172,"delay":null}',
                'attempts' => 0,
                'reserved_at' => null,
                'available_at' => 1765634172,
                'created_at' => 1765634172
            ],
            [
                'id' => 8,
                'queue' => 'default',
                'payload' => '{"uuid":"74e25a6b-459a-434b-9bc8-e4c30403e253","displayName":"App\\\\Mail\\\\WelcomeEmail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"Illuminate\\\\Mail\\\\SendQueuedMailable","command":"O:34:\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\":15:{s:8:\\"mailable\\";O:21:\\"App\\\\Mail\\\\WelcomeEmail\\":6:{s:5:\\"email\\";s:19:\\"vctroseji@gmail.com\\";s:9:\\"firstName\\";s:6:\\"Victor\\";s:8:\\"lastName\\";s:5:\\"Oseji\\";s:15:\\"defaultPassword\\";s:8:\\"SO57KTIN\\";s:2:\\"to\\";a:1:{i:0;a:2:{s:4:\\"name\\";N;s:7:\\"address\\";s:19:\\"vctroseji@gmail.com\\";}}s:6:\\"mailer\\";s:4:\\"smtp\\";}s:5:\\"tries\\";N;s:7:\\"timeout\\";N;s:13:\\"maxExceptions\\";N;s:17:\\"shouldBeEncrypted\\";b:0;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:3:\\"job\\";N;}"},"createdAt":1765635182,"delay":null}',
                'attempts' => 0,
                'reserved_at' => null,
                'available_at' => 1765635182,
                'created_at' => 1765635182
            ],
            [
                'id' => 9,
                'queue' => 'default',
                'payload' => '{"uuid":"e9e418bf-7b46-4355-a6de-a9110fb8fd94","displayName":"App\\\\Mail\\\\WelcomeEmail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"Illuminate\\\\Mail\\\\SendQueuedMailable","command":"O:34:\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\":15:{s:8:\\"mailable\\";O:21:\\"App\\\\Mail\\\\WelcomeEmail\\":6:{s:5:\\"email\\";s:19:\\"vctroseji@gmail.com\\";s:9:\\"firstName\\";s:6:\\"Victor\\";s:8:\\"lastName\\";s:5:\\"Oseji\\";s:15:\\"defaultPassword\\";s:8:\\"XEQRAYFY\\";s:2:\\"to\\";a:1:{i:0;a:2:{s:4:\\"name\\";N;s:7:\\"address\\";s:19:\\"vctroseji@gmail.com\\";}}s:6:\\"mailer\\";s:4:\\"smtp\\";}s:5:\\"tries\\";N;s:7:\\"timeout\\";N;s:13:\\"maxExceptions\\";N;s:17:\\"shouldBeEncrypted\\";b:0;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:3:\\"job\\";N;}"},"createdAt":1765635303,"delay":null}',
                'attempts' => 0,
                'reserved_at' => null,
                'available_at' => 1765635303,
                'created_at' => 1765635303
            ],
            [
                'id' => 10,
                'queue' => 'default',
                'payload' => '{"uuid":"b450ad74-b3ea-487b-91c8-38862f15a68c","displayName":"App\\\\Mail\\\\WelcomeEmail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"Illuminate\\\\Mail\\\\SendQueuedMailable","command":"O:34:\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\":15:{s:8:\\"mailable\\";O:21:\\"App\\\\Mail\\\\WelcomeEmail\\":6:{s:5:\\"email\\";s:19:\\"vctroseji@gmail.com\\";s:9:\\"firstName\\";s:6:\\"Victor\\";s:8:\\"lastName\\";s:5:\\"Oseji\\";s:15:\\"defaultPassword\\";s:8:\\"WR7RO3RI\\";s:2:\\"to\\";a:1:{i:0;a:2:{s:4:\\"name\\";N;s:7:\\"address\\";s:19:\\"vctroseji@gmail.com\\";}}s:6:\\"mailer\\";s:4:\\"smtp\\";}s:5:\\"tries\\";N;s:7:\\"timeout\\";N;s:13:\\"maxExceptions\\";N;s:17:\\"shouldBeEncrypted\\";b:0;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:3:\\"job\\";N;}"},"createdAt":1765635567,"delay":null}',
                'attempts' => 0,
                'reserved_at' => null,
                'available_at' => 1765635567,
                'created_at' => 1765635567
            ],
            [
                'id' => 11,
                'queue' => 'default',
                'payload' => '{"uuid":"53368700-a29e-4a6c-a3a5-c30ab9cb4437","displayName":"App\\\\Mail\\\\WelcomeEmail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"Illuminate\\\\Mail\\\\SendQueuedMailable","command":"O:34:\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\":15:{s:8:\\"mailable\\";O:21:\\"App\\\\Mail\\\\WelcomeEmail\\":6:{s:5:\\"email\\";s:19:\\"vctroseji@gmail.com\\";s:9:\\"firstName\\";s:6:\\"Victor\\";s:8:\\"lastName\\";s:5:\\"Oseji\\";s:15:\\"defaultPassword\\";s:8:\\"JTBUWWIQ\\";s:2:\\"to\\";a:1:{i:0;a:2:{s:4:\\"name\\";N;s:7:\\"address\\";s:19:\\"vctroseji@gmail.com\\";}}s:6:\\"mailer\\";s:4:\\"smtp\\";}s:5:\\"tries\\";N;s:7:\\"timeout\\";N;s:13:\\"maxExceptions\\";N;s:17:\\"shouldBeEncrypted\\";b:0;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:3:\\"job\\";N;}"},"createdAt":1765636040,"delay":null}',
                'attempts' => 0,
                'reserved_at' => null,
                'available_at' => 1765636040,
                'created_at' => 1765636040
            ],
            [
                'id' => 12,
                'queue' => 'default',
                'payload' => '{"uuid":"2b844855-a221-4d3d-a2e1-ddacbb62f497","displayName":"App\\\\Mail\\\\WelcomeEmail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"Illuminate\\\\Mail\\\\SendQueuedMailable","command":"O:34:\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\":15:{s:8:\\"mailable\\";O:21:\\"App\\\\Mail\\\\WelcomeEmail\\":7:{s:5:\\"email\\";s:19:\\"vctroseji@gmail.com\\";s:9:\\"firstName\\";s:6:\\"Victor\\";s:8:\\"lastName\\";s:5:\\"Oseji\\";s:15:\\"defaultPassword\\";s:8:\\"WK1XHP20\\";s:7:\\"message\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":5:{s:5:\\"class\\";s:20:\\"App\\\\Models\\\\Languages\\";s:2:\\"id\\";i:3;s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";s:15:\\"collectionClass\\";N;}s:2:\\"to\\";a:1:{i:0;a:2:{s:4:\\"name\\";N;s:7:\\"address\\";s:19:\\"vctroseji@gmail.com\\";}}s:6:\\"mailer\\";s:4:\\"smtp\\";}s:5:\\"tries\\";N;s:7:\\"timeout\\";N;s:13:\\"maxExceptions\\";N;s:17:\\"shouldBeEncrypted\\";b:0;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:3:\\"job\\";N;}"},"createdAt":1765637415,"delay":null}',
                'attempts' => 0,
                'reserved_at' => null,
                'available_at' => 1765637415,
                'created_at' => 1765637415
            ],
            [
                'id' => 13,
                'queue' => 'default',
                'payload' => '{"uuid":"6d2c083b-12a1-4c71-b9e8-efd710fce6dc","displayName":"App\\\\Mail\\\\WelcomeEmail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"Illuminate\\\\Mail\\\\SendQueuedMailable","command":"O:34:\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\":15:{s:8:\\"mailable\\";O:21:\\"App\\\\Mail\\\\WelcomeEmail\\":7:{s:5:\\"email\\";s:19:\\"vctroseji@gmail.com\\";s:9:\\"firstName\\";s:6:\\"Victor\\";s:8:\\"lastName\\";s:5:\\"Oseji\\";s:15:\\"defaultPassword\\";s:8:\\"OX4EVOK4\\";s:7:\\"message\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":5:{s:5:\\"class\\";s:20:\\"App\\\\Models\\\\Languages\\";s:2:\\"id\\";i:1;s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";s:15:\\"collectionClass\\";N;}s:2:\\"to\\";a:1:{i:0;a:2:{s:4:\\"name\\";N;s:7:\\"address\\";s:19:\\"vctroseji@gmail.com\\";}}s:6:\\"mailer\\";s:4:\\"smtp\\";}s:5:\\"tries\\";N;s:7:\\"timeout\\";N;s:13:\\"maxExceptions\\";N;s:17:\\"shouldBeEncrypted\\";b:0;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:3:\\"job\\";N;}"},"createdAt":1765637492,"delay":null}',
                'attempts' => 0,
                'reserved_at' => null,
                'available_at' => 1765637492,
                'created_at' => 1765637492
            ],
            [
                'id' => 14,
                'queue' => 'default',
                'payload' => '{"uuid":"973c25f6-8d47-4b3e-b43c-3be20902d10a","displayName":"App\\\\Mail\\\\WelcomeEmail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"Illuminate\\\\Mail\\\\SendQueuedMailable","command":"O:34:\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\":15:{s:8:\\"mailable\\";O:21:\\"App\\\\Mail\\\\WelcomeEmail\\":7:{s:5:\\"email\\";s:19:\\"vctroseji@gmail.com\\";s:9:\\"firstName\\";s:6:\\"Victor\\";s:8:\\"lastName\\";s:5:\\"Oseji\\";s:15:\\"defaultPassword\\";s:8:\\"CGVHZSQS\\";s:7:\\"message\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":5:{s:5:\\"class\\";s:20:\\"App\\\\Models\\\\Languages\\";s:2:\\"id\\";i:1;s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";s:15:\\"collectionClass\\";N;}s:2:\\"to\\";a:1:{i:0;a:2:{s:4:\\"name\\";N;s:7:\\"address\\";s:19:\\"vctroseji@gmail.com\\";}}s:6:\\"mailer\\";s:4:\\"smtp\\";}s:5:\\"tries\\";N;s:7:\\"timeout\\";N;s:13:\\"maxExceptions\\";N;s:17:\\"shouldBeEncrypted\\";b:0;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:3:\\"job\\";N;}"},"createdAt":1765637762,"delay":null}',
                'attempts' => 0,
                'reserved_at' => null,
                'available_at' => 1765637762,
                'created_at' => 1765637762
            ],
            [
                'id' => 15,
                'queue' => 'default',
                'payload' => '{"uuid":"6a46a796-3ce9-44f4-8336-4809a35fb66b","displayName":"App\\\\Jobs\\\\SendSMSJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\SendSMSJob","command":"O:19:\\"App\\\\Jobs\\\\SendSMSJob\\":2:{s:5:\\"phone\\";s:11:\\"07046919327\\";s:10:\\"smsMessage\\";s:76:\\"ope wa fun iforukosile re lori Cancer Health Fund! Oro asina igba die re ni:\\";}"},"createdAt":1765685719,"delay":null}',
                'attempts' => 0,
                'reserved_at' => null,
                'available_at' => 1765685719,
                'created_at' => 1765685719
            ],
            [
                'id' => 16,
                'queue' => 'default',
                'payload' => '{"uuid":"7a0eb20d-f3b9-4d29-9909-46b35fa7f25f","displayName":"App\\\\Jobs\\\\SendSMSJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\SendSMSJob","command":"O:19:\\"App\\\\Jobs\\\\SendSMSJob\\":2:{s:5:\\"phone\\";s:11:\\"07046919327\\";s:10:\\"smsMessage\\";s:83:\\"godiya muke da yin rijista a Cancer Health Fund! Kalmar sirri ta wucin gadi ita ce:\\";}"},"createdAt":1765686058,"delay":null}',
                'attempts' => 0,
                'reserved_at' => null,
                'available_at' => 1765686058,
                'created_at' => 1765686058
            ],
            [
                'id' => 17,
                'queue' => 'default',
                'payload' => '{"uuid":"bbd1402a-44a3-4919-a695-28c4ec232984","displayName":"App\\\\Jobs\\\\SendSMSJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\SendSMSJob","command":"O:19:\\"App\\\\Jobs\\\\SendSMSJob\\":2:{s:5:\\"phone\\";s:11:\\"07046919327\\";s:10:\\"smsMessage\\";s:83:\\"godiya muke da yin rijista a Cancer Health Fund! Kalmar sirri ta wucin gadi ita ce:\\";}"},"createdAt":1765686410,"delay":null}',
                'attempts' => 0,
                'reserved_at' => null,
                'available_at' => 1765686410,
                'created_at' => 1765686410
            ]
        ]);
    }
}