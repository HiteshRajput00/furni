<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class sessionController extends Controller
{
    public function sessionpayment(Request $req){
        
            try {
                Stripe::setApiKey(env('STRIPE_SECRET'));
                $session = Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                        'price_data' => [
                            'currency' => 'inr',
                            'product_data' => [
                                'name' => 'Furniture',

                            ],
                            'unit_amount' => $req->price * 10, // The amount in cents
                        ],
                        'quantity' => 1,
                        //  
                    ]],
                   
                   
                    'mode' => 'payment',
                    'success_url' => url('/payment-success'),
                    'cancel_url' => url('/payment-fail'),
                ]);
                // return $session->url;
                //   dd($session->id);
                 return response()->json(['id' => $session->id]);
            } catch (ApiErrorException $e) {
                // dd($e->getMessage());
               return response()->json(['error' => $e->getMessage()], 500);
            }
        
    }

    public function paymentSucess(){
        return true;
    }

    public function paymentfail(){
        return false;
    }
}
