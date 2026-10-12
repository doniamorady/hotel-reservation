<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class ZarinpalService
{
    private function requestUrl()
    {
        return config('services.zarinpal.sandbox')
            ? 'https://sandbox.zarinpal.com/pg/v4/payment/request.json'
            : 'https://payment.zarinpal.com/pg/v4/payment/request.json';
    }


    private function startPayUrl($authority)
    {
        return config('services.zarinpal.sandbox')
            ? "https://sandbox.zarinpal.com/pg/StartPay/$authority"
            : "https://www.zarinpal.com/pg/StartPay/$authority";
    }


    public function requestPayment(
        $amount,
        string $description,
        $callbackUrl
    ) {

        $response = Http::post(
            $this->requestUrl(),
            [
                'merchant_id' => config('services.zarinpal.merchant_id'),
                'amount' => $amount,
                'description' => $description,
                'callback_url' => $callbackUrl,
            ]
        );

        $result = $response->json();

        if (
            isset($result['data']['code']) &&
            $result['data']['code'] == 100
        ) {

            return [
                'authority' => $result['data']['authority'],
                'url' => $this->startPayUrl(
                    $result['data']['authority']
                ),
            ];
        }

        throw new Exception(
            'Payment request failed'
        );
    }

    private function verifyUrl()
    {
        return config('services.zarinpal.sandbox')
            ? 'https://sandbox.zarinpal.com/pg/v4/payment/verify.json'
            : 'https://payment.zarinpal.com/pg/v4/payment/verify.json';
    }

    public function verifyPayment(
        string $authority,
        int $amount
    ) {

        $response = Http::post(
            $this->verifyUrl(),
            [
                'merchant_id' => config('services.zarinpal.merchant_id'),
                'amount' => $amount,
                'authority' => $authority,
            ]
        );

        $result = $response->json();

        if (
            isset($result['data']['code']) &&
            $result['data']['code'] == 100
        ) {

            return [
                'success' => true,
                'ref_id' => $result['data']['ref_id'],
            ];
        }

        throw new Exception(
            json_encode($result)
        );
    }
}
