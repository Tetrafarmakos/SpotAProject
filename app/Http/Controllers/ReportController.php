<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function usersLastPaymentsIndexTable(Request $request)
    {
        $clients = Client::all();
        $from_date = $request->from;
        $to_date = $request->to;
        $report_of_payments = collect();

        foreach ($clients as $client) {
            $last_payment = $client->lastPaymentWithinDateRange($from_date,$to_date);
            $report_of_payments->push([
                'id' => $client->id,
                'name' => $client->name,
                'surname' => $client->surname,
                'amount' => $last_payment['amount'],
                'date' => $last_payment['date']
            ]);
        }

        return view('reports.last_payments', ['report_of_payments' => $report_of_payments,
                                              'start_date' => ($from_date)?$from_date:Carbon::now()->format('d/m/Y'),
                                              'end_date' => ($to_date)?$to_date:Carbon::now()->format('d/m/Y')]);
    }
}
