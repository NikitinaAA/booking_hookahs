<?php

namespace App\Http\Controllers\Api;

use App\HookahPlace;
use App\Http\Controllers\Controller;
use App\Http\Requests\HookahPlace\CreateRequest;
use App\Http\Requests\HookahPlace\UpdateRequest;
use App\Repositories\Interfaces\HookahPlaceRepositoryInterface;

class HookahPlaceController extends Controller
{
    private $hookahPlaceRepository;

    public function __construct(HookahPlaceRepositoryInterface $hookahPlaceRepository)
    {
        $this->hookahPlaceRepository = $hookahPlaceRepository;
    }

    public function index()
    {
        $items = $this->hookahPlaceRepository->all();
        return response()->json($items);
    }

    public function show(HookahPlace $hookahPlace)
    {
        $item = $this->hookahPlaceRepository->getById($hookahPlace->id);
        return response()->json($item);
    }

    public function store(CreateRequest $request)
    {
        $item = $this->hookahPlaceRepository->create($request->all());
        return response()->json($item);
    }

    public function update(UpdateRequest $request, HookahPlace $hookahPlace)
    {
        $item = $this->hookahPlaceRepository->update($hookahPlace->id, $request->all());
        return response()->json($item);
    }

    public function destroy(HookahPlace $hookahPlace)
    {
        $this->hookahPlaceRepository->destroy($hookahPlace->id);
        return response()->json(['status' => 'success'], 200);
    }
}
