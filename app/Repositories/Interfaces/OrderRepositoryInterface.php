<?php

namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface extends RepositoryInterface
{
    public function getReservedItems();
}
