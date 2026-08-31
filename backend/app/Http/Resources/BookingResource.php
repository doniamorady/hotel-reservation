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
            'status' => $this->status,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'user' => new UserResource($this->user),
            'room' => new RoomResource($this->room),
            'num_nights' => $this->num_nights,
            'num_guests' => (int) $this->num_guests,
            'has_breakfast' => $this->has_breakfast ? true : false,
            'breakfast_unit_price' => $this->breakfast_unit_price,
            'total_breakfast_price' => $this->total_breakfast_price,
            'room_unit_price' => $this->room_unit_price,
            'total_room_price' => $this->total_room_price,
            'total_price' => $this->total_price
        ];
    }
}
