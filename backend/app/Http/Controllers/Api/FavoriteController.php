<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function showFavorite(){
        $user = auth()->user();
        $rooms = $user->favoriteRooms;
        return RoomResource::collection($rooms);
    }
}
