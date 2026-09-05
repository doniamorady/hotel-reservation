<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Setting;
use Exception;

class BookingService
{

    public function __construct(private RoomAvailabilityService $availability, private BookingPriceService $priceService) {}

    public function createBooking(array $data, object $room)
    {

        //1.check the room active in the start date and end date
        $available = $this->availability->check($room, $data['start_date'], $data['end_date']);
        if (!$available) throw new Exception('The selected room is unavailable for the chosen dates.');

        $data['status'] = 'pending';

        //2.check the room capacity lower than num guests
        if (((int)$data['num_guests']) > $room->capacity)
            throw new Exception(
                'This room has a maximum capacity of ' . $room->capacity . ' guests.'
            );
        //without auth
        // $data['user_id'] = auth()->user()->id;
        $data['user_id'] =1;
        $data['room_id'] = $room->id;


        $num_nights = strtotime($data['end_date']) - strtotime($data['start_date']);
        dd($num_nights);
        //86400 : 24*60*60
        $data['num_nights'] = (int)((round($num_nights / 86400)));

        $prices = $this->priceService->calcPrice($data, $room);

        $data = array_merge($data, $prices);
        return Booking::create($data);
    }


    public function addBreakfast(object $booking)
    {

        if ($booking->has_breakfast) {
            throw new Exception('Breakfast already added');
        }

        $total_breakfast_price =
            $booking->num_nights *
            $booking->num_guests *
            $booking->breakfast_unit_price;

        $total_price = $booking->total_price + $total_breakfast_price;

        $booking->update([
            'has_breakfast' => true,
            'total_breakfast_price' => $total_breakfast_price,
            'total_price' => $total_price
        ]);

        return $booking;
    }

    public function changeStatus(object $booking)
    {
        switch ($booking->status) {
            case 'pending':
                $status = 'check_in';
                break;
            case 'check_in':
                $status = 'check_out';
                break;
            case 'check_out':
                $status = 'cancelled';
                break;
            case 'cancelled':
                $status = 'pending';
                break;
            default:
                throw new Exception('Invalid booking status');
        }
        $booking->update(['status' => $status]);
        return $booking;
    }
}
