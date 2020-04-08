<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateRequest;
use App\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $items = $this->orderRepository->all();
        return response()->json($items);
    }

    public function show(Order $order)
    {
        $item = $this->orderRepository->getById($order->id);
        return response()->json($item);
    }

    public function store(CreateRequest $request)
    {
        $item = $this->orderRepository->create($request->all());
        return response()->json($item);
    }

    public function getReservedItems()
    {
        $items = $this->orderRepository->getReservedItems();
        return response()->json($items);
    }
}
