<?php

namespace App\Http\Controllers\furnicontroller;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\variation;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    /**
     * Handle incoming webhook requests from Stripe.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleWebhook(Request $request)
    {
        Log::info('Webhook Headers:', $request->headers->all());
         // Get the raw request body as a string
         $payload = $request->getContent();

         // Stripe secret key
         $secret = config('services.stripe.webhook_secret');
 
         try {
             // Verify the webhook signature
             $event = Webhook::constructEvent(
                 $payload,
                 $request->header('Stripe-Signature'),
                 $secret
             );
 
             // Handle the event based on its type
             $this->handleEvent($event);
 
         } catch (SignatureVerificationException $e) {
             // Invalid signature
             return response('Invalid signature.', 400);
         }
 
         // Return a 200 response to acknowledge receipt of the event
         return response('Webhook handled successfully', 200);
     }
    
     /**
     * Handle the specific event based on its type.
     *
     * @param  \Stripe\Event  $event
     * @return void
     */
    protected function handleEvent($event)
    {
        switch ($event->type) {
            case 'payment_intent.succeeded':
                // Handle payment succeeded event
                $this->handlePaymentIntentSucceeded($event->data->object);
                break;

            case 'payment_intent.payment_failed':
                // Handle payment failed event
                $this->handlePaymentIntentFailed($event->data->object);
                break;

            // Add more cases for other event types as needed

            default:
                // Handle other event types if necessary
        }
    }

    /**
     * Handle payment succeeded event.
     *
     * @param  \Stripe\PaymentIntent  $paymentIntent
     * @return void
     */
    protected function handlePaymentIntentSucceeded($paymentIntent)
    {
        $cart = Cart::where('userID', Auth::user()->id)->get();
        foreach ($cart as $c) {
            $product = variation::find($c->variationID);
            $stock = $product->stock - $c->quantity;
            if ($stock == 0) {
                $product->update(['status' => 0]);
            } else {
                $product->update(['stock' => $stock]);
            }
            $c->delete();
        }
    }

    /**
     * Handle payment failed event.
     *
     * @param  \Stripe\PaymentIntent  $paymentIntent
     * @return void
     */
    protected function handlePaymentIntentFailed($paymentIntent)
    {
        // Your logic for handling a failed payment
    }

}
