<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateRequest;

class OrderController extends Controller
{
    public function index()
    {
        $items = Order::all();

        return response()->json($items);
    }

    public function show(Order $order)
    {
        return response()->json($order);
    }

    public function store(CreateRequest $request)
    {
        $order = Order::query()->create($request->all());

        return response()->json($order);
    }

    public function getReservedItems()
    {
        $items = Order::query()->reserved()->get();

        return response()->json($items);
    }
}
