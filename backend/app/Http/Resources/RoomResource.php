<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BedResource;

class RoomResource extends JsonResource
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
            'name' => $this->name,
            'status' => $this->status,
            'cover_image' => $this->cover_image,
            'capacity' => $this->capacity,
            'price' => (float)$this->price,
            'description' => $this->description,
            'beds' => BedResource::collection($this->whenLoaded('beds'))
        ];
    }
}
