<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\AuthRequest;
use App\Http\Requests\VerifyOtpRequest;
use App\Http\Resources\UserResource;
use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function sendOtp(AuthRequest $request, OtpService $otpService)
    {
        $data = $request->validated();

        //all mobile numbers are on format 9** *** ***
        $phone = preg_replace("/^(\+98|98)/", '0', $data['phone']);

        //create otp
        $otp_code = $otpService->createOtp($phone);

        return response()->json([
            'message' =>  'Otp send successfully',
            'otp_code' => $otp_code
        ]);
    }


    public function verifyOtp(
        VerifyOtpRequest $request,
        OtpService $otpService
    ) {
        $data = $request->validated();

        $data['phone'] = preg_replace(
            "/^(\+98|98)/",
            '0',
            $data['phone']
        );


        $user = $otpService->verifyOtp($data);


        if (!$user) {
            return response()->json([
                'message' => 'Invalid OTP'
            ], 422);
        }


        Auth::login($user);
        $request->session()->regenerate();

        return response()->json([
            'message' => 'login successful',
            'user' => new UserResource($user)
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'logged out successfully']);
    }
}
