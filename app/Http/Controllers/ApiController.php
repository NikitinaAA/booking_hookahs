<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\RepositoryInterface;

class ApiController extends Controller
{
    protected $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
