<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OtpService
{


    public function createOtp(string $phone)
    {

        // Invalidate previous OTPs when a new one is requested
        Otp::where('phone', $phone)->where('used', false)->update(['used' => true]);

        $otp_code = (string) random_int(111111, 999999);
        Otp::create([
            'phone' => $phone,
            'otp_code' => Hash::make($otp_code),
            'expires_at' => Carbon::now()->addMinutes(5),

        ]);

        return $otp_code;
    }


    public function verifyOtp(array $data)
    {
        $otp = Otp::where('phone', $data['phone'])->where('used', false)->latest()->first();

        if (!$otp)
            return response()->json([
                'message' => 'OTP not found'
            ], 404);


        if (Carbon::now()->greaterThan($otp->expires_at))
            return response()->json([
                'message' => 'OTP has expired'
            ], 422);


        if (!Hash::check($data['otp_code'], $otp->otp_code))
            return response()->json([
                'message' => 'Invalid OTP code'
            ], 422);


        $otp->update(['used' => true]);
        $user = User::firstOrCreate(['phone' => $data['phone']]);
        Auth::login($user);

        return response()->json([
            'message' => 'OTP code was matched',
            'user' => new UserResource($user)
        ]);
    }
}
