<?php

namespace App\Services;

use App\Http\Resources\BookingResource;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class BookingPayment
{

    public function __construct(private BookingService $bookingService, private ZarinpalService $zarinpalService) {}

    public function checkout(Object $room, array $data)
    {
        return DB::transaction(function () use ($data, $room) {
            $data['expired_at'] = now()->addMinutes(15);
            $booking = $this->bookingService->createBooking($data, $room);
            $payment = Payment::create([
                'booking_id' => $booking->id,
                'amount' => $booking->total_price,
                'user_id' => $booking->user_id,
                'authority' => null,
                'ref_id' => null,
                'status' => 'pending',
                'description' => null,
            ]);

            $gateway = $this->zarinpalService->requestPayment(amount: $payment->amount, description: 'Test', callbackUrl: route('payment.callback'));
            $payment->update(['authority' => $gateway['authority']]);

            return [
                'booking' => new BookingResource($booking),
                'payment_url' => $gateway['url']
            ];
        });
    }
}
