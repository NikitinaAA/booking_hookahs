<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Hookah\HookahResource;
use App\Http\Requests\Hookah\CreateRequest;
use App\Http\Requests\Hookah\ListRequest;
use App\Http\Requests\Hookah\UpdateRequest;
use App\Repositories\Interfaces\HookahRepositoryInterface;

class HookahController extends ApiController
{
    public function __construct(HookahRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        $items = $this->repository->all();
        return HookahResource::collection($items);
    }

    public function show($id)
    {
        $item = $this->repository->findWith($id, ['hookah_place']);
        return new HookahResource($item);
    }

    public function store(CreateRequest $request)
    {
        $item = $this->repository->create($request->all());
        return new HookahResource($item);
    }

    public function update(UpdateRequest $request, $id)
    {
        $item = $this->repository->update($id, $request->all());
        return new HookahResource($item);
    }

    public function destroy($id)
    {
        $this->repository->destroy($id);
        return response()->json(['status' => 'success'], 200);
    }

    public function searchAvailableItems(ListRequest $request)
    {
        $items = $this->repository->getAvailableItems($request->all());
        return response()->json($items);
    }
}
