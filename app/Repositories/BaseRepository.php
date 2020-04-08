<?php

namespace App\Repositories;
use App\Repositories\Interfaces\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    public function all()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $item = $this->getById($id);
        $item->update($attributes);
        return $item;
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}
