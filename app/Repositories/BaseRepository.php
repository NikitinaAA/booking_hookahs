<?php

namespace App\Repositories;
use App\Repositories\Interfaces\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    public function all()
    {
        return $this->model->all();
    }

    public function allWith(array $relations)
    {
        return $this->model->with($relations)->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function findWith($id, array $relations)
    {
        return $this->model->with($relations)->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $item = $this->find($id);
        $item->update($attributes);
        return $item;
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}
