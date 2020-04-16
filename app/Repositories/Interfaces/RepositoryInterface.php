<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    public function all();

    public function allWith(array $relations);

    public function find($id);

    public function findWith($id, array $relations);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function destroy($id);
}
