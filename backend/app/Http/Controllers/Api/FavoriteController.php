<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;
use App\Models\Room;

class FavoriteController extends Controller
{
    public function showFavorites()
    {
        $user = auth()->user();
        $rooms = $user->favoriteRooms()->with(['beds'])->get();
        return RoomResource::collection($rooms);
    }

    public function removeFavorite(Room $room)
    {
        $user = auth()->user();
        $user->favoriteRooms()->detach($room);
    }

    public function addToFavorite(Room $room)
    {
        $user = auth()->user();
        $user->favoriteRooms()->attach($room);
    }

    public function isFavorite(Room $room)
    {
        $user = auth()->user();
        $isFavorite = $user->favoriteRooms()->where('room_id', $room->id)->exists();
        return response()->json(['isFavorite' => $isFavorite]);
    }
}
