<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Bed\BedUpdateRequest;
use App\Http\Requests\Api\Bed\CreateRequest;
use App\Http\Resources\BedResource;
use App\Models\Bed;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beds = Bed::all();
        return BedResource::collection($beds);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {

        $inputs = $request->validated();
        $newBed = Bed::create($inputs);
        return new BedResource($newBed);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new BedResource(Bed::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BedUpdateRequest $request, Bed $bed)
    {
        $inputs = $request->validated();
        $bed->update($inputs);
        return new BedResource($bed);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bed $bed)
    {
        $bed->delete();
        return response()->json(['message' => 'delete successfully'], 200);
    }
}
