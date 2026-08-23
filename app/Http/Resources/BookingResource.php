<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\RoomResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'user' => new UserResource($this->user),
            'room' => new RoomResource($this->room),
            'num_nights' => $this->num_nights,
            'num_guests' => $this->num_guests,
            'has_breakfast' => $this->has_breakfast,
            'breakfast_price' => $this->breakfast_price,
            'room_price' => $this->room_price,
            'total_price' => $this->total_price
        ];
    }
}
