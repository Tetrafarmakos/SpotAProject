<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments = [
            [   'client_id'  => 1,
                'amount' => 500,
                'created_at' => '2020-01-01 17:25:52',
                'updated_at' => '2020-03-01 17:25:52'
            ],
            [   'client_id'  => 1,
                'amount' => 1000,
                'created_at' => '2020-01-02 17:25:52',
                'updated_at' => '2020-03-02 17:25:52'
            ],
            [   'client_id'  => 2,
                'amount' => 1500,
                'created_at' => '2020-02-01 17:25:52',
                'updated_at' => '2020-03-01 17:25:52'
            ],
            [   'client_id'  => 2,
                'amount' => 2000,
                'created_at' => '2020-02-02 17:25:52',
                'updated_at' => '2020-03-02 17:25:52'
            ],
            [   'client_id'  => 3,
                'amount' => 2500,
                'created_at' => '2020-03-01 17:25:52',
                'updated_at' => '2020-03-01 17:25:52'
            ],
            [   'client_id'  => 3,
                'amount' => 3000,
                'created_at' => '2020-03-02 17:25:52',
                'updated_at' => '2020-03-02 17:25:52'
            ],
        ];

        foreach ($payments as $payment) {
            if (!\App\Payment::where('client_id', $payment['client_id'])
                                  ->where('amount', $payment['amount'])
                                  ->first()) {
                \App\Payment::create($payment);
            }
        }
    }
}
