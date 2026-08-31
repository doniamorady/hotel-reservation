<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Booking\CreateBookingRequest;
use App\Http\Requests\Api\Booking\UpdateBookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Room;
use App\Services\BookingService;

class BookingController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('admin'))
            $bookings = Booking::with(['user', 'room'])->get();
        else {
            $bookings = $user->bookings()->with(['user', 'room'])->get();
        }
        return BookingResource::collection($bookings);
    }

    /**
     * Store a newly created resou
     * 
     * 
     rce in storage.
     */
    public function store(CreateBookingRequest $request, BookingService $bookingService, Room $room)
    {
        $data = $request->validated();
        $booking = $bookingService->createBooking($data, $room);
        return new BookingResource($booking);
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
}
