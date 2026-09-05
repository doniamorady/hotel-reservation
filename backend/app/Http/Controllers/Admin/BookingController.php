<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Booking\CreateBookingRequest;
use App\Http\Requests\Api\Booking\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Str;
use App\Models\User;
use App\Services\BookingService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $user = User::find(1);

        if ($user && $user->hasRole('admin')) {
            $bookings = Booking::with(['user', 'room'])->latest()->get();
        } else {
            $bookings = Booking::whereHas('user', function ($q) use ($user) {
                $q->where('id', $user->id);
            })->with(['user', 'room'])->latest()->get();
        }

        return view('admin.booking.index', compact('bookings'));
    }

    public function create()
    {
        $bookings = Booking::with(['user', 'room'])->latest()->get();
        $rooms = Room::with('beds')->get();

        return view('admin.booking.create', compact('bookings', 'rooms'));
    }

    public function store(CreateBookingRequest $request, BookingService $bookingService, Room $room)
    {
        $data = $request->validated();
        $booking = $bookingService->createBooking($data, $room);
        return redirect()->route('admin.bookings.show', $booking)
            ->with('toast-success', 'رزرو با موفقیت ثبت شد.');
    }

    public function show(Booking $booking)
    {
        return view('admin.booking.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $rooms = Room::with('beds')->get();

        return view('admin.booking.edit', compact('booking', 'rooms'));
    }

    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $data = $request->validated();
        $booking->update($data);

        return redirect()->route('admin.bookings.show', $booking)
            ->with('toast-success', 'رزرو با موفقیت ویرایش شد.');
    }

    public function addBreakfast(Booking $booking, BookingService $service)
    {
        $service->addBreakfast($booking);

        return redirect()->route('admin.bookings.show', $booking)
            ->with('toast-success', 'صبحانه با موفقیت اضافه شد.');
    }

    public function updateStatus(UpdateBookingRequest $request, Booking $booking)
    {
        $data = $request->validated();
        $booking->update($data);

        return redirect()->route('admin.bookings.show', $booking)
            ->with('toast-success', 'وضعیت رزرو با موفقیت بروزرسانی شد.');
    }

    public function changeStatus(Booking $booking, BookingService $service)
    {
        $service->changeStatus($booking);

        return redirect()->route('admin.bookings.index')
            ->with('toast-success', 'وضعیت رزرو با موفقیت تغییر یافت.');
    }
}
