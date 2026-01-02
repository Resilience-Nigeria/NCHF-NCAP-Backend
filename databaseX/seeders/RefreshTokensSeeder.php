<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefreshTokensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the refresh_tokens table with initial data.
     */
    public function run()
    {
        DB::table('refresh_tokens')->insert([
            [
                'id' => 1,
                'user_id' => 3,
                'token' => 'fKSqU1klt23raeNJPUFmUb0W8ogPHyrNi0AfJ8IxQ0J1bhqQpOYfksKwWMdDjRo3',
                'expires_at' => '2025-12-27 04:57:53',
                'created_at' => '2025-12-13 04:57:53',
                'updated_at' => '2025-12-13 04:57:53'
            ],
            [
                'id' => 2,
                'user_id' => 3,
                'token' => 'iNMTXeHs7rLJ1PEPKvPxXX6NGm54JXKPvHh8pQiBMXnbb6e2SL3r8l6dKLU9oXom',
                'expires_at' => '2025-12-27 04:58:56',
                'created_at' => '2025-12-13 04:58:56',
                'updated_at' => '2025-12-13 04:58:56'
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'token' => '0mSRbTMLmtajYj9gPdBKE0ynSDtruLdEbAusXlWGFMtIo45ff9g97zoPcqRldNav',
                'expires_at' => '2025-12-27 04:59:11',
                'created_at' => '2025-12-13 04:59:11',
                'updated_at' => '2025-12-13 04:59:11'
            ],
            [
                'id' => 4,
                'user_id' => 3,
                'token' => '5NSOKJO4AJYwJhegpx7FfQ1C6Aof2jNfjNGiZHtUlBqs6iH6pee37SORq23J3WRX',
                'expires_at' => '2025-12-27 05:08:52',
                'created_at' => '2025-12-13 05:08:52',
                'updated_at' => '2025-12-13 05:08:52'
            ],
            [
                'id' => 5,
                'user_id' => 3,
                'token' => 'lwtj7tN1dz5EVC8VRywcFJQBKknKsxEQzAwypIVS0IQjhRzL0miElEGBMM2qezIp',
                'expires_at' => '2025-12-27 05:10:01',
                'created_at' => '2025-12-13 05:10:01',
                'updated_at' => '2025-12-13 05:10:01'
            ],
            [
                'id' => 6,
                'user_id' => 3,
                'token' => 'iC7fskYqEZsFc3NyKHjesg7fJ8DDlpj73TOVcCG9WO5KkUxzrvx6BCE226Twa3zu',
                'expires_at' => '2025-12-27 05:10:08',
                'created_at' => '2025-12-13 05:10:08',
                'updated_at' => '2025-12-13 05:10:08'
            ],
            [
                'id' => 7,
                'user_id' => 3,
                'token' => 'UG7bbP4Muwf89lpCWi2tsOqPmRI2ggclKWPo6Z6mgUDlmwrqFJo5wZmICVtcAIB5',
                'expires_at' => '2025-12-27 05:10:20',
                'created_at' => '2025-12-13 05:10:20',
                'updated_at' => '2025-12-13 05:10:20'
            ],
            [
                'id' => 8,
                'user_id' => 3,
                'token' => 'PNOWOkPmxfQSsKOvIbEEcbH34XHdQnGjKsob1VMYDht1sUhruJEYNBrrMVyGTNWy',
                'expires_at' => '2025-12-27 05:10:31',
                'created_at' => '2025-12-13 05:10:31',
                'updated_at' => '2025-12-13 05:10:31'
            ],
            [
                'id' => 9,
                'user_id' => 3,
                'token' => 'gtPyZE9IV515E1UBqpJ3lCLpo9fpAYsyn6sdWnXbkBsrIUQI9bpp84kp3f0Mtt7V',
                'expires_at' => '2025-12-27 05:11:44',
                'created_at' => '2025-12-13 05:11:44',
                'updated_at' => '2025-12-13 05:11:44'
            ],
            [
                'id' => 10,
                'user_id' => 3,
                'token' => 'YNPJdLK382PYL6QJjzrhKRR6cOzATNOb6iQEmPePERjfEEh2I8PdjjCkKkg1g1sS',
                'expires_at' => '2025-12-27 05:12:03',
                'created_at' => '2025-12-13 05:12:03',
                'updated_at' => '2025-12-13 05:12:03'
            ],
            [
                'id' => 11,
                'user_id' => 3,
                'token' => 'woFnGUIv1lrKpIKHTvsKeDBX1uUGqAPSSHqJQbVfJfpX5VgPnXuWZtJUkXkTLAnk',
                'expires_at' => '2025-12-27 05:19:06',
                'created_at' => '2025-12-13 05:19:06',
                'updated_at' => '2025-12-13 05:19:06'
            ],
            [
                'id' => 12,
                'user_id' => 3,
                'token' => 'MjcdcMDmfAVJnwSj3X1KnJOahBjd8wJLSdrVLvAfr8NvFgXOMqEPAerKy5FawWM1',
                'expires_at' => '2025-12-27 05:20:06',
                'created_at' => '2025-12-13 05:20:06',
                'updated_at' => '2025-12-13 05:20:06'
            ],
            [
                'id' => 13,
                'user_id' => 3,
                'token' => 'MhZC5ukIJccidMgNQ6D0B33RVNC3PqL9wlp8MBT21dZPZ4gvTmn5qWnt9WCXbLyc',
                'expires_at' => '2025-12-27 05:21:04',
                'created_at' => '2025-12-13 05:21:04',
                'updated_at' => '2025-12-13 05:21:04'
            ],
            [
                'id' => 14,
                'user_id' => 3,
                'token' => 'By4E9vcyAR9Uzqmx9z0ViJRRKyg0QtYcmWgyU76Gg9VBtPvLVc99P3WmscdZlN0v',
                'expires_at' => '2025-12-27 11:03:07',
                'created_at' => '2025-12-13 11:03:07',
                'updated_at' => '2025-12-13 11:03:07'
            ],
            [
                'id' => 15,
                'user_id' => 61,
                'token' => 'JUQsyYuR6wY3p7EyEqQvuWdRv0vNzFanbf2I1a4q912oRUycpqRzVowzzH0Rm8Cy',
                'expires_at' => '2025-12-27 15:38:32',
                'created_at' => '2025-12-13 14:38:11',
                'updated_at' => '2025-12-13 15:38:32'
            ],
            [
                'id' => 16,
                'user_id' => 61,
                'token' => 'DKSE9esZbbV2QHiAdFJKMVkB8MhFulxee8xh99g9uGAcIlFJ6y9719vUIWO7V1JW',
                'expires_at' => '2025-12-27 15:38:36',
                'created_at' => '2025-12-13 15:38:36',
                'updated_at' => '2025-12-13 15:38:36'
            ],
            [
                'id' => 17,
                'user_id' => 61,
                'token' => '3gDdvKhKQJpJed5dRxneOZRSkhLT8Izlw2LzP9AkbDjJKr0JernWodzd35ZwXdSG',
                'expires_at' => '2025-12-27 17:36:43',
                'created_at' => '2025-12-13 15:54:25',
                'updated_at' => '2025-12-13 17:36:43'
            ],
            [
                'id' => 18,
                'user_id' => 61,
                'token' => '9UNvcv8ue3C4lpuLm5wXlm2JTnoi8Hw9WXPrMaYzXZRemqpEfcnaPNajSnC8zydM',
                'expires_at' => '2025-12-27 17:36:59',
                'created_at' => '2025-12-13 17:36:59',
                'updated_at' => '2025-12-13 17:36:59'
            ],
            [
                'id' => 19,
                'user_id' => 61,
                'token' => 'pPYYLFxCotTx3w1wYARkSZUstbqnyd0jj9csBloMygMyYFjki5rNsiWYCwcAP05x',
                'expires_at' => '2025-12-27 17:51:22',
                'created_at' => '2025-12-13 17:51:22',
                'updated_at' => '2025-12-13 17:51:22'
            ],
            [
                'id' => 20,
                'user_id' => 61,
                'token' => 'EO70zbLuw3ered9saqWZSU8f039yMapRiuXVKMo4GTfxMzgqCh3KYC4DSfkIZt5D',
                'expires_at' => '2025-12-27 18:07:30',
                'created_at' => '2025-12-13 18:07:30',
                'updated_at' => '2025-12-13 18:07:30'
            ],
            [
                'id' => 21,
                'user_id' => 61,
                'token' => '686oH5xPMw9a8CSBn0Ibv7OMS71AGNjiUOxE2hhm50R8AAzJYYAqMuAtaL0AjNId',
                'expires_at' => '2025-12-27 19:35:03',
                'created_at' => '2025-12-13 18:09:35',
                'updated_at' => '2025-12-13 19:35:03'
            ],
            [
                'id' => 22,
                'user_id' => 61,
                'token' => 'KXgN8T4EieQ8WZMj70wuc5pRNgW0WKIG8fGBcuIKhlZB2jJWhj51EgoWcxD57hx9',
                'expires_at' => '2025-12-27 19:35:06',
                'created_at' => '2025-12-13 19:35:06',
                'updated_at' => '2025-12-13 19:35:06'
            ],
            [
                'id' => 23,
                'user_id' => 62,
                'token' => 'wajClEaVlfXFxPslXpj16XnUbEEVkVvao4gIlFCkM261f9VbuaFX5PZ8lr5IXn9T',
                'expires_at' => '2025-12-28 02:58:08',
                'created_at' => '2025-12-14 02:58:08',
                'updated_at' => '2025-12-14 02:58:08'
            ],
            [
                'id' => 24,
                'user_id' => 68,
                'token' => '6JDpPFZWMPLX8jydoFJUh2JQSF757qvUD65ZepUSMJcHNheBTrCSMdUt8a0NsDBe',
                'expires_at' => '2025-12-28 03:33:09',
                'created_at' => '2025-12-14 03:33:09',
                'updated_at' => '2025-12-14 03:33:09'
            ],
            [
                'id' => 25,
                'user_id' => 68,
                'token' => 'p1rOylHTlKddwY6klgbhSHK4vTKqjbvmYc1q8FALTzs2Na6IAH5uk1Mvpjl0Q6GM',
                'expires_at' => '2025-12-28 03:35:01',
                'created_at' => '2025-12-14 03:35:01',
                'updated_at' => '2025-12-14 03:35:01'
            ],
            [
                'id' => 26,
                'user_id' => 68,
                'token' => 'bJV4AsOIkdUQXefy2jZnH7mZOvwy9fevL4bYpT427GZ2sfiyZa9doTAi40ijPmWG',
                'expires_at' => '2025-12-28 03:37:52',
                'created_at' => '2025-12-14 03:37:52',
                'updated_at' => '2025-12-14 03:37:52'
            ],
            [
                'id' => 29,
                'user_id' => 68,
                'token' => '9z0BXyBBOWmL8qfjThI6i1gDIdNQ5gSsIQVdSPNhTJCrIDX0jmC7MWaTGiQDd4HK',
                'expires_at' => '2025-12-28 04:08:38',
                'created_at' => '2025-12-14 04:08:38',
                'updated_at' => '2025-12-14 04:08:38'
            ],
            [
                'id' => 30,
                'user_id' => 68,
                'token' => 'Tw6HRba7OiTE2wCZp5IdKopfR3sYOrzAdKJQnnx8elHHcTM7Rec784ppPzmYmSqg',
                'expires_at' => '2025-12-28 08:57:30',
                'created_at' => '2025-12-14 07:53:54',
                'updated_at' => '2025-12-14 08:57:30'
            ],
            [
                'id' => 31,
                'user_id' => 68,
                'token' => '7fHKeR0V8aM6GYc6ZsBUVXq09iwMO2MsvjqmHu3eO2NGuyRIkbNhEUmgEYkLbfc5',
                'expires_at' => '2025-12-28 10:40:24',
                'created_at' => '2025-12-14 09:07:25',
                'updated_at' => '2025-12-14 10:40:24'
            ],
            [
                'id' => 32,
                'user_id' => 68,
                'token' => 'CuPfWP3zie3xTgfMxK5HDtVXCW1LjIMdmdx6JZFPeuH2mK3zAvZi0caSZgs7x0hC',
                'expires_at' => '2025-12-28 16:34:05',
                'created_at' => '2025-12-14 10:45:09',
                'updated_at' => '2025-12-14 16:34:05'
            ],
            [
                'id' => 33,
                'user_id' => 68,
                'token' => 'JJmucZGgBRXHgPZ4NoPjdfGqV08qhFOWgJ3yKOHzaxmrGeCRHt93YnJ0H5BucMAp',
                'expires_at' => '2025-12-28 17:34:42',
                'created_at' => '2025-12-14 16:34:09',
                'updated_at' => '2025-12-14 17:34:42'
            ],
            [
                'id' => 34,
                'user_id' => 68,
                'token' => '60689sm0S0KLCFWIkEqgGpyM2xQSVduySpmB2ObvVSsadU7F42JR9AjEbDltPonf',
                'expires_at' => '2025-12-28 22:38:45',
                'created_at' => '2025-12-14 17:35:17',
                'updated_at' => '2025-12-14 22:38:45'
            ],
            [
                'id' => 35,
                'user_id' => 68,
                'token' => 'YNRmfCkzjR4VbpuqSnolT5zj5UYln2Wr5qF42mQOFpqUrQg3z6H4WsYdBhyehbk1',
                'expires_at' => '2025-12-28 22:38:47',
                'created_at' => '2025-12-14 22:38:47',
                'updated_at' => '2025-12-14 22:38:47'
            ]
        ]);
    }
}