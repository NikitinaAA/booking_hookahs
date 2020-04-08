<?php

namespace App\Repositories\Interfaces;

interface HookahRepositoryInterface extends RepositoryInterface
{
    public function getAvailableItems(array $filters);
}
