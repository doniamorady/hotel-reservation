<?php

namespace App\Services;

use App\Models\Room;
use Exception;

class RoomAvailabilityService
{

    function check(object $room, string $start_date, string $end_date): bool
    {

        if (!$room->status) return throw new Exception('This room not active. Please chose another room');

        $activeStatuses  = ['pending', 'confirmed', 'check_in'];
        
        return !$room->bookings()->whereIn('status', $activeStatuses)->where(function ($query) use ($start_date, $end_date) {
            $query->where('start_date', '<', $end_date)->where('end_date', '>', $start_date);
        })->exists();
    }
}
