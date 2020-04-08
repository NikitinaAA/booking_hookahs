<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    public function all();

    public function getById($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function destroy($id);
}
