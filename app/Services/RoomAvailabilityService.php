<?php

namespace App\Services;

use App\Models\Room;
use Exception;

class RoomAvailabilityService
{

    function check(object $room, string $start_date, string $end_date): bool
    {

        if (!$room->status) return throw new Exception('This room not active. Please chose another room');

        return !$room->bookings()->where(function ($query) use ($start_date, $end_date) {
            $query->whereBetween('start_date', [$start_date, $end_date])->orWhereBetween('end_date', [
                $start_date,
                $end_date
            ]);
        })->exists();
    }
}
