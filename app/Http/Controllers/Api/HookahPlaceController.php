<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\HookahPlace\HookahPlaceResource;
use App\Http\Requests\HookahPlace\CreateRequest;
use App\Http\Requests\HookahPlace\UpdateRequest;
use App\Repositories\Interfaces\HookahPlaceRepositoryInterface;

class HookahPlaceController extends ApiController
{
    public function __construct(HookahPlaceRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        $items = $this->repository->all();
        return HookahPlaceResource::collection($items);
    }

    public function show($id)
    {
        $item = $this->repository->findWith($id, ['hookahs']);
        return new HookahPlaceResource($item);
    }

    public function store(CreateRequest $request)
    {
        $item = $this->repository->create($request->all());
        return new HookahPlaceResource($item);
    }

    public function update(UpdateRequest $request, $id)
    {
        $item = $this->repository->update($id, $request->all());
        return new HookahPlaceResource($item);
    }

    public function destroy($id)
    {
        $this->repository->destroy($id);
        return response()->json(['status' => 'success'], 200);
    }
}
