<?php

namespace App\Http\Controllers\Api;

use App\HookahPlace;
use App\Http\Controllers\Controller;
use App\Http\Requests\HookahPlace\CreateRequest;
use App\Http\Requests\HookahPlace\UpdateRequest;

class HookahPlaceController extends Controller
{
    public function index()
    {
        $items = HookahPlace::all();

        return response()->json($items);
    }

    public function show(HookahPlace $hookahPlace)
    {
        return response()->json($hookahPlace);
    }

    public function store(CreateRequest $request)
    {
        $hookahPlace = HookahPlace::query()->create($request->all());

        return response()->json($hookahPlace);
    }

    public function update(UpdateRequest $request, HookahPlace $hookahPlace)
    {
        $hookahPlace->update($request->all());

        return response()->json($hookahPlace);
    }

    public function destroy(HookahPlace $hookahPlace)
    {
        $hookahPlace->delete();

        return response()->json(['status' => 'success'], 200);
    }
}
