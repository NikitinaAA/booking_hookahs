<?php

namespace App\Observers;

use App\Order;
use App\Services\Interfaces\OrderServiceInterface;

class OrderObserver
{
    private $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    public function created(Order $order)
    {
        $this->orderService->setHookahExpiredTime($order);
    }
}
