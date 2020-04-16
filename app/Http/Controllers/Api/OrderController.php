<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Order\CreateRequest;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Http\Resources\Order\OrderResource;

class OrderController extends ApiController
{
    public function __construct(OrderRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        $items = $this->repository->all();
        return OrderResource::collection($items);
    }

    public function show($id)
    {
        $item = $this->repository->findWith($id, ['hookah.hookah_place']);
        return new OrderResource($item);
    }

    public function store(CreateRequest $request)
    {
        $item = $this->repository->create($request->all());
        return new OrderResource($item);
    }

    public function getReservedItems()
    {
        $items = $this->repository->getReservedItems();
        return OrderResource::collection($items);
    }
}
