<?php

namespace App\Services\Interfaces;

use App\Order;

interface OrderServiceInterface
{
    public function setHookahExpiredTime(Order $order);
}
