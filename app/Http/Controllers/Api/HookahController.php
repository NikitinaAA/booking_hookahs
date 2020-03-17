<?php

namespace App\Http\Controllers\Api;

use App\Hookah;
use App\Http\Controllers\Controller;
use App\Http\Requests\Hookah\CreateRequest;
use App\Http\Requests\Hookah\ListRequest;
use App\Http\Requests\Hookah\UpdateRequest;
use App\Services\HookahService;

class HookahController extends Controller
{
    private $hookahService;

    public function __construct()
    {
        $this->hookahService = new HookahService();
    }

    public function index()
    {
        $items = Hookah::query()->get();

        return response()->json($items);
    }

    public function show(Hookah $hookah)
    {
        return response()->json($hookah);
    }

    public function store(CreateRequest $request)
    {
        $hookah = Hookah::query()->create($request->all());

        return response()->json($hookah);
    }

    public function update(UpdateRequest $request, Hookah $hookah)
    {
        $hookah->update($request->all());

        return response()->json($hookah);
    }

    public function destroy(Hookah $hookah)
    {
        $hookah->delete();

        return response()->json(['status' => 'success'], 200);
    }

    public function searchAvailableItems(ListRequest $request)
    {
        $items = $this->hookahService->getAvailableItems($request->all());

        return response()->json($items);
    }
}
