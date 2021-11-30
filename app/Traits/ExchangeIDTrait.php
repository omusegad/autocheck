<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait ExchangeIDTrait {
    public function getExchangeId() {
       $data = User::where('id',Auth::id())->pluck('exchange_id');
       return $data[0];
    }
}
