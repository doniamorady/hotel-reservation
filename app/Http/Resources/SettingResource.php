<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'breakfast_unit_price' => $this->breakfast_unit_price,
            'max_nights' => $this->max_nights,
            'max_guests' => $this->max_guests
        ];
    }
}
