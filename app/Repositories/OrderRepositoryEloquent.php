<?php

namespace App\Repositories;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Order;
use Carbon\Carbon;

class OrderRepositoryEloquent extends BaseRepository implements OrderRepositoryInterface
{
    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function getReservedItems()
    {
        return $this->model->where('expired_at', '>', Carbon::now())
            ->orderBy('expired_at', 'ASC')
            ->get();
    }
}
