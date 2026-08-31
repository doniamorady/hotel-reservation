<?php

namespace App\Services;

use App\Models\Setting;

class BookingPriceService
{

    public function calcPrice(array $data, object $room): array
    {
        $breakfast_unit_price = (float) Setting::first()->breakfast_unit_price;

        $total_breakfast_price = $data['has_breakfast']
            ? $breakfast_unit_price * (int)$data['num_guests'] * $data['num_nights']
            : 0;

        $total_room_price = $data['num_nights'] * $room->price;

        return [
            'room_unit_price' => $room->price,
            'total_room_price' => $total_room_price,
            'breakfast_unit_price' => $breakfast_unit_price,
            'total_breakfast_price' => $total_breakfast_price,
            'total_price' => $total_room_price + $total_breakfast_price,
        ];
    }
}
