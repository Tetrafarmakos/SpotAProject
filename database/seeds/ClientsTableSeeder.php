<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [   'name'  => 'Taylor',
                'surname' => 'Otwell',
                'created_at' => '2020-01-01 00:00:01',
                'updated_at' => '2020-01-01 00:00:01'
            ],
            [   'name'  => 'Mohamed',
                'surname' => 'Said',
                'created_at' => '2020-01-01 00:00:01',
                'updated_at' => '2020-01-01 00:00:01'
            ],
            [   'name'  => 'Jeffrey',
                'surname' => 'Way',
                'created_at' => '2020-01-01 00:00:01',
                'updated_at' => '2020-01-01 00:00:01'
            ],
            [   'name'  => 'Phill',
                'surname' => 'Sparks',
                'created_at' => '2020-01-01 00:00:01',
                'updated_at' => '2020-01-01 00:00:01'
            ],
        ];

        foreach ($clients as $client) {
            if (!\App\Client::where('name', $client['name'])
                                  ->where('surname', $client['surname'])
                                  ->first()) {
                \App\Client::create($client);
            }
        }
    }
}
