<?php

namespace App\Repositories;

use App\Repositories\Interfaces\HookahRepositoryInterface;
use App\Hookah;

class HookahRepositoryEloquent extends BaseRepository implements HookahRepositoryInterface
{
    protected $model;

    public function __construct(Hookah $model)
    {
        $this->model = $model;
    }

    public function getAvailableItems(array $filters)
    {
        $items = $this->model
            ->where(function ($query) use($filters) {
                $query->whereHas('orders', function ($q) use($filters) {
                    $q->whereNotBetween('reserve_at', [$filters['from'], $filters['to']]);
                })
                    ->orWhereDoesnthave('orders');
            })
            ->get()
            ->groupBy('hookah_place.name');

        return $items->filter(function ($collection) use ($filters) {
            return $collection->sum('persons_limit') >= $filters['person_amount'];
        });
    }
}
