<?php

namespace App\Services;

use App\Order;
use Carbon\Carbon;

class OrderService {

    private $reserveMinutes;

    public function __construct($reserveMinutes)
    {
        $this->reserveMinutes = $reserveMinutes;
    }

    public function setHookahExpiredTime(Order $order)
    {
        $reserve_time = Carbon::parse($order->reserve_at);
        $expired_at = $reserve_time->addMinutes($this->reserveMinutes)->toDateTimeString();

        $order->expired_at = $expired_at;
        $order->save();
    }
}