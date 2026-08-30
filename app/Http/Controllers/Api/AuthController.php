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


    public function verifyOtp(VerifyOtpRequest $request, OtpService $otpService)
    {
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
        $user->tokens()->delete();
        // Create personal access token for API (Bearer)
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'login successful',
            'user' => new UserResource($user),
            'token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}
