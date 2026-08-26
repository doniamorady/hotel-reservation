<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Setting;
use Exception;

class BookingService
{

    public function __construct(private RoomAvailabilityService $availability) {}

    public function createBooking(array $data, object $room,)
    {

        //1.check the room active in the start date and end date
        $available = $this->availability->check($room, $data['start_date'], $data['end_date']);
        if (!$available) throw new Exception('The selected room is unavailable for the chosen dates.');

        $data['room_price'] = $room->price;

        //2.check the room capacity lower than num guests
        if (((int)$data['num_guests']) > $room->capacity) return throw new Exception('num guests must be lower than ' . $room->capacity . ' guest');

        //without auth
        $data['user_id'] = 1;

        $data['room_id'] = $room->id;

        $basic_breakfast_price = (int) Setting::first()->breakfast_price;
        $data['breakfast_price'] = $basic_breakfast_price;

        $num_nights = strtotime($data['end_date']) - strtotime($data['start_date']);
        //86400 : 24*60*60
        $data['num_nights'] = (int)((round($num_nights / 86400)));

        //3.total breakfast price
        $breakfast_price  = $data['has_breakfast'] ? $basic_breakfast_price * (int)$data['num_guests'] * (int)$data['num_nights'] : 0;

        //4.room price
        $room_price = (int)$data['num_nights'] * $room->price;
        $total_price = $room_price + $breakfast_price;
        $data['total_price'] = $total_price;

        $data['status'] = 'pending';

        return Booking::create($data);
    }


    public function addBreakfast(object $booking)
    {

        if ($booking->has_breakfast) {
            throw new Exception('Breakfast already added');
        }
        $basic_breakfast_price = Setting::first()->breakfast_price;
        
        $breakfast_price =
            $booking->num_nights *
            $booking->num_guests *
            $basic_breakfast_price;
            
        $total_price = $booking->total_price + $breakfast_price;

        $booking->update([
            'has_breakfast' => true,
            'breakfast_price' => $breakfast_price,
            'total_price' => $total_price
        ]);

        return $booking;
    }
}
