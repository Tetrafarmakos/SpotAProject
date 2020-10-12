<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Client extends Model
{
    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function lastPaymentWithinDateRange($from,$to) : array
    {
      // TODO: there was no payment date so i got updated_at(why is different than created?)
      if(is_null($from) && is_null($to)){
        $last_payment = $this->payments->sortByDesc('updated_at')->first();
      }else{
        $from = Carbon::createFromFormat('d/m/Y',$from)->hour(0)->minute(0)->second(0);
        $to = Carbon::createFromFormat('d/m/Y',$to)->hour(0)->minute(0)->second(0);
        $last_payment = $this->payments->filter(function ($payment) use ($from,$to) {
                return $payment->updated_at > $from && $payment->updated_at < $to;
            })->sortByDesc('updated_at')->first();
      }

      return ['amount' => ($last_payment)?$last_payment->amount:'-',
              'date' => ($last_payment)?$last_payment->updated_at->format('d/m/Y'):'-'];
    }
}
