<?php

namespace App\Observers;

use App\Order;
use App\Services\OrderService;

class OrderObserver
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function created(Order $order)
    {
        $this->orderService->setHookahExpiredTime($order);
    }
}
