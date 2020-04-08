<?php

namespace App\Http\Controllers\Api;

use App\Hookah;
use App\Http\Controllers\Controller;
use App\Http\Requests\Hookah\CreateRequest;
use App\Http\Requests\Hookah\ListRequest;
use App\Http\Requests\Hookah\UpdateRequest;
use App\Repositories\Interfaces\HookahRepositoryInterface;

class HookahController extends Controller
{
    private $hookahRepository;

    public function __construct(HookahRepositoryInterface $hookahRepository)
    {
        $this->hookahRepository = $hookahRepository;
    }

    public function index()
    {
        $items = $this->hookahRepository->all();
        return response()->json($items);
    }

    public function show(Hookah $hookah)
    {
        $item = $this->hookahRepository->getById($hookah->id);
        return response()->json($item);
    }

    public function store(CreateRequest $request)
    {
        $item = $this->hookahRepository->create($request->all());
        return response()->json($item);
    }

    public function update(UpdateRequest $request, Hookah $hookah)
    {
        $item = $this->hookahRepository->update($hookah->id, $request->all());
        return response()->json($item);
    }

    public function destroy(Hookah $hookah)
    {
        $this->hookahRepository->destroy($hookah->id);
        return response()->json(['status' => 'success'], 200);
    }

    public function searchAvailableItems(ListRequest $request)
    {
        $items = $this->hookahRepository->getAvailableItems($request->all());
        return response()->json($items);
    }
}
