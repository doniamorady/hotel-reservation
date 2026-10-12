<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Services\ZarinpalService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(
        private ZarinpalService $zarinpal
    ) {}


    public function pay()
    {
        $payment = $this->zarinpal->requestPayment(
            amount: 50000,
            description: 'Test payment',
            callbackUrl: route('payment.callback')
        );

        return response()->json([
            'url' => $payment['url'],
            'authitory' => $payment['authority']
        ]);
    }



    public function callback(Request $request)
    {

        if ($request->Status !== 'OK'){
            return "Payment cancelled";
        } 

        $payment = Payment::where('authority', $request->Authority)->firstOrFail();

        $result = $this->zarinpal->verifyPayment(
            authority: $request->Authority,
            amount: $payment->amount
        );
        $payment->update([
            'status' => 'paid',
            'ref_id' => $result['ref_id']
        ]);

        $payment->booking->update([
            'status' => 'confirmed',
            'expired_at' => null
        ]);

        return redirect(
            "http://localhost:5173/booking-success/{$payment->booking_id}"
        );
    }
}
