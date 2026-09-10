<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'cover_image' => $this->cover_image
                ? asset('storage/' . $this->cover_image)
                : null,
            'capacity' => $this->capacity,
            'price' => (float) $this->price,
            'bedrooms' => $this->bedrooms,
            'area' => $this->area,
            'description' => $this->description,
            'beds' => BedResource::collection($this->whenLoaded('beds')),
            'gallery' => GalleryResource::collection($this->whenLoaded('gallery')),
        ];
    }
}
