<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Client;
use Carbon\Carbon;

class exportLastPaymentsToCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:export-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export to csv the last payment of each client in 30 days time';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $clients = Client::all();
        $report_of_payments = collect();
        $from = Carbon::now()->subDays(30)->hour(0)->minute(0)->second(0)->format('d/m/Y');
        $to = Carbon::now()->hour(24)->minute(60)->second(60)->format('d/m/Y');

        foreach ($clients as $client) {
            $last_payment = $client->lastPaymentWithinDateRange($from,$to);
            $report_of_payments->push([
                'id' => $client->id,
                'name' => $client->name,
                'surname' => $client->surname,
                'amount' => $last_payment['amount'],
                'date' => $last_payment['date']
            ]);
        }

        $filename = "payments.csv";
        $handle = fopen($filename, 'w');
        fputcsv($handle, array('id', 'name', 'surname', 'amount', 'date'));
        foreach ($report_of_payments as $report_of_payment) {
          if ($report_of_payment) {
            fputcsv($handle, array($report_of_payment['id'], $report_of_payment['name'],
                                   $report_of_payment['surname'], $report_of_payment['amount'], $report_of_payment['date']));
          }

        }
        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        $this->info('csv saved in root directory');
    }
}
