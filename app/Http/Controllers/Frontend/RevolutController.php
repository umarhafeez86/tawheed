<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class RevolutController extends Controller
{
    private $client;
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('REVOLUT_API_URL');
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . env('REVOLUT_API_KEY'),
                'Content-Type'  => 'application/json',
            ],
        ]);
    }

    /**
     * Step 1: Create payment order and redirect to Revolut checkout
     */
    public function createPayment(Request $request)
    {	
       try {
           $response = $this->client->post('/api/1.0/orders', [
               'json' => [
                   'amount' => intval($request->booking_amount * 100), // 50.00 GBP (amount in minor units)
                   'currency' => 'GBP',
                   'capture_mode' => 'AUTOMATIC',
                   'merchant_order_ext_ref' => uniqid('order_'),
                   'description' => 'Payment Page',
                   'success_url' => route('revolut.success'),
                   'cancel_url' => route('revolut.success'),
               ],
           ]);

           $data = json_decode($response->getBody(), true);

           if (!empty($data['checkout_url'])) {
               // Redirect customer to Revolut payment page
               return redirect($data['checkout_url']);
           }

           return response()->json(['error' => 'No checkout URL returned'], 500);

       } catch (\Exception $e) {
           Log::error('Revolut Payment error: ' . $e->getMessage());
           return response()->json(['error' => $e->getMessage()], 500);
       }
    }

    /**
     * Step 2: After payment success, check order status via API
     */
    public function success(Request $request)
    {
        $orderId = $request->query('order_id'); // Revolut sends order_id in redirect query

        if (!$orderId) {
            return view('payment-status', ['status' => 'error', 'message' => 'Missing order ID']);
        }

        try {
            $response = $this->client->get("/order/{$orderId}");
            $data = json_decode($response->getBody(), true);

            $status = strtoupper($data['state'] ?? 'UNKNOWN');

            if ($status === 'COMPLETED' || $status === 'CAPTURED') {
                return view('payment-status', [
                    'status' => 'success',
                    'message' => '✅ Payment successful!',
                    'order' => $data
                ]);
            } elseif ($status === 'PENDING') {
                return view('payment-status', [
                    'status' => 'pending',
                    'message' => '⏳ Payment pending confirmation.',
                    'order' => $data
                ]);
            } else {
                return view('payment-status', [
                    'status' => 'failed',
                    'message' => '❌ Payment failed or cancelled.',
                    'order' => $data
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Revolut check order error: ' . $e->getMessage());
            return view('payment-status', ['status' => 'error', 'message' => 'Error checking payment status.']);
        }
    }
}