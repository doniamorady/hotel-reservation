<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Room\CreateRoomRequest;
use App\Http\Requests\Api\Room\UpdateRoomRequest;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::all();
        return RoomResource::collection($rooms);
    }


    public function store(CreateRoomRequest $request)
    {
        $inputs = $request->validated();
        $newRoom = Room::create($inputs);
        return new RoomResource($newRoom);
    }


    public function show(Room $room)
    {
        return new RoomResource($room);
    }



    public function update(UpdateRoomRequest $request, Room $room)
    {
        $inputs = $request->validated();
        $room->update($inputs);
        return new RoomResource($room);
    }


    public function destroy(Room $room)
    {
        $room->delete();
        return response()->json(['message' => 'delete successfully'], 200);
    }
}
