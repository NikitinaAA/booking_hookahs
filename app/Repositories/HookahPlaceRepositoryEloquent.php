<?php

namespace App\Repositories;

use App\Repositories\Interfaces\HookahPlaceRepositoryInterface;
use App\HookahPlace;

class HookahPlaceRepositoryEloquent extends BaseRepository implements HookahPlaceRepositoryInterface
{
    protected $model;

    public function __construct(HookahPlace $model)
    {
        $this->model = $model;
    }
}
