<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RevolutService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.revolut.url', env('REVOLUT_API_URL'));
        $this->apiKey = env('REVOLUT_API_KEY');
    }

    public function createOrder($amount, $currency, $reference, $description)
    {
        $response = Http::withToken($this->apiKey)
            ->post($this->baseUrl . '/order', [
                'amount' => $amount, // in cents (e.g. 10.00 USD = 1000)
                'currency' => $currency,
                'merchant_order_ext_ref' => $reference,
                'description' => $description,
                'capture_mode' => 'AUTOMATIC',
                'merchant_notify_url' => env('REVOLUT_WEBHOOK_URL'),
            ]);

        return $response->json();
    }

    public function getOrder($orderId)
    {
        $response = Http::withToken($this->apiKey)
            ->get($this->baseUrl . "/order/{$orderId}");

        return $response->json();
    }
}