<?php

namespace App\Http\Controllers\furnicontroller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Exception\SignatureVerificationException;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        try {
            $payload = $request->getContent();
            $sig_header = $request->header('X-Custom-Signature');
    
            // Log the signature header and payload for debugging
            Log::info('Stripe Signature Header: ' . $sig_header);
            Log::info('Stripe Payload: ' . $payload);
    
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                config('services.stripe.webhook.secret')
            );
    
            // Rest of your webhook handling logic...
    
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('Webhook Signature Verification Error: ' . $e->getMessage());
    
            // Invalid signature
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

}
