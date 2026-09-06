<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Room\CreateRoomRequest;
use App\Http\Requests\Api\Room\UpdateRoomRequest;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use App\Models\Bed;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::with(['beds', 'gallery'])->get();
        return RoomResource::collection($rooms);
    }


    public function store(CreateRoomRequest $request)
    {
        $data = $request->validated();

        $beds = $data['beds'];
        unset($data['beds']);
        $data['capacity'] = Bed::whereIn('id', $beds)->get()->sum('capacity');

        $newRoom = Room::create($data);
        $newRoom->beds()->sync($beds);

        return new RoomResource($newRoom->load(['beds', 'gallery']));
    }


    public function show(Room $room)
    {
        return new RoomResource($room->load(['beds', 'gallery']));
    }



    public function update(UpdateRoomRequest $request, Room $room)
    {
        $data = $request->validated();

        if (isset($data['beds'])) {
            $beds = $data['beds'];
            unset($data['beds']);
            $room->beds()->sync($beds);
            $data['capacity'] = Bed::whereIn('id', $beds)->get()->sum('capacity');
        }

        $room->update($data);
        return new RoomResource($room->load(['beds', 'gallery']));
    }


    public function destroy(Room $room)
    {
        $room->delete();
        return response()->json(['message' => 'delete successfully'], 200);
    }
}
