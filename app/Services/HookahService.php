<?php

namespace App\Services;

use App\Hookah;

class HookahService {

    public function getAvailableItems($filters)
    {
        $items = Hookah::query()
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