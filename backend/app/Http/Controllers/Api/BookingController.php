<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Booking\CreateBookingRequest;
use App\Http\Requests\Api\Booking\UpdateBookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Room;
use App\Services\BookingPayment;
use App\Services\BookingService;

class BookingController extends Controller
{

    public function index($status)
    {
        $user = auth()->user();
        
        $query = $user->bookings()->with(['user', 'room']);
        if ($status !== 'all')
            $query->where('status', $status);
        
       
        $bookings = $query->get();

        return BookingResource::collection($bookings);
    }

    /**
     * Store a newly created resou
     * 
     * 
     rce in storage.
     */
    public function store(CreateBookingRequest $request, Room $room, BookingPayment $bookingPayment)
    {
        $data = $request->validated();
        return $bookingPayment->checkout($room, $data);
    }


    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);
        return new BookingResource($booking);
    }


    public function addBreakfast(Booking $booking, BookingService $service)
    {
        $updateBooking = $service->addBreakfast($booking);
        return response()->json(['message' => 'breakfast successfully added', 'booking' =>  new BookingResource($updateBooking)]);
    }


    public function updateStatus(
        UpdateBookingRequest $request,
        Booking $booking
    ) {
        $data = $request->validated();
        $booking->update($data);
        return response()->json(['message' => 'status successfully updated', 'booking' =>  new BookingResource($booking)]);
    }

    public function allStatus()
    {
        $status = auth()->user()->bookings()->selectRaw(
            "
            Count(CASE WHEN status= 'pending' THEN 1 END) as pending,
            Count(CASE WHEN status= 'confirmed' THEN 1 END) as confirmed,
            Count(CASE WHEN status= 'check_in' THEN 1 END) as checkIn,
            Count(CASE WHEN status= 'check_out' THEN 1 END) as checkOut,
            Count(CASE WHEN status= 'cancelled' THEN 1 END) as cancelled,
            Count(CASE WHEN status= 'expired' THEN 1 END) as expired
            "
        )->first();
        return response()->json($status);
    }
}
